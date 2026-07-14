
import reactLogo from '../assets/react.svg'

function Video(props) {

    const {title, value} = props;

    return (
        <>
            <div className="video-container">
                <div className="video">
                    <img
                        className="video-img"
                        src={reactLogo}
                        alt="зображення відео"
                    />

                    <p>{title}</p>
                    <p>НТУ JS</p>

                    <div className="video-footer">
                        <p>Лайки: {value}</p>
                        <button>Лайк</button>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Video