package main

import (
	"bufio"
	"fmt"
	"os"
	"strings"
	"time"

	qrcode "github.com/skip2/go-qrcode"
	"github.com/sqweek/dialog"
)

func main() {
	reader := bufio.NewReader(os.Stdin)

	fmt.Println("QRコードにしたい文字列を入力してください:")
	input, _ := reader.ReadString('\n')
	input = strings.TrimSpace(input)

	now := time.Now()
	qrFilename := fmt.Sprintf("qrcode_%s.png", now.Format("20060102_150405"))

	// ファイルの保存場所を選択
	savePath, err := saveFileDialog()
	if err != nil {
		fmt.Println("ファイルを保存する場所を選択できませんでした:", err)
		return
	}

	qrFilePath := savePath + string(os.PathSeparator) + qrFilename

	// QRコードを生成
	err = generateQRCode(input, qrFilePath)
	if err != nil {
		fmt.Println("QRコードを生成できませんでした:", err)
		return
	}

	fmt.Printf("QRコードが %s に保存されました\n", qrFilePath)
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

func saveFileDialog() (string, error) {
	savePath, err := dialog.Directory().Title("保存場所を選択").Browse()
	if err != nil {
		return "", err
	}
	return savePath, nil
}
