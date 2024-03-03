package main

import (
	"fmt"
	"time"
)

func GetOsName() string {
	return "mac"
}

func main() {
	// os := "mac"

	switch os := GetOsName(); os {
	case "mac":
		fmt.Println("mac")
	case "windows":
		fmt.Println("windows")
	// defaultはなくても良い。その場合は何も出力されない
	default:
		fmt.Println("default", os)
	}

	t := time.Now()
	fmt.Println(t.Hour())
	switch {
	case t.Hour() <= 12:
		fmt.Println("morning")
	case t.Hour() >= 13:
		fmt.Println("afternoon")
	}
}
