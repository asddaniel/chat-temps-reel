document.formulaire.addEventListener("submit", function(e){
e.preventDefault();
let pseudo = this.pseudo.value;
let password = this.password.value;
let requette = new XMLHttpRequest();
requette.open("GET", "http://127.0.0.1:8000/traitement?pseudo="+pseudo+"&pass="+password);

let formulaire = new FormData();
formulaire.append("pseudo", pseudo)
formulaire.append("password", password)
formulaire.append("formulaire", "inscription");
requette.send(formulaire);

requette.onreadystatechange = function(){
	if(requette.readyState == 4 && requette.status == 200){
		alert(requette.responseText);
		window.location.href = "http://127.0.0.1:8000/users"
	}
}
});