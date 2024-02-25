#ライブラリのimport
import pandas as pd
import matplotlib as plt
from bs4 import BeautifulSoup
import requests
import sys
from io import StringIO
from datetime import datetime
import send_mail

def main():
    # UTF-8エンコーディングを使用するように設定
    sys.stdout = open(sys.stdout.fileno(), mode='w', encoding='utf-8', buffering=1)
    
    
    #気象データの取得
    url = "https://www.data.jma.go.jp/stats/data/mdrr/synopday/data2.html"
    weather_data = requests.get(url)
    weather_data.encoding = 'utf-8'
    
    soup = BeautifulSoup(weather_data.text, 'html.parser')

    # テーブルをDataFrameに変換。
    # table = soup.find('table')  これだと最初のtableタグしか取得できないため、[1]でエラーになる。
    tables = soup.find_all('table')
    html_str = str(tables)
    df1 = pd.read_html(StringIO(html_str))[1]

    # 東京のデータ
    column_18 = df1.iloc[17, :]
    # 特定の列を選択(地点,気圧(現地平均),最高気温,最低気温,降水量)
    selected_columns = column_18[[0, 1, 4, 5, 14]].to_frame().T
    selected_columns.loc[:, 14] = pd.to_numeric(selected_columns.loc[:, 14], errors='coerce').fillna(0)
    selected_columns.columns = ['地点', '気圧(現地平均)', '最高気温', '最低気温', '降水量']

    # pd.to_numericを使って列の値を数値に変換
    selected_columns['気圧(現地平均)'] = pd.to_numeric(selected_columns['気圧(現地平均)'], errors='coerce')
    tokyo_data = selected_columns.loc[17, '気圧(現地平均)']

    flg = 'default'
    # 気圧の判定
    if tokyo_data <= 1013:
        # 基準値以下
        # メール送信
        send_mail.send_email()
        flg = True
    else:
        # 基準値以上
        flg = False

    # メールの送信有無を追加
    new_data = {
        '地点': selected_columns['地点'].values.tolist(),
        '気圧(現地平均)': selected_columns['気圧(現地平均)'].values.tolist(),
        '最高気温': selected_columns['最高気温'].values.tolist(),
        '最低気温': selected_columns['最低気温'].values.tolist(),
        '降水量': selected_columns['降水量'].values.tolist(),
        'メール送信': ['○'] if flg else ['×']
    }
    
    csv_data = pd.DataFrame(new_data)

    # CSV出力
    current_date = datetime.now().date().strftime("%Y%m%d")
    output_filename = rf"C:\Users\xhskw\OneDrive\デスクトップ\portfolio\migraine_alert\csv\atmospheric_pressure_{current_date}.csv"
    csv_data.to_csv(output_filename, index=False, encoding='utf-8')


if __name__ == "__main__":
    main()