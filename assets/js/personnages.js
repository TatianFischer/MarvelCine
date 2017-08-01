// Voir le formulaire d'ajout de personnage
var btn = document.getElementById('btn-film');

var is_saw = false;
btn.addEventListener('click', function(e){
	// Système de toggle (main.js)
	is_saw = toggle(is_saw, "form_film", e);
})