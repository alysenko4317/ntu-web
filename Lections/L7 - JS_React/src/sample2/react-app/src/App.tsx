import { useState } from 'react'
import Video from './Video/Video.tsx'

import './App.css'

function App() {

    return (
        <>
            <Video title="Відео 1" value='123'/>
            <Video title="Відео 2" value='A'/>
            <Video title="Відео 3" value='B'/>
            <Video title="Відео 4" value='C'/>

            <Video />
        </>
    );
}

export default App
