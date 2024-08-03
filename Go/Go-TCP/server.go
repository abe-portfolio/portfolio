//go:build server

package main

import (
	"bufio"
	"fmt"
	"net"
	"os"
)

func main() {
	// リッスンポートを設定
	port := ":8080"
	listener, err := net.Listen("tcp", port)
	if err != nil {
		fmt.Println("Error starting server:", err)
		os.Exit(1)
	}
	defer listener.Close()
	fmt.Println("Server started on port", port)

	for {
		// クライアントからの接続を待機
		conn, err := listener.Accept()
		if err != nil {
			fmt.Println("Error accepting connection:", err)
			continue
		}
		go handleConnection(conn)
	}
}

func handleConnection(conn net.Conn) {
	defer conn.Close()
	fmt.Println("Client connected:", conn.RemoteAddr().String())

	reader := bufio.NewReader(conn)
	for {
		// クライアントからのメッセージを読み取る
		message, err := reader.ReadString('\n')
		if err != nil {
			fmt.Println("Error reading message:", err)
			break
		}
		fmt.Print("Received message:", message)

		// メッセージに応答
		response := "Message received: " + message
		_, err = conn.Write([]byte(response))
		if err != nil {
			fmt.Println("Error writing response:", err)
			break
		}
	}
}

// go run -tags=server server.go で起動
// go:build のように、[//]と[go]の間にスペースがあるとビルドタグは通常のコメントとして扱われる
// ビルドタグの下には改行を1行いれないとエラーになる
