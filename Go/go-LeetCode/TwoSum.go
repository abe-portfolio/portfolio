package main

// hash mapを用いた解法　計算量：O(n)
func twoSum(nums []int, target int) []int {
	// hash mapの初期化
	seen := make(map[int]int)

	// i: インデックス, num: 値
	for i, num := range nums {
		// 補数の計算
		complement := target - num
		// hash map(seen)のキーに complement がある調べている
		// j: インデックス, ok: true/false
		if j, ok := seen[complement]; ok {
			return []int{j, i}
		}
		seen[num] = i
	}
	return nil
}

/*
for を入れ子にした解法(全探索)
計算量：O(n^2)
func twoSum(nums []int, target int) []int {
	for i := 0; i < len(nums); i++ {
		for j := i + 1; j < len(nums); j++ {
			if nums[i]+nums[j] == target {
				return []int{i, j}
			}
		}
	}
	return nil
}
*/
