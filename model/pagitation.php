<?php
class Paginator extends Db
{
    private $_total;
    private $_page;
    private $_limit;
    function __construct()
    {
        parent::__construct($limit = 12);
        $sql = self::$connection->prepare("select * from `tbl_perfume`");
        $sql->execute();
        $this->_total = $sql->get_result()->num_rows;
        $this->_limit = $limit;
        $this->_page = ($this->_total/$limit + 1);
    }
    function getData($page_num)
    {
        $offset = ($page_num - 1) * $this->_limit;
        $sql = self::$connection->prepare("select * from `tbl_perfume` left join `tbl_brand` on tbl_perfume.`brand_id`=`tbl_brand`.`brand_id` order by `sold` limit ? offset ?");
        $sql->bind_param("ii", $this->_limit, $offset);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
