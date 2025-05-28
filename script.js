const menuToggle = document.getElementById("menu-toggle");
const openMenuBtn = document.getElementById("open-menu-btn");
const closeMenuBtn = document.getElementById("close-menu-btn");
const nav = document.getElementById("nav");

menuToggle.addEventListener("click", () => {
  nav.classList.toggle("active");

  const isActive = nav.classList.contains("active");

  if (isActive) {
    openMenuBtn.classList.remove("active");
    closeMenuBtn.classList.add("active");
  } else {
    openMenuBtn.classList.add("active");
    closeMenuBtn.classList.remove("active");
  }
});

// Domyślne ustawienie ikon
openMenuBtn.classList.add("active");
closeMenuBtn.classList.remove("active");

// Animacja sekcji przy scrollowaniu
const sections = document.querySelectorAll(".section");

function showSections() {
  const triggerBottom = window.innerHeight * 0.85;

  sections.forEach((section) => {
    const sectionTop = section.getBoundingClientRect().top;

    if (sectionTop < triggerBottom) {
      section.classList.add("active");
    }
  });
}

window.addEventListener("scroll", showSections);

// Na start
showSections();

document.querySelectorAll("nav ul li a").forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.remove("active");
    openMenuBtn.classList.add("active");
    closeMenuBtn.classList.remove("active");
  });
});
