// Detect CSS Grid support
// https://codepen.io/kamakalolii/pen/MpraLZ
document.body.classList.add(
	typeof document.createElement("div").style.grid === "string" ? "css-grid" : "no-css-grid"
);
