<?php
class Paginator extends Db
{
    private $_total;
    private $_page;
    private $_limit = 12;
    private $_query = 'select * from `tbl_perfume` as pf join tbl_brand br on pf.brand_id = br.brand_id join tbl_type typ on pf.type_id = typ.type_id join tbl_range ra on ra.range_id = pf.range_id ';


    function getPage()
    {
        return $this->_page;
    }
    function getTotalPage()
    {
        return $this->_page;
    }

    function Congfig($page_num, $where, $bind, $filters)
    {
        $this->SetTotalPage($where, $bind, $filters);
        $offset = ($page_num - 1) * $this->_limit;
        $filters[] = $this->_limit;
        $filters[] = $offset;
        $sql = self::$connection->prepare($this->_query . $where . 'Limit ? Offset ?');
        $_bind = $bind . 'ii';

        $sql->bind_param($_bind, ...$filters);
        $sql->execute();
        $data = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return  $data;
    }
    function SetTotalPage($where, $bind, $filters)
    {
        $sql = self::$connection->prepare($this->_query . $where);
        if (!empty($bind)) {
            $sql->bind_param($bind, ...$filters);
        }
        $sql->execute();
        $this->_total = $sql->get_result()->num_rows;
        $this->_page = ceil($this->_total / $this->_limit);
    }
}
