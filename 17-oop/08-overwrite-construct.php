<?php
$title    = '08-overwrite-construct';
$description = 'Redefining the constructor method in a child class.';

include_once 'template/header.php';
echo "<section>";

class VideoGame
{
    protected $name;
    protected $plataform;
    protected $year;

    public function __construct($name, $plataform)
    {
        $this->name = $name;
        $this->plataform = $plataform;
    }
}
class Game2 extends VideoGame {
    public function __construct($name, $plataform,$year)
    {
        parent::__construct($name,$plataform);
        $this->year = $year;
    }
    public function showVideoGame()
    {
        echo "<ul> <li> Name: " . $this->name . "<br>  Plataform: " . $this->plataform . "<br> Year: " . $this->year;
        
    }
}

$gn = new Game2('Hollow Knight Silksong','Nintendo Switch',2025);
echo $gn->showVideoGame();

$gw = new Game2('God of War','PS5', 2018);
echo $gw->showVideoGame();



include_once 'template/footer.php';