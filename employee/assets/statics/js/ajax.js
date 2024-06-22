
// AJAX registration
document.getElementById('a-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('process/register_process.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            const messageDiv = document.getElementById('form-message');
            messageDiv.innerHTML = '';

            if (data.success) {
                messageDiv.innerHTML = `<p class="success">${data.message}</p>`;
                document.getElementById('a-form').reset();
            } else {
                messageDiv.innerHTML = `<p class="error">${data.message}</p>`;
            }
        })
        .catch(error => {
            const messageDiv = document.getElementById('form-message');
            messageDiv.innerHTML = '<p class="error">An error occurred during registration.</p>';
            console.error('Error:', error);
        });
});
