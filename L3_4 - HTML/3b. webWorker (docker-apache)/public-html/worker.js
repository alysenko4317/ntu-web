onmessage = function(e) {
  // Отримуємо число N
  const n = e.data;

  let sum = 0;
  for (let i = 1; i <= n; i++) {
    sum += i;
  }

  // Надсилаємо результат головному потоку
  postMessage({ sum });
};
