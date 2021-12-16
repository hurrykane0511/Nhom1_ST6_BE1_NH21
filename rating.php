<?php
require './model/config.php';
require './model/dbconnect.php';
require './model/perfume.php';
require './model/review.php';
$review = new Review();

if (isset($_GET['review_submit'])) {

    $perfume_id = intval($_GET['id_product']);
    $name = $_GET['name'];
    $email = $_GET['email'];

    $content = $_GET['body'];
    $star = intval($_GET['rating']);
    $title = $_GET['title'];

    if ($review->addReview($perfume_id, $name, $email, $content, $star, $title)) {
        echo true;
    }
    else {
        echo false;
    }
}
