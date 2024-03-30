import tkinter as tk
import tkinter.ttk as ttk
import os


def pushed(b):
    print("clicked")
    b["text"] = "Clicked!!"



# --------------メインウィンドウ--------------
# メインウィンドウの作成
root= tk.Tk()

# ウィンドウタイトルの設定
root.title("DISK INFO")

# ウィンドウサイズを変更
root.geometry("640x480")

#ラベルを追加
# .grid()で表示
label = tk.Label(root, text="Hello,World")
label.grid()

# pushedは関数。この文より上に記述しないとエラーになる
button = tk.Button(root, text="ボタン", command=lambda: pushed(button))
button.grid()

# vはドロップダウンメニューの値を保持するための変数
v = tk.StringVar()
drive_list = ("C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("ドライブを選択")
combobox.grid()

print(combobox.get())

#rootを表示し無限ループ
root.mainloop()
# --------------メインウィンドウ--------------
