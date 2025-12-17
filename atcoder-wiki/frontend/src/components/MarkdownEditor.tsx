import ReactMarkdown from "react-markdown"

type Props = {
  value: string
  onChange: (value: string) => void
}

function MarkdownEditor({ value, onChange }: Props) {
  return (
    <div style={{ display: "flex", gap: "16px" }}>
      {/* 入力欄 */}
      <textarea
        value={value}
        onChange={(e) => onChange(e.target.value)}
        style={{
          width: "50%",
          height: "400px",
          padding: "8px",
          fontFamily: "monospace",
        }}
        placeholder="Markdown を入力してください"
      />

      {/* プレビュー */}
      <div
        style={{
          width: "50%",
          height: "400px",
          padding: "8px",
          border: "1px solid #ddd",
          overflowY: "auto",
        }}
      >
        <ReactMarkdown>{value}</ReactMarkdown>
      </div>
    </div>
  )
}

export default MarkdownEditor
