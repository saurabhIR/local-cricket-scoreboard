<?php
    /**
         * This script connects to a database and fetches the player with the highest strike rate.
         *
         * @param string $servername The name of the server where the database is hosted.
         * @param string $username The username used to connect to the database.
         * @param string $password The password used to connect to the database.
         * @param string $dbname The name of the database.
     */
    // Connect to the database
    $servername = "localhost";
    $username = "saurabh";
    $password = "Saurabh@8442";
    $dbname = "cricket_scoreboard";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the player with the highest strike rate
    $sql = "SELECT name, strike_rate FROM players ORDER BY strike_rate DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows >0){
        // Output the player with the highest strike rate
        if ($row = $result->fetch_assoc()) {
            echo "<p>Man of the Match: " . $row["name"] . " (Strike Rate: " . $row['strike_rate'] . ")</p>";
        } else {
            echo "<p>No players found.</p>";
        }
    }
    // Close the connection
    $conn->close();