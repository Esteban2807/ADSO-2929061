<?php 
include_once 'basededatos.php';
class pokemons extends basedatos{
    //Propiedades y atributos
    public $id;
    public $name;
    public $tipo;

    public $trainer_id;

    //Constructor
    function __construct($id = null,$name = null,$tipo = null, $trainer_id = null){
        $this->id = $id;
        $this->name = $name;
        $this->tipo = $tipo;
        $this->trainer_id = $trainer_id;
    }

    //Metodos
    //GET
    public function getId(){
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getTrainerID(){
        return $this->trainer_id;
    }
    public function listar(){
        $sql = "SELECT p.id AS id, p.name AS name, p.tipo AS tipo, t.name AS trainer FROM pokemons AS p, trainers AS t WHERE p.trainer_id = t.id ORDER BY p.id ASC";
        $this->conectar();
        $this->ejecutarSQL($sql);
        $res = $this->cargarTodo();
        $this->desconectar();
        return $res;
    }
}