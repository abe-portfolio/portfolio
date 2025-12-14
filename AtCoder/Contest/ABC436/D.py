import sys
from collections import deque, defaultdict

def main():
    input = sys.stdin.readline
    H, W = map(int, input().split())
    S = [input().rstrip() for _ in range(H)]

    INF = 10**18
    dist = [[INF] * W for _ in range(H)]

    warp = defaultdict(list)
    for i in range(H):
        for j in range(W):
            c = S[i][j]
            if 'a' <= c <= 'z':
                warp[c].append((i, j))

    used_warp = set()

    q = deque()
    dist[0][0] = 0
    q.append((0, 0))

    while q:
        r, c = q.popleft()
        d = dist[r][c]

        # 歩行
        for dr, dc in [(1,0), (-1,0), (0,1), (0,-1)]:
            nr, nc = r + dr, c + dc
            if 0 <= nr < H and 0 <= nc < W:
                if S[nr][nc] != '#' and dist[nr][nc] == INF:
                    dist[nr][nc] = d + 1
                    q.append((nr, nc))

        # ワープ
        ch = S[r][c]
        if 'a' <= ch <= 'z' and ch not in used_warp:
            used_warp.add(ch)
            for nr, nc in warp[ch]:
                if dist[nr][nc] == INF:
                    dist[nr][nc] = d + 1
                    q.append((nr, nc))

    ans = dist[H-1][W-1]
    print(ans if ans != INF else -1)

if __name__ == "__main__":
    main()
