<?php

interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}

abstract class Human implements HouseCleaning {
    function __construct(){
        echo "Human class created <br><br>";
    }
}

class Student extends Human {
    public function cleanRoom() {
        echo "Студент прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Студент прибирає кухню<br>";
    }
}

class Programmer extends Human {
    public function cleanRoom() {
        echo "Програміст прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Програміст прибирає кухню<br>";
    }
}

$student = new Student();
$student->cleanRoom();
$student->cleanKitchen();

$programmer = new Programmer();
$programmer->cleanRoom();
$programmer->cleanKitchen();