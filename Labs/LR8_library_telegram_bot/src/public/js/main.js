document.addEventListener("DOMContentLoaded", () => {
  const navToggle = document.querySelector(".nav-toggle");
  const siteNav = document.querySelector(".site-nav");
  const authLinks = document.querySelector(".auth-links");

  if (navToggle && siteNav && authLinks) {
    navToggle.addEventListener("click", () => {
      siteNav.classList.toggle("open");
      authLinks.classList.toggle("open");
    });
  }

  initCatalogSearch();
  initForms();
  initPasswordStrength();
});

function initCatalogSearch() {
  const form = document.querySelector("#catalog-search-form");
  const input = document.querySelector("#book-search");
  const cards = Array.from(document.querySelectorAll("#catalog-list .book-card"));
  const resultText = document.querySelector("#search-result-text");

  if (!form || !input || cards.length === 0) {
    return;
  }

  function filterBooks() {
    const query = input.value.trim().toLowerCase();
    let visibleCount = 0;

    cards.forEach((card) => {
      const haystack = [
        card.dataset.title || "",
        card.dataset.author || "",
        card.dataset.category || ""
      ].join(" ");

      const visible = haystack.includes(query);
      card.classList.toggle("hidden", !visible);

      if (visible) {
        visibleCount++;
      }
    });

    if (resultText) {
      resultText.textContent = query
        ? `Знайдено книг: ${visibleCount}.`
        : "Показано всі книги.";
    }
  }

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    filterBooks();
  });

  input.addEventListener("input", filterBooks);
}

function initForms() {
  const forms = document.querySelectorAll("form[novalidate]");

  forms.forEach((form) => {
    form.addEventListener("submit", (event) => {
      event.preventDefault();
      const isValid = validateForm(form);
      const message = form.querySelector(".form-message");

      if (message) {
        if (isValid) {
          message.textContent = "Форма заповнена коректно. У статичній версії дані не надсилаються на сервер.";
          message.className = "form-message success";
        } else {
          message.textContent = "Перевірте поля форми.";
          message.className = "form-message error";
        }
      }
    });

    form.querySelectorAll("input, select, textarea").forEach((field) => {
      field.addEventListener("input", () => validateField(field));
      field.addEventListener("change", () => validateField(field));
    });
  });
}

function validateForm(form) {
  let valid = true;
  const fields = form.querySelectorAll("input, select, textarea");

  fields.forEach((field) => {
    if (!validateField(field)) {
      valid = false;
    }
  });

  const password = form.querySelector("[name='password']");
  const confirm = form.querySelector("[name='password_confirm']");

  if (password && confirm && password.value !== confirm.value) {
    setFieldError(confirm, "Паролі не збігаються.");
    valid = false;
  }

  return valid;
}

function validateField(field) {
  let message = "";

  if (field.required && !field.value.trim()) {
    message = "Поле обов’язкове для заповнення.";
  } else if (field.type === "email" && field.value && !isEmail(field.value)) {
    message = "Введіть коректну email-адресу.";
  } else if (field.minLength > 0 && field.value && field.value.length < field.minLength) {
    message = `Мінімальна довжина: ${field.minLength} символів.`;
  }

  setFieldError(field, message);
  return message === "";
}

function setFieldError(field, message) {
  const error = field.parentElement.querySelector(".field-error");
  if (error) {
    error.textContent = message;
  }

  field.setAttribute("aria-invalid", message ? "true" : "false");
}

function isEmail(value) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}

function initPasswordStrength() {
  const password = document.querySelector("#reader-password");
  const strength = document.querySelector("#password-strength");

  if (!password || !strength) {
    return;
  }

  password.addEventListener("input", () => {
    const value = password.value;
    let text = "Мінімум 6 символів.";

    if (value.length >= 10 && /[A-ZА-Я]/.test(value) && /\d/.test(value)) {
      text = "Надійний пароль.";
    } else if (value.length >= 6) {
      text = "Середній пароль.";
    }

    strength.textContent = text;
  });
}
