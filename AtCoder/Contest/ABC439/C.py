import sys
import math

input = sys.stdin.readline
N = int(input())

# Nの平方根の整数部分を計算（yの上限として使用）
R = math.isqrt(N)
# 各 s (1 ≤ s ≤ N) が何通りの (x, y) で表現されるかをカウントする配列
# bytearrayを使用することでメモリ効率と速度を向上
cnt = bytearray(N + 1)

# yを1からRまでループ（y² ≤ N となる範囲）
for y in range(1, R + 1):
    y2 = y * y
    t = N - y2  # x²の上限値
    if t <= 0:
        break
    # x² ≤ t となる最大のxを計算
    maxx = math.isqrt(t)
    # x < y の条件を満たすように制限（重複を避けるため）
    if maxx >= y:
        maxx = y - 1

    # xを1からmaxxまでループ
    for x in range(1, maxx + 1):
        s = x * x + y2  # s = x² + y² を計算
        c = cnt[s]
        # カウントが2未満の場合のみインクリメント（2以上は不要なので効率化）
        if c < 2:
            cnt[s] = c + 1

# ちょうど1通りの表現方法を持つsの個数をカウント
k = 0
for i in range(1, N + 1):
    if cnt[i] == 1:
        k += 1

# 高速な出力（printだとTLEする可能性があるため）
out = sys.stdout
out.write(str(k) + "\n")

# 条件を満たすsの値を空白区切りで出力
if k == 0:
    out.write("\n")
else:
    first = True
    for i in range(1, N + 1):
        if cnt[i] == 1:
            if first:
                out.write(str(i))
                first = False
            else:
                out.write(" " + str(i))
    out.write("\n")
