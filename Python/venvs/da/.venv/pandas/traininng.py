from pathlib import Path
import pandas as pd
import japanize_matplotlib

# カレントディレクトリの確認
print(Path.cwd()) # d:\MyDesktop\portfolio_workspace\portfolio

BASE_DIR = Path(r"Python\venvs\da\.venv\pandas")
FILE_NAME = "UserData.xlsx"

df = pd.read_excel(BASE_DIR / FILE_NAME)
print(df)


new_df = pd.read_excel(
    BASE_DIR / FILE_NAME,
    index_col='ユーザid'
)
print(new_df)


# 抽出
# df.loc[[行のカラム],[列のカラム]]
df.loc[[0,1,2],['ユーザid','血液型']]
# printはいらない

# 0~3行目の全列
df.loc[[0,1,2],:]

# 全行の住所列
df.loc[:,['住所']]

#fd.iloc[行のインデックス].[列のインデックス]
df.iloc[[2,3],[1,2]]

# 特定列の全行を取得するときは以下でもできる
df['血液型']


# 抽出条件の使用（bool indexを使用した例）
df[df['年齢']>=30]
df[(df['年齢']>=30) & (df['血液型']=='A')]
df[(df['年齢']>=30) | (df['住所']!='岐阜県')]


# 統計の使用
df.mean() # 平均
df.median() # 中央値
df.min() # 最小値
df.max() # 最大値
df.sum() # 合計

df['年齢'].mean() # 年齢列の平均
df['年齢'].median() # 年齢列の中央値
df['年齢'].min() # 年齢列の最小値
df['年齢'].max() # 年齢列の最大値
df['年齢'].sum() # 年齢列の合計

# df全体の数値のみの統計
df.mean(numeric_only=True) # 数値のみの平均
df.median(numeric_only=True) # 数値のみの中央値
df.min(numeric_only=True) # 数値のみの最小値
df.max(numeric_only=True) # 数値のみの最大値
df.sum(numeric_only=True) # 数値のみの合計


# 演算や加工も可能
df['総購入金額'] = df['価格'] * df['購入回数']
df['ユーザ名（敬称）'] = df['ユーザ名'] + '様'


# GroupBy
result = df.groupby('担当者').mean()
result = df.groupby('担当者')['売上'].mean() # 売上列を明示したい場合の書き方（処理結果は上と同じ）


# indexの変更
df.index = range(1,5) # 1~4のインデックスに変更
df_new = df.set_index('ユーザid') # ユーザid列をインデックスに変更（元のdfは変更されない）
df.set_index('ユーザid', inplace=True) # ユーザid列をインデックスに変更（inplace=Trueで元のdfを変更）
df.reset_index(inplace=True) # dfのインデックスを振りなおす（index列が追加される）
df.reset_index(inplace=True, drop=True) # dfのインデックスを振りなおす（index列が追加されない）



# concat結合
df1 = pd.read_excel(BASE_DIR / 'UserData.xlsx')
df2 = pd.read_excel(BASE_DIR / 'UserData2.xlsx')
df_concat = pd.concat([df1, df2]) # 縦に結合（カラムがないところはNaNとして結合される）
df_concat = pd.concat([df1, df2], axis=1) # 横に結合（インデックスが共通する行が結合される）


# merge結合(条件による結合)
# mergeは３つ以上のDataFrameの結合はできない
df_new = pd.merge(df1, df2, on='ユーザid') # ユーザid列を結合条件に使用(内部結合)
df_new = pd.merge(df1, df2, on='ユーザid', how='left') # 左側のdf1を基準に結合（df2にユーザidがない行はNaNとして結合される）
df_new = pd.merge(df1, df2, on='ユーザid', how='right') # 右側のdf2を基準に結合（df1にユーザidがない行はNaNとして結合される）
df_new = pd.merge(df1, df2, on='ユーザid', how='outer') # 両側のdf1とdf2を基準に結合（ユーザidがない行はNaNとして結合される）


# map + lambda式
# 例として、年齢によって”成人”、”未成年”を付与する処理を想定
df['区分'] = df['年齢'].map(lambda x: '成人' if x >= 20 else '未成年')


#グラフ描画
# 棒グラフ
df.plot(x = '名前', y = '購入額', kind = 'bar')
# 折れ線グラフ
df.plot(x = '名前', y = '購入額', kind = 'line')
# 円グラフ
df.plot(x = '名前', y = '購入額', kind = 'pie')
# 散布図
df.plot(x = '名前', y = '購入額', kind = 'scatter')
# ヒストグラム
df.plot(x = '名前', y = '購入額', kind = 'hist')
# 箱ひげ図
df.plot(x = '名前', y = '購入額', kind = 'box')