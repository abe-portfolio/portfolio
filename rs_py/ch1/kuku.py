for i in range (1, 10):
    for j in range(1, 10):
        print("{:3},".format(i * j), end="")
    print("")
    
# "{:3},"  -> 3桁にフォーマット（足りなければ空白で保管）
# end=""   -> Pythonのprint()はデフォルトで改行するが、それを抑止する