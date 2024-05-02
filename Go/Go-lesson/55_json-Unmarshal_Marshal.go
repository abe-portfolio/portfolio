package main

import (
	"encoding/json"
	"fmt"
)

type T struct{}

type Person55 struct {
	// ``でjsonのデータを変換するときのエンコードの内容を指定できる
	//　　-> age,stringとするとstring型にしてMarshalできる
	//　　-> `json:"-"` とするとMarshalした後に出力するときなどに表示を隠す
	//　　-> ,omitempty は、string型のデータの""や、int型の0などの場合、表示しないように設定する
	Name      string   `json:"nameXXX,omitempty"`
	Age       int      `json:"age,string"`
	Nicknames []string `json:"-"`
	T         *T       `json:"T,omitempty"`
	// ポインタ型にしないとomitemptyが動作しない
}

// MarshalJSON()は、son.Marshal()が実行されたときに呼び出されている
func (p Person55) MarshalJSON() ([]byte, error) {
	// ここでしか使わないstructの場合、宣言と代入を一度にできる
	// a := struct{ Name string }{Name: "test"}

	v, err := json.Marshal(&struct {
		Name string
	}{
		Name: "Mr" + p.Name,
	})

	return v, err
}

func main() {
	b := []byte(`{"name":"mike","age":"20","nicknames":["a","b","c"]}`)
	var p Person55
	// json.Unmarshal()　ネットワークから入ってきたデータを引数にある構造体に格納する（大文字小文字は区別せずうまいこと格納してくれるが、フィールド名が異なる場合は格納されない）
	if err := json.Unmarshal(b, &p); err != nil {
		fmt.Println(err)
	}
	fmt.Println(p.Name, p.Age, p.Nicknames)

	v, _ := json.Marshal(p)
	fmt.Println(string(v))

	// まとめ。
	// Unmarshal　は、json"に"データを変換
	// Marshal　　は、json"の"データを変換
}
