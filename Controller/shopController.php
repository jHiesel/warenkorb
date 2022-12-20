<?php

$allBooks = Book::getJasonBooks("Jason/PHP-23 Bookdata.json");
require "Views/shop.view.php";
