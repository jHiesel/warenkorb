<?php
$warenkorb = [];
$values = null;
$amountOfRemove = [];
$leer = false;


if (isset($_COOKIE["imWarenkorb"])){
    $values = unserialize($_COOKIE["imWarenkorb"]);
}else{
    CookieHelper::reset();
    header("Refresh:0");
}

foreach ($values as $id => $amout){
    if ($amout != 0){
        $warenkorb[] = $allBooks[$id-1];
    }
}
if (isset($_POST["removeByUser"]) ){

    foreach ($values as $id => $addedBooks){

        if (isset($_POST["remove".$id]) && $_POST["remove".$id] > 0 ){
            $amountOfRemove[$id] = intval($_POST["remove".$id]);
            $allBooks[$id]->removeStock(intval($_POST["remove".$id]));
        }

    }

    if (sizeof($amountOfRemove) > 0){
        CookieHelper::removeFromWarebkorb($amountOfRemove);
        header("Refresh:0");
    }
}
$sumEmpty = [];
foreach ($values as $id => $amount){

    if ($amount == 0){
        $sumEmpty[$id] = true;
    }
}
if (sizeof($sumEmpty) == sizeof($values)){
    $leer = true;
}

$sum = 0;
foreach ($warenkorb as $book){
    $sum = $sum +$values[$book->getId()]*$book->getPrice();
}

require "Views/warenkorb.view.php";