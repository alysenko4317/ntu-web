
import reactLogo from './assets/react.svg'

function Video(props) {
    const {title, channel, preview} = props
    return (
        <>
                <div className="video">
                    <img
                        className="video-img"
                        src={preview}
                        alt="зображення відео" />
                    <p>{title}</p>
                    <p>{channel}</p>
                    <div className="video-footer">
                        <p>Лайки: 0</p>
                        <button>Лайк</button>
                    </div>
                </div>
        </>
    );
}

export default Video