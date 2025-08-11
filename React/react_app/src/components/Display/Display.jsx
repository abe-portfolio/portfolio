import { useState, useEffect } from 'react';

function Display(props) {

    const [text, setText] = useState('Loading...');
    useEffect(() => {
        setTimeout(() => {
            setText(`count: ${props.count}`);
        }, 2000);
    }, [props.count])

    return (
        <div>
           {/* count:{props.count} */}
           {text}
        </div>
    )
}

export default Display;