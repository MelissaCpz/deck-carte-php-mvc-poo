<?php

class utilities
{
    public static function renderPage($datas_page)
    {
        extract($datas_page);  // extract = extrait les données sous forme de tableau de variable.
        ob_start();
        require($view);
        $content = ob_get_clean();
        require_once($layout);
    }



    public static function showArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }


    public static function isConnected()
    {
        return (!empty($_SESSION['name']));
    }

    public static function isCreator()
    {
        return ( !empty($_SESSION['name']) && isset($_SESSION['role']) && ($_SESSION['role'] === 'creator' || $_SESSION['role'] === 'admin') );
    }

    public static function isAdmin()
    {
        return (!empty($_SESSION['name']) && $_SESSION['role'] === 'admin');
    }
}
