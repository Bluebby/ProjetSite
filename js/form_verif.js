let form = document.getElementById('Form'); // recherchez + recup les elements par id
console.log("form = "+form); // petite verification en cas d'erreur 


//Validation a chaque changement
form.ContactDate.addEventListener('change', function(){
    validContactDate(this);
});

form.prenom.addEventListener('change', function(){
    validprenom(this);
});

form.nom.addEventListener('change', function(){
    validnom(this);
});

form.email.addEventListener('change', function(){
    validEmail(this);
});

form.message.addEventListener('change', function(){
    validmessage(this);
});

//Validation a l'envoie
form.addEventListener('submit', function(e) {
    e.preventDefault();
    if(validmessage(form.message) && validEmail(form.email) && validprenom(form.prenom) && validnom(form.nom) ) { //&& validContactDate(form.ContactDate) si tout est bon alors on peut valider 
        console.log("oui");
        form.submit(); // envoyer 
    }
})


//Fonction de validation

// validation de la date d'ajd 
const validContactDate = function(inputCDate) {
    let small = inputCDate.nextElementSibling;
    let max = new Date(inputCDate.max);
    let now = new Date(inputCDate.value);
    if (inputCDate == "" || max<now ) {
        inputCDate.style.border = "solid 1px red";
        return false;
    } else {
        inputCDate.style.border = "none";
        return true;
    }
}


// validation nom sans chiffre grace au regex 
const validnom = function(inputLName) {
    let nameRegex = /\d+/;
    let small = inputLName.nextElementSibling;
    if(nameRegex.test(inputLName.value) || inputLName == "") {
        inputLName.style.border = "solid 1px red";
        return false;
    } else {
        inputLName.style.border = "none";
        return true;
    }
}

// validation prénom sans chiffre grace au regex 
const validprenom = function(inputFName) {
    let nameRegex = /\d+/;
    let small = inputFName.nextElementSibling;
    if(nameRegex.test(inputFName.value) || inputFName == "") {
        inputFName.style.border = "solid 1px red";
        return false;
    } else {   
        inputFName.style.border = "none";
        return true;
    }
}


// validation mail sans ponctuation et format valide grace au regex 
const validEmail = function(inputEmail) {
    let nameRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let small = inputEmail.nextElementSibling;
    if(!nameRegex.test(inputEmail.value) || inputEmail == "") {
        inputEmail.style.border = "solid 1px red";
        return false;
    } else {
        inputEmail.style.border = "none";
        return true;
    }
}


// message pas vide
const validmessage = function(inputContent) {
    let small = inputContent.nextElementSibling;
    if(inputContent.value == "") {
        inputContent.style.border = "solid 1px red";
        return false;
    } else {
        inputContent.style.border = "none";
        return true;
    }
}

//Limitation des dates
var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;
var years = today.getFullYear();

if (day < 10) 
	day = '0'+day;

if (month < 10) 
	month = '0'+month;

today = years+'-'+month+'-'+day;

today = new Date();
month = today.getMonth() + 2;
if (month == "13") {
	month = "01";
	years++;
}
if (month < 10) {
	month = '0'+month;
}
today = years+'-'+month+'-'+day;
document.getElementById("ContactDate").max = today;