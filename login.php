<?php
// Database connection details
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sol_test";

try {
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo "Please enter both username and password.";
            exit;
        }

        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $username, $password);
        
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            echo "Login successful!";
        } else {
            echo "Invalid username or password";
        }

        $stmt->close();
    }
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    echo "An error occurred. Please try again later.";
} finally {
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>