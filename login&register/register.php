<?php
session_start();
$username = $_POST['username'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if ($password !== $confirmPassword) 
    {
        die("❌ Passwords do not match!");
    }

$con = new mysqli('localhost', 'root', '', 'login_register');

if ($con->connect_error) 
    {
        die('❌ Connection Failed: ' . $con->connect_error);
    } 
else 
    {
    
        $stmt = $con->prepare("INSERT INTO users (username, email, birthday, password ) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $birthday, $password );

    if ($stmt->execute()) 
        {
             $_SESSION['username'] = $username;
             
                echo "<script>
                alert('✅ Sign up successful!');
                window.location.href = 'home.php';
            </script>";
        
        } 
    else 
        {
            echo "❌ Error: " . $stmt->error;
        }

    $stmt->close();
    $con->close();
}
?>
