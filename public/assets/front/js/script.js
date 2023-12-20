$(document).ready(function () {
  let slides = document.querySelectorAll(".slide");
  let thumbnails = document.querySelectorAll(".thumbnail");
  let currentTh = document.querySelector(".thumbnail.active");
  let currentSlide = document.querySelector(".slide.show");
  let slideCount = slides.length;
  let currentSlideId = currentSlide.dataset.slide;
  let currentThId = currentTh.dataset.slide;
  let nextSlideBtn = document.querySelector(".slide-btn.next-slide");
  let prevSlideBtn = document.querySelector(".slide-btn.prev-slide");
  let nextSlideTimer = 100000;

  thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener("click", showSlide);
  });

  nextSlideBtn.addEventListener("click", nextSlide);
  prevSlideBtn.addEventListener("click", prevSlide);

  let slideshow = setInterval(nextSlide, nextSlideTimer);

  function showSlide(e) {
    let slideId = e.currentTarget.dataset.slide;
    let thId = e.currentTarget.dataset.slide;
    currentSlide.classList.remove("show");
    currentTh.classList.remove("active");
    currentSlide = document.querySelector(`.slide[data-slide="${slideId}"`);
    currentTh = document.querySelector(`.thumbnail[data-slide="${thId}"`);
    currentSlide.classList.add("show");
    currentTh.classList.add("active");

    resetSlideShow();
  }

  function nextSlide() {
    let nextSlideId =currentSlideId >= slideCount ? 1 : parseInt(currentSlideId) + 1;
      let nextSlideIdTh =currentThId >= slideCount ? 1 : parseInt(currentThId) + 1;
    currentSlide.classList.remove("show");
    currentTh.classList.remove("active");
    currentSlide = document.querySelector(`.slide[data-slide="${nextSlideId}"`);
    currentTh = document.querySelector(`.thumbnail[data-slide="${nextSlideIdTh}"`);
    currentSlideId = currentSlide.dataset.slide;
    currentThId = currentTh.dataset.slide;
    currentSlide.classList.add("show");
    currentTh.classList.add("active");
    resetSlideShow();
  }

  function prevSlide() {
    let prevSlideId =currentSlideId <= 1 ? slideCount : parseInt(currentSlideId) - 1;
    let prevSlideIdTh =currentThId <= 1 ? slideCount : parseInt(currentThId) - 1;
    currentSlide.classList.remove("show");
    currentTh.classList.remove("active");
    currentSlide = document.querySelector(`.slide[data-slide="${prevSlideId}"`);
    currentTh = document.querySelector(`.thumbnail[data-slide="${prevSlideIdTh}"`);
    currentSlideId = currentSlide.dataset.slide;
    currentThId = currentTh.dataset.slide;
    currentSlide.classList.add("show");
    currentTh.classList.add("active");
    resetSlideShow();
  }

  function resetSlideShow() {
    clearInterval(slideshow);
    slideshow = setInterval(nextSlide, nextSlideTimer);
  }
});