<?php


class CookieHelper
{
    static function addToWarebkorb($added)
    {
        $inCookie = unserialize($_COOKIE["imWarenkorb"]);
        foreach ($added as $id => $amount){
        $inCookie[$id] += $amount ;
        }
        setcookie("imWarenkorb", serialize($inCookie));
    }

    static function removeFromWarebkorb($added)
    {
        $inCookie = unserialize($_COOKIE["imWarenkorb"]);
        foreach ($added as $id => $amount){
            $inCookie[$id] -= $amount ;
            if($inCookie[$id] < 0){
                $inCookie[$id] = 0;
            }
        }
        setcookie("imWarenkorb", serialize($inCookie));
    }

    static function getOneCookie($name)
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        } else {
            return false;
        }
    }

    static function reset()
    {
        $template = [];
        $allBooks = Book::getJasonBooks("Jason/PHP-23 Bookdata.json");
        foreach ($allBooks as $book) {
            $template[$book->getId()] = 0;
        }
        unset($_COOKIE["imWarenkorb"]);
        setcookie("imWarenkorb", serialize($template));
    }
}