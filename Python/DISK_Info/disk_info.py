import tkinter as tk
import tkinter.ttk as ttk
from tkinter import messagebox
import psutil
import os


# --------------Button Function START--------------
# Usage_manual_button
def Show_Usage_Manual():
    messagebox.showinfo("How to use", descroption_string)

# parse_button
def Parse_Drive():
    machine_drive_list = get_drives()
    
    if v.get() == "Select Drive":
        messagebox.showinfo("Infomation", "Please select the target drive.")
    elif v.get() not in machine_drive_list:
        messagebox.showinfo("Infomation", "This machine does not have the selected drive.")
    else:
        get_drive_info(v.get())
        
    
# init_button
def Window_Reset():
    combobox.set("Select Drive")
    textbox_enable()
    text_box1.delete(1.0, tk.END)
    text_box2.delete(1.0, tk.END)
    text_box3.delete(1.0, tk.END)
    text_box4.delete(1.0, tk.END)
    text_box5.delete(1.0, tk.END)
    text_box6.delete(1.0, tk.END)
    textbox_disable()
# --------------Button Function END--------------
    
    
# --------------Processing Function START-------------
def get_drives():
    machine_drives = []
    for part in psutil.disk_partitions():
        if part.device and 'cdrom' not in part.opts and 'removable' not in part.opts:
            drive_letter = os.path.splitdrive(part.mountpoint)[0]
            drive_letter = drive_letter.rstrip(':')
            machine_drives.append(drive_letter)
    return machine_drives

def textbox_enable():
    text_box1.configure(state=tk.NORMAL)
    text_box2.configure(state=tk.NORMAL)
    text_box3.configure(state=tk.NORMAL)
    text_box4.configure(state=tk.NORMAL)
    text_box5.configure(state=tk.NORMAL)
    text_box6.configure(state=tk.NORMAL)

def textbox_disable():
    text_box1.configure(state=tk.DISABLED)
    text_box2.configure(state=tk.DISABLED)
    text_box3.configure(state=tk.DISABLED)
    text_box4.configure(state=tk.DISABLED)
    text_box5.configure(state=tk.DISABLED)
    text_box6.configure(state=tk.DISABLED)

def get_drive_info(drive):
    textbox_enable()
    partitions = psutil.disk_partitions(all=True)
    for partition in partitions:
        if partition.device[0] == drive:
            usage = psutil.disk_usage(partition.mountpoint)
            text_box1.insert(tk.END, f"{partition.device}")
            text_box2.insert(tk.END, f"{partition.mountpoint}")
            text_box3.insert(tk.END, f"{usage.total / (2**30):.2f} GB")
            text_box4.insert(tk.END, f"{usage.used / (2**30):.2f} GB")
            text_box5.insert(tk.END, f"{usage.free / (2**30):.2f} GB")
            text_box6.insert(tk.END, f"{usage.percent} %")
    textbox_disable()
# --------------Processing Function END--------------


# --------------Main Window START--------------
root= tk.Tk()
root.configure(bg="#DCDCDC")
root.title("DISK INFO(with comment)")
root.geometry("640x480")

descroption_string = "DISK INFO is a tool to display disk information on the computer. " \
                    "When you run the program, select the target drive from the dropdown menu " \
                    "and click the parse button. Then, the information of the selected drive " \
                    "will be displayed in the text boxes. Once the display is complete, " \
                    "you can click the init button to reset the text boxes."
Usage_manual_button = tk.Button(root, text="Usage Manual", command=lambda: Show_Usage_Manual(), bg="#AFEEEE", width=15)
Usage_manual_button.grid(row=0, padx=20, pady=(20,40), sticky="w")


v = tk.StringVar()
drive_list = ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "L", "S", "T", "U", "V", "W", "X", "Y", "Z")
combobox = ttk.Combobox(root, textvariable= v, values=drive_list, state="readonly")
combobox.set("Select Drive")
combobox.grid(row=1, padx=20, sticky="w")


button_frame = tk.Frame(root, bg="#DCDCDC")    
button_frame.grid(row=2, column=0, columnspan=2, padx=10, pady=10, sticky="w")

parse_button = tk.Button(button_frame, text="parse", command=lambda: Parse_Drive(), bg="#AFEEEE", width=15)
parse_button.grid(row=0, column=0, padx=10)

init_button = tk.Button(button_frame, text="init", command=lambda: Window_Reset(), bg="#C0C0C0", width=15)
init_button.grid(row=0, column=1, padx=10)


partition_frame = tk.Frame(root, borderwidth=2, relief="solid", highlightbackground="red", bg="#E6E6FA")
partition_frame.grid(row=3, column=0, columnspan=2, sticky="nsew", padx=20, pady=20)

drive_info_frame1 = tk.Frame(partition_frame, bg="#E6E6FA")
drive_info_frame1.grid(row=0, column=0, columnspan=2, pady=5)

drive_info_frame2 = tk.Frame(partition_frame, bg="#E6E6FA")
drive_info_frame2.grid(row=1, column=0, columnspan=2, pady=5)

drive_info_frame3 = tk.Frame(partition_frame, bg="#E6E6FA")
drive_info_frame3.grid(row=2, column=0, columnspan=2, pady=5)

drive_info_frame4 = tk.Frame(partition_frame, bg="#E6E6FA")
drive_info_frame4.grid(row=3, column=0, columnspan=2, pady=5)

drive_info_frame5 = tk.Frame(partition_frame, bg="#E6E6FA")
drive_info_frame5.grid(row=4, column=0, columnspan=2, pady=5)

drive_info_frame6 = tk.Frame(partition_frame, bg="#E6E6FA")
drive_info_frame6.grid(row=5, column=0, columnspan=2, pady=5)


# ----- Frame1 ------
label_drive = tk.Label(drive_info_frame1, text="・Drive Name :", anchor=tk.W, width=20, bg="#E6E6FA")
label_drive.grid(row=0, column=0)
text_box1 = tk.Text(drive_info_frame1, height=1, width=20)
text_box1.config(state=tk.DISABLED)
text_box1.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame2 ------
label_mountpoint = tk.Label(drive_info_frame2, text="・Mount Point :", anchor=tk.W, width=20, bg="#E6E6FA")
label_mountpoint.grid(row=0, column=0)
text_box2 = tk.Text(drive_info_frame2, height=1, width=20)
text_box2.config(state=tk.DISABLED)
text_box2.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame3 ------
label_total_space = tk.Label(drive_info_frame3, text="・Total Space :", anchor=tk.W, width=20, bg="#E6E6FA")
label_total_space.grid(row=0, column=0)
text_box3 = tk.Text(drive_info_frame3, height=1, width=20)
text_box3.config(state=tk.DISABLED)
text_box3.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame4 ------
label_used_space = tk.Label(drive_info_frame4, text="・Used Space :", anchor=tk.W, width=20, bg="#E6E6FA")
label_used_space.grid(row=0, column=0)
text_box4 = tk.Text(drive_info_frame4, height=1, width=20)
text_box4.config(state=tk.DISABLED)
text_box4.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame5 ------
label_free_space = tk.Label(drive_info_frame5, text="・Free Space :", anchor=tk.W, width=20, bg="#E6E6FA")
label_free_space.grid(row=0, column=0)
text_box5 = tk.Text(drive_info_frame5, height=1, width=20)
text_box5.config(state=tk.DISABLED)
text_box5.grid(row=0, column=1, padx=(0, 5), sticky="w")

# ----- Frame6 ------
label_percentage_used = tk.Label(drive_info_frame6, text="・Usage Percentage :", anchor=tk.W, width=20, bg="#E6E6FA")
label_percentage_used.grid(row=0, column=0)
text_box6 = tk.Text(drive_info_frame6, height=1, width=20)
text_box6.config(state=tk.DISABLED)
text_box6.grid(row=0, column=1, padx=(0, 5), sticky="w")

root.mainloop()
# --------------Main Window END--------------