import './App.css'
import Video from './Video/Video'
import { VIDEOS } from './videos';

function App() {
    return (
        <>
          <div className="video-container">
              {VIDEOS.map((v) => (
                  <Video
                      key={v.id}
                      title={v.title}
                      channel={v.channelName}
                      preview={v.img}
                  />
              ))}
          </div>
        </>
    );
}

export default App
