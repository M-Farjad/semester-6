function myFunction() {
  let name = document.getElementById('name').value
  let name_elm = document.getElementById('name')
  let city_town = document.getElementById('town').value
  let city_town_elm = document.getElementById('town')
  let postal_code = document.getElementById('Postcode').value
  let postal_code_elm = document.getElementById('Postcode')

  // Name only contains alphabets
  if (!isNaN(name)) {
    name_elm.style.borderColor = 'red'
    alert('Only enter alphabets in name')
    exit();
  } else {
  }

  // Town_city only contains alphabets
  if (!isNaN(city_town)) {
    city_town_elm.style.borderColor = 'red'
    alert('Only enter alphabets in City_Town')
    exit();

  } else {
  }

  // postal_code only contains numbers
  postal_code_elm.style.borderColor = 'red'
  if (isNaN(postal_code)) {
    alert('postal_code must only contains numerical values')
    exit();

  } else {
  }

  // Length of postal_code should be 6
  if (postal_code.length != 6) {
    postal_code_elm.style.borderColor = 'red'
    alert('postal_code must contains excatly 6 digits')
  } else {
  }
}
