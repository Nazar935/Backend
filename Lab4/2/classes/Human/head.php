<?php

/**
 * Цей класс є прикладом використання функції spl_autoload_register
 * Цей класс описує структуру голови
 */
namespace Human;
class Head{
    public $brain = "think";
    public $eyes = "look";

    function look_at(){
        echo "Taking " . $this->eyes . " at...";
    }
    function think(){
        echo " car and " . $this->brain . "ing about having it.";
    }
}