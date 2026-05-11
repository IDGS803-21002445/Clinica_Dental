window.addEventListener("scroll", function () {
  const nav = document.querySelector(".main-nav");
  if (!nav) return;

  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
});

// Estado inicial por si la página carga ya desplazada
document.addEventListener("DOMContentLoaded", function () {
  const nav = document.querySelector(".main-nav");
  if (!nav) return;
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  }
});

AOS.init({
  duration: 900,
  easing: "ease-in-out",
  once: true,
});

// Contador animado para estadísticas
const counters = document.querySelectorAll(".counter");

counters.forEach((counter) => {
  counter.innerText = "0";

  const updateCounter = () => {
    const target = +counter.getAttribute("data-target");
    const current = +counter.innerText;

    const increment = target / 100;

    if (current < target) {
      counter.innerText = Math.ceil(current + increment);
      setTimeout(updateCounter, 20);
    } else {
      counter.innerText = target;
    }
  };

  // Iniciar animación al entrar en el viewport
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        updateCounter();
        observer.unobserve(counter);
      }
    });
  });

  observer.observe(counter);
});