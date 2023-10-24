// public/js/proximity-sort.js

const proximitySwitch = document.getElementById('proximitySwitch');
const table = document.getElementById('example').getElementsByTagName('tbody')[0];

// Define a function to sort the table by proximity
function sortByProximity() {
    // Replace this with your own logic to get the user's location
    const userLocation = { lat: 0, lng: 0 }; // Example user location

    // Make an AJAX request to your server to calculate distances
    fetch('/calculate-distances', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ userLocation }),
    })
        .then((response) => response.json())
        .then((data) => {
            // Sort the table based on the calculated distances
            // You need to implement this sorting logic based on your data structure
            // Update the table with the sorted data received from the server.
            console.log(data); // Log the sorted data for illustration
        })
        .catch((error) => {
            console.error(error);
        });
}

// Add an event listener to the switch button
proximitySwitch.addEventListener('change', function() {
    if (proximitySwitch.checked) {
        sortByProximity();
    } else {
        // Sort the table in the default order or reload the original data
    }
});
