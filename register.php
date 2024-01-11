<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form action="register_process.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="email" name="email" required><br>
        Mobile Phone Number: <input type="text" name="mobile" required><br>
        Address: <textarea name="address" required></textarea><br>
        Registration Number: <input type="text" name="registration" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
