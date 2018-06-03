"use strict";

let uid = function(a) { // https://gist.github.com/jed/982883
	return a ? (a ^ Math.random() * 16 >> a / 4).toString(16) :
		([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, uid);
}

let counter = function(method, ondone) {
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		if (req.readyState === XMLHttpRequest.DONE) {
			if (req.status === 200) {
				ondone(req);
			} else {
				console.error(req.responseText);
			}
		}
	};
	req.open(method, "./counter.php", true); // asynchronous request
	req.send();
};

// http://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm

let cookieConsent = function() {
	let consent = Cookies.get("CookieConsent");

	if (consent) { // consent cookie set
		manageCookies();
	} else { // consent cookie not set
		// show cookie message
		document.querySelector("#cookie-notice").classList.remove("hidden");
		
		// get count preemptively
		showCounter();
		
		let oninteract = function() {
			// hide cookie message
			document.querySelector("#cookie-notice").classList.add("hidden");
			manageCookies();
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
}

let manageCookies = function() {
	let consent = Cookies.get("CookieConsent");
	
	let cookie_settings = {}

	if (consent === "true") { // consent given
		// permanent cookie: expires after one year (maximum expire time compliant with eu law)
		cookie_settings.expires = 365;
		// refresh expire time of consent cookie
		Cookies.set("CookieConsent", "true", {expires: 365});
	} else { // consent not given
		// session cookie: when no expire time is set, it should expire on browser exit (depends on browser implementation)
	}
	
	let visitor_uid = Cookies.get("VisitorUID");

	if (visitor_uid) { // not a new visitor
		// just show visitor counter
		showCounter();
	} else { // visitor_uid cookie not set, we asume this is a new visitor
		// generate new random uid
		visitor_uid = uid();
		// send increment to server and show counter when that finishes
		counter("POST", showCounter);
	}
	
	// set/refresh cookies to extend expire time
	Cookies.set("CookieConsent", consent, cookie_settings);
	Cookies.set("VisitorUID", visitor_uid, cookie_settings);
}

let showCounter = function() {
	// request visitor count from server
	counter("GET", function(req) {
		// set count to value received from server
		document.querySelector("#counter span").textContent = req.responseText;
	});
};

document.addEventListener("DOMContentLoaded", cookieConsent);
