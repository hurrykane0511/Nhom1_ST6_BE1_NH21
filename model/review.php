<?php
class Review extends Db
{
    public function addReview($perfume_id, $name, $email, $content, $star, $title)
    {
        $sql = self::$connection->prepare("INSERT INTO `tbl_review`(`tbl_perfume_pf_id`,`name`, `email`, `content`, `rating`,`review_title`) VALUES ( ? , ? , ? , ? , ? , ? )");
        $sql->bind_param("isssis", $perfume_id, $name, $email, $content, $star, $title);
        return $sql->execute();
    }
}
