import styles from './Button.module.css';
// styleという変数名でCSSをimportしている


function Button(props) {
    /* --- propsとchildrenの学習用コード ---
    // props 親要素から値を受け取る（この場合はApp.jsx）
    // childrenは親要素のタグの間に書かれたテキストなどを受け取る
    const { type, disabled, children} = props;
    */

    const { type, disabled, onClick, children } = props;

    /* --- propsとchildrenの学習用コード ---
    // const + アロー関数で関数を定義するパターンが一般的
    // constで関数宣言した場合は巻き上げられないため、呼び出しより前に記述する
    const handleClick = () => {
        alert('Button clicked');
    }
    const message = "Click me";
    */
   
    return (
        <>
            {/* --- propsとchildrenの学習用コード ---
            <button className={styles.BlueButton} type={type} disabled={disabled} onClick={handleClick}>
                {message}
                {children}
            </button>
            */}

            <button className={styles.BlueButton} type={type} disabled={disabled} onClick={onClick}>
                {children}
            </button>
        </>
    )
}

export default Button;