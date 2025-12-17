import { Routes, Route } from "react-router-dom"

import TopPage from "./pages/TopPage"
import PageCreate from "./pages/PageCreate"
import PageDetail from "./pages/PageDetail"
import PageEdit from "./pages/PageEdit"

function App() {
  return (
    <Routes>
      <Route path="/" element={<TopPage />} />
      <Route path="/pages/new" element={<PageCreate />} />
      <Route path="/pages/:slug" element={<PageDetail />} />
      {/* <Route path="/pages/:id/edit" element={<PageEdit />} /> */}
      <Route path="/pages/:slug/edit" element={<PageEdit />} />

    </Routes>
  )
}

export default App
