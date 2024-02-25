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
    print('遥か先で　君へ　狙いを定めた恐怖を')
    print('どれだけ僕は払いきれるんだろう？')
    print('半信半疑で　世間体　気にしてばっかのYESTERDAY')
    print('ポケットの中で怯えたこの手はまだ忘れられないまま')
    iris = sns.load_dataset('iris')

    



if __name__ == '__main__':
    main()
