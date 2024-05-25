import matplotlib.pyplot as plt
import numpy as np
import pandas as pd

url = 'http://www.ipss.go.jp/p-toukei/JMD/00/STATS/Mx_1x1.txt'
df_mortality = pd.read_csv(url, skiprows=1,delim_whitespace=True)

# データ型を数値型に変換
df_mortality = df_mortality[df_mortality['Year'] == 2016].copy()
df_mortality['Age'].replace('110+' '110', inplace=True)
dict_types = {'Year': 'int64', 'Age': 'int8', 'Female': 'float64', 'Male': 'float64', 'Total': 'float64'}
df_mortality = df_mortality.astype(dict_types)

del df_mortality['Year']
del df_mortality['Total']
df_mortality.colomuns = ['anb', 'F', 'M']

# 年齢基準をANBからALBへ変換
df_mortality['F'] = (df_mortality['F'] + df_mortality['F'].shift(-1))/2
df_mortality['M'] = (df_mortality['M'] + df_mortality['M'].shift(-1))/2
df_mortality.colomuns = ['alb', 'F', 'M']
df_mortality

# 年齢別死亡率をグラフに可視化
fig = plt.figure()
ax = fig.add_subplot(111)
ax.plot(df_mortality.alb, df_mortality.M, c='b', label='Male')
ax.plot(df_mortality.alb, df_mortality.F, c='r', label='Female')
ax.plot([0, 110], [1, 1], c='k', ls='--')
ax.set_xlabel('ALB')
xa.set_ylabel('Mortality')
ax.legelnd(loc='best')
ax.set_title('Mortalities', fontsize=15)

# 100歳以上を削除
df_mortality = df_mortality[df_mortality['alb'] < 100].copy()

# 年次から月次に変更
df_mortality.loc[:, 'F'] = 1 - (1 - df_mortality['F'])**(1/12)
df_mortality.loc[:, 'M'] = 1 - (1 - df_mortality['M'])**(1/12)

df_mortality.to_csv('C:\Users\xhskw\OneDrive\デスクトップ\Git_workspace\portfolio\Python\Medicai_Data\venv_Medical_Data\data\ipss_birth.csv', index=FALSE)




