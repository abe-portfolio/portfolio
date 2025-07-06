// 標準入力

/*
 * public static void main(String[] args) { ... } のargsを使用すれば
 * コンパイルした.classを実行する際の引数を文字列として受け取ることができる。
 * 
 * ただし、数字なども文字列として受け取るため連結文字列になる。
 * 数値計算をしたい場合は、argsで受け取る引数を数値に変換する。
 */
public class CmdLine {
    public static void main(String[] args) {
        // 引数で２つの標準入力が必要
        System.out.println("args[0]：" + args[0]);
        System.out.println("args[1]：" + args[1]);
        System.out.println("args.length：" + args.length);
    }

    // 実行コマンド
    // java CmdLine Hello Java

    // 出力結果
    // args[0]：Hello
    // args[1]：Java
    // args.length：2

    // エラーメッセージ（引数なしで実行した場合）
    //Exception in thread "main" java.lang.ArrayIndexOutOfBoundsException: Index 0 out of bounds for length 0
    //    at CmdLine.main(CmdLine.java:12)
    // 配列が持つ要素の領域外にアクセスしようとしているよ！
    // 　つまり、要素数が２つしかない配列に対して、インデックス２にアクセスしようとしている。などのケース
   
}
