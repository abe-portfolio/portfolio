package main

import (
	"bufio"
	"fmt"
	"os"
	"path/filepath"
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

<<<<<<< HEAD
	// QRコードを生成
	err = generateQRCode(input, qrFilePath)
	if err != nil {
		fmt.Println("QRコードを生成できませんでした:", err)
		return
	}

	fmt.Printf("QRコードが %s に保存されました\n", qrFilePath)
=======
	// 現在時刻を取得
	now := time.Now()

	// ログファイル名を生成
	var logFilename string

	// QRコードを生成
	qrFilename := "QRcode_" + now.Format("20060102-150405") + ".png"
	QRerr := generateQRCode(input, "./image", qrFilename)
	if QRerr == nil {
		// QRコード生成に成功
		logFilename = qrFilename + "_success.log"
		log_err := writeLog(logFilename, "./log", input)
		if log_err != nil {
			fmt.Println(logFilename + "の作成に失敗しました。")
		}
	} else {
		// QRコード生成に失敗
		logFilename = qrFilename + "_failure.log"
		log_err := writeLog(logFilename, "./log", input)
		if log_err != nil {
			fmt.Println(logFilename + "の作成に失敗しました。")
		}
	}
>>>>>>> 19cf3783bfd624a5561b30edc7ffa27149768bdd
}

func generateQRCode(input, path, filename string) error {
	// QRコードを生成
	qr, err := qrcode.New(input, qrcode.Medium)
	if err != nil {
		return err
	}

	qrFilepath := filepath.Join(path, filename)

	// １．os.Create()methodで、QRコードを出力する用のファイルを作成しておく
	file, err := os.Create(qrFilepath)
	if err != nil {
		return err
	}
	defer file.Close()

	// ２．qr.Write()methodで、１で作成したファイルに「画像として」256px四方のQRコードを出力する
	err = qr.Write(256, file)
	if err != nil {
		return err
	}
	return nil
}

func writeLog(filename, logpath, input string) error {
	logFilepath := filepath.Join(logpath, filename)
	file, err := os.Create(logFilepath)
	if err != nil {
		return err
	}
	defer file.Close()

	logContent := fmt.Sprintf("QRコード生成元の文字列: %s\n", input)
	_, err = file.WriteString(logContent)
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
