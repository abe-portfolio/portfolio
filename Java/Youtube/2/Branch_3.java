// 構造化プログラミング（分岐：switch文）

/*
 * Switch文
 * switch(式) {
 *     case 値１:
 *         処理１;
 *         break;
 *     case 値２:
 *         処理２;
 *         break;
 *     default:
 *         処理３;
 * }
 */
public class Branch_3 {
    public static void main(String[] args) {
        int num = Integer.parseInt(args[0]);

        switch(num) {
            case 1:
                System.out.println("入園料金：8,400円");
                break;
            case 2:
                System.out.println("入園料金：7,000円");
                break;
            case 3:
            case 4:
                System.out.println("入園料金：5,000円");
                break;
            default:
                System.out.println("１：一般、２：中・高校生、３：小学生、４：幼児");
        }
    }
}
