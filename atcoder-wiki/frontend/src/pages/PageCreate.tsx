import { useState } from "react"
import { useNavigate } from "react-router-dom"
import Header from "../components/Header"
import { createPage } from "../api/pages"
import MarkdownEditor from "../components/MarkdownEditor"


function PageCreate() {
  const navigate = useNavigate()

  const [title, setTitle] = useState("")
  const [content, setContent] = useState("")

  const [tags, setTags] = useState<string[]>([])
  const [tagInput, setTagInput] = useState("")


  return (
    <>
      <Header right={null} />

      <div style={{ padding: "24px", maxWidth: "800px" }}>

        {/* タイトル */}
        <div style={{ marginBottom: "16px" }}>
          <label>
            *タイトル
            <br />
            <input
              type="text"
              value={title}
              onChange={(e) => setTitle(e.target.value)}
              style={{ width: "100%", padding: "8px" }}
            />
          </label>
        </div>

        {/* タグ */}
        <div style={{ marginBottom: "16px" }}>
          <label>
            *タグ（最大５個）
            <br />
            <input
              type="text"
              value={tagInput}
              onChange={(e) => setTagInput(e.target.value)}
              onKeyDown={(e) => {
                if (e.key === "Enter" && tagInput.trim() !== "") {
                  e.preventDefault()
              
                  if (tags.length >= 5) {
                    alert("タグは最大5個までです")
                    return
                  }
              
                  if (!tags.includes(tagInput.trim())) {
                    setTags([...tags, tagInput.trim()])
                  }
              
                  setTagInput("")
                }
              }}
              placeholder="Enterで追加"
              style={{ width: "100%", padding: "8px" }}
            />
          </label>

          {/* タグ一覧 */}
          <div style={{ marginTop: "8px", display: "flex", gap: "8px", flexWrap: "wrap" }}>
            {tags.map((tag) => (
              <span
                key={tag}
                style={{
                  padding: "4px 8px",
                  backgroundColor: "#eee",
                  borderRadius: "4px",
                  display: "flex",
                  alignItems: "center",
                  gap: "4px",
                }}
              >
                {tag}
                <button
                  onClick={() => {
                    setTags(tags.filter((t) => t !== tag))
                  }}
                  style={{
                    border: "none",
                    background: "transparent",
                    cursor: "pointer",
                  }}
                >
                  ×
                </button>
              </span>
            ))}
          </div>
        </div>


        {/* 本文 */}
        <div style={{ marginBottom: "16px" }}>
          <label>
            *本文（Markdown）
            <br />
            <MarkdownEditor
              value={content}
              onChange={setContent}
            />
          </label>
        </div>

        {/* ボタン */}
        <div style={{ display: "flex", gap: "12px" }}>
        <button
          onClick={async () => {
            if (title.trim() === "") {
              alert("タイトルを入力してください")
              return
            }

            if (tags.length === 0) {
              alert("タグを1つ以上設定してください")
              return
            }

            if (content.trim() === "") {
              alert("本文を入力してください")
              return
            }

            try {
              const page = await createPage({
                title,
                content_md: content,
                tags,
              })

              navigate(`/pages/${page.slug}`)
            } catch (e) {
              alert("投稿に失敗しました")
            }
          }}
        >
          投稿
        </button>


        <button
          onClick={() => {
            navigate("/")
          }}
        >
          キャンセル
        </button>
        </div>
      </div>
    </>
  )
}

export default PageCreate
