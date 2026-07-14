import { StrictMode } from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App.tsx'

const rootElement = document.getElementById('root');
const reactRoot = ReactDOM.createRoot(rootElement!);

reactRoot.render(
  <StrictMode>
    <App />
  </StrictMode>,
);
