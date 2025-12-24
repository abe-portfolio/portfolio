from dataclasses import dataclass

# tuple
# 要素の追加 / 削除 / 変更はできない
# 辞書のキーに使用できる
tpl = (1, 2, 3)
tpl[0] = 10   # エラー

# 以下は通る（タプル内のリストが変更対象だと、リストに対する変更とみなされるので通る）
tpl = ([1, 2], [3, 4])
tpl[0].append(99) # ([1, 2, 99], [3, 4])



# list
# 要素の追加 / 削除 / 変更はできる
# 辞書のキーに使用できない
lst = [1, 2, 3]
lst[0] = 10
lst.append(4) # [10, 2, 3, 4]



# dict(他言語における連想配列)
dict = {
    'apple': 100,
    'banana': 200,
    'cherry': 300,
}
# Pythonにはforeach文はないので、以下のようにfor文を使用することでkeyとvalueを取得できる
for key, value in dict.items():
    print(key, value)



# 選定
# 順番が意味を持つ？
#  ├─ yes → tuple / list
#  │    ├─ 変更する？ → list
#  │    └─ 固定？ → tuple
#  └─ no → dict




# set（集合）重複なし・変更できる集合
s = {1, 2, 2, 3} # {1, 2, 3}　重複は取り除かれる

# 演算が可能
a = {1, 2, 3}
b = {3, 4}

a | b   # 和集合 {1,2,3,4}
a & b   # 積集合 {3}
a - b   # 差集合 {1,2}

# 変更も可能
s.add(4)    # {1, 2, 3, 4}
s.remove(1) # {2, 3, 4}



# frozenset（不変集合）重複なし・変更できない集合
fs = frozenset([1, 2, 3])

# 演算は可能
fs | {4, 5}

# 変更はできない
fs.add(4)   # エラー



# collections 系
#    deque
#    defaultdict
#    Counter



# dataclass
# __init__などが自動で生成されるクラス
@dataclass
class User:
    name: str
    age: int

# 普通のクラスで書くと以下になる
# class User:
#     def __init__(self, name: str, age: int):
#         self.name = name
#         self.age = age

user = User('John', 30)
print(user.name)
print(user.age)


