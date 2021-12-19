<?php
include './model/config.php';
include './model/dbconnect.php';
include './model/user.php';


$user = new User;

if (isset($_POST['signup'])) {
    $var =
        [
            'firstname',
            'lastname',
            'email',
            'password'
        ];

    foreach ($var as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            header('location: signup.php?surs=' . $field . ' cannot be empty');
            exit();
        }
    }

    if ($user->AccessAccount($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'])) {
?>
        <form id="myForm" action="login.php" method="post">
            <input type="hidden" name="success">;
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
        </script>
<?php
        exit();
    } else {
        header('location: signup.php?surs=email already exists');
    }
}
