document.addEventListener('DOMContentLoaded', function() {
    // Check if success message is present in the URL and display success alert
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');
    if (success === 'true') {
        alert('Insertion successful!');
    }
});
