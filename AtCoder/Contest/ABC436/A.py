import sys

def main():
    input = sys.stdin.readline

    N = int(input())
    S = input().strip()
    
    diff = N - len(S)

    for _ in range(diff):
        S = "o" + S
        
    print(S)

if __name__ == "__main__":
    main()
