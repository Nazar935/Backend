<?php
class MyClass {
    public static $dir = "text/";

    static function read($name){
        $content = file_get_contents(self::$dir . $name . ".txt");
        echo $content;

    }
    static function write($name, $text){
        $file = fopen(self::$dir . $name . ".txt", 'a');
        fwrite($file, $text . "\n");
        fclose($file);
    }
    static function clear($name){
        file_put_contents(self::$dir . $name . ".txt", "");
    }
}

MyClass::write("1", "hello");
MyClass::write("1", "Hi");
MyClass::read("1");

MyClass::clear("1");
