// 型変換

/*
 * 小
 *  byte
 *  short
 *  int
 *  lomg
 *  float
 *  double
 * 大
 * 
 * 小 -> 大　：　自動で型変換される
 * 大 -> 小　：　キャストで明示的に型変換を行う
 * 
 * DataType.javaの各データ型のbitサイズも確認しておく
 */

public class Cast {
    public static void main(String[] args) {
        int price = Integer.parseInt(args[0]);
        double rate = 0.08; // 消費税 8%
        int amount;

        amount = (int)(price * (1 + rate));
        System.out.println("税抜金額：" + price + "円");
        System.out.println("税込金額：" + amount + "円");
    }
}
