import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

def send_email():
    # 送信元メールアドレス
    sender_email = "migrainealert407@gmail.com"
    # 送信元メールアカウントのパスワードまたはアプリパスワード
    # password = "Vv7seq02Dds"
    password = "wxuz pkqs gqky dzua"

    # 送信先メールアドレス
    receiver_email = "clay109vanit@gmail.com"
    # メールの件名
    # subject = "Migraine Alert"
    subject = "片頭痛注意報"
    
    # メールの本文
    # body = "Hello, the statistical likelihood of experiencing migraine headaches appears to be high."
    body = "やあ！気圧が1013hPa以下だから、片頭痛が発生する可能性があるよ！"

    # MIMETextオブジェクトを作成
    message = MIMEMultipart()
    message.attach(MIMEText(body, "plain"))

    # 件名を設定
    message["Subject"] = subject
    # 送信元メールアドレスを設定
    message["From"] = sender_email
    # 送信先メールアドレスを設定
    message["To"] = receiver_email

    # SMTPサーバーに接続
    with smtplib.SMTP("smtp.gmail.com", 587) as server:
        # 暗号化の開始
        server.starttls()
        # ログイン
        server.login(sender_email, password)
        # メール送信
        server.sendmail(sender_email, receiver_email, message.as_string())

# メールを送信
# send_email()