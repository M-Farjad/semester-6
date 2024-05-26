function func() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!emailRegex.test(email)) {
        // Handle invalid email
        alert('Invalid email');
        return;
    }

    if (!passwordRegex.test(password)) {
        // Handle invalid password
        alert('Invalid password');
        return;
    }

    // Valid email and password, continue with your logic
}