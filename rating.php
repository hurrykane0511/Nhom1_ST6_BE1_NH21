<?php
require './model/config.php';
require './model/dbconnect.php';
require './model/perfume.php';
require './model/review.php';
$review = new Review();
if(isset($_POST['review_submit'])){
    $perfume_id = $_POST['id_product'];
    $name = $_POST['name'];
    $email =$_POST['email'];
    $content =$_POST['body'];
    $star =$_POST['rating'];
    $title =$_POST['title'];
   if($review->addReview($perfume_id,$name, $email,$content,$star,$title)){
       echo "thanh cong";
       header('location:detail.php');
   } else
   {
       echo "khong thanh cong";
   }
   echo "dahsj";
}
?>