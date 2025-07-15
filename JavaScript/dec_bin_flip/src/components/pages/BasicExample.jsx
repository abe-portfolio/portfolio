import React, { useState } from 'react';
import './BasicExample.css';

// 1. 関数コンポーネントの基本形
const BasicExample = () => {
  // 2. useStateフック - 状態管理
  const [count, setCount] = useState(0);
  const [name, setName] = useState('');
  const [isVisible, setIsVisible] = useState(true);

  // 3. イベントハンドラー
  const handleIncrement = () => {
    setCount(count + 1);
  };

  const handleDecrement = () => {
    setCount(count - 1);
  };

  const handleNameChange = (event) => {
    setName(event.target.value);
  };

  const toggleVisibility = () => {
    setIsVisible(!isVisible);
  };

  // 4. 条件付きレンダリング
  const renderConditionalContent = () => {
    if (count > 5) {
      return <p className="high-count">カウントが5を超えました！</p>;
    } else if (count < 0) {
      return <p className="negative-count">カウントが負の値です</p>;
    } else {
      return <p className="normal-count">カウントは0-5の範囲です</p>;
    }
  };

  // 5. リストレンダリング
  const items = ['りんご', 'バナナ', 'オレンジ', 'ぶどう'];

  return (
    <div className="basic-example">
      <h1>React基本練習</h1>
      
      {/* 6. JSXの基本 */}
      <section className="section">
        <h2>1. JSXの基本</h2>
        <p>これはJSXで書かれたHTMLです</p>
        <div className="code-example">
          &lt;p&gt;これはJSXで書かれたHTMLです&lt;/p&gt;
        </div>
      </section>

      {/* 7. 状態管理 */}
      <section className="section">
        <h2>2. 状態管理 (useState)</h2>
        <div className="counter">
          <p>カウント: {count}</p>
          <button onClick={handleIncrement}>+1</button>
          <button onClick={handleDecrement}>-1</button>
        </div>
        {renderConditionalContent()}
      </section>

      {/* 8. フォーム処理 */}
      <section className="section">
        <h2>3. フォーム処理</h2>
        <input
          type="text"
          value={name}
          onChange={handleNameChange}
          placeholder="名前を入力してください"
          className="name-input"
        />
        {name && <p>こんにちは、{name}さん！</p>}
      </section>

      {/* 9. 条件付きレンダリング */}
      <section className="section">
        <h2>4. 条件付きレンダリング</h2>
        <button onClick={toggleVisibility}>
          {isVisible ? '非表示にする' : '表示する'}
        </button>
        {isVisible && (
          <div className="toggle-content">
            <p>この内容は条件付きで表示されています</p>
          </div>
        )}
      </section>

      {/* 10. リストレンダリング */}
      <section className="section">
        <h2>5. リストレンダリング</h2>
        <ul className="fruit-list">
          {items.map((item, index) => (
            <li key={index} className="fruit-item">
              {item}
            </li>
          ))}
        </ul>
      </section>

      {/* 11. インラインスタイル */}
      <section className="section">
        <h2>6. インラインスタイル</h2>
        <div style={{
          backgroundColor: '#e3f2fd',
          padding: '20px',
          borderRadius: '8px',
          border: '2px solid #2196f3'
        }}>
          <p style={{ color: '#1976d2', fontWeight: 'bold' }}>
            これはインラインスタイルでスタイリングされています
          </p>
        </div>
      </section>

      {/* 12. クラス名の動的変更 */}
      <section className="section">
        <h2>7. 動的クラス名</h2>
        <div className={`dynamic-box ${count > 3 ? 'highlight' : 'normal'}`}>
          <p>カウントが3を超えると色が変わります</p>
          <p>現在のカウント: {count}</p>
        </div>
      </section>
    </div>
  );
};

export default BasicExample; 