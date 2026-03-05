<?php
require 'db.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)");
        if($stmt->execute([$name, $email, $pass, $role])) {
            // Success: Use JS for redirection as requested, but without the alert if it's causing issues
            echo "<script>
                console.log('Signup Successful');
                window.location.replace('login.php');
            </script>";
            exit(); 
        }
    } catch (PDOException $e) {
        // If email already exists, it triggers an exception
        $msg = "Error: This email is already registered.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Bykea Clone</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .signup-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 380px; border-top: 5px solid #2ecc71; }
        .signup-box h2 { color: #2c3e50; text-align: center; margin-bottom: 5px; font-size: 28px; }
        .signup-box p.subtitle { text-align: center; color: #7f8c8d; margin-bottom: 25px; font-size: 14px; }
        input, select { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; font-size: 15px; outline: none; transition: 0.3s; }
        input:focus { border-color: #2ecc71; box-shadow: 0 0 5px rgba(46, 204, 113, 0.3); }
        .btn-signup { width: 100%; background: #2ecc71; color: white; border: none; padding: 14px; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 16px; margin-top: 15px; transition: 0.3s; }
        .btn-signup:hover { background: #27ae60; transform: translateY(-2px); }
        .error-msg { background: #fdeaea; color: #eb5757; padding: 10px; border-radius: 8px; font-size: 13px; text-align: center; margin-bottom: 15px; border: 1px solid #facccc; }
    </style>
</head>
<body>
    <div class="signup-box">
        <h2>Join Bykea</h2>
        <p class="subtitle">Fast, Secure, and Reliable</p>
        
        <?php if($msg): ?>
            <div class="error-msg"><?php echo $msg; ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <select name="role">
                <option value="user">Passenger / Customer</option>
                <option value="driver">Driver (Partner)</option>
            </select>
            <input type="password" name="password" placeholder="Create Password" required>
            <button type="submit" class="btn-signup">Register Now</button>
        </form>
        <p style="text-align:center; margin-top: 20px; font-size: 14px; color: #34495e;">
            Already a member? <a href="login.php" style="color:#2ecc71; text-decoration:none; font-weight: bold;">Login here</a>
        </p>
    </div>
</body>
</html>
