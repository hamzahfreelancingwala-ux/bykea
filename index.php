<?php 
session_start(); 
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bykea Clone | Ride & Delivery</title>
    <style>
        :root { --primary: #2ecc71; --dark: #2c3e50; --light: #ecf0f1; }
        body { font-family: 'Segoe UI', sans-serif; margin: 0; background: var(--light); }
        nav { background: white; padding: 1rem 5%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .logo { font-size: 1.5rem; font-weight: bold; color: var(--primary); text-decoration: none; }
        .hero { height: 80vh; display: flex; align-items: center; justify-content: center; text-align: center; background: linear-gradient(rgba(46, 204, 113, 0.8), rgba(44, 62, 80, 0.9)), url('https://images.unsplash.com/photo-1558981403-c5f91cbcf523?auto=format&fit=crop&w=1350&q=80'); background-size: cover; color: white; }
        .hero h1 { font-size: 3.5rem; margin-bottom: 10px; }
        .btn-group { margin-top: 30px; }
        .btn { padding: 15px 35px; border-radius: 30px; border: none; cursor: pointer; font-weight: bold; transition: 0.3s; text-decoration: none; display: inline-block; }
        .btn-primary { background: var(--primary); color: white; margin: 10px; }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(46,204,113,0.4); }
        .services { display: flex; justify-content: space-around; padding: 50px 10%; background: white; }
        .card { text-align: center; padding: 20px; transition: 0.3s; border-radius: 15px; width: 30%; }
        .card:hover { box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .user-name { font-weight: bold; color: var(--dark); margin-right: 15px; }
        .btn-logout { color: #e74c3c; text-decoration: none; font-weight: bold; border: 1px solid #e74c3c; padding: 8px 15px; border-radius: 5px; transition: 0.3s; }
        .btn-logout:hover { background: #e74c3c; color: white; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php" class="logo">BYKEA CLONE</a>
        <div>
            <?php if($isLoggedIn): ?>
                <span class="user-name">Hi, <?php echo htmlspecialchars($_SESSION['name']); ?></span>
                <a href="logout.php" class="btn-logout">Logout</a>
            <?php else: ?>
                <a href="login.php" style="text-decoration:none; color:var(--dark); margin-right:20px;">Login</a>
                <a href="signup.php" class="btn btn-primary" style="padding:10px 20px;">Join Now</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="hero">
        <div>
            <h1>Moving People & Parcels</h1>
            <p>The fastest ride-hailing and delivery service in the city.</p>
            <div class="btn-group">
                <button class="btn btn-primary" onclick="window.location.href='booking.php'">Book a Ride</button>
                <button class="btn btn-primary" style="background:#34495e;" onclick="window.location.href='booking.php?type=parcel'">Send Parcel</button>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="card"><h3>🏍️ Rides</h3><p>Affordable bike rides at your doorstep.</p></div>
        <div class="card"><h3>📦 Delivery</h3><p>Instant parcel delivery across the city.</p></div>
        <div class="card"><h3>💳 Wallet</h3><p>Cashless payments for easy commuting.</p></div>
    </div>
</body>
</html>
