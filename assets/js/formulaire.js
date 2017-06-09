/*-----------LABEL FLOTTANT--------------*/
function floatLabel(inputType){
	listFormGroup = document.querySelectorAll(inputType);
	console.log(listFormGroup);

	for(var formGroup of listFormGroup){

		var input = formGroup.lastElementChild;

		//console.log(input);

		if(formGroup.lastElementChild.type != "submit"){
			
			input.addEventListener('focus', function(){

				label = this.previousElementSibling;
				console.log(label.classList);
				label.classList.add('active');
				console.log(label.classList);

			});

			input.addEventListener('blur', function(){

				if(this.value == "" || this.value === 'blank'){

					label = this.previousElementSibling;
					console.log(label.classList);
					label.classList.remove('active');
					console.log(label.classList);
				}		

			});
		}
	}
	/*$(inputType).each(function(){
		var $this = $(this);
		// on focus add class active to label
		$this.focus(function(){
			$this.next().addClass("active");
		});
		//on blur check field and remove class if needed
		$this.blur(function(){
			if($this.val() === '' || $this.val() === 'blank'){
				$this.next().removeClass();
			}
		});
	});*/
}

// just add a class of "floatLabel to the input field!"
floatLabel(".form-group");