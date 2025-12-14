# ### Irisデータの読み込み方法 #############################################
# １．scikit-learnを使用する方法
# from sklearn.datasets import load_iris
# iris = load_iris()
#
# ２．Pandasを使用する方法
# import pandas as pd
# iris = pd.read_csv('https://raw.githubusercontent.com/mwaskom/seaborn-data/master/iris.csv')
#
# ３．Seabornを使用する方法
# import seaborn as sns
# iris = sns.load_dataset('iris')
# ########################################################################

import seaborn as sns

def main():
    print('Hello World')
    iris = sns.load_dataset('iris')

    



if __name__ == '__main__':
    main()
