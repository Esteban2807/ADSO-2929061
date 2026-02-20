<?php
$title    = '02-construct';
$description = 'Special method that initializes a new object upon creation.';

include_once 'template/header.php';
echo "<section>";

class PlayList{
    public $name    ;
    public $artist  = array();
    public $album   = array();
    public $genere  = array();
    public $image   = array();
    public $year    = array();

    public function __construct($name){
        $this->name = $name;
    }
    public function setPlayList($artist, $album, $genere, $image, $year){
        $this->artist[] = $artist;
        $this->album[]  = $album;
        $this->genere[] = $genere;
        $this->image[]  = $image;
        $this->year[]   = $year;
    }
    public function getPlayList() {
            echo "<h3>PlayList: $this->name</h3>
                <div style='display: flex; gap: 0.4rem; flex-direction: column'>";
            
            foreach($this->artist as $i => $artist) {
                echo "<div style='display: flex; gap: 0.4rem; border: 2px solid #fff9; background-color: #0009'>
                        <img src='{$this->image[$i]}' width='160px'>
                        <div>
                            <h4>Artist: $artist</h4>
                            <h5>Genre: {$this->genere[$i]}</h5>
                            <h5>Year: {$this->year[$i]}</h5>
                        </div>
                    </div>";
            }
            
            echo "</div>";
        }
}

$pl = new PlayList('Merry Christmas');
$pl->setPlayList('Mariah Carey', 'Merry Christmas', 'Pop Holiday', 'https://shorturl.at/FMsNz', 1994);
$pl->setPlayList('los navidos', 'Canchis canchis', 'Aguapachoza', 'https://shorturl.at/yq6x8', 1972);
$pl->setPlayList('Armando Hernandez', 'La Zenaida', 'Cumbia', 'https://shorturl.at/TkQJw', 1984);
$pl->getPlayList();


include_once 'template/footer.php';