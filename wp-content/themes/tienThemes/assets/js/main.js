const swiper = new Swiper(".swiper", {
  loop: true,

  pagination: {
    el: ".swiper-pagination",
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// event scroll
const headerScroll = document.getElementById("header");
window.addEventListener("scroll", function () {
  if (window.scrollY > 70) {
    // this.alert("Scroll OK");
    headerScroll.classList.add("scroll");
  } else {
    headerScroll.classList.remove("scroll");
  }
});

// event scroll menu
window.addEventListener('scroll', () => {
    const activeLi = document.querySelector('.header-menu li.current-menu-item');

    if (activeLi) {
        if (window.scrollY > 100) {
            activeLi.classList.add('is-scrolled');
        } else {
            activeLi.classList.remove('is-scrolled');
        }
    }
});

// event click bars
const bars = document.querySelector(".bars");
const backdrop = document.querySelector(".backdrop");
bars.addEventListener("click", () => {
  backdrop.classList.toggle("active");
});
// event click search
const searchIcon = document.querySelector(".header-search");
const formSearch = document.querySelector(".form-search");
searchIcon.addEventListener("click", function () {
  alert("Đã click");
  formSearch.classList.toggle("active");
});
// event close search
const closeSearch = document.querySelector(".close-search");
closeSearch.addEventListener("click", function () {
  formSearch.classList.remove("active");
});
// event back-to-top
const backTop = document.querySelector(".back-to-top");
window.addEventListener("scroll", function () {
  backTop.classList.toggle("show", window.scrollY > 1000);
});
backTop.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
