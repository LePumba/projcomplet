<?php

class DB
{
    public static $link;

    /**
     * @return PDO
     */
    public static function getLink()
    {
        if(is_null(self::$link)) {

            // Creer le lien de la base de données en mysqli ou pdo, stocker l'objet dans self::$link.
            self::$link = new PDO("mysql:dbname=site;host=51.178.48.170','pumba','Romain181079'");
            self::$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        }

        return self::$link;
    }
}
