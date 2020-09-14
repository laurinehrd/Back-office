function connexion(){
  document.getElementById('connexion').style.display = "block";
  document.getElementById('inscription').style.display = "none";
}
function inscription(){
  document.getElementById('inscription').style.display = "block";
  document.getElementById('connexion').style.display = "none";
}

// check if it's the same password
var email = document.getElementById('email');
var password = document.getElementById('password');
var passwordVerif = document.getElementById('passwordVerif');
var button = document.getElementById('submit');

passwordVerif.addEventListener('input', function(){
  if(password.value == passwordVerif.value){
    submit.removeAttribute('disabled');
  }
});


// partie backoffice
function countries(){
  document.getElementById('form_countries').style.display = "flex";
  document.getElementById('form_events').style.display = "none";
  document.getElementById('form_news').style.display = "none";
  document.getElementById('form_services').style.display = "none";
  document.getElementById('form_testimonial').style.display = "none";
}
function events(){
  document.getElementById('form_events').style.display = "flex";
  document.getElementById('form_countries').style.display = "none";
  document.getElementById('form_news').style.display = "none";
  document.getElementById('form_services').style.display = "none";
  document.getElementById('form_testimonial').style.display = "none";
}
function news(){
  document.getElementById('form_news').style.display = "flex";
  document.getElementById('form_events').style.display = "none";
  document.getElementById('form_countries').style.display = "none";
  document.getElementById('form_services').style.display = "none";
  document.getElementById('form_testimonial').style.display = "none";
}
function services(){
  document.getElementById('form_services').style.display = "flex";
  document.getElementById('form_events').style.display = "none";
  document.getElementById('form_news').style.display = "none";
  document.getElementById('form_countries').style.display = "none";
  document.getElementById('form_testimonial').style.display = "none";
}
function testimonial(){
  document.getElementById('form_testimonial').style.display = "flex";
  document.getElementById('form_events').style.display = "none";
  document.getElementById('form_news').style.display = "none";
  document.getElementById('form_services').style.display = "none";
  document.getElementById('form_countries').style.display = "none";
}



// verif js
// var inscription = document.getElementById('inscription');
//
// inscription.addEventListener('submit', function(){
//   if(password.value != '' && email.value != '' && passwordVerif.value != ''){
//     return true;
//   }else {
//     if (password.value == '') {
//       alert('Mot de passe requis');
//     }
//     if (email.value == '') {
//       alert('Email requis');
//     }
//     if (passwordVerif.value == '') {
//       alert('Mot de passe requis');
//     }
//     return false;
//   }
// })
//
//
// var connexion = document.getElementById('connexion');
//
// connexion.addEventListener('submit', function(){
//   if(password.value != '' && email.value != ''){
//     return true;
//   }else {
//     if (password.value == '') {
//       alert('Mot de passe requis');
//     }
//     if (email.value == '') {
//       alert('Email requis');
//     }
//     return false;
//   }
// })
