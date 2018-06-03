let initSlideshow = function() {
	let slideshow = document.querySelector(".slideshow");

	let changeSlide = function (dir) {
		let container = document.querySelector(".slideshow .container");
		let slides = Array.from(container.children);
		let firstSlide = slides[0];
		let lastSlide = slides[slides.length-1];
		let activeSlide = document.querySelector(".slideshow .active");
		let activeIndex = slides.indexOf(activeSlide);
		let newIndex = activeIndex + dir;

		container.classList.add("modifying");

		if (newIndex == 0) {
			newIndex = 1;
			let pastTranslate = 15 - ((newIndex - dir) * 70);
			container.removeChild(lastSlide);
			container.insertBefore(lastSlide, firstSlide);
			container.style.transform = "translateX("+ pastTranslate +"%)";
		} else if (newIndex == slides.length - 1) {
			newIndex = slides.length - 2;
			let pastTranslate = 15 - ((newIndex - dir) * 70);
			container.removeChild(firstSlide);
			container.appendChild(firstSlide);
			container.style.transform = "translateX("+ pastTranslate +"%)";
		}
	
		container.classList.remove("modifying");

		let slideWidth = activeSlide.width;

		let newSlide = document.querySelector(".slideshow .container :nth-child("+ (newIndex + 1) +")");

		activeSlide.classList.remove("active");
		newSlide.classList.add("active");

		let translate = 15 - (newIndex * 70);
		container.style.transform = "translateX("+ translate +"%)";
	};

	let btnPrev = document.querySelector(".slideshow #prev");
	btnPrev.addEventListener("click", (evt) => changeSlide(-1));

	let btnNext = document.querySelector(".slideshow #next");
	btnNext.addEventListener("click", (evt) => changeSlide(+1));
};

document.addEventListener("DOMContentLoaded", initSlideshow);
