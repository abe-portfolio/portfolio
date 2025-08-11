// Routing実装前（HOOKSの userState と UserEffect まで）

import './App.css'
//import 関数名 from 'ファイル名（拡張子無し）'
//       **関数名だが、厳密には「export default 関数名;」（関数をエクスポートしている）
import { useState } from 'react';
import Button from './components/Button/Button'
import Display from './components/Display/Display';

function App() {
  // HOOKS(useState）：Reactで状態管理を行うための機能（関数）
  // count:状態を持つ変数  seuCount：変数（count）の値を更新するための関数
  const [count, setCount] = useState(0);
  const handleClick = () => {
    setCount(count + 1);
  }

  /*
  // HOOKS(useEffect)：副作用（本来の動き以外の処理）を行うための機能（関数）
  // 第1引数：副作用を行う処理（callback関数）
  // 第2引数：副作用を行うタイミング（countが変化したら第一引数の処理を行う）
  // 第2引数に空配列を渡すと、コンポーネントを読み込んだ初回のみ実行できる
  useEffect(() => {
    console.log('count:', count);
    if(count > 15){
      setCount(0);
    }
  }, [count])
  */


  return (
    // <></>は空のフラグメント
    // Reactでは複数のタグを書きたい場合は、それらのタグの親として何かしらのタグで囲む必要がある
    <>
     <h1>Hello World</h1>
      {/* <Button />  JSXでの関数の呼び出し（Button()と同じイメージ */}
      <Button type="button" disabled={false} onClick={handleClick}>
        {/* Button.jsxのprops.childrenに渡される内容（開始タグ～終了タグ内の内容） */}
        {/* 【Children用テキスト】 */}
        Button
      </Button>
      <Display count={count} />
    </>
  )
}

export default App
