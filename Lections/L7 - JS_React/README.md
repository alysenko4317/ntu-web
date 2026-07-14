# Лекція 7. Знайомство з React

## Тема

**Компонентний підхід у React та створення першого клієнтського застосунку.**

## Основний напрямок

Лекція знайомить із бібліотекою React як засобом побудови динамічних користувацьких інтерфейсів. Розглядаються причини переходу від ручної роботи з DOM до компонентної моделі, створення нового проєкту за допомогою Node.js, npm і Vite, використання JSX, побудова власних компонентів, передавання даних через `props`, відображення колекцій і керування станом за допомогою `useState`.

## Розглянуті питання

- розвиток клієнтської веброзробки та поява UI-бібліотек;
- недоліки ручного пошуку й оновлення елементів DOM;
- React як бібліотека для побудови користувацьких інтерфейсів;
- декларативний і компонентний підходи;
- Node.js та npm як інструменти фронтенд-розробки;
- створення React-проєкту за допомогою Vite;
- локальний сервер розробки та автоматичне оновлення;
- структура створеного проєкту;
- призначення `package.json`, `node_modules`, `src`, `public` та `index.html`;
- точка входу застосунку і кореневий DOM-елемент;
- JSX як поєднання JavaScript і HTML-подібної розмітки;
- перетворення JSX у звичайний JavaScript;
- функціональні компоненти;
- правила найменування компонентів;
- імпорт і експорт компонентів;
- локальні CSS-файли компонентів;
- вкладення та повторне використання компонентів;
- передавання даних через `props`;
- деструктуризація властивостей;
- вставлення JavaScript-виразів у JSX;
- відображення масиву компонентів через `map`;
- призначення властивості `key`;
- Virtual DOM і вибіркове оновлення реального DOM;
- обробка подій через `onClick`;
- відмінність звичайної змінної від стану компонента;
- хук `useState`;
- повторний рендеринг після зміни стану;
- асинхронний характер планування оновлення стану;
- `StrictMode` у середовищі розробки;
- React Developer Tools та аналіз повторних рендерингів.

---

## Демонстраційні приклади

Усі приклади розташовані в каталозі [`src/`](src/). Порядок показів на лекції — від порівняння з «голим» JS до повноцінного Vite-проєкту з компонентами, `props` і `useState`.

> **Важливо про `node_modules`.** Каталоги залежностей **не входять** до репозиторію (див. [`.gitignore`](.gitignore)). Після клонування в кожному Vite-проєкті виконайте `npm install`, потім `npm run dev`. Саме `node_modules` зазвичай становить десятки тисяч файлів — їх не потрібно ні комітити, ні пушити.

### Швидкий старт Vite-проєкту

```bash
cd "Lections/L7 - JS_React/src/sample0/react"
npm install
npm run dev
```

Аналогічно для [`sample1/react`](src/sample1/react/) та [`sample2/react-app`](src/sample2/react-app/).

---

### Порівняння: DOM vs React (без збірки) — [`src/pure_js/`](src/pure_js/), [`src/react/`](src/react/)

Два мінімальні лічильники однієї задачі («шаурма»), щоб показати різницю підходів до оновлення інтерфейсу.

| Файл | Тема | Що демонструє |
|------|------|---------------|
| [`pure_js/index.htm`](src/pure_js/index.htm) | Ручний DOM | `getElementById`, змінна лічильника, `innerText`, `addEventListener` |
| [`react/index.htm`](src/react/index.htm) | React через CDN | `React.useState`, JSX у браузері (`@babel/standalone`), оголошення UI як функції від стану |

**Як переглянути.** Відкрити файл у браузері (для React-CDN потрібен інтернет). Можна відкрити обидва поруч і порівняти код обробки кліку.

---

### Sample 0 — відеокартки: від JSX до `useState` — [`src/sample0/`](src/sample0/)

Основний наскрізний приклад лекції: список відеокарток. Готовий застосунок — у [`react/`](src/sample0/react/); поетапні зрізи коду для демонстрації на парі — у [`steps/`](src/sample0/steps/).

#### Запускабельний проєкт — [`sample0/react/`](src/sample0/react/)

| Файл / каталог | Що демонструє |
|----------------|---------------|
| [`package.json`](src/sample0/react/package.json) | залежності React + Vite |
| [`src/main.tsx`](src/sample0/react/src/main.tsx) | точка входу, монтування в `#root` |
| [`src/App.tsx`](src/sample0/react/src/App.tsx) | список через `map`, `key`, передавання `props` |
| [`src/Video/`](src/sample0/react/src/Video/) | окремий компонент + CSS + локальний `useState` (лайки) |
| [`src/videos.js`](src/sample0/react/src/videos.js) | дані для списку карток |

#### Кроки для розбору на лекції — [`sample0/steps/`](src/sample0/steps/)

Фрагменти коду (не окремі npm-проєкти). Копіюйте відповідний `App.tsx` / `Video.tsx` у [`sample0/react/src/`](src/sample0/react/) під час демонстрації або просто показуйте в редакторі.

| Крок | Каталог | Тема |
|------|---------|------|
| 0 | [`0.App.tsx/`](src/sample0/steps/0.App.tsx/) | мінімальний `App`, JSX, підключення в `main.tsx` |
| 1 | [`1.App.Video.non-styled/`](src/sample0/steps/1.App.Video.non-styled/) | розмітка «картки відео» без стилів |
| 2 | [`2.App(video-simple-styled)/`](src/sample0/steps/2.App(video-simple-styled)/) | базові стилі картки |
| 3 | [`3.App(video-styled)/`](src/sample0/steps/3.App(video-styled)/) | розвинена стилізація в `App` |
| 4 | [`4.Video.Component/`](src/sample0/steps/4.Video.Component/) | винесення в компонент `Video` |
| 5 | [`5.Props/`](src/sample0/steps/5.Props/) | передавання даних через `props` |
| 6 | [`6.Video.Component.Factor-out/`](src/sample0/steps/6.Video.Component.Factor-out/) | каталог компонента + `videos.js` + `map` |
| 7 | [`7.Likes/`](src/sample0/steps/7.Likes/) | `useState`, кнопка «Лайк», незалежний стан карток |

---

### Sample 1 — мінімальний проєкт і проблема «звичайної змінної» — [`src/sample1/`](src/sample1/)

Другий Vite-проєкт і коротші кроки навколо точки входу та оновлення UI.

#### Запускабельний проєкт — [`sample1/react/`](src/sample1/react/)

У [`App.tsx`](src/sample1/react/src/App.tsx) — кнопки Increment/Decrement на **звичайній змінній** `likes`: клік змінює значення в пам’яті, але UI не оновлюється. Це контраст перед введенням `useState`. У проєкті також лежить готовий [`Video/`](src/sample1/react/src/Video/) з лайками — його можна підключити після демонстрації проблеми зі змінною.

#### Кроки — [`sample1/steps/`](src/sample1/steps/)

| Крок | Каталог | Тема |
|------|---------|------|
| 0 | [`0.minimal project/`](src/sample1/steps/0.minimal%20project/) | мінімальний `App` / `main` |
| 1 | [`1.main describe/`](src/sample1/steps/1.main%20describe/) | розбір `main.tsx` |
| 2 | [`2.main html-instead-app/`](src/sample1/steps/2.main%20html-instead-app/) | JSX безпосередньо в точці входу |
| 3 | [`3.main buttons/`](src/sample1/steps/3.main%20buttons/) | кнопки в `main` |
| 4 | [`4.app-incr-decr/`](src/sample1/steps/4.app-incr-decr/) | Increment/Decrement без `useState` (контраст із React-станом) |

**Запуск:** як у sample0 — `npm install` і `npm run dev` у [`sample1/react/`](src/sample1/react/).

---

### Sample 2 — `props` на кількох екземплярах — [`src/sample2/react-app/`](src/sample2/react-app/)

Окремий Vite-проєкт із акцентом на повторне використання компонента `Video` і передавання різних `props` (у тому числі виклик без властивостей).

| Файл | Що демонструє |
|------|---------------|
| [`src/App.tsx`](src/sample2/react-app/src/App.tsx) | кілька `<Video ... />` з різними `title` / `value` |
| [`src/Video/Video.tsx`](src/sample2/react-app/src/Video/Video.tsx) | деструктуризація `props`, розмітка картки |

**Запуск:**

```bash
cd "Lections/L7 - JS_React/src/sample2/react-app"
npm install
npm run dev
```

---

## Що в репозиторії, а що ні

| Так (комітити) | Ні (ігнорується) |
|----------------|------------------|
| вихідний код (`src/`, `steps/`, HTML-демо) | `node_modules/` |
| `package.json`, `package-lock.json` | `dist/`, `dist-ssr/` |
| конфіги Vite / TS / ESLint | кеші IDE, `.local`, `*.docx` |

Після клонування репозиторію в каталозі лекції мають бути сотні файлів сирців, а не ~17 тис. Після `npm install` локально знову з’являться `node_modules` — це нормально і лише на вашій машині.

---

## Матеріали лекції

| Файл | Призначення |
|------|-------------|
| [`7.lecture_plan.md`](7.lecture_plan.md) | План лекції |
| [`7.lecture_notes.md`](7.lecture_notes.md) | Конспект |
| [`src/`](src/) | Демонстраційний код |

---

## Що спробувати після лекції

1. Відкрити [`pure_js/index.htm`](src/pure_js/index.htm) і [`react/index.htm`](src/react/index.htm) — порівняти, де живе «стан» і як оновлюється UI.
2. Запустити [`sample0/react`](src/sample0/react/) і додати ще одне відео в [`videos.js`](src/sample0/react/src/videos.js).
3. Прибрати `key` у `map` і подивитись попередження в консолі.
4. У картці замінити `useState` на звичайну змінну — переконатись, що лайки «не малюються».
5. Встановити [React Developer Tools](https://react.dev/learn/react-developer-tools) і увімкнути підсвічування рендерингів під час кліків по «Лайк».

---

[← Повернутися до переліку лекцій](../README.md)
