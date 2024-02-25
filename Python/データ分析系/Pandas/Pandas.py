import pandas as pd


# pd.DataFrame({カラム名:リスト}
pd.DataFrame({
    '名前':['佐藤','鈴木','高橋','斎藤'],
    '年齢':[21,24,41,22],
    '住所':['新潟県','東京都','鹿児島県','福岡県'],
    '血液型':['A','O','AB','B']
},index=['i-1','i-2','i-3','i-4'])

# pd.Series(リスト)
pd.Series(
    ['佐藤','鈴木','高橋']
)

# Excelファイルの読み込み
# pd.read_excel('Excelファイルのパス', sheet_name='シート名',index_col='インデックスにするカラム名')
df = pd.read_excel('user_file.xlsx')
