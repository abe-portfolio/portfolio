import {
   useState,
   useEffect, 
   useContext, 
   useRef, 
   useReducer, 
   useMemo, 
   useCallback 
  } from 'react';
import './App.css';
import MyInfoContext from './main.jsx';
import SomeChild from './SomeChild.jsx';
import useLocalStorage from './useLocalStorage.jsx';

// useReducer
const reducer = (state, action) => {
  switch (action.type) {
    case 'increment':
      return state + 1;
    case 'decrement':
      return state - 1;
    default:
      return state;
  }
}

function App() {
  // useState
  const [count, setCount] = useState(0);
  const handleClick = () => {
    setCount(count + 1);
  }


  // useEffect
  useEffect(() => {
    console.log('Hello Hooks');
  }, []);

  useEffect(() => {
    if (count > 0) {
      console.log('count up!');
    }
  }, [count]);


  // useContext
  const MyInfo = useContext(MyInfoContext);


  // useRef
  const ref = useRef();
  const handleRef = () => {
    console.log(ref);
  };


  // useReducer
  const [state, dispatch] = useReducer(reducer, 0);


  // useMemo
  const [count01, setCount01] = useState(0);
  const [count02, setCount02] = useState(0);
  /*
  const square = () => {
    let i = 0;
    // 重い処理として適当に用意(useStateで毎回レンダリング（上から下までコードを再読み込み）されるため、毎回この重い処理が実行される)
    while (i < 1000000000) {
      i++;
    }
    return count02 * count02;
  }
  */
 // useNemo()で囲むことで、関係ない部分での再レンダリング時に重い処理を実行しないようにできる（第二引数で発火トリガーを設定
  const square = useMemo(() => {
    let i = 0;
    while (i < 1000000000) {
      i++;
    }
    return count02 * count02;
  }, [count02]);


  // useCallback  関数のメモ化
  const [ counter, setCounter ] = useState(0);
  /*
  const showCount = () => {
    alert(`これは重い処理です。`);
  }
  */
  const showCount = useCallback(() => {
    alert(`これは重い処理です。`);
  }, [counter]);


  // カスタムフック
  const [ age, setAge ] = useLocalStorage('age', 20);


  return (
    <div className='App'>
      <h1>useState, useEffect</h1>
      <button onClick={() => handleClick()}>+</button>
      <p>count: {count}</p>

      <hr />

      <h1>useContext</h1>
      <p>{MyInfo.name}</p>
      <p>{MyInfo.age}</p>
      <p>{MyInfo.city}</p>

      <hr />

      <h1>useRef</h1>
      <input type="text" ref={ref}/>
      <button onClick={handleRef}>useRef</button>

      <hr />

      <h1>useReducer</h1>
      <p>state: {state}</p>
      <button onClick={() => dispatch({ type: 'increment' })}>+</button>
      <button onClick={() => dispatch({ type: 'decrement' })}>-</button>
      
      <hr />

      <h1>useMemo</h1>
      <div>count1:{count01}</div>
      <div>count2:{count02}</div>
      <div>result:{square}</div>
      <button onClick={() => setCount01(count01 + 1)}>count1++</button>
      <button onClick={() => setCount02(count02 + 1)}>count2++</button>

      <hr />

      <h1>useCallback</h1>
      <p>counter: {counter}</p>
      <button onClick={() => setCounter(counter + 1)}>counter++</button>
      <SomeChild showCount={showCount} />

      <hr />

      <h1>カスタムフック</h1>
      <p>{age}</p>
      <button onClick={() => setAge(80)}>年齢をセット</button>
    </div>
  );
}

export default App;


/*
useState
  状態管理を行う（レンダリングを行い、ユーザーに見えるものを更新する）
　　　　const [count, setCount] の "setCount" は任意の名称でも良い(慣習でset⚪︎⚪︎とすることが多い)
　　　　useStateの動き
　　　　　　　　仮想DOMと実DOMの差分を検知して、実際のDOMを更新する。
　　　　　　　　仮想DOMは２つあり、状態の前後を監視する。仮想DOMの差分と実DOMの差分を比較し、実DOMを更新する。
　　　　　　　　→ 読み込みやこ更新速度が向上する

--------------------------------
useEffect
  副作用を行う
  第二引数への指定で発火のタイミングを設定できる
  useEffectを複数書く場合は、
  　　　　useEffect(() => {}, [a]);
    useEffect(() => {}, [b]);
    useEffect(() => {}, [c]);
  のように、第二引数へのトリガーの設定で異なるタイミング、副作用を設定する。
  空の配列（[]）を第二引数に設定すると、最初のみ発火する。

  また、React 18以降だと、main.jsxに「<StrictMode>」が記載してあるが、
  これにより、useEffectが二度発火する。

  useEffectの中でsetCountを記述し、トリガーにsetCnountで更新する値を設定すると無限ループになるので注意

--------------------------------
useContext
  Reduxのストアを使用する。
  コンポーネント間で値を共有するためのフック
  普通の props では 親 → 子 にしか値を渡せませんが、useContext を使うと どの階層のコンポーネントでも同じ値にアクセスできるようになる
  ただし、useContextはパフォーマンスが悪いので、Reduxの方が良い。

  main.jsxで、createContextを使用して、値を設定する。
  　　　　export default createContext名;
  App.jsxで、useContextを使用して、main.jsxで定義した変数名を受け取る（MyInfoContext）ことで、変数のß値を取得する。
  　　　　import createContext名 from './main.jsx';

  ESサイトやSNSなどでログイン状態などを共有するために使用される
  Reduxに方がいいらしい
  　　useContect :コンテキストで囲んだ範囲
   Reduc      :アプリ全体

--------------------------------
useRef
  　挙動：（１）　const ref = useRef(); でrefオブジェクトを作成 　  // ref = { current: null }
  　　　　　　　　　（２）　 <input type="text" ref={ref}/> で ref.current にHTMLInputElement(inputのDOM)が代入される  // ref = { current: HTMLInputElement }
  Reactの中で変化しても再レンダリングを起こさない“箱”を作るフック
  テキストに入力した内容を取得する時などに使用できる（ref.current.valueのように様々な情報を取得できる）

--------------------------------
useReducer
  ほとんど使わないかも。
  Reducer：状態を管理するための関数
  Dispatch：状態を更新するための関数
  Action：状態を更新するためのアクション
  State：状態
  useReducer：状態を管理するためのフック

--------------------------------
useMemo
  メモ化（ブラウザのメモリに情報を保存する）
  重い処理を行う場合に使用する(パフォーマンスチューニングなどの際に使用する)
  第二引数への指定で発火のタイミングを設定できる
  useMemoを複数書く場合は、
  　　　　useMemo(() => {}, [a]);
    useMemo(() => {}, [b]);
    useMemo(() => {}, [c]);
  のように、第二引数へのトリガーの設定で異なるタイミング、重い処理を設定する。
  ※多用するとパフォーマンスが悪くなるので注意（塩梅が大事）

--------------------------------
useCallback
  　callback関数をメモ化するためのフック
  第二引数への指定で発火のタイミングを設定できる
  親コンポーネントがレンダリングされると子コンポーネントもレンダリングされるため、useCallbackを使用することで、子コンポーネントの再レンダリングを防ぐことができる。
  useCallbackを複数書く場合は、
  　　　　useCallback(() => {}, [a]);
    useCallback(() => {}, [b]);
    useCallback(() => {}, [c]);
  のように、第二引数へのトリガーの設定で異なるタイミング、callback関数を設定する。
  ※多用するとパフォーマンスが悪くなるので注意（塩梅が大事）

  関数を再生成するかどうかを決めるフックであって、関数を実行するフックではない。
  　　→ 第二引数の変数の値が変わったときに、第一引数の関数を再作成する
   → 実行までさせたいなら、どこかでonClick={showCount}のようにshowCountを呼び出す記述が必要

   現在、useCallbackのbuttonタグでは、onClick={() => setCounter(counter + 1)となっており、
   showCount関数の再作成までしか行えない。
   これを、onClick={() => 任意の関数　　とし、
   const 任意の関数 = () => {
    setCounter(counter + 1)
    showCount(); 
  };
    のように定義することで、一括でshowCount関数の再作成とshowCount関数の実行を行うことができる。

--------------------------------
カスタムフック
  関数を作成し、その関数をuseStateやuseEffectなどのフックを使用することで、コンポーネント内で使用することができる。
  カスタムフックを使用することで、コンポーネント内で使用することができる。
  useLocalStorage:ローカルストレージ(クライアントのブラウザ）を使用するためのフックで、KeyとValueをセットして保存する
　　　　ローカルストレージは、ブラウザのデータベースに保存されるため、ブラウザを閉じてもデータが保存される。
  
  
  
  
  
  


--------------------------------
*/