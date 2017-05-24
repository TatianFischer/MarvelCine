var hamburger = document.querySelectorAll("label");
var class_hamburger = hamburger[0].classList;

hamburger[0].addEventListener("click", function(){
	var add = true;
	console.log(class_hamburger);

	for(i = 0 ; i < class_hamburger.length ; i++ ){
		if(class_hamburger[i] == "is-active"){
			add = false;
		}
	}

	if(add){
		class_hamburger.add("is-active");
	} else {
		class_hamburger.remove("is-active");
	}
	console.log(class_hamburger);
})