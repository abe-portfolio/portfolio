import sys

input = sys.stdin.readline
# N
N = int(input())

seen = set()

# N=1 または N が seen に含まれるまでループ（seen は これまでに出てきた数の集合
while N != 1 and N not in seen:
    seen.add(N)
    s = 0
    x = N
    while x > 0:
        d = x % 10
        s += d * d
        x //= 10
    N = s

print("Yes" if N == 1 else "No")

