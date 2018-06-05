let initSlideshow = function() {
	let slideshow = document.querySelector(".slideshow");
	let container = document.querySelector(".slideshow .container");

	let changeSlide = function (dir) {
		let container = document.querySelector(".slideshow .container");
		let activeSlide = document.querySelector(".slideshow .active");
		let activeIndex = Array.from(container.children).indexOf(activeSlide);
		let newIndex = activeIndex + dir;
	
		let slideN = container.children.length;

		let parity = slideN % 2;
		
		container.classList.add("modifying");

		while (slideN - 2 * newIndex < parity) {
			// move from front to back
			container.append(container.removeChild(container.firstElementChild));
			activeIndex = Array.from(container.children).indexOf(activeSlide);
			newIndex = activeIndex + dir;
		}
		while (slideN - 2 * newIndex > parity) {
			// move from back to front
			container.prepend(container.removeChild(container.lastElementChild));
			activeIndex = Array.from(container.children).indexOf(activeSlide);
			newIndex = activeIndex + dir;
		}
	
		let translateX = 15 - activeIndex * 70;
		container.style.transform = "translateX("+ translateX +"%)";
	
		container.offsetHeight; // trigger reflow

		container.classList.remove("modifying");
		
		let newSlide = container.children.item(newIndex);

		activeSlide.classList.remove("active");
		newSlide.classList.add("active");

		let translate = 15 - (newIndex * 70);
		container.style.transform = "translateX("+ translate +"%)";
	};

	let randomIndex = Math.floor(Math.random() * container.children.length);
	let randomSlide = container.children[randomIndex];
	randomSlide.classList.add("active");
	changeSlide(0);

	let btnPrev = document.querySelector(".slideshow #prev");
	btnPrev.addEventListener("click", (evt) => changeSlide(-1));

	let btnNext = document.querySelector(".slideshow #next");
	btnNext.addEventListener("click", (evt) => changeSlide(+1));
};

document.addEventListener("DOMContentLoaded", initSlideshow);
