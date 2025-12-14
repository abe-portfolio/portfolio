package problem

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

	N := nextInt(reader)
	M := make([]int, N)
	for i := 0; i < N; i++ {
		// Mはスライス
		M[i] = nextInt(reader)
	}

	// スライスの合計
	sum := 0
	for i := 0; i < N; i++ {
		sum += M[i]
	}

	fmt.Println(sum % 100)
}
