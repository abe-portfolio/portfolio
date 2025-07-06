// 構造化プログラミング（分岐：if～else if～else文）

public class Branch_2 {
    public static void main(String[] args) {
        int price = Integer.parseInt(args[0]);
        double rate = 0.10; // 消費税 10%
        int amount, discount;

        if(price >= 5000) {
            discount =500;
        } else if(price >= 3000) {
            discount = 300;
        } else {
            discount = 0;
        }

        amount = (int)((price - discount) * (1 + rate));
        System.out.println("値引金額：" + discount + "円");
        System.out.println("税抜金額：" + (price - discount) + "円");
        System.out.println("税込金額：" + amount + "円");
    }
}
