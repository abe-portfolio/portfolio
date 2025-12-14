import sys

def main():
    input = sys.stdin.readline
    N, M = map(int, input().split())

    occupied = set()
    cnt = 0

    for _ in range(M):
        r, c = map(int, input().split())
        r -= 1
        c -= 1

        cells = [
            (r, c),
            (r + 1, c),
            (r, c + 1),
            (r + 1, c + 1)
        ]

        can_put = True
        for cell in cells:
            if cell in occupied:
                can_put = False
                break

        if can_put:
            for cell in cells:
                occupied.add(cell)
            cnt += 1

    print(cnt)

if __name__ == "__main__":
    main()
