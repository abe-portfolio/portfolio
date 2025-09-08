package array

import (
	"fmt"
	"sort"
)

func Array() {
	// 配列
	arr := [5]int{1, 2, 3, 4, 5}
	fmt.Println(arr) // [1 2 3 4 5]

	// スライス
	sli := []int{1, 2, 3, 4, 5}
	fmt.Println(sli) // [1 2 3 4 5]

	// 配列のコピー
	arr2 := arr
	fmt.Println(arr2) // [1 2 3 4 5]

	// スライスのコピー
	sli2 := make([]int, len(sli))
	copy(sli2, sli)
	fmt.Println(sli2) // [1 2 3 4 5]

	// ------------------------------------
	// 配列　を　スライス としてコピー
	A := [3]int{1, 2, 3}
	B := A[:]
	fmt.Printf("A: %v\n", A) // A: [1 2 3]
	fmt.Printf("B: %v\n", B) // B: [1 2 3]
	// ※Bはスライス（参照渡し）なので、Bに対して値を変更すると、Aの値も変更される

	// スライス　を　配列 としてコピー   ※長さがわかっている場合
	C := []int{1, 2, 3}
	// D := [len(C)]int{} はできない
	D := [3]int{0}
	copy(D[:], C)
	fmt.Printf("C: %v\n", C) // C: [1 2 3]
	fmt.Printf("D: %v\n", D) // D: [1 2 3]

	// ------------------------------------
	// 配列のソート(昇順)  ※スライスに変換する
	arr_ints := [5]int{5, 3, 2, 4, 1}
	sort.Ints(arr_ints[:])
	fmt.Println(arr_ints) // [1 2 3 4 5]

	arr_strings := [5]string{"d", "a", "f", "c", "b"}
	sort.Strings(arr_strings[:])
	fmt.Println(arr_strings) // [a b c d f]

	arr_floats := [5]float64{5.5, 3.3, 2.2, 4.4, 1.1}
	sort.Float64s(arr_floats[:])
	fmt.Println(arr_floats) // [1.1 2.2 3.3 4.4 5.5]

	// スライスのソート   sort.  は引数にスライスをとる
	sli_ints := []int{5, 3, 2, 4, 1}
	sort.Ints(sli_ints)
	fmt.Println(sli_ints) // [1 2 3 4 5]

	sli_strings := []string{"d", "a", "f", "c", "b"}
	sort.Strings(sli_strings)
	fmt.Println(sli_strings) // [a b c d f]

	sli_floats := []float64{5.5, 3.3, 2.2, 4.4, 1.1}
	sort.Float64s(sli_floats)
	fmt.Println(sli_floats) // [1.1 2.2 3.3 4.4 5.5]

	// ------------------------------------
	// 配列のソート(降順)
	arr_ints_r := [5]int{5, 3, 2, 4, 1}
	sort.Sort(sort.Reverse(sort.IntSlice(arr_ints_r[:])))
	fmt.Println(arr_ints_r) // [5 4 3 2 1]

	arr_strings_r := [5]string{"d", "a", "f", "c", "b"}
	sort.Sort(sort.Reverse(sort.StringSlice(arr_strings_r[:])))
	fmt.Println(arr_strings_r) // [f d c b a]

	arr_floats_r := [5]float64{5.5, 3.3, 2.2, 4.4, 1.1}
	sort.Sort(sort.Reverse(sort.Float64Slice(arr_floats_r[:])))
	fmt.Println(arr_floats_r) // [5.5 4.4 3.3 2.2 1.1]

	// スライスのソート(降順)
	// ※sort.Reverse(sort.IntSlice(sli_ints)) とすると、sort.Ints(sli_ints) と同じようにソートされる
	sli_ints_r := []int{5, 3, 2, 4, 1}
	sort.Sort(sort.Reverse(sort.IntSlice(sli_ints_r)))
	fmt.Println(sli_ints_r) // [5 4 3 2 1]

	sli_strings_r := []string{"d", "a", "f", "c", "b"}
	sort.Sort(sort.Reverse(sort.StringSlice(sli_strings_r)))
	fmt.Println(sli_strings_r) // [f d c b a]

	sli_floats_r := []float64{5.5, 3.3, 2.2, 4.4, 1.1}
	sort.Sort(sort.Reverse(sort.Float64Slice(sli_floats_r)))
	fmt.Println(sli_floats_r) // [5.5 4.4 3.3 2.2 1.1]
}
