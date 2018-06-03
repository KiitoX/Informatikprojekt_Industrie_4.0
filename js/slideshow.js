let initSlideshow = function() {
	let slideshow = document.querySelector(".slideshow");

	/*
	let container = document.querySelector(".slideshow .container");
	container.addEventListener("transitionend", (evt) => {
		console.log("swish");
		//debugger;
		
		let container = document.querySelector(".slideshow .container");
		let activeSlide = document.querySelector(".slideshow .active");
		let activeIndex = Array.from(container.children).indexOf(activeSlide);

		let slideN = container.children.length;

		let parity = (slideN) % 2;

		container.classList.add("modifying");

		while (slideN - 2 * activeIndex < -parity) {
			console.log(slideN - 2 * activeIndex, " > ", +parity);
			// move from front to back
			container.append(container.removeChild(container.firstElementChild));
			activeIndex = Array.from(container.children).indexOf(activeSlide);
		}
		while (slideN - 2 * activeIndex > +parity) {
			console.log(slideN - 2 * activeIndex, " < ", -parity);
			// move from back to front
			container.prepend(container.removeChild(container.lastElementChild));
			activeIndex = Array.from(container.children).indexOf(activeSlide);
		}

		activeIndex = Array.from(container.children).indexOf(activeSlide);

		let translateX = 15 - activeIndex * 70;
		if (container.style.transform !== "translateX("+ translateX +"%)") {
			container.style.transform = "translateX("+ translateX +"%)";
		}

		window.getComputedStyle();

		container.classList.remove("modifying");
	});*/

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

	let btnPrev = document.querySelector(".slideshow #prev");
	btnPrev.addEventListener("click", (evt) => changeSlide(-1));

	let btnNext = document.querySelector(".slideshow #next");
	btnNext.addEventListener("click", (evt) => changeSlide(+1));
};

document.addEventListener("DOMContentLoaded", initSlideshow);
