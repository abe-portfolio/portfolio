# 内包表記を用いた例

for i in range (1, 10):
    a = ["{:3}".format(i * j) for j in range(1, 10)]
    print(",".join(a))