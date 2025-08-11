import { Link } from 'react-router-dom';

function Home() {
    return (
        <>
            <h1>Home</h1>
            {/* Linkタグでルーティング先のページへのリンクを作成(aタグのようなもの) */}
            {/* to属性でルーティング先のページへのリンクを作成 */}
            <Link to='/sample-page'>SamplePageへ</Link>
            {/* target='_blank'で新しいタブで開く */}
            {/* <Link to='/sample-page' target='_blank'>SamplePageへ</Link> */}
        </>
    )
}

export default Home;