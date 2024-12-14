// QRコード生成モジュール
package M_Generator

import (
	"fmt"
	"time"
)

func G_index() {
	// fmt.Println("This is Generator") // test code
	ime := Create_name()
	fmt.Println(ime)
}

// QRコードを生成する
func Generate() {

}

// QRコードを保存する
func Save_image() {

}

// QRコード生成元の文字列も保存　※名前の対応付けが必要
func Save_str() {

}

// 生成物に付ける名前を付ける
func Create_name() string {
	now := time.Now()

	// 20060102150405 はGoの仕様で決まっている日時
	FormattedTime := now.Format("20060102150405")
	return FormattedTime
}
