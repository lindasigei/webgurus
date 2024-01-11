<?php
    
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: index_contactform.html");
            exit;
        }
    }

    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <?php if ($is_invalid): ?>
           <em style="font-size: 28px; color: white; font-weight: bold; margin-top: 10px; margin-bottom: 10px;">Invalid login</em>


        <?php endif; ?>
    <div id="form">
        <nav>
            <ul>
                <li><a href="signup.html">Sign Up</a></li>
            </ul>
        </nav>
        <h1>Login</h1>
        <form method="post">
            <label for="email">email</label>
            <input type="email" name="email" id="email"
                   value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <button>Log in</button>
        </form>

        <a href="forgot-password.php">Forgot password?</a>
    </div>
</body>
</html>
