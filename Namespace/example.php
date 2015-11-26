<?php

// espace de nom évite les collisions entre les fonctions, constantes et classes


namespace foo {

    function foo() {
        echo "je suis dans l'espace de nom foo";
    }
    class Faa{
        private $foo="je suis dans le namespace foo";
    }
    const Fuu="constante dans espace de nom foo";

    $string="bonjour";
    echo \strlen($string); // dans l'espace de nom \ racine
    
    function strlen($string){
        echo $string;
    }
    
}

namespace bar {

    function foo() {
        echo "je suis foo";
    }
     class Faa{
        private $foo="je suis dans le namespace bar";
    }
    const Fuu="constante dans espace de nom bar";

   // \foo\foo(); // appel de la fonction foo dans l'espace de nom foo nom absolu \ 
    
    
  var_dump(new \foo\Faa);
}


// boo/baa/buu

namespace boo\baa\buu{
    
    
    class Foo{
        private $foo="houpppps";
    }
}

namespace bii\byy\bee{
    
    
    class Foo{
        private $foo="houpppps";
    }
}


namespace work{
    
    use boo\baa\buu\Foo as Foo1;
    use bii\byy\bee\Foo as Foo2;

    var_dump(new Foo1());
    var_dump(new Foo2());
    
}


namespace loo\lii{
    class Foo{}
}

namespace loo{
    var_dump(new lii\Foo()); // non qualifié
    var_dump(new \loo\lii\Foo()); // qualifié chemin absolu
   // var_dump(new \loo\lii\Foo()); // nom absolu
    
}
?>