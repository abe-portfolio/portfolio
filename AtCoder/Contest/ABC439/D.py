import sys
from collections import Counter

input = sys.stdin.readline

N = int(input())
A = list(map(int, input().split()))

# right: 現在の要素より右側にある要素のカウント（初期状態では全要素）
# left: 現在の要素より左側にある要素のカウント（初期状態では空）
right = Counter(A)
left = Counter()

ans = 0

# 配列を左から右に走査
for a in A:
    # 現在の要素aをrightから削除（これから処理するので、右側には含まれない）
    right[a] -= 1
    if right[a] == 0:
        del right[a]

    # 現在の要素aが5の倍数の場合
    if a % 5 == 0:
        t = a // 5  # a = 5t と表す
        v7 = 7 * t  # 7tの値
        v3 = 3 * t  # 3tの値
        
        # 左側に7tと3tが存在する組み合わせの数を加算
        ans += left.get(v7, 0) * left.get(v3, 0)
        # 右側に7tと3tが存在する組み合わせの数を加算
        ans += right.get(v7, 0) * right.get(v3, 0)

    # 現在の要素aをleftに追加（次の要素の処理のため）
    left[a] += 1

print(ans)
