<?php
$title    = '07-overwrite-method';
$description = 'Redefining a parent class´s method in the child class.';

include_once 'template/header.php';
echo "<section>";

class VideoGame
{
    protected $name;
    protected $plataform;
    public function __construct($name, $plataform)
    {
        $this->name = $name;
        $this->plataform = $plataform;
    }
    public function showVideoGame()
    {
        echo "Plataform: " . $this->plataform . "    </li> </ul>";
    }
}
class Game extends VideoGame {
    public function showVideoGame()
    {
        echo "<ul> <li> Name: " . $this->name . "<br>";
        parent::showVideoGame();
    }
}
$gn = new Game('Hollow Knight Silksong','Nintendo Switch');
echo $gn->showVideoGame();

$lz = new Game('The Legend Of Zelda','Nintendo Switch');
echo $lz->showVideoGame();




include_once 'template/footer.php';
