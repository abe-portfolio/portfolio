// 構造化プログラミング(繰り返し：for文)
// Array.javaの配列に対してfor文を使用

public class Loop_3 {
    public static void main(String[] args) {
        int[] score = new int[3];
        score[0] = 80;
        score[1] = 100;
        score[2] = 75;

        String[] name = {"阿部", "佐藤", "田中"};

        /*
        Array.javaでの記載
        System.out.println(name[0] + "さん：" + score[0] + "点");
        System.out.println(name[1] + "さん：" + score[1] + "点");
        System.out.println(name[2] + "さん：" + score[2] + "点");
        */

        // 配列の要素数文だけループする
        for(int i = 0; i < score.length; i++) {
            System.out.println(name[i] + "さん：" + score[i] + "点");
        }

        System.out.println("受験者数：" + score.length + "名");
    }
}
