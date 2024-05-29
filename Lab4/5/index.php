<?php
class Circle{
    private $c;
    private $r;
    private $x;
    private $y;

    function __construct($x, $y, $r){
        $this->x = $x;
        $this->y = $y;
        $this->r = $r;
    }
    function __toString(){
        return "Коло з центром в {$this->x}, {$this->y} і радіусом {$this->r}";
    }
    function getX(){
        return $this->x;
    }
    function setX($x){
        $this->x = $x;
    }
    function getY(){
        return $this->y;
    }
    function setY($y){
        $this->y = $y;
    }
    function getR(){
        return $this->r;
    }
    function setR($r){
        $this->r = $r;
    }

    function intersect($circle){
        $distance_between_centers = sqrt(pow($this->x - $circle->x, 2) + pow($this->y - $circle->y, 2));
        
        if ($distance_between_centers > $this->r + $circle->r) {
            return false;
        } else {
            return true;
        }
    }
}

$circle1 = New Circle(20, 0.20, 15);
$circle2 = new Circle(6, 0, 3);

echo $circle1->__toString() . "<br>";
echo $circle1->getR() . "<br>";
echo $circle1->getX() . "<br>";
echo $circle1->getY() . "<br>";

echo $circle1->intersect($circle2) ? 'Перетинаються' : 'Не перетинаються';