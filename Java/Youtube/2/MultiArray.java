// 多次元配列

/*
 * int[][] allScore = new int[2][3];  // ２行３列
 *      [0][0] [0][1] [0][2]
 *      [1][0] [1][1] [1][2]
 * 
 * [][][] なら３次元配列
 */

class MultiArray {
    public static void main(String[] args) {
        /* 
        int[][] allScore = new int[2][3];
        allScore[0][0] = 80;
        allScore[0][1] = 100;
        allScore[0][2] = 75;
        allScore[1][0] = 85;
        allScore[1][1] = 95;
        allScore[1][2] = 80;
        */

        // 初期化で記載する場合
        int[][] allScore = {{80, 100, 75}, {85, 95, 80}};

        System.out.println(allScore[0][0] + "点");
        System.out.println(allScore[0][1] + "点");
        System.out.println(allScore[0][2] + "点");
        System.out.println(allScore[1][0] + "点");
        System.out.println(allScore[1][1] + "点");
        System.out.println(allScore[1][2] + "点");

        System.out.println("allScore.length：" + allScore.length);       // 2   行数を返す
        System.out.println("allScore[0].length：" + allScore[0].length); // 3   列数を返す
    }
}
