import numpy as np

# 高度な数値計算

# ndarrayオブジェクト
# １次元配列
x = np.array([10, 14, 19])
x_2 = x * 2
# x_2 = [20, 28, 38]

# 普通のPythonのリスト
y = [10, 14, 19]
y_2 = y * 2
# y_2 = [10, 14, 19, 10, 14, 19]



# 多次元配列（補足：カラー画像は３次元）
rgb = np.array(
    [[[255, 0, 0], [0, 255, 0], [0, 0, 255]],
     [[255, 255, 0], [0, 255, 255], [255, 0, 255]]]
)



# ndim 次元を調べる
print(x.ndim) # 1
print(rgb.ndim) # 3

# Shape 各次元のサイズ(行数と要素数)を調べる
print(x.shape) # (3,)
print(rgb.shape) # (2, 3, 3)



# 配列の初期化(全ての要素を0で初期化)
z = np.zeros(3)
# z = [0, 0, 0]

z = np.zeros((2, 3))
# z = [[0, 0, 0]
#      [0, 0, 0]]



# 配列の初期化(全ての要素を1で初期化)
z = np.ones(3)
# z = [1, 1, 1]

z = np.ones((2, 3))
# z = [[1, 1, 1]
#      [1, 1, 1]]



# ランダム値は0以上1未準で初期化)
z = np.random.rand(3)
# z = [0.1, 0.2, 0.3]

z = np.random.rand(2, 3)
# z = [[0.1, 0.2, 0.3]
#      [0.4, 0.5, 0.6]]



# empty 配列の初期化(初期値は不定) 高速に配列を作成可能
z = np.empty(3)
z = np.empty((2, 3))



# 配列の計算
x = np.array([2, 3, 4])
y = np.array(
    [[5, 6, 7],
    [8, 9, 10]]
)
result = x + y
# result = [[7, 9, 11]
#           [10, 12, 14]]

x = np.array(
    [[2], 
     [3],
     [4]]
)
y = np.array(
    [[10, 11],
    [12, 13],
    [14, 15]]
)
result = x + y
# result = [[12, 13]
#           [15, 16]
#           [18, 19]]



# np.dot 行列の積
# １つ目の配列の列サイズと２つ目の配列の行サイズが同じでないと計算できない
x = np.array(
    [[1, 2, 3],
     [4, 5, 6]]
)
y = np.array(
    [[11, 12],
     [13, 14],
     [15, 16]]
)
result = np.dot(x, y)
# result = [[ 82, 88]
#           [199, 214]]



# reshape 配列の変形
x = np.array(
    [[10, 12, 14],
     [20, 22, 24]]
)
result = x.reshape((3, 2))
# result = [[10, 12]
#           [14, 20]
#           [22, 24]]



# flatten １次元配列への変形
x = np.array(
    [[[1, 2], [3, 4], [5, 6]],
     [[7, 8], [9, 10], [11, 12]]]
)
result = x.flatten()
# result = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]



# concatenate  配列の結合
x = np.array(
    [[1, 2, 3],
     [4, 5, 6]]
)
y = np.array(
    [[10, 11, 12],
     [13, 14, 15]]
)
# 行に追加
result = np.concatenate([x, y], 0)
# result = [[ 1,  2,  3]
#           [ 4,  5,  6]
#           [10, 11, 12]
#           [13, 14, 15]]

# 列に追加
result = np.concatenate([x, y], 1)
# result = [[ 1,  2,  3, 10, 11, 12]
#           [ 4,  5,  6, 13, 14, 15]]




# numpyの関数
np.max(x) # 最大値
np.min(x) # 最小値
np.sum(x) # 合計
np.prod(x) # 要素の数
np.mean(x) # 平均
np.std(x) # 標準偏差
np.var(x) # 分散
np.median(x) # 中央値
np.log(x) # 対数
np.sqrt(x) # 平方根
np.exp(x) # 指数
np.sin(x) # 三角関数
np.cos(x) # 三角関数
np.tan(x) # 三角関数
np.pi # 円周率
np.e # 自然対数の底
