package main

import (
	"fmt"
	"time"
)

func main() {
	t := time.Now()
	fmt.Println(t)
	// RFC3339はtimeモジュールのConst
	fmt.Println(t.Format(time.RFC3339))
	fmt.Println(t.Year(),
		t.Month(),
		t.Day(),
		t.Hour(),
		t.Minute(),
		t.Second())

}
