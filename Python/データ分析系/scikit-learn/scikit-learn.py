import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score

#PandasのDataFarameで読み込む
#額の長さ(Sepal.Length)｜額の幅(Sepal.Width)｜花弁の長さ(Pepal.Length)｜花弁の幅(Pepal.Width)｜種類(Species)
df = pd.read_csv('iris.csv')

#特徴量のみを抽出
#変数名が大文字なのは特徴量を行列として表す機械学習の習慣
X = df[['Sepal.Length', 'Sepal.Width',
        'Pepal.Length', 'Pepal.Width']]

#正解データの列を抽出
y = df['Species']

#データの順番をシャッフルし、80%を学習用、20%を評価用にする方法やクロスバリデーションなどもある
#今回は80:20を採用
X_train, X_test, y_train, y_test = train_test_split(
        #test_size=0.2 ⇒ 20％を評価用
        #random_state=77 ⇒ 再現性を保つ
        X, y, test_size=0.2, random_state=77
)

#clfはまだ何も学習していないモデル
clf = RandomForestClassifier(random_state=77)
#学習フェーズ
clf.fit(X_train, y_train)
#予測フェーズ
pred = clf.predict(X_test)
#評価フェーズ
accuracy = accuracy_score(y_test, pred)

#クラス(RandomForestClassifier)を変更すればモデルの種類が変わる
#学習 = fit
#予測 = predict
#のように、クラスが変わってもメソッドは統一されているため、変更するのはクラスのみで良い



