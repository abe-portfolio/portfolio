import pandas as pd

# 表形式のデータ（indexは一意でなくても良い）
pd.DataFrame({
    '名前':['佐藤','鈴木','高橋','斎藤'],
    '年齢':[21,24,41,22],
    '住所':['新潟県','東京都','香川県','福岡県'],
    '血液型':['A','O','AB','B']
},index=['i-1','i-1','i-2','i-3'])
#       名前  |　年齢　|　住所　|　血液型
#      -----------------------------------
#  i-1  佐藤　|　21　|　新潟県　|　A
#  i-1  鈴木　|　24　|　東京都　|　O
#  i-2  高橋　|　41　|　香川県　|　AB
#  i-3  斎藤　|　22　|　福岡県　|　B


# １次元のデータ（リスト形式）
pd.Series(
    ['佐藤','鈴木','高橋']
)
pd.Series(
    ['佐藤','鈴木','高橋'],
    index=['i-1','i-2','i-3']
)



# excelファイルの読み込み（import文を書く必要はない（pd.read_excel()の内部で実行されるため）が、openpyxlライブラリが必要）
df = pd.read_excel(r'Python\venvs\da\.venv\pandas\UserData.xlsx') # /U がHexの開始として認識されるため、raw string（r''）を使用する
print(df)
df = pd.read_excel(r'Python\venvs\da\.venv\pandas\UserData.xlsx', sheet_name='Sheet2')
df = pd.read_excel(r'Python\venvs\da\.venv\pandas\UserData.xlsx', index_col='ユーザid') # ユーザid列をインデックスにする

# csvファイルの読み込み
df = pd.read_csv('user_file.csv')

# jsonファイルの読み込み
df = pd.read_json('user_file.json')



# excelファイルの書き込み
pd.to_excel('user_file.xlsx', index=False)

# csvファイルの書き込み
pd.to_csv('user_file.csv', index=False)

# jsonファイルの書き込み
pd.to_json('user_file.json', index=False)



# データの抽出
df = pd.read_excel('user_file.xlsx')
df.head() # 先頭５行（デフォルト）
df.tail() # 末尾５行（デフォルト）
df.head(3) # 先頭３行
df.tail(3) # 末尾３行
