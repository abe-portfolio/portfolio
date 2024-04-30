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
        # target_drive_info = get_drive_info(v.get())
        # 
    
# ボタン：init_button　　説明：ウィンドウの初期化
def Window_Reset():
    combobox.set("Select Drive")
# --------------ボタン関数 END--------------
    
    
# --------------処理関数 START--------------
# マシンのドライブの一覧を取得
def get_drives():
    machine_drives = []
    for part in psutil.disk_partitions():
        # CD-ROMとUSBなどのリムーバブルディスクを除外
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

# ウィンドウタイトルの設定padx=(5, 10)
root.title("DISK INFO")

# ウィンドウサイズを変更
root.geometry("640x480")

# アプリケーションの利用マニュアルをボタンを押下するとメッセージボックスで表示する
descroption_string = "説明"
Usage_manual_button = tk.Button(root, text="Usage Manual", command=lambda: Show_Usage_Manual())
Usage_manual_button.grid(row=0, pady=10)

# vはドロップダウンメニューの値を保持するための変数
v = tk.StringVar()
drive_list = ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("Select Drive")
combobox.grid(row=1, padx=10)

# tk.Frame = フレーム（グループ化するための親要素）を作成
# Frame.grid()メソッドの設定値で要素を横並びにできる（デフォルトは縦並び）
#     -> row = ウィンドウの何行目に表示するか（インデックス）
#     -> column = ウィンドウの何列目に表示するか（インデックス）
#     -> columnspan = 指定した数値の要素列分、ウィジェット幅を連結する（最小値：１)（Excelのセル結合のイメージ）
#     -> padx = x方向に指定した数値px分のpaddingを付与
#     -> pady = y方向に指定した数値px分のpaddingを付与
# ※row=0, column=nで、同じ行内にn個の要素を横並びにできる
button_frame = tk.Frame(root)    
button_frame.grid(row=2, column=0, columnspan=2, pady=10)

# parse_buttonをbutton_frameに配置
parse_button = tk.Button(button_frame, text="parse", command=lambda: Parse_Drive())
parse_button.grid(row=0, column=0, padx=10)

# init_buttonをbutton_frameに配置
init_button = tk.Button(button_frame, text="init", command=lambda: Window_Reset())
init_button.grid(row=0, column=1, padx=10)


# ドライブの情報を表示するためのLabelとTextをグループ化するためのフレーム
drive_info_frame1 = tk.Frame(root)
drive_info_frame1.grid(row=3, column=0, columnspan=2, pady=5)

drive_info_frame2 = tk.Frame(root)
drive_info_frame2.grid(row=4, column=0, columnspan=2, pady=5)

drive_info_frame3 = tk.Frame(root)
drive_info_frame3.grid(row=5, column=0, columnspan=2, pady=5)

drive_info_frame4 = tk.Frame(root)
drive_info_frame4.grid(row=6, column=0, columnspan=2, pady=5)

drive_info_frame5 = tk.Frame(root)
drive_info_frame5.grid(row=7, column=0, columnspan=2, pady=5)

drive_info_frame6 = tk.Frame(root)
drive_info_frame6.grid(row=8, column=0, columnspan=2, pady=5)


# tk.Label = ラベル（ウィンドウに表示する文字列）を作成
# anchor=tk.W　要素の左揃え
# anchor=tk.E　要素の右揃え
#　　※なお、Labelの定義時(tk.Label())に指定すると、Labal要素内で左右どちらかに揃える
#　　※逆に、Labelの描画（.grid()）時に指定すると、Label要素自体を左右どちらかに揃える
# width=　要素の幅を指定。これが不足していると、右揃えや左揃えが効かない（半角１文字=1px）
# padx=左右
# pady=上下
# padx=(左,右)
# pady=(上,下)
# sticky= ウィジェットが配置されたセル内での位置や拡張方法を指定するためのオプション
#     -> N (北)   : ウィジェットをセルの 上端   に寄せる
#     -> S (南)   : ウィジェットをセルの 下端   に寄せる
#     -> E (東)   : ウィジェットをセルの 右端   に寄せる
#     -> W (西)   : ウィジェットをセルの 左端   に寄せる
#     -> NW (北西): ウィジェットをセルの 左上隅 に寄せる
#     -> NE (北東): ウィジェットをセルの 右上隅 に寄せる
#     -> SW (南西): ウィジェットをセルの 左下隅 に寄せる
#     -> SE (南東): ウィジェットをセルの 右下隅 に寄せる

# ----- Frame1 ------
# ドライブの表示
label_drive = tk.Label(drive_info_frame1, text="・Drive Name :", anchor=tk.W, width=20)
label_drive.grid(row=0, column=0, padx=(20, 0))

# 取得したディスク情報を表示するテキストボックスの作成
text_box1 = tk.Text(drive_info_frame1, height=1, width=5)
text_box1.config(state=tk.DISABLED)
text_box1.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame2 ------
# マウントポイントの表示
label_mountpoint = tk.Label(drive_info_frame2, text="・Mount Point :", anchor=tk.W, width=20)
label_mountpoint.grid(row=0, column=0, padx=(20, 0))

# 取得したディスク情報を表示するテキストボックスの作成
text_box2 = tk.Text(drive_info_frame2, height=1, width=5)
text_box2.config(state=tk.DISABLED)
text_box2.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame3 ------
# 総容量の表示
label_total_space = tk.Label(drive_info_frame3, text="・Total Space :", anchor=tk.W, width=20)
label_total_space.grid(row=0, column=0, padx=(20, 0))

# 取得したディスク情報を表示するテキストボックスの作成
text_box3 = tk.Text(drive_info_frame3, height=1, width=5)
text_box3.config(state=tk.DISABLED)
text_box3.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame4 ------
# 使用済み容量の表示
label_used_space = tk.Label(drive_info_frame4, text="・Used Space :", anchor=tk.W, width=20)
label_used_space.grid(row=0, column=0, padx=(20, 0))

# 取得したディスク情報を表示するテキストボックスの作成
text_box4 = tk.Text(drive_info_frame4, height=1, width=5)
text_box4.config(state=tk.DISABLED)
text_box4.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame5 ------
# 空き容量の表示
label_free_space = tk.Label(drive_info_frame5, text="・Free Space :", anchor=tk.W, width=20)
label_free_space.grid(row=0, column=0, padx=(20, 0))

# 取得したディスク情報を表示するテキストボックスの作成
text_box5 = tk.Text(drive_info_frame5, height=1, width=5)
text_box5.config(state=tk.DISABLED)
text_box5.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame6 ------
# 使用率(%)の表示
label_percentage_used = tk.Label(drive_info_frame6, text="・Usage Percentage :", anchor=tk.W, width=20)
label_percentage_used.grid(row=0, column=0, padx=(20, 0))

# 取得したディスク情報を表示するテキストボックスの作成
text_box6 = tk.Text(drive_info_frame6, height=1, width=5)
text_box6.config(state=tk.DISABLED)
text_box6.grid(row=0, column=1, padx=(0, 5), sticky="w")


# *************************************** 動作確認用！！
# 動作確認用のボタン
TEST_button = tk.Button(root, text="FOR TEST", command=lambda: test())
TEST_button.grid(pady=(80,0))
# *************************************** 動作確認用！！

#rootを表示し無限ループ
root.mainloop()
# --------------メインウィンドウ END--------------
