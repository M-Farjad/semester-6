document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    var formData = new FormData(this);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'profile.php';
        } else {
            document.getElementById('error-message').textContent = data.message;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
