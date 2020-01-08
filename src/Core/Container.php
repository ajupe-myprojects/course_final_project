<?php
//namespaces... mal sehen wie gut das funktioniert
namespace App\Core;

use PDO;
use Exception;
use PDOException;
use App\Element\ElementController;
use App\Element\ElementRepository;

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
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            },
            'elementController' => function(){

                return new ElementController($this->create('elementRepository'));
            },
            'elementRepository' => function(){

                return new ElementRepository($this->create('pdo'));
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