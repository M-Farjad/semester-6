function onclick(){
    console.log("NOUMI MURRE RAHTA HAI")
    var name = document.getElementById("name").value;
    var Fname = document.getElementById("father_name")
    var phone = document.getElementById("phone");
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var citySelect = document.getElementById('citySelect');
    var gender = document.getElementById("Gender");
    var dateOfBirth = document.getElementById("dateOfBirth");
    var summary = document.getElementById("Summary");

    validateName(name);
    validateName(Fname);
    validatePhone(phone);
    validateEmail(email);
    validatePassword(password);
    validateCity(citySelect);
    validateGender(gender);
    validateSummary(summary);

    return false;
    // validateFatherName();

}

function validateName(name){
    var isValid = true;
    if(name == ""){
        isValid = false;
    }
    if(!isNaN(name)){
        isValid = false;
    }
    if(!isValid){
        alert("Please Enter a valid Name");
    }
}

function validatePhone(phone){
    var isValid = true;
    if(phone == ""){
        isValid = false;
    }
    if(isNaN(phone)){
        isValid = false;
    }
    if(!isValid){
        alert("Please Enter a valid Phone Number");
    }
}

function validateEmail(email){
    var isValid = true;
    if(email == ""){
        isValid = false;
    }
    atPosition = email.indexOf("@");
    dotPosition = email.lastIndexOf(".");
    if(atPosition < 1 || dotPosition < atPosition + 2 || dotPosition + 2 >= email.length){
        isValid = false;
    }
    if(!isValid){
        alert("Please Enter a valid Email");
    }
}

function validatePassword(password){
    var isValid = true;
    if(password == ""){
        isValid = false;
    }
    if(password.length < 8){
        isValid = false;
    }
    firstChar = password.charAt(0);
    if(!isNaN(firstChar)){
        isValid = false;
    }
    if(password.length>12){
        isValid = false;
    }
    if(!isValid){
        alert("Please Enter a valid Password");
    }
}

function validateCity(citySelect){
    var isValid = true;
    if(citySelect == "Select Your City"){
        isValid = false;
    }
    if(!isValid){
        alert("Please Select a valid City");
    }
}

function validateGender(gender){
    var isValid = true;
    if(gender === ""){
        isValid = false;
    }
    if(!isValid){
        alert("Please select a valid gender");
    }
}

function validateSummary(summary){
    var isValid = true;
    if(summary == ""){
        isValid = false;
    }
    if(summary.length < 50){
        isValid = false;
    }
    if(!isValid){
        alert("Please Enter a valid Summary");
    }

}