<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic  e-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-olFoB/ONWQQc3Dfb1egpqzNFmhlN4mFAO6lP24lKzF5PBH1sCWIQf6j5lCcOpwra9KavASpG4xWyYSvJQE9nLCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
    <title>Login Admin</title>
    <link rel="shortcut icon" href="img/iconsda.png" type="image/x-icon">
    
</head>
<body>
    <div class="background-blur"></div>
    <div class="login-container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Coat_of_Arms_of_Sidoarjo_Regency.png/851px-Coat_of_Arms_of_Sidoarjo_Regency.png" alt="">
        <h2>Login Admin</h2>
        <form method="post"  action="koneksiLogin.php" >
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } 
        ?>
            <div class="form-group">
                <input type="text" name="username" placeholder="username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
