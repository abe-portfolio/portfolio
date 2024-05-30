# 一般的なclass
class Nomal:
    def __init__(self):
        self.a = 0
        self.b = 0
    
    def sum(self):
        return self.a + self.b
    
    def set(self, a, b):
        self.a = a
        self.b = b

# インスタンス化
test_1 = Nomal()
test_1.set(3, 10)
print(test_1.sum()) # 出力：13

# -------------------------------------------------------------------------------------

# classmethodの使用
class method_review:
    def __init__(self):
        pass

    @classmethod
    def greeting1(cls):
        return print("Hello")
    
    @staticmethod
    def greeting2():
        return print("World")

test_2 = method_review.greeting1() # 出力：Hello
test_3 = method_review.greeting2() # 出力：World

# classmethodとstaticmethodの違い
# ・基本的な動作は、インスタンス化しなくてもメソッドの使用が可能になる
# ・違いが生じるのは以下
#     classmethod  -> 継承した際に、動作が変化する場合に使用
#     staticmethod -> 継承しても、動作を変化させたくない場合に使用

# -------------------------------------------------------------------------------------

# 継承
class inheritance:
    def __init__(self):
        pass

    