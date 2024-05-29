<?php
abstract class Human{
    private $name;
    private $height;
    private $weight;
    private $age;

    
    protected abstract function birthMessage();
    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
    function setHeight($height){
        $this->height = $height;
    }
    function getHeight(){
        return $this->height;
    }
    function setWeight($weight){
        $this->weight = $weight;
    }
    function getWeight(){
        return $this->weight;
    }
    function setAge($age){
        $this->age = $age;
    }
    function getAge(){
        return $this->age;
    }

    public function giveBirth() {
        $this->birthMessage();
    }
}

class Student extends Human{

    private $HEI;
    private $course = 0;
    function __construct($name, $age, $height, $weight){
        $this->setName($name);
        $this->setAge($age);
        $this->setWeight($weight);
        $this->setHeight($height);
    }
    function setHEI($HEI){
        $this->HEI = $HEI;
    }
    function getHEI(){
        return $this->HEI;
    }
    function setCourse($course){
        $this->course = $course;
    }
    function getCourse(){
        return $this->course;
    }

    function updCourse(){
        if($this->course < 4){
            $this->course ++;
        }
    }
    protected function birthMessage() {
        echo "Вітаємо, у вас народилась дитина!";
    }
}

class Programmer extends Human{
    private $programmer_lang;
    private $Experience;
    function __construct(){
        $this->programmer_lang = array();
        $this->programmer_lang[] = "C++";
        $this->programmer_lang[] = "Python";
        $this->Experience = 2;
    }
    function setExperience($Experience){
        $this->Experience = $Experience;
    }
    function getExperience(){
        return $this->Experience;
    }
    function getProgrammerlang(){
        return $this->programmer_lang;
    }

    function addLanguage($programmer_lang, $element){
        $this->programmer_lang[] = $element;
    }
    protected function birthMessage() {
        echo "Вітаємо, у вас народилась дитина!";
    }
}

$student = new Student("John", 20, 180, 75);
$student->setHEI("Example University");
$student->setCourse(2);

echo "Student Info:<br>";
echo "Name: " . $student->getName() . "<br>";
echo "Age: " . $student->getAge() . "<br>";
echo "Height: " . $student->getHeight() . " cm<br>";
echo "Weight: " . $student->getWeight() . " kg<br>";
echo "HEI: " . $student->getHEI() . "<br>";
echo "Course: " . $student->getCourse() . "<br>";
echo "<br>" . $student->giveBirth() . "<br>";

// Оновлюємо курс студента
$student->updCourse();
echo "Updated Course: " . $student->getCourse() . "<br>";

echo "<hr>";

// Створюємо програміста
$programmer = new Programmer();
$programmer->setName("Alice");
$programmer->setAge(25);
$programmer->setHeight(170);
$programmer->setWeight(65);

echo "Programmer Info:<br>";
echo "Name: " . $programmer->getName() . "<br>";
echo "Age: " . $programmer->getAge() . "<br>";
echo "Height: " . $programmer->getHeight() . " cm<br>";
echo "Weight: " . $programmer->getWeight() . " kg<br>";
echo "Experience: " . $programmer->getExperience() . " years<br>";
echo "<br>" . $programmer->giveBirth() . "<br>";

// Додаємо мову програмування
$programmer->addLanguage("Java", "PHP");

echo "Programmer Languages:<br>";
$languages = $programmer->getProgrammerlang();
foreach ($languages as $language) {
    echo $language . "<br>";
}