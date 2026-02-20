<?php
$title    = '03-private';
$description = 'Restricts property or method access to only within its class.';

include_once 'template/header.php';
echo "<section>";
class RenderTable
{
    private $nr;
    private $nc;

    public function __construct($nr, $nc)
    {
        $this->nr = $nr;
        $this->nc = $nc;

        $this->renderTableHeader();
        $this->renderTableBody();
        $this->renderTableFooter();
    }
    private function renderTableHeader()
    {
        echo "<h3>Table: $this->nc x $this->nr </h3> <br> <table border='1'>";
    }
    private function renderTableBody() {
        for ($r=0; $r <= $this->nr ; $r++) { 
            echo "<tr>";
            for ($c=0; $c < $this->nc; $c++) { 
                echo "<td>Fila: " . $r . " Col" .  $c . "</td>";
            }
            echo "</tr>";
        }
    }
    private function renderTableFooter()
    {
        echo "</table> <br>";
    }
}
$rt = new RenderTable(5,5);
$rt = new RenderTable(3,6);
$rt = new RenderTable(8,4);


include_once 'template/footer.php';
