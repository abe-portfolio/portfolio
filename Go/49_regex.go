package main

import (
	"fmt"
	"regexp"
)

func main() {
	// "a([a-z]+)e" は、a：aから始まり、([a-z]+)：a-z(小文字のアルファベット)を１つ以上繰り返し、e：eで終わる
	match, _ := regexp.MatchString("a([a-z]+)e", "apple")
	fmt.Println(match)

	r := regexp.MustCompile("a([a-z]+)e")
	ms := r.MatchString("apple")
	fmt.Println(ms)

	// 上記の２つは同じ処理をしている
	// 上は一度のみのパターンマッチで、下は何度もしたいときに使用

	r2 := regexp.MustCompile("^/(edit|save|view)/([a-zA-Z0-9]+)$")
	fs := r2.FindString("/view/test")
	fmt.Println(fs)
	fss := r2.FindStringSubmatch("/view/test")
	fmt.Println(fss, fss[0], fss[1], fss[2])
	fss = r2.FindStringSubmatch("/edit/test")
	fmt.Println(fss, fss[0], fss[1], fss[2])
	fss = r2.FindStringSubmatch("/save/test")
	fmt.Println(fss, fss[0], fss[1], fss[2])
}
