<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tracking Your Request</title>
    <style>
        body { margin:0; font-family: sans-serif; background: #2c3e50; color: white; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; }
        .map-placeholder { width: 90%; max-width: 600px; height: 300px; background: #34495e; border-radius: 20px; position: relative; overflow: hidden; }
        .pulse { position: absolute; top: 50%; left: 50%; width: 20px; height: 20px; background: #2ecc71; border-radius: 50%; transform: translate(-50%, -50%); box-shadow: 0 0 0 rgba(46, 204, 113, 0.4); animation: pulse 2s infinite; }
        @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.7); } 70% { box-shadow: 0 0 0 20px rgba(46, 204, 113, 0); } 100% { box-shadow: 0 0 0 0 rgba(46, 204, 113, 0); } }
        .status { margin-top: 20px; font-size: 1.2rem; }
    </style>
</head>
<body>
    <div class="map-placeholder">
        <div class="pulse"></div>
        <div style="position:absolute; bottom:10px; left:10px;">Driver: Ahmed (Honda CG 125)</div>
    </div>
    <div class="status" id="statusText">Driver is arriving in 4 minutes...</div>

    <script>
        setTimeout(() => {
            document.getElementById('statusText').innerText = "Driver has arrived at Pickup Point!";
            document.getElementById('statusText').style.color = "#2ecc71";
        }, 5000);
    </script>
</body>
</html>
