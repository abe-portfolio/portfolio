import sys
from bisect import bisect_left

input = sys.stdin.readline

N = int(input())
# ペア(a, b)のリストを読み込む
pairs = [tuple(map(int, input().split())) for _ in range(N)]

# Aで昇順ソート、同じAの場合はBで降順ソート
# 降順にすることで、同じAの値を持つペアが複数ある場合に
# より小さいBの値から処理されることを防ぐ（重複を避けるため）
pairs.sort(key=lambda x: (x[0], -x[1]))  # A昇順、同AならB降順

# dp[i] = 長さ(i+1)の増加部分列の末尾のBの最小値
# この配列を使って最長増加部分列（LIS）を効率的に求める
dp = []  # dp[len-1] = 長さlenの増加列の末尾Bの最小値

# 各ペアを順に処理
for a, b in pairs:
    # dp配列の中でb以上の値が最初に現れる位置を二分探索で見つける
    # strict増加（狭義単調増加）にしたいので bisect_left を使用
    pos = bisect_left(dp, b)  # bisect_left：昇順に並んだ配列に対して、ある値を“順序を壊さずに入れられる一番左の位置”を返す関数
    
    if pos == len(dp):
        # bがdpの全要素より大きい場合、新しい最長の増加部分列が作れる
        dp.append(b)
    else:
        # 既存の位置を更新（より小さい値で置き換えることで、後の要素を受け入れやすくする）
        dp[pos] = b

# dpの長さが最長増加部分列の長さ
print(len(dp))
