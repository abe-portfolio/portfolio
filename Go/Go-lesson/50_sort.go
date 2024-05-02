package main

import (
	"fmt"
	"sort"
)

func main() {
	i := []int{5, 3, 2, 8, 7}
	s := []string{"d", "a", "f"}
	// この中でしか使わないようなstructの簡易な定義と代入
	p := []struct {
		Name string
		Age  int
	}{
		{"Namcy", 20},
		{"Vera", 40},
		{"Mike", 30},
		{"Bob", 50},
	}

	fmt.Println(i, s, p)
	sort.Ints(i)
	sort.Strings(s)
	sort.Slice(p, func(i, j int) bool { return p[i].Name < p[j].Name })
	sort.Slice(p, func(i, j int) bool { return p[i].Age < p[j].Age })
	fmt.Println(i, s, p)
}
