"use strict";

let counter = function(method, ondone) {
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		if (req.readyState === XMLHttpRequest.DONE) {
			if (req.status === 200) {
				ondone(req);
			} else {
				console.err(req.responseText);
			}
		}
	};
	req.open(method, "./counter.php", true); // asynchronous request
	req.send();
};

// http://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm

let cookies = function() {
	let visitor_uid = '1234'; // TODO generate somehow

	let consent = Cookies.get("CookieConsent");

	if (consent) { // consent cookie set
		let cookie_settings = {}

		if (consent === "true") { // consent given
			// permanent cookie, expires after one year (maximum expire time compliant with eu law)
			cookie_settings.expires = 365;
		} else { // consent not given
			// session cookie, when no expire time is set, the cookie will expire on browser exit
		}
		
		if (Cookies.get("VisitorUID")) { // not a new visitor
			showCounter(); // just show visitor counter
		} else { // visitor_uid cookie not set, we asume this is a new visitor
			Cookies.set("VisitorUID", visitor_uid, cookie_settings);
			counter("POST", showCounter); // send increment to server and show counter when the post finishes
		}
	} else { // consent cookie not set
		document.querySelector("#cookie-notice").classList.remove("hidden"); // show cookie message
		
		let oninteract = function() {
			document.querySelector("#cookie-notice").classList.add("hidden"); // hide cookie message
			cookies(); // rerun this method
		};
		
		document.querySelector("#cookie-notice #accept-cn").addEventListener("click", function() {
			Cookies.set("CookieConsent", "true", {expires: 365});
			oninteract();
		});
		document.querySelector("#cookie-notice #reject-cn").addEventListener("click", function() {
			Cookies.set("CookieConsent", "false");
			oninteract();
		});
	}
};

let showCounter = function() {
	counter("GET", function(req) { // request visitor count
		document.querySelector("#counter span").textContent = req.responseText;
	});
};

document.addEventListener("DOMContentLoaded", cookies);
