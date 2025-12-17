import { useEffect, useState } from "react"
import { Link, useSearchParams } from "react-router-dom"
import Header from "../components/Header"
import { fetchPages } from "../api/pages"
import type { Page } from "../types/page"
import { useNavigate } from "react-router-dom"
import { controlStyle } from "../styles/controls"

const PAGE_SIZE = 10

function TopPage() {
  const [pages, setPages] = useState<Page[]>([])
  const [currentPage, setCurrentPage] = useState(1)

  // 🔍 検索クエリ取得（← コンポーネント内！）
  const [searchParams, setSearchParams] = useSearchParams()
  const [query, setQuery] = useState(
    searchParams.get("q") ?? ""
  )


  const navigate = useNavigate()

  useEffect(() => {
    fetchPages()
      .then((data) => {
        // タイトル昇順でソート
        const sorted = [...data].sort((a, b) =>
          a.title.localeCompare(b.title)
        )
        setPages(sorted)
      })
      .catch(() => {
        alert("ページ一覧の取得に失敗しました")
      })
  }, [])

  // 🔍 検索フィルタ（タイトル＋タグ）
  const filteredPages = pages.filter((page) => {
    if (!query) return true

    const inTitle = page.title.toLowerCase().includes(query)
    const inTags =
      Array.isArray(page.tags) &&
      page.tags.some((tag) => tag.toLowerCase().includes(query))

    return inTitle || inTags
  })

  // ページング（※ filteredPages に対して行う）
  const totalCount = filteredPages.length
  const totalPages = Math.max(1, Math.ceil(totalCount / PAGE_SIZE))

  const start = (currentPage - 1) * PAGE_SIZE
  const end = start + PAGE_SIZE
  const currentPages = filteredPages.slice(start, end)

  return (
    <>
      <Header
        right={
          <>
            <input
              type="text"
              placeholder="タイトル / タグ検索"
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              onKeyDown={(e) => {
                if (e.key === "Enter") {
                  setSearchParams(query ? { q: query } : {})
                }
              }}
              style={controlStyle}
            />

            <button
              style={controlStyle}
              onClick={() => navigate("/pages/new")}
            >
              新規作成
            </button>
          </>
        }
      />

      <div style={{ padding: "24px", maxWidth: "800px" }}>
        {currentPages.length === 0 && (
          <p style={{ color: "#666" }}>該当するページがありません</p>
        )}

        {currentPages.map((page) => (
          <div key={page.id} style={{ marginBottom: "24px" }}>
            <h2 className="page-title">
              <Link
                to={`/pages/${page.slug}`}
                className="page-title-link"
              >
                {page.title}
              </Link>
            </h2>
            <p className="page-excerpt">
              {page.content_md.slice(0, 100)}...
            </p>
          </div>
        ))}

        {/* ページング */}
        <div style={{ display: "flex", gap: "8px" }}>
          <button
            disabled={currentPage <= 1}
            onClick={() => setCurrentPage((p) => p - 1)}
          >
            前へ
          </button>

          <span>
            {currentPage} / {totalPages}
          </span>

          <button
            disabled={currentPage >= totalPages}
            onClick={() => setCurrentPage((p) => p + 1)}
          >
            次へ
          </button>
        </div>
      </div>
    </>
  )
}

export default TopPage
