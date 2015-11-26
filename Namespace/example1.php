<?php

namespace foo{
    
    class Foo{}
    
    var_dump(new Foo);
    
    function strlen($foo){
        echo $foo;
    }
    
    strlen('coucou');
    
   echo \strlen("coucou");
}


namespace bar{
    class Foo{}
    
    var_dump(new Foo);
    var_dump(new \foo\Foo);
}

