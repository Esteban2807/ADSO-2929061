<?php
$title    = '01-class';
$description = 'Blueprint for creating objects with shared properties and behaviors.';

include_once 'template/header.php';
echo "<section>";
class vechicle
{
    #atributes
    public $brand;
    public $refer;
    public $model;
    public $color;

    #methods (behaviors/actions)
    public function setAtributes($b, $r, $m, $c)
    {
        $this->brand = $b;
        $this->refer = $r;
        $this->model = $m;
        $this->color = $c;
    }
    public function getAtributes()
    {
        return
            "<ul>
                <li><strong>Brand: </strong> $this->brand</li>
                <li><strong>Refer: </strong> $this->refer</li>
                <li><strong>Model: </strong> $this->model</li>
                <li><strong>Color: </strong> $this->color</li>
                </ul>";
    }
}

$vh1 = new vechicle;
$vh1->setAtributes('Volkwage', 'Gold', '2020', 'Black');
echo $vh1->getAtributes();

$vh2 = new vechicle;
$vh2 ->setAtributes('Volkwage', 'Gold', '2020', 'Black');
$vh2->color = 'blue';
echo $vh2->getAtributes();

$vh3 = new vechicle;
$vh3->brand = 'Mazda';
$vh3->refer = 'CX30';
$vh3->model = 2024;
$vh3->color = 'Gray';
echo $vh3->getAtributes();




include_once 'template/footer.php';