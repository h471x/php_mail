// Prevent form submission and handle search action with AJAX
document.getElementById('searchForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission behavior

  // Get search query
  const searchQuery = document.getElementById('searchInput').value;

  // Perform search action with AJAX (You can customize this part as needed)
  // Example: Fetch search results from server and display them without reloading the page
  fetch('/php_mail/controllers/search.php?q=' + encodeURIComponent(searchQuery))
      .then(response => response.text())
      .then(data => {
          // Handle search results here, for example:
          // Update a specific part of the page with the search results
          document.getElementById('searchResults').innerHTML = data;
      })
      .catch(error => {
          console.error('Error fetching search results:', error);
      });
});
