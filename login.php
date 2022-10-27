<?php
include("./utils/koneksi.php");
session_start();
if (isset($_SESSION['id'])) {
    header("Location: index.php");
}
$username = $password = "";
$errors = array('username' => '', 'password' => '');

if (isset($_POST['submit'])) {
    function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = cleanData($_POST['username']);
    $password = cleanData($_POST['password']);

    if (empty($username)) {
        $errors['username'] = "Username cant be empty!";
    }

    if (empty($password)) {
        $errors['password'] = "Password cant be empty!";
    } else {
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE user id = '$user id' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['admin'] = ($row['groupID'] == 1) ? true : false;

                header("Location: index.php");
                exit();
            } else {
                $errors['password'] = "Incorrect username or password!";
            }
        } else {
            $errors['username'] = "Incorrect username or password!";
        }
    }
}
?>

<html>
    <head>
        <title>Halaman Login User</title>
        <link rel="stylesheet" href="style_login.css">
    </head>
   
    <body>
    <form action="login.php" method="post">
        <h2>LOGIN user</h2>
        <label>Username</label>
        <input class="<?php if ($errors['username'] != '') {
                        echo 'error1';
                        } ?>" 
        type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
        <p class="error-container"><?php echo $errors['username']; ?></p>

        <label>Password</label>
        <input class="<?php if ($errors['password'] != '') {
                        echo 'error1';
                        } ?>"
         type="password" name="password" placeholder="Password">
        <p class="error-container"><?php echo $errors['password']; ?></p>

        <button type="submit" name="submit">Login</button>
        <a href="signup.php" class="ca">Create an account</a>
    </form>
</body>

</html>

