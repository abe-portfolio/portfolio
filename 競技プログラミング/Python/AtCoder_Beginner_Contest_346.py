# https://atcoder.jp/contests/abc346/tasks/abc346_a

N = int(input())
N_List = list(map(int, input().split()))
list_length = len(N_List) - 1

my_list = []
for i in range(list_length):
  sum = N_List[i] * N_List[i+1]
  my_list.append(sum)

output_string = ' '.join(map(str, my_list))
print(output_string)

# --------------------------------------------------------------------------------


