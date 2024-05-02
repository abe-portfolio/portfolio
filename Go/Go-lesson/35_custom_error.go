/*
Error()　String()と同じように、個人的にカスタムしたエラーメッセージを表示する場合は
Stringer同様にError()メソッドを定義する
*/
package main

import "fmt"

type UserNotFound struct {
	UserName string
}

// Custom Error
func (e *UserNotFound) Error() string {
	return fmt.Sprintf("User not found: %v", e.UserName)
}

func myFunc() error {
	// エラー発生！
	no := false
	if no {
		return nil
	}
	return &UserNotFound{UserName: "Mike"}
}

func main() {
	if err := myFunc(); err != nil {
		fmt.Println(err)
	}
}
