import tkinter as tk
import tkinter.ttk as ttk
import os


# --------------ボタン関数 START--------------
def Parse_Drive(b):
    # ボタン押下時の処理
    b["text"] = "Clicked!!"
    
def Window_Reset():
    # リセット用の関数
    parse_button["text"] = "parse"
    combobox.set("Select Drive")
# --------------ボタン関数 END--------------


# --------------メインウィンドウ START--------------
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

# tk.Frame = フレーム（グループ化するための親要素）を作成
# Frame.grid()メソッドの設定値で要素を横並びにできる（デフォルトは縦並び）
#     -> row = ウィンドウの何行目に表示するか（インデックス）
#     -> column = ウィンドウの何列目に表示するか（インデックス）
#     -> columnspan = 指定した数値の要素列分、ウィジェット幅を連結する（最小値：１)（Excelのセル結合のイメージ）
#     -> padx = x方向に指定した数値px分のpaddingを付与
#     -> pady = y方向に指定した数値px分のpaddingを付与
# ※row=0, column=nで、同じ行内にn個の要素を横並びにできる
button_frame = tk.Frame(root)    
button_frame.grid(row=1, column=0, columnspan=2, pady=10)

# parse_buttonをbutton_frameに配置
parse_button = tk.Button(button_frame, text="parse", command=lambda: Parse_Drive(parse_button))
parse_button.grid(row=0, column=0, padx=5)

# reset_buttonをbutton_frameに配置
reset_button = tk.Button(button_frame, text="init", command=lambda: Window_Reset())
reset_button.grid(row=0, column=1, padx=5)

# vはドロップダウンメニューの値を保持するための変数
v = tk.StringVar()
drive_list = ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("Select Drive")
combobox.grid()

#rootを表示し無限ループ
root.mainloop()
# --------------メインウィンドウ END--------------
