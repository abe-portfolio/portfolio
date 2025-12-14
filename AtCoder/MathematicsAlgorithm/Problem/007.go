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
	X := nextInt(reader)
	Y := nextInt(reader)

	cnt := 0
	// 初期値と終了値に注意
	for i := 1; i <= N; i++ {
		if i%X == 0 || i%Y == 0 {
			cnt++
		}
	}

	fmt.Println(cnt)
}
