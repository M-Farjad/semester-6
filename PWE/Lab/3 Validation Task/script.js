function myFunction() {
  let name = document.getElementById('name').value
  let password = document.getElementById('password').value
  let retype_password = document.getElementById('retype-password').value
  let phone = document.getElementById('phone').value
  let email = document.getElementById('email').value

  // // To ensure that no field should be empty
  // if (name == '') {
  //   alert('Name is empty')
  // }
  // if (password == '') {
  //   alert('Password is empty')
  // }
  // if (retype_password == '') {
  //   alert('Retype Rassword is empty')
  // }
  // if (phone == '') {
  //   alert('Phone is empty')
  // }
  // if (email == '') {
  //   alert('Email is empty')
  // }

  // // Name only contains alphabets
  // if (!isNaN(name)) {
  //   alert('Only enter alphabets in name')
  // }

  // // Password should be of length at-least 6
  // if (password.length < 6) {
  //   alert('Password must contains at least 6 characters')
  // }

  // // Retype password must be equal to Password
  // if (password != retype_password) {
  //   alert('Retype password must be equal to the password')
  // }

  // Phone number only contains numbers
  if (isNaN(phone)) {
    alert('Phone number must only contains digits')
  }

  // Length of phone number should be 11
  if (phone.length != 11) {
    alert('Phone number must contains at least 11 digits')
  }

  // // Email validation
  // if (!email.includes('@') || !email.includes('.')) {
  //   alert('Email is wrong')
  // }
}
