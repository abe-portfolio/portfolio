import sys

def main():
    input = sys.stdin.readline
    N = int(input())
    P = [0] + list(map(int, input().split()))

    vis = [False] * (N + 1)
    ans = 0

    for i in range(1, N + 1):
        if vis[i]:
            continue
        cur = i
        L = 0
        while not vis[cur]:
            vis[cur] = True
            cur = P[cur]
            L += 1
        ans += L * (L - 1) // 2

    print(ans)

if __name__ == "__main__":
    main()
