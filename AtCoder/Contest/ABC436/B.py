import sys

def main():
    input = sys.stdin.readline
    N = int(input())

    grid = [[0] * N for _ in range(N)]

    r = 0
    c = (N - 1) // 2
    grid[r][c] = 1

    for k in range(2, N * N + 1):
        nr = (r - 1) % N
        nc = (c + 1) % N

        if grid[nr][nc] == 0:
            r, c = nr, nc
        else:
            r = (r + 1) % N
            # c はそのまま

        grid[r][c] = k

    for row in grid:
        print(*row)

if __name__ == "__main__":
    main()
