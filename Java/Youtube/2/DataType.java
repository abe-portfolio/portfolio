// データ型と参照型について

/*
    【データ型】
    +---------------------------+
    |  整数    byte      8 bit  
    |          short    18 bit
    |          int      32 bit
    |          long     64 bit
    +---------------------------+
    |  小数    float    32 bit  ※float型の場合は数値の後に「f」をつける
    |          double   64 bit
    +---------------------------+
    |  文字    char     16 bit　※１文字はシングルクォーテーションで囲む
    +---------------------------+
    |  審議値  boolean    - 
    +---------------------------+

    【参照型】
    +---------------------------+
    | 文字列    String  ※ダブルクォーテーション
    +---------------------------+
    | 配列        
    +---------------------------+
    */

public class DataType {
    public static void main(String[] args) {
        int month = 12;
        int day = 29;
        float weight = 63.0f;
        double height = 170.5;
        char bloodType = 'Ｏ';

        String name = "阿部";

        System.out.println("こんにちは！" + name + "です！");
        System.out.println("身長は" + height + "cm、体重は" + weight + "kgです。");
        System.out.println("誕生日は" + month + "月" + day + "日、");
        System.out.println("血液型は" + bloodType + "型です");
        System.out.println("よろ");
    }   
}
