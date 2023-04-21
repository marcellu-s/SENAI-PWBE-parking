// Botão Voltar ao Topo

const btnScrollToTop = document.querySelector("#btn-to-top");

window.addEventListener("scroll", () => {
	window.scrollY < 300
		? btnScrollToTop.classList.remove("visible")
		: btnScrollToTop.classList.add("visible");
});

btnScrollToTop.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		left: 0,
		behavior: "smooth",
	});
});
