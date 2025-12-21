import sys

def main():
    input = sys.stdin.readline

    T = int(input())
    for _ in range(T):
        N = int(input())
        reindeers = []
        total_power = 0

        for _ in range(N):
            W, P = map(int, input().split())
            reindeers.append((W + P, W, P))
            total_power += P

        reindeers.sort()

        total_weight = 0
        ans = 0

        for _, W, P in reindeers:
            total_power -= P
            total_weight += W
            if total_power >= total_weight:
                ans += 1
            else:
                break

        print(ans)

if __name__ == "__main__":
    main()
