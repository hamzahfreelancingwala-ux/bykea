<?php 
require 'db.php';
session_start();
// Basic Auth Check
if(!isset($_SESSION['user_id'])) { echo "<script>window.location.href='login.php';</script>"; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book your Ride/Parcel</title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; display: flex; justify-content: center; padding-top: 50px; }
        .booking-card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); width: 400px; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .price-box { background: #e8f5e9; padding: 15px; border-radius: 8px; margin: 15px 0; text-align: center; font-weight: bold; color: #2e7d32; }
        .btn-confirm { width: 100%; background: #2ecc71; color: white; border: none; padding: 15px; border-radius: 8px; cursor: pointer; font-size: 1rem; }
    </style>
</head>
<body>
    <div class="booking-card">
        <h2>Book a <?php echo isset($_GET['type']) ? 'Parcel' : 'Ride'; ?></h2>
        <input type="text" id="pickup" placeholder="Enter Pickup Location">
        <input type="text" id="dropoff" placeholder="Enter Drop-off Location">
        
        <div class="price-box" id="priceDisplay">Estimated Price: Rs. 0</div>
        
        <button class="btn-confirm" onclick="confirmBooking()">Confirm Booking</button>
    </div>

    <script>
        // Simple Real-time price calculation logic
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                let price = Math.floor(Math.random() * (500 - 100) + 100);
                document.getElementById('priceDisplay').innerText = "Estimated Price: Rs. " + price;
            });
        });

        function confirmBooking() {
            alert("Searching for nearby drivers...");
            // Real redirection using JS
            setTimeout(() => {
                window.location.href = 'tracking.php';
            }, 2000);
        }
    </script>
</body>
</html>
