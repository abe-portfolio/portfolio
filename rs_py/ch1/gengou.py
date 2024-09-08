for i in range(1926, 2027):
    print("西暦{}年 = ".format(i), end="")
    
    if i >= 2019:
        if i == 2019:
            print("令和元年")
        else:
            print("令和{}年".format(i- 2019 + 1))
    elif i >= 1989:
        if i == 1989:
            print("平成元年")
        else:
            print("平成{}年".format(i - 1989 + 1))
    elif i >= 1926:
        if i == 1926:
            print("昭和元年")
        else:
            print("昭和{}年".format(i - 1926 + 1))