<?php
    session_start();

    if (isset($_GET['login']) && $_GET['submit'] == "OK")
        $_SESSION['login'] = $_GET['login'];
    if (isset($_GET['passwd']) && $_GET['submit'] == "OK")
        $_SESSION['passwd'] = $_GET['passwd'];

    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Start</title>
</head>
<body>
    <form action="index.php">
        <label for="login">login</label>
        <input type="text" id="login" name="login" placeholder="login" value="<?php echo $_SESSION['login'] ?>"><br>
        <label for="passwd">passwd</label>
        <input type="password" id="passwd" name="passwd" placeholder="passwd" value="<?php echo $_SESSION['passwd'] ?>"><br>
        <button type="submit" id="submit" name="submit" value="OK">OK</button>
    </form>
</body>
</html>