import React, { useState, useEffect } from 'react';

// defaultValue:デフォルト値(20)
const useLocalStorage = (key, defaultValue) => {
    const [ value, setValue ] = useState(() => {
        const jsonValue = window.localStorage.getItem(key);
        // すでにLocalStorageに値が入っていればそれをvalueに返す（　useState内でのreturn文はvalue(1つ目のconst)へ値を返す）
        if (jsonValue !== null) return JSON.parse(jsonValue);
            
        return defaultValue;
    });

    useEffect(() => {
        window.localStorage.setItem(key, JSON.stringify(value));
    }, [value, setValue]);

    return [ value, setValue ];
};

export default useLocalStorage;