<?php
//namespaces... mal sehen wie gut das funktioniert
namespace App\Core;

use PDO;
use Exception;
use PDOException;


class Container
{
    private $receipts = [];
    private $instances = [];

    public function __construct()
    {
        $this->receipts = [
        //test exceptions, habe gelesen das ist nützlich bei ner datenbankverbindung//
            'pdo' => function(){
                try{
                    $pdo = new PDO('mysql:host=localhost;dbname=book_club;charset=utf8', 'root', '');
                }catch(PDOEXCEPTION $ex) {
                    echo "No database connection!";
                    die;
                    //exception funktionalität ist noch ausbaufähig ;)
                }
            },

        ];
    }


    
    public function create($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }
        if (isset($this->receipts[$name])) {
            $this->instances[$name] = $this->receipts[$name]();
        }
        return $this->instances[$name];
    }
}