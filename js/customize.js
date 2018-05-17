let idToName = {
	b0: "body_0",
	b1: "body_1",
	b2: "body_2",
	b3: "body_3",
	b4: "body_4",
	b5: "body_5",
	b6: "body_6",
	b7: "body_7",
	b8: "body_8",

	h0: "blonde",
	h1: "brunette",
	h2: "dark",
	h3: "ginger",
	h4: "lightblue",
	h5: "pink",
	h6: "purple",
	h7: "straw",
	h8: "white",

	e0: "blue",
	e1: "brown",
	e2: "green",
	e3: "lightblue",
	e4: "purple",
	e5: "dark",
};

let selectionChanged = function() {
	let img = document.querySelector("#preview img");

	let body, hair, eyes;
	
	document.querySelectorAll("#selection input[type='radio']:checked")
		.forEach(function(elem) {
			if (elem.id.startsWith("b")) {
				body = idToName[elem.id];
			} else if (elem.id.startsWith("h")) {
				hair = idToName[elem.id];
			} else if (elem.id.startsWith("e")) {
				eyes = idToName[elem.id];
			}
	});

	img.src = `./maids/${body}/${hair}|${eyes}|${body}.png`;
};

let addHandler = function() {
	document.querySelector("#selection form")
		.addEventListener("change", selectionChanged);
};

document.addEventListener("DOMContentLoaded", addHandler);
