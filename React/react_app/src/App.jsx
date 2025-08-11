import './App.css'
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './pages/Home';
import SamplePage from './pages/SamplePage';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<Home />} />
        <Route path='/sample-page' element={<SamplePage />} />
    </Routes>
  </BrowserRouter>

      /*  
      BrowserRouterタグ内でルーティングを設定するとWebページにおけるルーティングを設定可能
        Routesタグでルーティングをグループ化
          Routeタグでルーティングを設定 
            path:ルーティングのパス(URL) 
            element:ルーティング先のコンポーネント
      */

      // http://localhost:5173/ にアクセスするとHomeコンポーネントが表示される
      // http://localhost:5173/sample-page にアクセスするとSamplePageコンポーネントが表示される
  )
}
export default App
