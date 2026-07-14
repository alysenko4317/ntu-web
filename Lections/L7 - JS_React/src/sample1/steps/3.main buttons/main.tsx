import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import './index.css'

// Отримуємо DOM-елемент, у який React буде монтувати застосунок
const rootElement = document.getElementById('root');

// У TypeScript потрібна перевірка, бо getElementById може повернути null
if (!rootElement) {
  throw new Error('Не знайдено елемент root');
}

// Створюємо кореневий React-вузол
const reactRoot = ReactDOM.createRoot(rootElement);

reactRoot.render(
  // ЩО рендеримо: набір елементів усередині контейнера div
  <div>
    {
    React.createElement('button', {
      disabled: true,
      children: 'Натисни мене!'
    })
    }

    <br />

    {
    React.createElement('button', {
      onClick: () => console.log('CLICK')
    }, 'Кнопка!')
    }
  </div>
);