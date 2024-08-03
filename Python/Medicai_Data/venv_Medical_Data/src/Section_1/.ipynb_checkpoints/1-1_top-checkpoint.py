import matplotlib.pyplot as plt
import numpy as np
import pandas as pd


# 表示する行を6行に設定
pd.options.display.max_rows = 6


# matplotlibの表示フォントの設定
plt.rcParams['font.family'] = "time new roman"
plt.rcParams['mathtext.fontset'] = "stix"

# ALBとANBの違いの概念図
#   -> ALB（満年齢）　：生年月日から計算される実際の年齢　　お酒の購入などの際の基準（20歳3カ月->20歳）
#   -> ANB（保険年齢）：次の年齢を基準として計算される年齢　保険の加入時の基準（20歳5カ月29日->20歳、20歳6カ月1日->21歳）
flg = plt.figure(figsize=(2, 3))
ax = fig.add_subplot(111)
ax.text(41.6, 0, 'Age', va='center', ha='center')

# ANB
ax.plot([39.5, 40.25], [0.5, 0.5], c='k')
ax.plot([39.5, 39.5], [0, 0.5], c='k')
ax.plot([40.25, 40.5], [0.5, 0], c='k')
ax.text(40, 0.75, 'ANB=40', va='center', ha='center')

#ALB
ax.plot([40, 40.75], [-0.5, -0.5], c='k')
ax.plot([40, 40], [-0, -0.5], c='k')
ax.plot([40.75, 41], [-0.5, -0], c='k')
ax.text(40.5, -0.75 , 'ALB=40', va='center', ha='center')

#Age
ax.text(39.5, -0.2, '39.5', va='center', ha='center')
ax.text(40,    0.2, '40',   va='center', ha='center')
ax.text(40.5, -0.2, '40.5', va='center', ha='center')
ax.text(41,    0.2, '41',   va='center', ha='center')
X = np.arange(4) / 2 + 39.5
Y = np.zeros(4)
ax.scatter(X, Y, c='k', marker='|')

ax.set_xlim(38.5, 42)
ax.set_xticklabels('')
ax.set_ylim(-1, 1)
ax.set_yticklabels('')
ax.tickparams(top=False, bottom=False, left=False, right=False)
ax.set_title('Concept of ANB and ALB')


# 出生比率
url = 'http://www.ipss.go.jp/p-toukei/JMD/00/STATS/Births.txt'
df_birth = pd.read_csv(url, skiprows=1, delim_whitesoace=True)

# 女性
df_birth_F = df_birth[['Year', 'Female']].copy()
df_birth_F.columns = ['year', 'l']
df_birth_F['sex'] = 'F'

# 男性
df_birth_M = df_birth[['Year', 'Female']].copy()
df_birth_M.columns = ['year', 'l']
df_birth_M['sex] = 'M'

# 縦方向に結合
df_birth = pd.concat([df_birth_F, df_birth_M], axis=0, ignore_index=True)

# 累積比率を計算
df_birth['ratio'] = df_birth['l'] / df_birth['l']/sum()
df_birth['cum_ratio'] = df_bitrh['ratio'].cumsum()
del df_birth['l']

df_birth.to_csv('C:\Users\xhskw\OneDrive\デスクトップ\Git_workspace\portfolio\Python\Medicai_Data\venv_Medical_Data\data\ipss_birth.csv', index=FALSE)
df_birth

df_birth2 = pd.read_csv('C:\Users\xhskw\OneDrive\デスクトップ\Git_workspace\portfolio\Python\Medicai_Data\venv_Medical_Data\data\ipss_birth.csv')
df_birth2


plt.show()
