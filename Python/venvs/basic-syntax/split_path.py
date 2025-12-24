from pathlib import Path

# r'' クォート内の「/」をエンコードに使用しない（/U = Hexなどを行わない）
BASE_DIR = Path(r"Python\venvs\da\.venv\pandas")
FILE_NAME = "UserData.xlsx"

print(BASE_DIR / FILE_NAME)
