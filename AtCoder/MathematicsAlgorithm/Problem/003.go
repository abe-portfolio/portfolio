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

/*
    スライスを合計するループを関数に切り分ける場合。
	func sumSlice(argSlice []int) int {
		sum := 0
		for _, val := range argSlice {
			sum += val
		}
		return sum
	}
*/

func main() {
	reader := bufio.NewScanner(os.Stdin)
	reader.Split(bufio.ScanWords)

	N := nextInt(reader)
	M := make([]int, N)
	for i := 0; i < N; i++ {
		M[i] = nextInt(reader)
	}

	// Goにはスライスを合計する関数は存在しないのでループを書く
	sum := 0
	for i := 0; i < N; i++ {
		sum += M[i]
	}
	fmt.Println(sum)

	/*
		切り分けた関数を使用する場合
		sum := sumSlice(M)
		fmt.Println(sum)
	*/
}
