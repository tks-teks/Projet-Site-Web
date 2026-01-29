const counters = document.querySelectorAll('[data-count]');

const animateCounter = (el) => {
  const target = parseFloat(el.dataset.count);
  const isFloat = !Number.isInteger(target);
  let current = 0;

  const update = () => {
    const increment = target / 60;
    current = Math.min(target, current + increment);
    el.textContent = isFloat ? current.toFixed(2) : Math.floor(current);

    if (current < target) {
      requestAnimationFrame(update);
    }
  };

  update();
};

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.6 }
);

const revealItems = document.querySelectorAll('.reveal');

const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.2 }
);

counters.forEach((counter) => observer.observe(counter));
revealItems.forEach((item) => revealObserver.observe(item));
