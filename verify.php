<?php
include './model/config.php';
include './model/dbconnect.php';
include './model/user.php';

$user = new User();
if (isset($_GET['em']) && isset($_GET['password']) && isset($_GET['token']) && isset($_GET['firstname']) && isset($_GET['lastname'])) {
    if ($user->CheckResetPass($_GET['em'], $_GET['token'])) {
            $pass = base64_decode($_GET['password']);
            $email = base64_decode($_GET['em']);
           if ($user->AccessAccount($_GET['firstname'], $_GET['lastname'], $email, $pass)) {
?>
        <form id="myForm" action="login.php" method="post">
            <input type="hidden" name="verify" value="Verify succesfully!!">;
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
        </script>
<?php 
        }
        else{
            die("Link Expires !!!");
        }
    }
     else
     {
        die("Link Expires !!!");
    }
  
}
else
{
        die("Link not available !!!");
}