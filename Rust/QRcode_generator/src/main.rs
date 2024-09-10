use qrcode::QrCode;
use image::Luma;
// use std::fs::File;
use proconio::input;


fn main() {
    input! {
        text: String,
    };

    let QRcode = QrCode::new(text).unwrap();

    let image = QRcode.render::<Luma<u8>>().min_dimensions(200, 200).build();
    image.save("./image/qrcode.png").unwrap();

    println!("QRコードの生成が完了しました。");
}


// 残課題
// CLIからの入力だけでなく、GUIかWeb上で動くようにしたい
// 呼び出し元って特定できる？Web、CLIなどなど
