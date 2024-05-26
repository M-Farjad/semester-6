function validateForm() {
    var name = document.querySelector("input[name=name]");
    var city = document.querySelector("input[name=city]");
    var postcode = document.querySelector("input[name=postcode]");
    var errorFields = document.querySelectorAll(".error-message");
  
    // Clear any previous error messages
    errorFields.forEach(function(field) {
      field.textContent = "";
    });
  
    // Validate name
    if (!name.value.match(/^[a-zA-Z]+$/)) {
      name.classList.add("error-field");
      name.nextElementSibling.textContent = "Name must only contain letters.";
      return false;
    }
  
    // Validate city
    if (!city.value.match(/^[a-zA-Z]+$/)) {
      city.classList.add("error-field");
      city.nextElementSibling.textContent = "City must only contain letters.";
      return false;
    }
  
    // Validate postcode
    if (!postcode.value.match(/^\d{6}$/)) {
      postcode.classList.add("error-field");
      postcode.nextElementSibling.textContent = "Postcode must be 6 digits.";
      return false;
    }
  
    // Check for empty fields
    for (var i = 0; i < document.forms[0].elements.length; i++) {
      if (document.forms[0].elements[i].value == "" && document.forms[0].elements[i].required) {
        document.forms[0].elements[i].classList.add("error-field");
        document.forms[0].elements[i].nextElementSibling.textContent = "This field is required.";
        return false;
      }
    }
  
    return true;
  }
  