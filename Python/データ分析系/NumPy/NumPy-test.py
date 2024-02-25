import numpy as np

x_1 = np.array(
    [1, 2, 3]
)

x_2 = np.array(
    [[1, 2, 3],
     [4, 5, 6]]
)

x_3 = np.array(
    [[[1, 2],[3, 4], [5, 6]],
     [[7, 8,], [9, 10], [11, 12]]]
)

for x in [x_1, x_2, x_3]:
    print('---------------')
    print(x.ndim, x.shape)
    print(x)



print('-------------NEXT TEST-------------------')
print('初期値を決めた配列の作成')
x_4 = np.zeros((2, 3))
print(x_4)
print('---------------')
x_5 = np.ones((2, 3))
print(x_5)
print('---------------')
x_6 = np.random.rand(2, 3)
print(x_6)
print('---------------')
x_7 = np.empty((2, 3))
print(x_7)


print('-------------NEXT TEST-------------------')
print('配列の四則演算')
x = np.array(
    [[1, 2, 3],
     [4, 5, 6]]
)

result = x * 3
print("x")
print(x)
print("result")
print(result)



print('-------------NEXT TEST-------------------')
x = np.array(
    [[1, 2, 3],
     [4, 5, 6]]
)
print('x')
print(x)

result = x.reshape(3, 2)
print('reshape')
print(result)

print('flatten')
result = x.flatten()
print(result)


print('部分的なアクセス(2列目)')
result = x[:, 1]
print('result')

y = np.array(
    [[10, 11, 12],
     [13, 14,15]]
)
print('x')
print(x)
print('y')
print(y)

print('xとyを行で結合')
result = np.concatenate([x, y], 0)
print(result)

print('xとyを列で結合')
result = np.concatenate([x, y], 1)
print(result)




