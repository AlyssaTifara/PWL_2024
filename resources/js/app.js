import './bootstrap';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Function to handle the edit button click
function modalAction(url) {
    axios.get(url)
        .then(response => {
            // Populate the modal with the response data
            $('#modal-master').html(response.data);
            $('#modal-master').modal('show');
        })
        .catch(error => {
            console.error('Error loading edit form:', error);
            alert('An error occurred while loading the edit form.');
        });
}

// Attach the modalAction function to the edit buttons
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-warning').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            modalAction(url);
        });
    });
});
