var see_annonce = document.querySelectorAll("#menuBA > div > a");


see_annonce[1].addEventListener('click', function(e) {
	e.preventDefault();
	document.getElementById('bande_annonce').style.display = "block";
});



// Carrousel sur les bandes annonces
var covers = document.querySelectorAll("#covers ul li");
//console.log(covers);

var nb = 0;
var lastMainAffiche;
var newMainAffiche;
var heightFinale = "800px";
//console.log(heightFinale);

// Création de l'évèneùent click
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
		
		// Arrêt de l'animation
		clearInterval(getAfficheOutId);

		// Lancement de l'animation affichant la nouvelle affiche
		getAfficheInId = setInterval(getAfficheIn);
	}
}

function getAfficheIn(){
	height = parseInt(getComputedStyle(newMainAffiche).height) +1;
	
	if(height <= heightFinale){

		newMainAffiche.style.height = height+"px";
		
	} else {

		clearInterval(getAfficheInId);
		
	}
}