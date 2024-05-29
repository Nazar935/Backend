<?php
/**
 * Цей класс є прикладом використання функції spl_autoload_register
 * Цей класс описує структуру тіла
 */
namespace Human;
class Body{
    public $heart;
    public $stomach;

    function heart_beat(){
        echo "Hear beating" . "<br>";
    }
}