<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Retrieve database credentials from environment variables
    $servername = getenv("DB_SERVER");
    $username = getenv("DB_USERNAME");
    $password = getenv("DB_PASSWORD");
    $dbname = getenv("DB_NAME");

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO customer(c_name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email); // "ss" indicates two string parameters

    if($stmt->execute()){
        echo "Data inserted successfully.";
    } else{
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Display the submitted data
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
} else {
    echo "Form data not submitted.";
}
?>