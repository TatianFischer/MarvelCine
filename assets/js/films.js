// Voir la bande annonce

var see_annonce = document.querySelectorAll("#menuBA > div > a");

var ba_is_saw  = false;
see_annonce[2].addEventListener('click', function(e) {
	ba_is_saw = toggle(ba_is_saw, 'bande_annonce', e);
});




var form_cover_is_saw = false;
// Voir le formulaire d'ajout des affiches
see_annonce[1].addEventListener('click', function(e){
	form_cover_is_saw = toggle(form_cover_is_saw, 'form_cover', e);
})





// Voir le formulaire d'ajout de personnage
var btn = document.getElementById('btn-hero');
var form_perso_is_saw = false;

btn.addEventListener('click', function(e){
	form_perso_is_saw =  toggle(form_perso_is_saw, 'form_perso', e);
})







// Carrousel sur les affiches
var covers = document.querySelectorAll("#covers ul li");
//console.log(covers);

var nb = 0;
var lastMainAffiche;
var newMainAffiche;
var heightFinale = "800px";
//console.log(heightFinale);

// Création de l'évènement click
for (var i = 0; i < covers.length; i++) {

	covers[i].addEventListener('click', function(e){

		nb = parseInt(e.target.classList.value);

		getAfficheOutId = setInterval(getAfficheOut);

		lastMainAffiche = document.getElementById("mainAffiche");

		heightFinale = parseInt(getComputedStyle(lastMainAffiche).height);

	});
}


// Animation
function getAfficheOut(){
	height = parseInt(getComputedStyle(lastMainAffiche).height) - 1;

	if(height > 1){
		lastMainAffiche.style.height = height+"px";
		
	} else {
		//  On bouge l'id de figure>img
		lastMainAffiche.id = "";
		lastMainAffiche.style.height = "100%";

		// Selection de la nouvelle affiche mise en avant
		newMainAffiche = document.querySelectorAll("#conteneurAffiches figure")[nb];

		newMainAffiche.id = "mainAffiche";
		newMainAffiche.style.height = "0px";
		//newMainAffiche.style.display = "block";
		
		// Arrêt de l'animation
		clearInterval(getAfficheOutId);

		// Lancement de l'animation affichant la nouvelle affiche
		//getAfficheIn();
		getAfficheInId = setInterval(getAfficheIn);
	}
}

function getAfficheIn(){
	
	height = height + 1;

	if(height <= heightFinale){

		document.getElementById("mainAffiche").style.height = height+"px";
		//console.log(parseInt(getComputedStyle(test).height));
		//console.log(test);
		
	} else {

		clearInterval(getAfficheInId);
		
	}
}