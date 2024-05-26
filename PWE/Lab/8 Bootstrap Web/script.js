function myFunction() {
  let name = document.getElementById('name').value
  let email = document.getElementById('email').value

  // To ensure that no field should be empty
  if (name == '') {
    alert('Name is empty')
  }

  if (email == '') {
    alert('Email is empty')
  }

  // Name only contains alphabets
  if (!isNaN(name)) {
    alert('Only enter alphabets in name')
  }

  // Email validation
  if (!email.includes('@') || !email.includes('.')) {
    alert('Email is wrong')
  }
}
