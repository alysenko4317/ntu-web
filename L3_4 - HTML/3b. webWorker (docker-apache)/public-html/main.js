// Отримуємо посилання на елементи
const inputNumber = document.getElementById('inputNumber');
const startButton = document.getElementById('startWorker');
const resultDiv = document.getElementById('result');
const statusDiv = document.getElementById('status');

// Створюємо робітника (Web Worker)
let worker;

// Обробник натискання на кнопку "Порахувати суму"
startButton.addEventListener('click', () => {
  // Очищаємо вивід
  resultDiv.textContent = '';
  statusDiv.textContent = 'Виконується...';

  const n = parseInt(inputNumber.value, 10);
  if (isNaN(n) || n <= 0) {
    statusDiv.textContent = 'Введіть коректне число > 0';
    return;
  }

  // Якщо робітник уже створений, припиняємо його
  if (worker) {
    worker.terminate();
  }

  // Створюємо нового робітника
  worker = new Worker('worker.js');

  // Надсилаємо робітнику число N
  worker.postMessage(n);

  // Отримуємо повідомлення від робітника
  worker.onmessage = (e) => {
    const { sum } = e.data;
    resultDiv.textContent = `Сума чисел від 1 до ${n} = ${sum}`;
    statusDiv.textContent = 'Готово!';
  };

  // Обробляємо помилки
  worker.onerror = (error) => {
    console.error('Помилка у робітнику:', error.message);
    statusDiv.textContent = 'Сталася помилка у робітнику.';
  };
});
