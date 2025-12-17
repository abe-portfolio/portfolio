import { useEffect, useState } from "react"
import { useParams, useNavigate } from "react-router-dom"
import ReactMarkdown from "react-markdown"

import Header from "../components/Header"
import { controlStyle } from "../styles/controls"
import type { Page } from "../types/page"

const BASE_URL = "http://localhost:8080"

function PageEdit() {
  const { slug } = useParams<{ slug: string }>()
  const navigate = useNavigate()

  const [title, setTitle] = useState("")
  const [content, setContent] = useState("")
  const [tags, setTags] = useState<string[]>([])
  const [tagInput, setTagInput] = useState("")
  const [loading, setLoading] = useState(true)

  // 日本語入力の判定
  const [isComposing, setIsComposing] = useState(false)

  /* ---------- 初期データ取得 ---------- */

  useEffect(() => {
    if (!slug) return

    const fetchPage = async () => {
      try {
        const res = await fetch(`${BASE_URL}/api/pages/${slug}`)
        if (!res.ok) throw new Error()
        const data: Page = await res.json()

        setTitle(data.title)
        setContent(data.content_md)
        setTags(data.tags)
      } catch {
        alert("ページの取得に失敗しました")
      } finally {
        setLoading(false)
      }
    }

    fetchPage()
  }, [slug])

  if (loading) {
    return (
      <>
        <Header />
        <div style={{ padding: "24px" }}>読み込み中...</div>
      </>
    )
  }

  /* ---------- 保存 ---------- */

  const handleSave = async () => {
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
      const res = await fetch(`${BASE_URL}/api/pages/${slug}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          title,
          content_md: content,
          tags,
        }),
      })

      if (!res.ok) throw new Error()
      navigate(`/pages/${slug}`)
    } catch {
      alert("保存に失敗しました")
    }
  }

  /* ---------- JSX ---------- */

  return (
    <>
      <Header
        right={
          <>
            <button style={controlStyle} onClick={handleSave}>
              保存
            </button>
            <button
              style={controlStyle}
              onClick={() => navigate(`/pages/${slug}`)}
            >
              キャンセル
            </button>
          </>
        }
      />

      <div style={{ padding: "24px", maxWidth: "1000px" }}>
        {/* タイトル */}
        <div style={{ marginBottom: "16px" }}>
          <label>*タイトル</label>
          <input
            value={title}
            onChange={(e) => setTitle(e.target.value)}
            style={{ width: "100%", ...controlStyle }}
          />
        </div>

        {/* タグ */}
        <div style={{ marginBottom: "16px" }}>
          <label>
            *タグ（最大5個）
            <br />
            <input
              type="text"
              value={tagInput}
              onChange={(e) => setTagInput(e.target.value)}
              onCompositionStart={() => setIsComposing(true)}
              onCompositionEnd={() => setIsComposing(false)}
              onKeyDown={(e) => {
                if (e.key === "Enter" && !isComposing && tagInput.trim() !== "") {
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
                  onClick={() => setTags(tags.filter((t) => t !== tag))}
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

        {/* 本文 + プレビュー */}
        <div style={{ display: "flex", gap: "16px" }}>
          <div style={{ flex: 1 }}>
            <label>*本文（Markdown）</label>
            <textarea
              value={content}
              onChange={(e) => setContent(e.target.value)}
              rows={12}
              style={{ width: "100%", padding: "8px" }}
            />
          </div>

          <div style={{ flex: 1 }}>
            <label>プレビュー</label>
            <div
              style={{
                border: "1px solid #ccc",
                padding: "8px",
                minHeight: "260px",
              }}
            >
              <ReactMarkdown>{content}</ReactMarkdown>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}

export default PageEdit
