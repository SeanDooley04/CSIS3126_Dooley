<?php
    include("header.php");
    include("global.php");
?>
<style>
    a{
        width:80vw;
        margin: 10vw;
    }
</style>
    <h1>Your Game Pin: <span id="gamePin"></span></h1>
    <script>
        function generatePin() {
            const min = 100000; // Minimum 6-digit number
            const max = 999999; // Maximum 6-digit number
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        // Get the current URL
        const currentURL = window.location.href;

        // Generate a random pin
        const pin = generatePin();

        // Append the pin to the URL (you can modify the URL part as needed)
        const newURL = currentURL + "?pin=" + pin;

        // Update the URL
        window.history.replaceState({}, "", newURL);

        // Display the pin on the page
        document.getElementById("gamePin").textContent = pin;

        // Create the anchor element
        const link = document.createElement('a');

        // Set the href attribute (the link destination)
        link.href = 'select_color.php?pin='+ pin;

        // Set the text content of the link
        link.textContent = 'select Piece color';

        // Append the link to the desired element in the DOM
        document.body.appendChild(link); // Appends to the end of the body
    </script>
   