import sys

input = sys.stdin.readline

N = int(input())
S = input().strip()

# diff = N - len(S)
# for _ in range(diff):
#     S = "o" + S
#print(S)

t = "o" * (N - len(S))
print(t + S)
