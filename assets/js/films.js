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

	console.log('hello');
	
	height = height + 1;

	if(height <= heightFinale){

		document.getElementById("mainAffiche").style.height = height+"px";
		//console.log(parseInt(getComputedStyle(test).height));
		//console.log(test);
		
	} else {

		clearInterval(getAfficheInId);
		btnDisable();
		
	}
}


var btnLeft = document.getElementById("left");
var btnRight = document.getElementById("right");
var allAffiche = document.querySelectorAll("#conteneurAffiches figure");

function nbCover(){
	for(i = 0 ; i < allAffiche.length ; i++){
		if(allAffiche[i].id == "mainAffiche"){
			nb_cover = i;
			break;
		}
	}

	return nb_cover;
}

// Boutons précédent et suivant
function btnDisable(){

	nb_cover = nbCover();

	if(nb_cover == 0){
		btnLeft.className = "disable";
		btnRight.className = "";
	}else if(nb_cover == (allAffiche.length - 1)){
		btnRight.className = "disable";
		btnLeft.className = "";
	} else {
		btnLeft.className = "";
		btnRight.className = "";
	}
}

btnDisable();

// Affiche précédente
btnLeft.addEventListener('click', function(){
	lastMainAffiche = document.getElementById("mainAffiche"); 
	nb = nbCover() - 1;
	heightFinale = parseInt(getComputedStyle(lastMainAffiche).height);
	getAfficheOutId = setInterval(getAfficheOut);
})

btnRight.addEventListener('click', function(){
	lastMainAffiche = document.getElementById("mainAffiche");
	heightFinale = parseInt(getComputedStyle(lastMainAffiche).height);
	nb = nbCover() + 1;
	getAfficheOutId = setInterval(getAfficheOut);
})