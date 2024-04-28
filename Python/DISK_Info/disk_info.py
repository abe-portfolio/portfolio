import tkinter as tk
import tkinter.ttk as ttk
from tkinter import messagebox
import psutil
import os


# --------------ボタン関数 START--------------
def test():
    test_result = get_drives()
    messagebox.showinfo("TEST Result", test_result)
    
def Show_Usage_Manual():
    messagebox.showinfo("How to use", descroption_string)

def Parse_Drive():
    machine_drive_list = get_drives()
    print(machine_drive_list)
    
    if v.get() == "Select Drive":
        messagebox.showinfo("Infomation", "Target Drive is empty!")
    else:
        print(v.get())
        # get_drive_info(v.get())
    
def Window_Reset():
    combobox.set("Select Drive")
# --------------ボタン関数 END--------------
    
    
# --------------処理関数 START--------------
def get_drives():
    machine_drives = []
    for part in psutil.disk_partitions():
        if part.device and 'cdrom' not in part.opts and 'removable' not in part.opts:
            drive_letter = os.path.splitdrive(part.mountpoint)[0]
            drive_letter = drive_letter.rstrip(':')
            machine_drives.append(drive_letter)
    return machine_drives

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
root= tk.Tk()

root.title("DISK INFO")

root.geometry("640x480")

TEST_button = tk.Button(root, text="FOR TEST", command=lambda: test())
TEST_button.grid()

descroption_string = "説明"
Usage_manual_button = tk.Button(root, text="Usage Manual", command=lambda: Show_Usage_Manual())
Usage_manual_button.grid()

button_frame = tk.Frame(root)    
button_frame.grid(row=1, column=0, columnspan=2, pady=10)

parse_button = tk.Button(button_frame, text="parse", command=lambda: Parse_Drive())
parse_button.grid(row=0, column=0, padx=5)

init_button = tk.Button(button_frame, text="init", command=lambda: Window_Reset())
init_button.grid(row=0, column=1, padx=5)

v = tk.StringVar()
drive_list = ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("Select Drive")
combobox.grid()

root.mainloop()
# --------------メインウィンドウ END--------------