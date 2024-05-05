package main

import (
	"fmt"
	"os"

	qrcode "github.com/skip2/go-qrcode"
)

func main() {
	var input string
	fmt.Println("QRコードにしたい文字列を入力してください:")
	fmt.Scanln(&input)

	// QRコードを生成
	qrFilename := "qrcode.png"
	err := generateQRCode(input, qrFilename)
	if err != nil {
		fmt.Println("QRコードを生成できませんでした:", err)
		return
	}

	fmt.Printf("QRコードが %s に保存されました\n", qrFilename)
}

func generateQRCode(input, filename string) error {
	// QRコードを生成
	q, err := qrcode.New(input, qrcode.Medium)
	if err != nil {
		return err
	}

	// QRコードを画像として保存
	file, err := os.Create(filename)
	if err != nil {
		return err
	}
	defer file.Close()

	err = q.Write(256, file)
	if err != nil {
		return err
	}

	return nil
}
