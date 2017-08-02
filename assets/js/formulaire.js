/*-----------LABEL FLOTTANT--------------*/
function floatLabel(inputType){
	listFormGroup = document.querySelectorAll(inputType);
	//console.log(listFormGroup);

	for(var formGroup of listFormGroup){

		var input = formGroup.lastElementChild;

		//console.log(input);

		if(input.type != "submit"){
			
			// Effet en cas de retour serveur pour formulaire non valide.
			if(input.value != "" || input.value !== 'blank'){

				label = input.previousElementSibling;
				if(label.tagName != "LABEL"){
					label = label.previousElementSibling;
				}

				label.classList.add('active');
			}


			
			input.addEventListener('focus', function(){

				label = this.previousElementSibling;
				if(label.tagName != "LABEL"){
					label = label.previousElementSibling;
				}
				label.classList.add('active');

			});



			input.addEventListener('blur', function(){

				if(this.value == "" || this.value === 'blank'){

					label = this.previousElementSibling;
					label.classList.remove('active');
				}		

			});

		}

		listChild = formGroup.children;
		//console.log(listChild);
		for(i = 0; i < listChild.length; i++){
			if(listChild[i].tagName == "SELECT"){

				listChild[i].addEventListener('focus', function(){

					label = this.previousElementSibling;
					label.classList.add('active');

				})

				/*listChild[i].addEventListener('blur', function(){

					label = this.previousElementSibling;
					label.classList.remove('active');

				})*/

			}
		}
	}
}

// just add a class of "floatLabel to the input field!"
// Au redimenssionement de la page
window.addEventListener("resize", function(){
	if(parseInt(window.innerWidth) <= 768){
		floatLabel("#form_affiche .form-group");	
		floatLabel("#form_comment .form-group");	
	}
})

// Au chargement de la page
if(parseInt(window.innerWidth) <= 768){
	floatLabel("#form_affiche .form-group");	
	floatLabel("#form_comment .form-group");	
}







/* Ajout du champ nouveau réalisateur */
var elmtSelect = document.getElementById('director');

if(elmtSelect){
	ajoutNewDirector();

	elmtSelect.addEventListener("change", function(){
		
		ajoutNewDirector();

	})
}



// Disparition du champ select et ajout du champ input type text.
function ajoutNewDirector(){
	valueSelect = elmtSelect.value;

	if(valueSelect == 'other'){
		elmtSelect.style.display = "none";

		elmtInput = elmtSelect.nextElementSibling;
		elmtInput.style.display = "inline-block";

	}
}