// 構造化プログラミング（分岐：if～else文）

/*
 * 構造化プログラミング とは、以下の３つを組み合わせてプログラムを記述すること
 *  　１．順次進行
 *  　２．分岐
 *  　３．繰り返し　
 * 
 */
public class Branch_1 {
    public static void main(String[] args) {
        int price = Integer.parseInt(args[0]);
        double rate = 0.10; // 消費税 10%
        int amount, discount;

        if (price >= 3000) {
            discount =300;
        } else {
            discount = 0;
        }

        amount = (int)((price - discount) * (1 + rate));
        System.out.println("値引金額：" + discount + "円");
        System.out.println("税抜金額：" + (price - discount) + "円");
        System.out.println("税込金額：" + amount + "円");
    }
}
