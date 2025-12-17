import type { ReactNode } from "react"
import { useNavigate } from "react-router-dom"

type HeaderProps = {
  right?: ReactNode
}

function Header({ right }: HeaderProps) {
  const navigate = useNavigate()

  return (
    <header
      style={{
        position: "sticky",
        top: 0,
        zIndex: 1000,
        backgroundColor: "#fff",
        display: "flex",
        justifyContent: "space-between",
        alignItems: "center",
        padding: "12px 24px",
        borderBottom: "1px solid #ddd",
      }}
    >
      {/* 左：ロゴ（共通） */}
      <h1
        style={{ margin: 0, cursor: "pointer", fontSize: "20px" }}
        onClick={() => navigate("/")}
      >
        AtCoder Wiki
      </h1>

      {/* 右：ページごとの操作 */}
      <div style={{ display: "flex", gap: "8px", alignItems: "center" }}>
        {right}
      </div>
    </header>
  )
}

export default Header
