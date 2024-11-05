package mylib

import "testing"

var Debug bool = true

func TestAverage(t *testing.T) {
	if Debug {
		// 以降の処理をスキップする
		t.Skip("スキップの理由")
	}
	v := Average([]int{1, 2, 3, 4, 5})
	if v != 3 {
		t.Error("Expected 3, got", v)
	}
}

// go test ./... で現在ディレクトリ以下から〇〇_test.goを読み取ってテストする
// go test -v ./... で詳細に確認が可能
