
import reactLogo from './assets/react.svg'

function Video() {
    return (
        <>
                <div className="video">
                    <img
                        className="video-img"
                        src={reactLogo}
                        alt="зображення відео" />
                    <p>Відео 1</p>
                    <p>НТУ JS</p>
                    <div className="video-footer">
                        <p>Лайки: 0</p>
                        <button>Лайк</button>
                    </div>
                </div>
        </>
    );
}

export default Video