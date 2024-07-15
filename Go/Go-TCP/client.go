//go:build client

package main

import (
	"bufio"
	"fmt"
	"net"
	"os"
)

func main() {
	// サーバーに接続
	conn, err := net.Dial("tcp", "localhost:8080")
	if err != nil {
		fmt.Println("Error connecting to server:", err)
		os.Exit(1)
	}
	defer conn.Close()
	fmt.Println("Connected to server")

	reader := bufio.NewReader(os.Stdin)
	for {
		// ユーザーからの入力を読み取る
		fmt.Print("Enter message: ")
		message, _ := reader.ReadString('\n')

		// メッセージをサーバーに送信
		_, err = conn.Write([]byte(message))
		if err != nil {
			fmt.Println("Error sending message:", err)
			break
		}

		// サーバーからの応答を読み取る
		response, err := bufio.NewReader(conn).ReadString('\n')
		if err != nil {
			fmt.Println("Error reading response:", err)
			break
		}
		fmt.Print("Server response:", response)
	}
}

// go run -tags=client client.go で起動
