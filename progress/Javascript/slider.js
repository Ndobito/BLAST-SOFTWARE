const slider = document.querySelector('.slider');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const indicatorsContainer = document.querySelector('.slider-indicators');
const indicators = document.querySelectorAll('.slider-indicators button');
const sliderWidth = slider.clientWidth;
const slidesCount = slider.children.length;

let currentSlide = 0;
let intervalId;

function moveSlide() {
  slider.style.transform = `translateX(-${currentSlide * sliderWidth}px)`;
  indicators[currentSlide].classList.add('active');
  for (let i = 0; i < slidesCount; i++) {
    if (i !== currentSlide) {
      indicators[i].classList.remove('active');
    }
  }
}

function startSlider() {
  intervalId = setInterval(() => {
    currentSlide = (currentSlide + 1) % slidesCount;
    moveSlide();
  }, 3000);
}

function stopSlider() {
  clearInterval(intervalId);
}

prevBtn.addEventListener('click', () => {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = slidesCount - 1;
  }
  moveSlide();
  stopSlider();
});

nextBtn.addEventListener('click', () => {
  currentSlide++;
  if (currentSlide >= slidesCount) {
    currentSlide = 0;
  }
  moveSlide();
  stopSlider();
});


   
