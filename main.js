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
