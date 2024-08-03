import matplotlib.pyplot as plt
import numpy as np
import pandas as pd

pd.options.display.max_rows = 6

url = 'http://www.ipss.go.jp/p-toukei/JMD/00/STATS/Births.txt'
df_birth = pd.read_csv(url, skiprows=1, delim_whitesoace=True)

fig = plt.figure()
ax = fig.add_subplot(111)

# 折れ線グラフ
x = df_birth.index
y = df_birth.['cum_ratio']
ax.plot(x, y)
xlabels = df_birth['year'].apply(str) + ' ' + df_birth['sex']
ax.set_xticks(x[::10])
ax.set_xticklabels(xlabels[::10], rotarion='45')

# 水平方向
ax.annotate(s='', xytext=[0, 0.7], xy=[92.57888, 0.7], arrowprops=dict(arrowstyle='->', color='k'))

# 垂直方向
ax.annotate(s='', xytext=[92.57888, 0.7], xy=[92.57888, 0], arrowprops=dict(arrowstyle='->', color='k'))

# テキスト
ax.text(x=0, y=0.72, s='$random\ number=0.7$')
ax.text(x=94, y=0.1, s='$1969,\M$')

# タイトル
ax.set_title('Cumulative Ratio of Population Birth')