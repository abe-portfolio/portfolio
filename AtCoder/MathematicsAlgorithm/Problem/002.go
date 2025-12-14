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

	A1 := nextInt(reader)
	A2 := nextInt(reader)
	A3 := nextInt(reader)

	fmt.Println(A1 + A2 + A3)
}
