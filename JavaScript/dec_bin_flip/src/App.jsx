import { BrowserRouter, Routes, Route } from "react-router-dom";
import TopPage from "./components/index";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<TopPage />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;