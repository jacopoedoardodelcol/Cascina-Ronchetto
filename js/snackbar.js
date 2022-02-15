function success() {
  var x = document.getElementById("snackbar_succ");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function notsuccess() {
  var x = document.getElementById("snackbar_notsucc");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}