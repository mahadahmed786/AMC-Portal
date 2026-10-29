/* Adds a captions button to the lesson player.
   Plyr hides YouTube's own controls, so the CC button never appears. */
(function () {
	var style = document.createElement("style");
	style.textContent =
		".sidra-cc{color:#fff}" +
		".sidra-cc[aria-pressed='false']{opacity:0.7}" +
		".sidra-cc svg{width:18px;height:18px;display:block;fill:currentColor}" +
		".sidra-cc .sidra-cc-off{display:none}" +
		".sidra-cc[aria-pressed='false'] .sidra-cc-off{display:block}";
	document.documentElement.appendChild(style);

	function send(iframe, func, args) {
		if (!iframe || !iframe.contentWindow) return;
		iframe.contentWindow.postMessage(
			JSON.stringify({
				event: "command",
				func: func,
				args: args || [],
			}),
			"*"
		);
	}

	function apply(iframe, on) {
		if (on) {
			send(iframe, "loadModule", ["captions"]);
			send(iframe, "setOption", [
				"captions",
				"track",
				{ languageCode: "en" },
			]);
			return;
		}
		send(iframe, "setOption", ["captions", "track", {}]);
		send(iframe, "unloadModule", ["captions"]);
	}

	function attach(player) {
		if (!player.classList.contains("plyr--youtube")) return;
		if (player.querySelector("[data-sidra-cc]")) return;
		var controls = player.querySelector(".plyr__controls");
		var iframe = player.querySelector("iframe");
		if (!controls || !iframe) return;

		var button = document.createElement("button");
		button.type = "button";
		button.className = "plyr__controls__item plyr__control sidra-cc";
		button.setAttribute("data-sidra-cc", "1");
		button.setAttribute("aria-pressed", "true");
		button.setAttribute("aria-label", "Turn captions off");
		button.innerHTML =
			'<svg viewBox="0 0 18 18" aria-hidden="true"><path d="M1 4.5h16v9H1zM2.2 5.7v6.6h13.6V5.7zM4.3 7.2c1.45 0 2.35.78 2.55 1.85H5.4c-.12-.48-.5-.75-1.08-.75-.78 0-1.28.5-1.28 1.2s.5 1.2 1.28 1.2c.58 0 .96-.27 1.08-.75h1.45c-.2 1.07-1.1 1.85-2.55 1.85-1.58 0-2.65-1.05-2.65-2.3s1.07-2.3 2.65-2.3zm6.15 0c1.45 0 2.35.78 2.55 1.85h-1.45c-.12-.48-.5-.75-1.08-.75-.78 0-1.28.5-1.28 1.2s.5 1.2 1.28 1.2c.58 0 .96-.27 1.08-.75h1.45c-.2 1.07-1.1 1.85-2.55 1.85-1.58 0-2.65-1.05-2.65-2.3s1.07-2.3 2.65-2.3z"/><path class="sidra-cc-off" d="M3.2 15.4 14.8 2.6l1 0.9L4.2 16.3z"/></svg>' +
			'<span class="plyr__tooltip">Captions</span>';

		button.addEventListener("click", function (event) {
			event.preventDefault();
			event.stopPropagation();
			var turnOn = button.getAttribute("aria-pressed") !== "true";
			button.setAttribute("aria-pressed", turnOn ? "true" : "false");
			button.setAttribute(
				"aria-label",
				turnOn ? "Turn captions off" : "Turn captions on"
			);
			button.dataset.choice = turnOn ? "on" : "off";
			apply(iframe, turnOn);
		});

		var fullscreen = controls.querySelector('[data-plyr="fullscreen"]');
		if (fullscreen) controls.insertBefore(button, fullscreen);
		else controls.appendChild(button);
	}

	function scan() {
		document.querySelectorAll(".plyr--youtube").forEach(attach);
	}

	var pending = 0;
	var observer = new MutationObserver(function () {
		if (pending) return;
		pending = window.setTimeout(function () {
			pending = 0;
			scan();
		}, 50);
	});
	observer.observe(document.documentElement, {
		childList: true,
		subtree: true,
	});
	scan();
})();
