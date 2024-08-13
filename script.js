document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(this);

    fetch('/contact/contact.php', { 
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('response-message').textContent = 'Thank you for your message! We will get back to you soon.';
            document.getElementById('contact-form').reset(); // Clear form fields
        } else {
            document.getElementById('response-message').textContent = 'Oops! Something went wrong. Please try again.';
        }
    })
    .catch(error => {
        document.getElementById('response-message').textContent = 'Oops! Something went wrong. Please try again.';
    });
});
