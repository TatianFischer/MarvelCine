see_annonce = document.querySelectorAll("#menuBA > div > a");


see_annonce[1].addEventListener('click', function(e) {
	e.preventDefault();
	document.getElementById('bande_annonce').style.display = "block";
});