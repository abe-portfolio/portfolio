import sys

def main():
    input = sys.stdin.readline

    H, W, N = map(int, input().split())

    A = [list(map(int, input().split())) for _ in range(H)]
    B = [int(input()) for _ in range(N)]

    Bset = set(B)

    ans = 0
    for row in A:
        cnt = 0
        for x in row:
            if x in Bset:
                cnt += 1
        ans = max(ans, cnt)

    print(ans)

if __name__ == "__main__":
    main()
