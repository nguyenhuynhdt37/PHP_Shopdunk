// video intro
var video = document.getElementById("pencil-video");
var video1 = document.getElementById("mac-video");
video.addEventListener("click", function () {
    if (video.paused == false) {
        video.pause();
    }
    else {
        video.play();
    }
});
video1.addEventListener("click", function () {
    if (video1.paused == false) {
        video1.pause();
    }
    else {
        video1.play();
    }
});
// scroll to top
const scrollToTopBtn = document.getElementById('scrollToTopBtn');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 100) {
        scrollToTopBtn.style.display = 'block';
    } else {
        scrollToTopBtn.style.display = 'none';
    }
});

scrollToTopBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
// Left/Right Button
document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.benefits__list');
    const leftBtn = document.querySelector('.left-btn');
    const rightBtn = document.querySelector('.right-btn');

    leftBtn.addEventListener('click', function () {
        container.scrollLeft -= 400;
    });

    rightBtn.addEventListener('click', function () {
        container.scrollLeft += 400;
    });
});


