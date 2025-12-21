import sys

def main():
    input = sys.stdin.readline
    # N
    N = int(input())
    
    # A B
    A, B = map(int, input().split())

    # S （文字列）
    S = input().strip()
    
if __name__ == "__main__":
    main()
