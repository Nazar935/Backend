<?php
    function myAutoloader($className) {
        $classFile = 'classes/'. $className . '.php';
    
        if (file_exists($classFile))
            require_once($classFile);
    }
    

    spl_autoload_register('myAutoloader');
    
    $a = New \Human\Body();

    $b = New \Human\Head();

    $a->heart_beat();

    $b->look_at();
    $b->think();
        
