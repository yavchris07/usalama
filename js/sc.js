// var swiper = new Swiper(".slide-content", {
//     slidesPerView: 3,
//     centeredSlides: false,
//     slidesPerGroupSkip: 1,
//     grabCursor: true,
//     keyboard: {
//       enabled: true,
//     },
//     breakpoints: {
//       769: {
//         slidesPerView: 2,
//         slidesPerGroup: 2,
//       },
//     },
//     scrollbar: {
//       el: ".swiper-scrollbar",
//     },
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//   });

var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    // autoPlay:true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
  },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
});

//autoPlay

/*
var swiper = new Swiper(".slide-content", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
*/ 

// =========================
// function autoplayCarousel() {
//   const carouselEl = document.getElementById("online");
//   const slideContainerEl = carouselEl.querySelector("#slide-container");
//   const slideEl = carouselEl.querySelector(".slide");
//   let slideWidth = slideEl.offsetWidth;
//   // Add click handlers
//   document.querySelector("#back-button")
//       .addEventListener("click", () => navigate("backward"));
//   document.querySelector("#forward-button")
//       .addEventListener("click", () => navigate("forward"));
//   document.querySelectorAll(".slide-indicator")
//       .forEach((dot, index) => {
//           dot.addEventListener("click", () => navigate(index));
//           dot.addEventListener("mouseenter", () => clearInterval(autoplay));
//       });
//   // Add keyboard handlers
//   document.addEventListener('keydown', (e) => {
//       if (e.code === 'ArrowLeft') {
//           clearInterval(autoplay);
//           navigate("backward");
//       } else if (e.code === 'ArrowRight') {
//           clearInterval(autoplay);
//           navigate("forward");
//       }
//   });
//   // Add resize handler
//   window.addEventListener('resize', () => {
//       slideWidth = slideEl.offsetWidth;
//   });
//   // Autoplay
//   const autoplay = setInterval(() => navigate("forward"), 3000);
//   slideContainerEl.addEventListener("mouseenter", () => clearInterval(autoplay));
//   // Slide transition
//   const getNewScrollPosition = (arg) => {
//       const gap = 10;
//       const maxScrollLeft = slideContainerEl.scrollWidth - slideWidth;
//       if (arg === "forward") {
//           const x = slideContainerEl.scrollLeft + slideWidth + gap;
//           return x <= maxScrollLeft ? x : 0;
//       } else if (arg === "backward") {
//           const x = slideContainerEl.scrollLeft - slideWidth - gap;
//           return x >= 0 ? x : maxScrollLeft;
//       } else if (typeof arg === "number") {
//           const x = arg * (slideWidth + gap);
//           return x;
//       }
//   }
//   const navigate = (arg) => {
//       slideContainerEl.scrollLeft = getNewScrollPosition(arg);
//   }
//   // Slide indicators
//   const slideObserver = new IntersectionObserver((entries, observer) => {
//       entries.forEach(entry => {
//           if (entry.isIntersecting) {
//               const slideIndex = entry.target.dataset.slideindex;
//               carouselEl.querySelector('.slide-indicator.active').classList.remove('active');
//               carouselEl.querySelectorAll('.slide-indicator')[slideIndex].classList.add('active');
//           }
//       });
//   }, { root: slideContainerEl, threshold: .1 });
//   document.querySelectorAll('.slide').forEach((slide) => {
//       slideObserver.observe(slide);
//   });
// }
// autoplayCarousel();


let carousel = document.querySelector('.carousel');

let carouselInner = document.querySelector('.carousel-inner');

let prev = document.querySelector('.carousel-controls .prev');

let next = document.querySelector('.carousel-controls .next');

let slides =  document.querySelectorAll('.carousel-inner .carousel-item');

let totalSlides = slides.length;

let step = 100 / totalSlides;

let activeSlide = 0;

let activeIndicator = 0;

let direction = -1;

let jump = 1;

let interval = 2000;

let time;



//Init carousel
carouselInner.style.minWidth = (totalSlides * 100) + '%';
loadIndicators();
loop(true);


//Carousel events

next.addEventListener('click',()=>{
    slideToNext();
});

prev.addEventListener('click',()=>{
    slideToPrev();
});

carouselInner.addEventListener('transitionend',()=>{
    if(direction === -1){
        if(jump > 1){
            for(let i = 0; i < jump; i++){
                activeSlide++;
                carouselInner.append(carouselInner.firstElementChild);
            }
        }else{
            activeSlide++;
            carouselInner.append(carouselInner.firstElementChild);
        }
    }else if(direction === 1){
        if(jump > 1){
            for(let i = 0; i < jump; i++){
                activeSlide--;
                carouselInner.prepend(carouselInner.lastElementChild);
            }
        }else{
            activeSlide--;
            carouselInner.prepend(carouselInner.lastElementChild);
        }
    };

    carouselInner.style.transition = 'none';
    carouselInner.style.transform = 'translateX(0%)';
    setTimeout(()=>{
        jump = 1;
        carouselInner.style.transition = 'all ease .5s';
    });
    updateIndicators();
});

document.querySelectorAll('.carousel-indicators span').forEach(item=>{
    item.addEventListener('click',(e)=>{
        let slideTo = parseInt(e.target.dataset.slideTo);
        
        let indicators = document.querySelectorAll('.carousel-indicators span');

        indicators.forEach((item,index)=>{
            if(item.classList.contains('active')){
                activeIndicator = index
            }
        })

        if(slideTo - activeIndicator > 1){
            jump = slideTo - activeIndicator;
            step = jump * step;
            slideToNext();
        }else if(slideTo - activeIndicator === 1){
            slideToNext();
        }else if(slideTo - activeIndicator < 0){

            if(Math.abs(slideTo - activeIndicator) > 1){
                jump = Math.abs(slideTo - activeIndicator);
                step = jump * step;
                slideToPrev();
            }
                slideToPrev();
        }
        step = 100 / totalSlides; 
    })
});

carousel.addEventListener('mouseover',()=>{
    loop(false);
})

carousel.addEventListener('mouseout',()=>{
    loop(true);
})

//Carousel functions

function loadIndicators(){
    slides.forEach((slide,index)=>{
        if(index === 0){
            document.querySelector('.carousel-indicators').innerHTML +=
            `<span data-slide-to="${index}" class="active"></span>`;
        }else{
            document.querySelector('.carousel-indicators').innerHTML +=
            `<span data-slide-to="${index}"></span>`;
        }
    }); 
};

function updateIndicators(){
    if(activeSlide > (totalSlides - 1)){
        activeSlide = 0;
    }else if(activeSlide < 0){
        activeSlide = (totalSlides - 1);
    }
    document.querySelector('.carousel-indicators span.active').classList.remove('active');
    document.querySelectorAll('.carousel-indicators span')[activeSlide].classList.add('active');
};

function slideToNext(){
    if(direction === 1){
        direction = -1;
        carouselInner.prepend(carouselInner.lastElementChild);
    };
    
    carousel.style.justifyContent = 'flex-start';
    carouselInner.style.transform = `translateX(-${step}%)`;
};

function slideToPrev(){
    if(direction === -1){
        direction = 1;
        carouselInner.append(carouselInner.firstElementChild);
    };
    carousel.style.justifyContent = 'flex-end'
    carouselInner.style.transform = `translateX(${step}%)`;
};

function loop(status){
    if(status === true){
        time = setInterval(()=>{
            slideToNext();
        },interval);
    }else{
        clearInterval(time);
    }
}

//
//let interval = 2000;