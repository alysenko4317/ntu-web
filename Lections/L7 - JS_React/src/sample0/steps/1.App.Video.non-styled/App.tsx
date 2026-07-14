import { useState } from 'react'
import reactLogo from './assets/react.svg'
import './App.css'

function App() {
    return (
        <>
            <div>  {/* контейнер для всіх карток */}
                <div>  {/* картка */}
                    <img src={reactLogo} alt="зображення відео" />
                    <p>Відео 1</p>
                    <p>НТУ JS</p>

                    <div>
                        <p>Лайки: 0</p>
                        <button>Лайк</button>
                    </div>
                </div>
            </div>
        </>
    );
}

export default App
