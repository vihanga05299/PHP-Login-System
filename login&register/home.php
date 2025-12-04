<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

if (!isset($_SESSION['last_regenerate']) || time() - $_SESSION['last_regenerate'] > 300) {
    session_regenerate_id(true);
    $_SESSION['last_regenerate'] = time();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="icon" type="image/png" href="assests/logo.png">
<style>
* { margin:0; padding:0; box-sizing:border-box; font-family:Poppins,sans-serif; }
body { height:100vh; display:flex; justify-content:center; align-items:center; background:url('assests/5096160.jpg') no-repeat center/cover; color:#fff; }
.glass-box { background: rgba(255,255,255,0.12); padding: 40px 60px; border-radius: 15px; backdrop-filter: blur(10px); box-shadow: 0 0 20px rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.2); text-align:center; animation: fadeIn 1s ease; position:relative; }
h1 { font-size:48px; font-weight:700; margin-bottom:10px; text-shadow:0 4px 10px rgba(0,0,0,0.4); }
h2 { font-size:22px; opacity:0.9; text-shadow:0 2px 6px rgba(0,0,0,0.3); }
.username-popup { position:absolute; top:-50px; left:50%; transform:translateX(-50%); background: rgba(0,150,255,0.8); color:#fff; padding:10px 20px; border-radius:8px; font-weight:600; font-size:18px; opacity:1; transition: opacity 0.5s ease; }
.btn-logout { margin-top:20px; padding:10px 20px; border-radius:8px; border:none; background:rgba(255,0,0,0.8); color:#fff; font-weight:600; cursor:pointer; transition:0.3s; }
.btn-logout:hover { background:rgba(255,0,0,1); }
@keyframes fadeIn { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
</style>
</head>
<body>
<div class="glass-box">
    <div class="username-popup" id="usernamePopup">
        Logged in as: <?php echo htmlspecialchars($username); ?>
    </div>
    <h1>Welcome to My Website</h1>
    <h2>Developed by Vihanga Nimnada</h2>
    <form action="logout.php" method="post">
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</div>

<script>
setTimeout(function(){
    const popup = document.getElementById('usernamePopup');
    popup.style.opacity = '0';
    setTimeout(()=> popup.style.display='none', 500);
}, 3000);
</script>
</body>
</html>
