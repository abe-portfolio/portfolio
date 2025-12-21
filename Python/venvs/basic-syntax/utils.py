import platform
import subprocess
import os


def play_notification_sound(sound_path: str = None) -> None:
    """
    処理完了時に通知音を鳴らす
    
    Args:
        sound_path: 音声ファイルのパス（Noneの場合はシステムデフォルト音を使用）
    """
    system = platform.system()
    
    try:
        if system == "Darwin":  # macOS
            if sound_path and os.path.exists(sound_path):
                subprocess.run(["afplay", sound_path], check=True)
            else:
                # macOSのデフォルト通知音（Glass）
                subprocess.run(
                    ["afplay", "/System/Library/Sounds/Glass.aiff"],
                    check=True
                )
        elif system == "Windows":
            if sound_path and os.path.exists(sound_path):
                # WindowsでWAVファイルを再生
                # パスをエスケープしてPowerShellコマンドを実行
                ps_command = (
                    f'(New-Object Media.SoundPlayer "{sound_path}").PlaySync()'
                )
                subprocess.run(
                    ["powershell", "-Command", ps_command],
                    check=True
                )
            else:
                # Windowsのデフォルトシステム音を鳴らす
                # winsoundはWindows専用なので、条件付きでインポート
                try:
                    import winsound
                    winsound.Beep(1000, 500)  # 1000Hz, 500ms
                except ImportError:
                    # winsoundが使えない場合は、システムのデフォルト音を使用
                    ps_command = '[console]::beep(1000,500)'
                    subprocess.run(
                        ["powershell", "-Command", ps_command],
                        check=True
                    )
        else:
            # Linuxなどのその他のOS
            # Linuxでは通常aplayやpaplayを使用
            if sound_path and os.path.exists(sound_path):
                subprocess.run(["aplay", sound_path], check=True)
            else:
                print("通知音: 処理完了")
    except subprocess.CalledProcessError as e:
        print(f"通知音の再生に失敗しました: {e}")
    except FileNotFoundError:
        print("通知音の再生に必要なコマンドが見つかりません")
    except Exception as e:
        print(f"予期しないエラーが発生しました: {e}")


def get_os_info() -> str:
    """
    現在のOS情報を返す
    
    Returns:
        OS名の文字列（'Darwin', 'Windows', 'Linux'など）
    """
    return platform.system()


if __name__ == "__main__":
    # テスト実行
    print(f"現在のOS: {get_os_info()}")
    print("通知音を再生します...")
    play_notification_sound()
