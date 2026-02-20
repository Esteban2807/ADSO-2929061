<?php
$title    = '05-parameters';
$description = 'Values passed into a method to customize its operation.';

include_once 'template/header.php';
echo "<section>";

class Country {
    public $name;
    public function  __construct($name) {
        $this->name = $name;
    }
}
class FifaWorldCup {
    private $country;
    private $year;
    private $winner;
    # Country & Year are mandatory. But Winner is optional 
    public function __construct($country,$year,$winner = "Brazil"){
        $this->country = $country;
        $this->year = $year;
        $this->winner = $winner;
    }
    public function showEvent(){
        echo    "<ul>
                    <li>
                        <b>Country</b> ".  $this->country->name . "
                        <b>Year</b> " .  $this->year . "
                        <b>Winner</b>".  $this->winner . "

                    </li>
                </ul>";
    }
}
$country = new Country('Italy');
$worlcup = new FifaWorldCup($country, 1990, 'Germany');
$worlcup->showEvent();

$country = new Country('USA');
$worlcup = new FifaWorldCup($country, 1994, );
$worlcup->showEvent();


$country = new Country('Quatar');
$worlcup = new FifaWorldCup($country, 2022, 'Argentina');
$worlcup->showEvent();


include_once 'template/footer.php';