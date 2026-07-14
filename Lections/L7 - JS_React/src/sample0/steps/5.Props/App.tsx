import './App.css'
import Video from './Video'
import reactLogo from './assets/react.svg'

function App() {
    return (
        <>
          <div className="video-container">
            <Video title="Заяць з лисою" channel="НТУ JS" preview={reactLogo} />
            <Video title="Кошеня ГАВ" channel="НТУ JS" preview={reactLogo}/>
            <Video title="Фіксіки" channel="НТУ JS" preview={reactLogo}/>
            <Video title="Collaider" channel="НТУ JS" preview={reactLogo}/>
          </div>
        </>
    );
}

export default App
