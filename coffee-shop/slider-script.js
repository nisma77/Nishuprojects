/*---------------home page slider-----------------*/
"use strict"
document.addEventListener('DOMContentLoaded', function() {
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow');
const rightArrow = document.querySelector('.right-arrow .bxs-right-arrow');
const slider = document.querySelector('.slider');
if(slider) {
/*---------------scroll to right-----------------*/
function scrollRight(){
    if (slider && slider.scrollWidth && slider.clientWidth) {
    if(slider.scrollWidth - slider.clientWidth === slider.scrollLeft) {
        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });
    }else{
        slider.scrollBy({
            left: window.innerWidth,
            behavior: "smooth"
        });
    }
}
}

/*---------------scroll to left-----------------*/
function scrollLeft(){
    slider.scrollBy({
            left:-window.innerWidth,
            behavior:"smooth"
    });
}

let timerId = setInterval(scrollRight, 7000);

/*-----------reset timer to scroll right-------------*/
function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);
}
/*---------------scroll event-----------------*/
if (leftArrow) {
slider.addEventListener("click", function(ev){
    if(ev.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
});
}
if (rightArrow) {
slider.addEventListener("click", function(ev){
    if(ev.target === rightArrow){
        scrollRight();
        resetTimer();
    }
});
}
}
});