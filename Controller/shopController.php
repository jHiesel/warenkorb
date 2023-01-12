<?php

$everyThingAdded = [];
foreach ($allBooks as $book){
    if (isset($_POST["hinzu"])) {
        if (isset($_POST["add" . $book->getId()]) ) {
            $everyThingAdded[$book->getId()] = intval($_POST["add".$book->getId()]);
            $allBooks[$book->getId()-1]->removeStock(intval($_POST["add".$book->getId()]));
        }
    }else{
        $everyThingAdded[$book->getId()] = 0;
    }

}

if (isset($_COOKIE["imWarenkorb"])){
    $minus = unserialize($_COOKIE["imWarenkorb"]);
    foreach ($allBooks as $id => $book){
        if ($minus[$book->getId()] > 0){
            $book->removeStock($minus[$book->getId()]);
        }
    }
}

if (isset($_POST["hinzu"]) && isset($_COOKIE["imWarenkorb"])){
                CookieHelper::addToWarebkorb($everyThingAdded);
}

if (isset($_POST["reset"]) || !isset($_COOKIE["imWarenkorb"])){
    CookieHelper::reset();
}

if (isset($_POST["warenkorb"])){
header("location:shop");
}else{
require "Views/shop.view.php";
}