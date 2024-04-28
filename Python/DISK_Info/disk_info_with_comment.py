import tkinter as tk
import tkinter.ttk as ttk
from tkinter import messagebox
import psutil    # OSに関係なくCPUメモリの状態を監視できるモジュール
import os


# --------------ボタン関数 START--------------
# TEST用
def test():
    test_result = get_drives()
    messagebox.showinfo("TEST Result", test_result)


# ボタン：Usage_manual_button　　説明：メッセージボックスで利用マニュアルを表示
def Show_Usage_Manual():
    messagebox.showinfo("How to use", descroption_string)

# ボタン：parse_button　　説明：OSにあるドライブの一覧を取得
def Parse_Drive():
    machine_drive_list = get_drives()
    print(machine_drive_list)
    
    if v.get() == "Select Drive":
        # ドライブがリストから選択されていない場合
        messagebox.showinfo("Infomation", "Target Drive is empty!")
    else:
        # ドライブがリストから選択されている場合
        print(v.get())
        # get_drive_info(v.get())
    
# ボタン：init_button　　説明：ウィンドウの初期化
def Window_Reset():
    combobox.set("Select Drive")
# --------------ボタン関数 END--------------
    
    
# --------------処理関数 START--------------
# マシンのドライブの一覧を取得
def get_drives():
    machine_drives = []
    for part in psutil.disk_partitions():
        if part.device and 'cdrom' not in part.opts and 'removable' not in part.opts:
            drive_letter = os.path.splitdrive(part.mountpoint)[0]
            drive_letter = drive_letter.rstrip(':')
            machine_drives.append(drive_letter)
    return machine_drives

# 引数で渡されたドライブの情報を取得
def get_drive_info(drive):
    partitions = psutil.disk_partitions(all=True)
    for partition in partitions:
        if partition.device == drive:
            usage = psutil.disk_usage(partition.mountpoint)
            print(f"Drive: {partition.device}")
            print(f"Mountpoint: {partition.mountpoint}")
            print(f"Total space: {usage.total / (2**30):.2f} GB")
            print(f"Used space: {usage.used / (2**30):.2f} GB")
            print(f"Free space: {usage.free / (2**30):.2f} GB")
            print(f"Percentage used: {usage.percent}%")
# --------------処理関数 END--------------


# --------------メインウィンドウ START--------------
# メインウィンドウの作成
root= tk.Tk()

# ウィンドウタイトルの設定
root.title("DISK INFO")

# ウィンドウサイズを変更
root.geometry("640x480")

# 動作確認用のボタン
TEST_button = tk.Button(root, text="FOR TEST", command=lambda: test())
TEST_button.grid()

# アプリケーションの利用マニュアルをボタンを押下するとメッセージボックスで表示する
descroption_string = "説明"
Usage_manual_button = tk.Button(root, text="Usage Manual", command=lambda: Show_Usage_Manual())
Usage_manual_button.grid()

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
parse_button = tk.Button(button_frame, text="parse", command=lambda: Parse_Drive())
parse_button.grid(row=0, column=0, padx=5)

# init_buttonをbutton_frameに配置
init_button = tk.Button(button_frame, text="init", command=lambda: Window_Reset())
init_button.grid(row=0, column=1, padx=5)

# vはドロップダウンメニューの値を保持するための変数
v = tk.StringVar()
drive_list = ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("Select Drive")
combobox.grid()

#rootを表示し無限ループ
root.mainloop()
# --------------メインウィンドウ END--------------