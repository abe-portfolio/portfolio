import { useEffect, useState } from "react"
import { useParams, useNavigate } from "react-router-dom"
import ReactMarkdown from "react-markdown"
import Header from "../components/Header"
import { controlStyle } from "../styles/controls"
import type { Page } from "../types/page"

const BASE_URL = "http://localhost:8080"

function PageDetail() {
  const { slug } = useParams<{ slug: string }>()
  const navigate = useNavigate()

  const [page, setPage] = useState<Page | null>(null)
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState("")

  useEffect(() => {
    if (!slug) return

    const fetchPage = async () => {
      try {
        const res = await fetch(`${BASE_URL}/api/pages/${slug}`)
        if (!res.ok) throw new Error()
        const data = await res.json()
        setPage(data)
      } catch {
        setError("ページの取得に失敗しました")
      } finally {
        setLoading(false)
      }
    }

    fetchPage()
  }, [slug])

  const handleDelete = async () => {
    if (!page) return

    const ok = confirm("本当に削除しますか？")
    if (!ok) return

    try {
      const res = await fetch(`${BASE_URL}/api/pages/${page.id}`, {
        method: "DELETE",
      })
      if (!res.ok) throw new Error()
      navigate("/")
    } catch {
      alert("削除に失敗しました")
    }
  }

  /* ---------- Loading / Error ---------- */

  if (loading) {
    return (
      <>
        <Header />
        <div style={{ padding: "24px" }}>読み込み中...</div>
      </>
    )
  }

  if (error || !page) {
    return (
      <>
        <Header />
        <div style={{ padding: "24px" }}>{error}</div>
      </>
    )
  }

  /* ---------- Main ---------- */

  return (
    <>
      <Header
        right={
          <>
            <button
              style={controlStyle}
              // onClick={() => navigate(`/pages/${page.id}/edit`)}
              onClick={() => navigate(`/pages/${page.slug}/edit`)}

            >
              編集
            </button>
            <button
              style={controlStyle}
              onClick={handleDelete}
            >
              削除
            </button>
          </>
        }
      />

      <div style={{ padding: "24px", maxWidth: "900px" }}>
        <h1 style={{ marginBottom: "8px" }}>{page.title}</h1>

        {Array.isArray(page.tags) && page.tags.length > 0 && (
          <div style={{ marginBottom: "16px", display: "flex", gap: "8px" }}>
            {page.tags.map((tag) => (
              <span
                key={tag}
                style={{
                  padding: "4px 8px",
                  backgroundColor: "#eee",
                  borderRadius: "4px",
                  fontSize: "12px",
                }}
              >
                {tag}
              </span>
            ))}
          </div>
        )}

        <div style={{ lineHeight: 1.7 }}>
          <ReactMarkdown>{page.content_md}</ReactMarkdown>
        </div>
      </div>
    </>
  )
}

export default PageDetail
