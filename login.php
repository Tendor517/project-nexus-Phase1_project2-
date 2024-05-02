<?php
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// To Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // Get username and password from form
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
           
            echo "Login successful!<br>Hello {$username}";
        } else {
            
            echo "Invalid username or password.";
        }
    } else {
        echo "Form fields 'username' and 'password' are required.";
    }
}

$conn->close();
?>
