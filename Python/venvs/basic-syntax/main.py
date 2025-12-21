# if
if x > 0:
    pass
elif X == 10:
    pass
else:
    pass


# for
for x in iterable:
    pass

for i in range(n):
    pass

for i, v in enumerate(iterable):
    pass



# with
with open("file.txt") as f:
    pass # with句の処理を終える際に close("file.txt")　を実行する


# match
match value:
    case float() | int():
        pass
    case str():
        pass
    case _:
        pass


# class
class MyClass:
    def __init__(self):
        pass

    def method(self):
        pass


# try-except-else-finally
try:
    pass
except Exception:
    pass
else:
    pass
finally:
    pass


# zip
for a, b in zip(A, B):
    pass


# 内方表記
result = [x for x in iterable if 条件]


# Noneチェック
if x is None:
    pass


# 型ヒント
def func(x: int) -> int:
    pass


# logging（実務では print はあまり使わないらしい）
import logging

logging.info("msg")
