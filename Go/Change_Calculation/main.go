package main

import (
	"bufio"
	"fmt"
	"math/rand"
	"os"
	"strconv"
	"strings"
	"time"
)

func main() {
	// 新しい乱数生成器を初期化
	// time.Now().UnixNano() :time.Now()で現在の時刻を time.Time 型として取得し、UnixNano()でナノ秒単位で Unix 時刻 (1970年1月1日からの経過ナノ秒) を返す
	src := rand.NewSource(time.Now().UnixNano())
	r := rand.New(src)

	// ランダムな整数を生成して表示
	pay := r.Intn(50000)
	fmt.Println("お会計：", pay)

	// 標準入力から支払い金額を受け取る
	// bufio パッケージの NewReader 関数を使って、新しい bufio.Reader オブジェクトを作成
	// os.Stdin は標準入力 (通常はユーザーのキーボード入力) を示す
	reader := bufio.NewReader(os.Stdin)
	fmt.Print("支払い金額を入力: ")
	// reader.ReadString('\n') は、バッファリングされたリーダー reader を使って、改行文字 ('\n') までの入力を読み取る => Enterキーを押下するまで
	input, _ := reader.ReadString('\n')

	// 改行文字を除去して入力値を数値に変換する
	input = strings.TrimSpace(input)
	payment, err := strconv.Atoi(input)
	if err != nil {
		fmt.Println("入力エラー：数値を入力してください")
		return
	}

	// 支払い金額と会計金額の比較
	if payment < pay {
		fmt.Println("支払い金額が不足しています")
	} else if payment > pay {
		change := payment - pay
		fmt.Println("お釣り：", change)
	} else {
		fmt.Println("お釣りはありません")
	}
}
