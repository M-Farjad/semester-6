var myname = document.getElementById("name").value.trim();
var myphone = document.getElementById("phone").value.trim();

var letters = /^[A-Za-z]+$/;
var numbers = new RegExp('^[0-9]+$');


if (myname.value.match(letters)) {
  return true;
}
else {
  alert("Name can only contains Alphabets");
  return false;
}

if (myphone.value.match(numbers)) {
  return true;
}
else {
  alert("Phone Number can only contains Numeric Values");
  return false;
}