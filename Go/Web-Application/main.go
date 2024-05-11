package main

import (
	"fmt"
	"log"
	"net/http"
	"os"
)

// struct -> 構造体。Pythonでいうところのクラスオブジェクトのようなもの
type Page struct {
	Title string
	Body  []byte
}

// 構造体：Page に対してsaveメソッドを作成（返り値はerror）
func (p *Page) save() error {
	// ファイル名を設定
	filename := p.Title + ".txt"

	// ファイルを作成または開く
	file, err := os.Create(filename)
	if err != nil {
		return err
	}
	defer file.Close()

	// ファイルにデータを書き込む
	_, err = file.Write(p.Body)
	if err != nil {
		return err
	}

	return nil
}

func loadPage(title string) (*Page, error) {
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
	return &Page{Title: title, Body: body}, nil
}

// http.ResponseWriter
// 　　-> HTTPレスポンスを書き込むためのインターフェースで、サーバーがクライアントに返すHTTPレスポンスを構築するために使用。
// *http.Request
// 　　-> HTTPリクエストに関する情報を保持する構造体へのポインタで、クライアントからのHTTPリクエストに関する情報を取得するために使用。

func viewHandler(w http.ResponseWriter, r *http.Request) {
	// 例として、「/view/test」とアクセスした場合、len[("/view/"):] で「/view/」以降の文字列を取得する
	title := r.URL.Path[len("/view/"):]
	p, _ := loadPage(title)
	fmt.Fprintf(w, "<h1>%s</h1><div>%s</div>", p.Title, p.Body)
}

func main() {
	/*
		p1 := &Page{Title: "test", Body: []byte("This is a sample page")}
		p1.save()

		p2, _ := loadPage(p1.Title)
		fmt.Println(string(p2.Body))
	*/

	// ※特定のURLにアクセスが来た時、自作したハンドラーを当てたい場合は、http.ListenAndServe()の"実行前"に..HandleFunc()を定義する
	// 「/view/」というアクセスが来た場合はviewHandlerを実行する
	http.HandleFunc("/view/", viewHandler)

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
