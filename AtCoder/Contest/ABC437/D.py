import sys
import bisect

MOD = 998244353

input = sys.stdin.readline

N, M = map(int, input().split())
A = list(map(int, input().split()))
B = list(map(int, input().split()))
B.sort()

# 累積和
prefix = [0] * (M + 1)
for i in range(M):
    prefix[i + 1] = prefix[i] + B[i]
ans = 0

for a in A:
    k = bisect.bisect_right(B, a)
    left = a * k - prefix[k]
    right = (prefix[M] - prefix[k]) - a * (M - k)
    ans = (ans + left + right) % MOD

print(ans)
