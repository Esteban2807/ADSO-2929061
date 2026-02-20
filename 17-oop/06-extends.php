<?php
$title    = '06-extends';
$description = 'Keyword for a class to inherit properties and methods from another.';

include_once 'template/header.php';
echo "<section>";

class Operation {
    protected $num1;
    protected $num2;
    public function __construct($num1,$num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }
}
class Addition extends Operation {
    public function showResult(){
        $result = $this->num1 + $this->num2;
        return "<ul><li> " . $this->num1 . "+" . $this->num2 . " = " . $result . " </li></ul>";
    }
}
class Substraction extends Operation{
    public function showResult(){
        $result = $this->num1 - $this->num2;
        return "<ul><li> " . $this->num1 . "-" . $this->num2 . " = " . $result . " </li></ul>";
    }
}
class Product extends Operation{
    public function showResult(){
        $result = $this->num1 * $this->num2;
        return "<ul><li> " . $this->num1 . "*" . $this->num2 . " = " . $result . " </li></ul>";
    }
}
class Division extends Operation{
    public function showResult(){
        $result = $this->num1 / $this->num2;
        return "<ul><li> " . $this->num1 . "/" . $this->num2 . " = " . $result . " </li></ul>";
    }
}
class Pow extends Operation{
    public function showResult(){
        $result = pow($this->num1,$this->num2);
        return "<ul><li> " . $this->num1 . "^" . $this->num2 . " = " . $result . " </li></ul>";
    }
}

$suma = new Addition(16,32);
echo $suma->showResult();

$resta = new Substraction(190,90);
echo $resta->showResult();

$multiplicacion = new Product(8,8);
echo $multiplicacion->showResult();

$division = new Division(5340,4);
echo $division->showResult();

$exponente = new Pow(100,0);
echo $exponente->showResult();



include_once 'template/footer.php';