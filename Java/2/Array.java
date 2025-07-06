// 配列について

/*
 * 【生成】
 *      newキーワードを使って生成する（デフォルト値が設定される）
 *      構文
 *          データ型[] 配列名 = new データ型[要素数];  ※データ型を左右で１回ずつ書く
 *      その後、代入する。
 * 
 * 【初期化】
 *      構文
 *          データ型[] 配列名 = {値１, 値２, ..., 値n};
 * 
 * 
 *  配列名.lengthで配列の「要素数」を取得可能
 */

public class Array {
    public static void main(String[] args) {
        int[] score = new int[3];
        score[0] = 80;
        score[1] = 100;
        score[2] = 75;

        String[] name = {"阿部", "佐藤", "田中"};

        System.out.println(name[0] + "さん：" + score[0] + "点");
        System.out.println(name[1] + "さん：" + score[1] + "点");
        System.out.println(name[2] + "さん：" + score[2] + "点");
        System.out.println("受験者数：" + score.length + "名");
    }
}
