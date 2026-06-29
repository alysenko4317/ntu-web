<?php
require_once __DIR__ . '/includes/layout.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Каталог — Library Base</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/main.js" defer></script>
</head>
<body>

<?php renderHeader('catalog'); ?>

<main>

<section class="page-title">
  <div class="container">
    <p class="eyebrow">Каталог</p>
    <h1>Каталог книг</h1>
    <p>Пошук нижче працює на стороні клієнта засобами JavaScript, а навігація враховує стан PHP-сесії.</p>
  </div>
</section>

<section class="container section">
  <form class="search-box" id="catalog-search-form">
    <label for="book-search">Пошук за назвою, автором або категорією</label>
    <div class="search-row">
      <input type="search" id="book-search" placeholder="Наприклад: JavaScript, algorithms, database">
      <button class="btn btn-primary" type="submit">Знайти</button>
    </div>
  </form>

  <p class="muted" id="search-result-text">Показано всі книги.</p>

  <div class="book-grid catalog-grid" id="catalog-list">
    <article class="book-card" data-title="clean code" data-author="robert c. martin" data-category="programming">
      <div class="book-cover">PRG-001</div>
      <div class="book-info">
        <span class="badge">Programming</span>
        <h3>Clean Code</h3>
        <p>Robert C. Martin</p>
        <small>2008 · код PRG-001</small>
      </div>
    </article>

    <article class="book-card" data-title="design patterns" data-author="erich gamma et al." data-category="software engineering">
      <div class="book-cover">SWE-014</div>
      <div class="book-info">
        <span class="badge">Software Engineering</span>
        <h3>Design Patterns</h3>
        <p>Erich Gamma et al.</p>
        <small>1994 · код SWE-014</small>
      </div>
    </article>

    <article class="book-card" data-title="introduction to algorithms" data-author="cormen, leiserson, rivest, stein" data-category="algorithms">
      <div class="book-cover">ALG-101</div>
      <div class="book-info">
        <span class="badge">Algorithms</span>
        <h3>Introduction to Algorithms</h3>
        <p>Cormen, Leiserson, Rivest, Stein</p>
        <small>2009 · код ALG-101</small>
      </div>
    </article>

    <article class="book-card" data-title="computer networks" data-author="andrew s. tanenbaum" data-category="networks">
      <div class="book-cover">NET-220</div>
      <div class="book-info">
        <span class="badge">Networks</span>
        <h3>Computer Networks</h3>
        <p>Andrew S. Tanenbaum</p>
        <small>2011 · код NET-220</small>
      </div>
    </article>

    <article class="book-card" data-title="database system concepts" data-author="silberschatz, korth, sudarshan" data-category="databases">
      <div class="book-cover">DB-330</div>
      <div class="book-info">
        <span class="badge">Databases</span>
        <h3>Database System Concepts</h3>
        <p>Silberschatz, Korth, Sudarshan</p>
        <small>2019 · код DB-330</small>
      </div>
    </article>

    <article class="book-card" data-title="javascript: the good parts" data-author="douglas crockford" data-category="web">
      <div class="book-cover">WEB-120</div>
      <div class="book-info">
        <span class="badge">Web</span>
        <h3>JavaScript: The Good Parts</h3>
        <p>Douglas Crockford</p>
        <small>2008 · код WEB-120</small>
      </div>
    </article>
  </div>
</section>

</main>

<?php renderFooter(); ?>

</body>
</html>
