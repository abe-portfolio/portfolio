package main

import (
	"html/template"
	"log"
	"net/http"
	"os"
	"regexp"
)

// struct -> 構造体。Pythonでいうところのクラスオブジェクトのようなもの
type Page2 struct {
	Title string
	Body  []byte
}

// 構造体：Page に対してsaveメソッドを作成（返り値はerror）
func (p2 *Page2) save2() error {
	// ファイル名を設定
	filename := p2.Title + ".txt"

	// ファイルを作成または開く
	file, err := os.Create(filename)
	if err != nil {
		return err
	}
	defer file.Close()

	// ファイルにデータを書き込む
	_, err = file.Write(p2.Body)
	if err != nil {
		return err
	}

	return nil
}

func loadPage2(title string) (*Page2, error) {
	filename := title + ".txt"

	// 引数のファイル名のファイルを開く。開けない場合はerrにエラーを返す
	file, err := os.Open(filename)
	if err != nil {
		return nil, err
	}
	defer file.Close()

	// file（開いたファイル）に関連する情報を取得する。今回は.Size()でサイズを取得している
	stat, err := file.Stat()
	if err != nil {
		return nil, err
	}
	size := stat.Size()

	// sizeに格納された容量を基にmake()でバッファを作成しておく
	body := make([]byte, size)

	// 	.Read()はバイト数とエラーを返すが、今回はバイト数の情報は不必要
	// file.Read(body)を実行した段階で、bodyにはfileの中身が格納されているが、.Read()自体はバイト数とエラーを返すため、「_, err」で初期化を行っている
	_, err = file.Read(body)
	if err != nil {
		return nil, err
	}
	return &Page2{Title: title, Body: body}, nil
}

/* テンプレートのキャッシングとは？
　　・テンプレートを一度解析してメモリに保持し、複数のリクエストで再利用する。
　　・これにより、各リクエストごとにテンプレートを再解析するオーバーヘッドを避け、パフォーマンスを向上させることができる。
*/
// template.Must()は、テンプレートの作成や解析においてエラーが発生した場合にプログラムをパニック（panic）させるヘルパー関数
// template.ParseFiles()は、指定されたファイルを解析して、*template.Template型のテンプレートを生成する関数
var templates2 = template.Must(template.ParseFiles("edit.html", "view.html"))

func renderTemplate2(w http.ResponseWriter, tmpl string, p2 *Page2) {
	// var templatesを実装する前のコード(editHandler()、saveHandler()、viewHandler()の最後で使用)
	// t, _ := template.ParseFiles(tmpl + ".html")
	// t.Execute(w, p)

	// ExecuteTemplate()メソッドは、指定したテンプレート（第二引数）をデータ（第三引数）と共に出力（この場合はHTTPレスポンスw）に書き込み
	err := templates2.ExecuteTemplate(w, tmpl+"html", p2)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
	}
}

// http.ResponseWriter
// 　　-> HTTPレスポンスを書き込むためのインターフェースで、サーバーがクライアントに返すHTTPレスポンスを構築するために使用。
// *http.Request
// 　　-> HTTPリクエストに関する情報を保持する構造体へのポインタで、クライアントからのHTTPリクエストに関する情報を取得するために使用。
func viewHandler2(w http.ResponseWriter, r *http.Request, title string) {
	// 例として、「/view/test」とアクセスした場合、len[("/view/"):] で「/view/」以降の文字列を取得する
	// title := r.URL.Path[len("/view/"):]  ※関数呼び出し時の引数に「title string」を追加したので不要になった
	p2, err := loadPage(title)
	if err != nil {
		http.Redirect(w, r, "/edit/"+title, http.StatusFound)
		return
	}

	// fmt.Fprintf(w, "<h1>%s</h1><div>%s</div>", p.Title, p.Body)
	// 挿入するhtmlが長くなる場合はテンプレートファイルを使って挿入する
	renderTemplate2(w, "view", p2)
}

func editHandler2(w http.ResponseWriter, r *http.Request, title string) {
	// title := r.URL.Path[len("/edit/"):]  ※関数呼び出し時の引数に「title string」を追加したので不要になった
	p2, err := loadPage(title)
	if err != nil {
		p2 = &Page{Title: title}
	}
	renderTemplate2(w, "edit", p2)
}

func saveHandler2(w http.ResponseWriter, r *http.Request, title string) {
	// title := r.URL.Path[len("/save/"):]  ※関数呼び出し時の引数に「title string」を追加したので不要になった
	// htmlファイルのformタグのbame属性がbodyの値を取得する（edit.htmlからsubmitされる）
	body := r.FormValue("body")
	p2 := &Page2{Title: title, Body: []byte(body)}
	err := p2.save2()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	http.Redirect(w, r, "/view/"+title, http.StatusFound)
}

// ^/(edit|save|view) => 先頭が「/edit」か「/save」か「/view」
// ([a-zA-Z0-9]+)$    => 末尾がa~zかA~Zか0~9が１回以上ある（何らかがある）
var validPath2 = regexp.MustCompile("^/(edit|save|view)/([a-zA-Z0-9]+)$")

func makeHandler2(fn func(http.ResponseWriter, *http.Request, string)) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		m := validPath2.FindStringSubmatch(r.URL.Path)
		if m == nil {
			http.NotFound(w, r)
			return
		}
		// m[2]は、変数（validPath）のインデックス２のデータ（つまり/edit/や/save/のあとの文字列）
		// このm[2]がHandlerの引数のtitle部分になる
		fn(w, r, m[2])
	}
}

func main2() {
	/*
		動作確認時に使用
		p1 := &Page{Title: "test", Body: []byte("This is a sample page.")}
		p1.save()

		p2, _ := loadPage(p1.Title)
		fmt.Println(string(p2.Body))
	*/

	// ※特定のURLにアクセスが来た時、自作したハンドラーを当てたい場合は、http.ListenAndServe()の"実行前"に..HandleFunc()を定義する
	// 「/view/」というアクセスが来た場合はviewHandlerを実行する
	// viewHandler、editHandler、sanveHandlerの引数に「title string」追加前
	// http.HandleFunc("/view/", viewHandler)
	// http.HandleFunc("/edit/", editHandler)
	// http.HandleFunc("/save/", saveHandler)

	// viewHandler、editHandler、sanveHandlerの引数に「title string」追加後
	// 各Handlerは、w r titleの３つが引数で必要だが、makeHandler関数によって r と w は作成されて呼び出される
	http.HandleFunc("/view/", makeHandler2(viewHandler2))
	http.HandleFunc("/edit/", makeHandler2(editHandler2))
	http.HandleFunc("/save/", makeHandler2(saveHandler2))

	// サーバーを立ち上げる。第一引数を省略するとlocalhostで立ち上がる
	// 第二引数はハンドラーを設定できる（nilの場合はデフォルトのもの(=404 page not found)が採用される）
	log.Fatal(http.ListenAndServe(":8080", nil))

	/*
		ブラウザで「localhost:8080」にアクセスした場合
			404 page not found

		ブラウザで、「localhost:8080/view/test」にアクセスした場合
			test
			This is a sample page.
	*/
}

/*
	まとめ
	http：Goの標準ライブラリで、HTTPサーバーやクライアントを実装するためのパッケージ
		http.HandleFunc()
		　　-> 指定されたパターンに対するHTTPリクエストを処理するハンドラ関数を登録
		http.Error()
		　　->指定されたエラーメッセージとステータスコードを使ってHTTPエラーレスポンスを送信
		http.Redirect()
		　　->クライアントを指定されたURLにリダイレクト
		http.NotFound()
		　　->リクエストされたリソースが見つからない場合に404 Not Foundのレスポンスを送信
		http.StatusFound
		　　->HTTPステータスコード302を示し、リソースが一時的に移動したことを表す
		http.StatusInternalServerError
		　　-> HTTPステータスコード500を示し、サーバー内部でエラーが発生したことを表す

	w http.ResponseWriter：HTTPレスポンスを書き込むためのインターフェースで、サーバーからクライアントにデータを送るために使用
		w.Write()
		　　-> 直接文字列などのデータをレスポンスとしてクライアントに送信(※今回はExecuteTemplate()にて同義の処理を実装)

	r *http.Request：HTTPリクエストを表す構造体で、クライアントから送信されたリクエストの情報を保持する
		r.FormValue()
		　　-> フォームの入力値を取得

	template：HTMLテンプレートを扱うためのパッケージ
		template.Must()
		　　-> テンプレートの作成時にエラーが発生した場合にパニックを起こすヘルパー関数
		template.ParseFiles()
		　　-> 	指定されたファイルを解析してテンプレートを作成
		ExecuteTemplate()
		　　->テンプレートを実行し、その結果をhttp.ResponseWriterに書き込む
*/
