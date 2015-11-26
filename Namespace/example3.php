<?php
namespace foo{
    
    function foo(){
        echo "<p>foo" . __NAMESPACE__."</p>";
    }
    
    foo();
    
    class A{
        
    }
    
}

namespace bar{
    
    use \foo\A as A1;
    
    var_dump(new A1);
    
    class A{
        
    }
    
    function foo(){
        echo "<p>foo" . __NAMESPACE__."</p>";
    }
    
    foo();
    \foo\foo();
    
    echo \strtolower('Antoine');
    echo strtolower('Antoine');
    
    
    function strtolower($name){
        return $name;
    }
}

namespace Core{
    class Model{}
var_dump(new Form\Input);
// affichera object(Core\Form\Input)[1]
}

namespace Core\Form{
    class Input{}
}


