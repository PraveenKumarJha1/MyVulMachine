<?php
session_start();

    if (!isset($_SESSION['username'])) {
        header('location:index.php');
        die;
    } else {
// echo        $username = $_SESSION["username"];
}
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

 if (!isset($_SESSION['username'])) {
        header('location:index.php');
        die;}
?>

</body>
</html>