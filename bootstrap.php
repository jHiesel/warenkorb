<?php

require "Classes/Book.php";

if (!isset($allBooks)){
$allBooks = Book::getJasonBooks("Jason/PHP-23 Bookdata.json");
}
require "Classes/cookieHelper.php";
