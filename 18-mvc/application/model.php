<?php
    class Model extends Database {
        protected $db;

        public function __construct(){
            $this ->db = Database::connect();
        }

        public function listPokemons(){
            $stmt = $this->db->query("SELECT * FROM pokemons");
            return $stmt->fetchAll();
        }

        public function listTrainers(){
            $stmt = $this->db->query("SELECT * FROM trainers");
            return $stmt->fetchAll();
        }
        public function showPokemon($id){
            $stmt = $this->db->prepare("SELECT p. *, t.name AS trainer_name
            FROM pokemons p
            INNER JOIN trainers t ON p.trainer_id = t.id");
        }
        public function addPokemon($name,$type,$trainer_id,$strength,$stamina,$speed,$accuracy){
            $stmt = $this->db->prepare("INSERT INTO pokemons (id,name,trainer_id) VALUES(:name, :type, :trainer_id,:strenght, :stamina, :speed,:accuracy)");
            return $stmt->execute([':name' => $name, ':type' => $type, ': trainer_id' => $trainer_id, ':strength' => $strength, ':stamina' => $stamina, ':speed' => $speed, ':accuracy' => $accuracy]);

        }
        public function updatePokemon($id,$name,$type,$trainer_id,$strength,$stamina,$speed,$accuracy){
            $stmt = $this->db->prepare("UPDATE pokemons SET  name = :name,type= :type, trainer_id = :trainer_id, strength = :strength, stamina = :stamina, speed = :speed, accuracy = :accuracy WHERE id = :id");
            return $stmt->execute([':id' => $id, ':name' => $name, ':type' => $type, ': trainer_id' => $trainer_id, ':strength' => $strength, ':stamina' => $stamina, ':speed' => $speed, ':accuracy' => $accuracy]);

        }
        public function delete($id) {
            $stmt = $this->db->query("DELETE FROM pokemons WHERE id = :id");
            return $stmt->execute( [':id' => $id]);
        }
    }