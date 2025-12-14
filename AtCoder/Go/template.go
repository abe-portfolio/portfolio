package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

// 整数の受け取り
func nextInt(scanner *bufio.Scanner) int {
	scanner.Scan()
	n, _ := strconv.Atoi(scanner.Text())
	return n
}

func main() {
	reader := bufio.NewScanner(os.Stdin)
	reader.Split(bufio.ScanWords)

	//
	N := nextInt(reader)

	fmt.Println(N)

	// result := true
	// fmt.Println(map[bool]string{true: "Yes", false: "No"}[result])
}
