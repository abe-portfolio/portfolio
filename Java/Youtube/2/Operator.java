// 演算子

/*
 * ++   インクリメント
 * --   デクリメント
 * *    かける
 * /    割る
 * %    割った余りを返す
 * +    足す
 * -    引く
 * >    以上（同値はfalse）
 * <    未満
 * >=   以上（同値はtrue）
 * >=   以下
 * ==   等しいか
 * !=   等しくないか
 * &&   AND
 * ||   OR
 * =    代入
 * +=   a += bなら、a = a + b と同じ
 * -=   a -= bなら、a = a - b と同じ
 * *=   a *= bなら、a = a * b と同じ
 * /=   a /= bなら、a = a / b と同じ
 * %=   a %= bなら、a = a % b と同じ
 */

public class Operator {
    public static void main(String[] args) {
        // コマンドラインから入力したデータをint型に変換する
        int a = Integer.parseInt(args[0]);
        int b = Integer.parseInt(args[1]);

        System.out.println("a = " + a + ". b = " + b);
        System.out.println("a + b = " + (a + b));
        System.out.println("a - b = " + (a - b));
        System.out.println("a * b = " + (a * b));
        System.out.println("a / b = " + (a / b));
        System.out.println("a % b = " + (a % b));
        System.out.println("a >= b = " + (a >= b));
        System.out.println("a + b = " + (a + b));
        System.out.println("(a >= 0) && (b >= 0)：" + ((a >= 0) && (b >= 0)));
    }
}
