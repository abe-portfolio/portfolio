import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import MyInfoContext, { myInfo } from './MyInfoContext.jsx'

createRoot(document.getElementById('root')).render(
  /*
  <StrictMode>
    <App />
  </StrictMode>,
  */

  <MyInfoContext.Provider value={myInfo}>
    <StrictMode>
      <App />
    </StrictMode>
  </MyInfoContext.Provider>
)


export default MyInfoContext;
