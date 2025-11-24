package main

import (
	"fmt"
	"math/rand"
	"time"
)

func binarySearch(mm int, dd int) string {
	left_mm, right_mm := 1, 12
	var left_dd, right_dd int

	switch mm {
	case 2:
		right_dd = 28
	case 4, 6, 9, 11:
		right_dd = 30
	default:
		right_dd = 31
	}

	for left_mm <= right_mm {
		mid_mm := (left_mm + right_mm) / 2
		var mid_dd int
		if mid_mm == 2 {
			mid_dd = 28 / 2
		} else if mid_mm == 4 || mid_mm == 6 || mid_mm == 9 || mid_mm == 11 {
			mid_dd = 30 / 2
		} else {
			mid_dd = 31 / 2
		}

		if mm == mid_mm {
			left_dd, right_dd = 1, mid_dd*2
			for left_dd <= right_dd {
				mid_dd = (left_dd + right_dd) / 2
				if dd == mid_dd {
					return fmt.Sprintf("%02d%02d", mid_mm, mid_dd)
				} else if dd < mid_dd {
					right_dd = mid_dd - 1
				} else {
					left_dd = mid_dd + 1
				}
			}
		} else if mm < mid_mm {
			right_mm = mid_mm - 1
		} else {
			left_mm = mid_mm + 1
		}
	}

	return "日付が見つかりませんでした"
}

func main() {
	src := rand.NewSource(time.Now().UnixNano())
	r := rand.New(src)

	mm := r.Intn(12) + 1
	var dd int

	switch mm {
	case 2:
		dd = r.Intn(28) + 1
	case 4, 6, 9, 11:
		dd = r.Intn(30) + 1
	default:
		dd = r.Intn(31) + 1
	}

	birthday := fmt.Sprintf("%02d%02d", mm, dd)
	fmt.Println("生成された誕生日:", birthday)

	result := binarySearch(mm, dd)
	fmt.Println("あなたの誕生日は", result, "です！")
}
