package main

import (
	"fmt"
	"io"
	"net/http"
	"net/url"
	// ioutilは非推奨のため、ioパッケージのReadAll関数を使用する
)

func main() {
	// URLのページのHTMLやCSSなどを取得する簡単なコード
	// res, _ := http.Get("http://example.com")
	// defer res.Body.Close()
	// body, _ := io.ReadAll(res.Body)
	// fmt.Println(string(body))

	// URLが正しいかパースする
	base, _ := url.Parse("http://example.com")
	reference, _ := url.Parse("/test?a=1&b=2")
	endpoint := base.ResolveReference(reference).String()
	fmt.Println(endpoint)

	req, _ := http.NewRequest("GET", endpoint, nil)
	// req, _ := http.NewRequest("POST", endpoint, bytes.NewBuffer([]byte("passsword")))
	req.Header.Add("If-None-Match", `W/"wyzzy"`)
	q := req.URL.Query()
	q.Add("c", "3&%")
	fmt.Println(q)
	fmt.Println(q.Encode())
	req.URL.RawQuery = q.Encode()

	var client *http.Client = &http.Client{}
	res, _ := client.Do(req)
	body, _ := io.ReadAll(res.Body)
	fmt.Println(string(body))
}
