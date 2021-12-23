<?php

include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
include './model/pagitation.php';
include './model/brand.php';
include './model/categories.php';


function GetCondition($currQ, $attr, $condiName)
{
    $where = '';
    $bind = '';
    $array = [];
    if (isset($_GET[$attr])) {
        $array = explode(",", substr($_GET[$attr], 0, -1));
        $condition = '';
        $bind = str_repeat('s', count($array));
        for ($i = 0; $i < count($array); $i++) {
            $condition .= $condiName . '= ' . ' ? ' . ' OR ';
        }

        $condition = substr($condition, 0, -4);
        if ($currQ != '') {
            $where .= ' AND (' . $condition . ')';
        } else {
            $where .= '(' . $condition . ')';
        }
    }

    return [$where, $bind, $array];
}

if (isset($_GET['page'])) {

    $where = '';
    $bind = '';

    $brandObj =  GetCondition($where, "brand", "brand_name");
    $where .= $brandObj[0];
    $bind .=  $brandObj[1];
    $brands = $brandObj[2];

    $genderObj =  GetCondition($where, "gender", "gender");
    $where .= $genderObj[0];
    $bind .= $genderObj[1];
    $genders = $genderObj[2];

    $typeObj =  GetCondition($where, "type", "type_name");
    $where .= $typeObj[0];
    $bind .= $typeObj[1];
    $types = $typeObj[2];

    $rangeObj = GetCondition($where, "range", "range_name");
    $where .= $rangeObj[0];
    $bind .= $rangeObj[1];
    $ranges = $rangeObj[2];
    $finalArr = [];
    $finalArr = array_merge($brands, $genders, $types, $ranges);

    if (isset($_GET['keyword'])) {
        if ($where != '') {
            $where .= ' AND (' . 'pf_name like '  . '?' . ')';
        } else {
            $where .= ' (' . 'pf_name like '  . '?' . ')';
        }
        $bind .= 's';
        $finalArr[] =  '%'.$_GET['keyword'].'%';
    }

    if (isset($_GET['min'])) {
        if ($where != '') {
            $where .= ' AND (' . '(regular_price - (regular_price/100)*sales_price)>=' . ' ? ' . ')';
        } else {
            $where .= ' (' . '(regular_price - (regular_price/100)*sales_price)>=' . ' ? ' . ')';
        }
        $bind .= 'i';
        $finalArr[] =  intval($_GET['min']);
    }



    if (isset($_GET['max'])) {
        if ($where != '') {
            $where .= ' AND (' . '(regular_price - (regular_price/100)*sales_price)<=' . ' ? ' . ')';
        } else {
            $where .= '(' . '(regular_price - (regular_price/100)*sales_price)<=' . ' ? ' . ')';
        }

        $bind .= 'i';
        $finalArr[] =  intval($_GET['max']);
    }

    if ($where != '') {
        $where = ' where ' . $where;
    }

    if (isset($_GET['sort'])) {
        $where .= ' order by ' . $_GET['sort'] . ' ';
    }

    $panigation = new Paginator();
    $data = [];

    $pf = $panigation->Congfig($_GET['page'], $where, $bind, $finalArr);

    foreach ($pf as $row) {
        $image_array = explode("#", $row["image"]);

        $data[] = array(
            'pf_id'        =>    $row['pf_id'],
            'pf_name'        =>    $row['pf_name'],
            'sales_price'        =>    $row['sales_price'],
            'brand_name'        =>    $row['brand_name'],
            'regular_price'        =>    $row['regular_price'],
            'image' => $image_array[0],
            'status' => $row['status']
        );
    }

    $data[] = array(
        'currPage' => intval($_GET['page']),
        'totalPage' => $panigation->getTotalPage()
    );

    echo json_encode($data);
}
