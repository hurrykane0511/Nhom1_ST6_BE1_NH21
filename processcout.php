<?php

if (isset($_POST['placeorder'])) {
    $var =
        [
            'fname',
            'lname',
            'company',
            'country',
            'houseadd',
            'apartment',
            'city',
            'state',
            'zipcode',
            'phone',
            'email',
            'placeorder',
            'paymethod'
        ];

    foreach ($var as $fields) {
        if (isset($_POST[$fields])) {
            echo $_POST[$fields] . '<br>';
            exit();
        }
    }
    
}
