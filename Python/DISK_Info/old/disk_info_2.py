import tkinter as tk
import tkinter.ttk as ttk
import psutil


def parse(b):
    print("--------------------------")
    combobox.update()      # type : str
    get_drive_info(combobox.get())


# この中でtkのアプリケーション上に表示する
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
parse_button = tk.Button(root, text="ボタン", command=lambda: parse(parse_button))
parse_button.grid()

# vはドロップダウンメニューの値を保持するための変数
v = tk.StringVar()
drive_list = ("C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("ドライブを選択")
combobox.grid()



#rootを表示し無限ループ
root.mainloop()
# --------------メインウィンドウ--------------
