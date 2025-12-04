<?php
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = new mysqli("localhost","root","","login_register");
    if($con->connect_error)
    {
        die("Failed to connect: ".$con->connect_error);

    }
    else
    {
        $stmt = $con->prepare("select * from users WHERE username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0)
        {
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password)
            {
                $_SESSION['username'] = $username;
               echo "<script>
                alert('✅ Sign up successful!');
                window.location.href = 'home.php';
                </script>";
            }
        }
        else
        {
            echo "
                        <style>
                        .error-message {
                            max-width: 420px;
                            margin: 20px auto 0;
                            padding: 12px 16px;
                            background: rgba(255, 0, 0, 0.65); 
                            color: #fff;
                            font-size: 16px;
                            font-weight: 600;
                            text-align: center;
                            border-radius: 8px;
                            backdrop-filter: blur(6px);
                            box-shadow: 0 0 10px rgba(255,0,0,0.3);
                            animation: shake 0.3s ease;
                        }
                        @keyframes shake {
                        0%   { transform: translateX(0); }
                        25%  { transform: translateX(-4px); }
                        50%  { transform: translateX(4px); }
                        75%  { transform: translateX(-3px); }
                        100% { transform: translateX(0); }
                        }
                        </style>

                        <div class='error-message'>Invalid username or password</div>

                        <script>
                            setTimeout(function() {
                                window.location.href = 'login.html';
                            }, 4000);  // 4 seconds
                        </script>
                        ";


                                }
            }
                        

?>



