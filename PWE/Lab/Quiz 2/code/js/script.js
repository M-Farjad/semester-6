function handleSubmit() {
    
        // Validate name field
        var name = $('#name').val();
        if (name.trim() === '') {
            alert('Please enter your name');
            return;
        }

        // Validate email field
        var email = $('#email').val();
        if (email.trim() === '') {
            alert('Please enter your email');
            return;
        }
        // Validate email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address');
            return;
        }

        // Validate message field
        var message = $('#message').val();
        if (message.trim() === '') {
            alert('Please enter your message');
            return;
        }
    
}