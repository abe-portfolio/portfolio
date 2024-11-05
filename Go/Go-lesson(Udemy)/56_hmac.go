// hmacとは、APIでサーバーにアクセスする際のオーセンティケーション（本人確認）時にヘッダーに含める

package main

import (
	"crypto/hmac"
	"crypto/sha256"
	"encoding/hex"
	"fmt"
)

var DB = map[string]string{
	"User1Key": "User1Secret",
	"User2Key": "User2Secret",
}

// サーバー
func Server(apiKey, sign string, data []byte) {
	apiSecret := DB[apiKey]
	h := hmac.New(sha256.New, []byte(apiSecret))
	h.Write(data)
	expectedHMAC := hex.EncodeToString(h.Sum(nil))
	fmt.Println(expectedHMAC)
	fmt.Println(sign == expectedHMAC)
}

// クライアント
func main() {
	const apiKey = "User1Key"
	const apiSecret = "User1Secret"

	// Keyをsha256でハッシュ化
	h := hmac.New(sha256.New, []byte(apiSecret))
	// サーバーに送りたいデータを書き込む
	data := []byte("data")
	h.Write(data)
	sign := hex.EncodeToString(h.Sum(nil))
	fmt.Println(sign)

	Server(apiKey, sign, data)
}
