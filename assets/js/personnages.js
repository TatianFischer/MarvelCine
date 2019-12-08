// Voir le formulaire d'ajout de personnage
var btn = document.getElementById('btn-film');

var is_saw_film = false;
btn.addEventListener('click', function(e){
	// Système de toggle (main.js)
	is_saw_film = toggle(is_saw_film, "form_film", e);
	if(is_saw_orga == true){
		is_saw_orga = toggle(is_saw_orga, "form_organisation", e);
	}
})



//Voir le formulaire d'ajout de groupe
var btn_orga = document.getElementById('btn-organisation');

var is_saw_orga = false;
btn_orga.addEventListener('click', function(e){
	// Système de toggle (main.js)
	is_saw_orga = toggle(is_saw_orga, "form_organisation", e);
	if(is_saw_film == true){
		is_saw_film = toggle(is_saw_film, "form_film", e);
	}
})



// Mise à jour de la biographie
elmtBio = document.getElementById('bio').children['bio'];
elmtBio.addEventListener('focusout', function() {
	url = elmtBio.dataset.url;
	bio = elmtBio.value;
	console.log(bio);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
	    	console.log('fait');
	    }
	};
	xhttp.open("POST", url, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("bio="+bio);
});