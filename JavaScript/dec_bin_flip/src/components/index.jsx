import { useState } from "react";
import { useNavigate } from "react-router-dom";

export default function TopPage() {
    const [mode, setMode] = useState("basic");
    const [direction, setDirection] = useState(null);
    const navigate = useNavigate();

    const handleStart = () => {
        if (mode === "basic") {
            navigate("/basic", { state: { direction } });
        } else {
            navigate('/applied');
        }
    };
    

    return (
        <div>
            <h1>Decimal to Binary Flip</h1>
            <h2>Select Mode</h2>
            <label>
                <input
                type="radio"
                name="mode"
                value="badic"
                checked={mode === "basic"}
                onChange={() => setMode("basic")}
                />
                Basci（初級）
            </label>
            <label>
                <input
                type="radio"
                name="mode"
                value="applied"
                checked={mode === "applied"}
                onChange={() => setMode("applied")}
                />
                Applied（応用）
            </label>

            {mode === "basic" && (
                <>
                    <h2>Select Direction</h2>
                    <button 
                    onClick={() => 
                    setDirection(direction === 'decToBin' ? null : 'decToBin')
                    }
                    style = {{
                        backgroundColor: direction === 'decToBin' ? 'lightgreen' : '',
                    }}>
                        10 to 2
                    </button>

                    <button 
                    onClick={() => 
                    setDirection(direction === 'binToDec' ? null : 'binToDec')
                    }
                    style = {{
                        backgroundColor: direction === 'binToDec' ? 'lightgreen' : '',
                    }}>
                        2 to 10
                    </button>
                </>
            )}

            <br />
            <button onClick={handleStart}>Start</button>
        </div>  
    );
}