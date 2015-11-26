<?php

namespace fa {

    function foo() {
        echo __NAMESPACE__;
    }

    class Bar {
        
    }

    const BAZ = "BAZ";

    // \du\foo();

    echo \strlen("bonjour");

    // exercice redéfinir la fonction strlen dans cet espace de nom

    function strlen($string) {
        echo $string;
    }

    // utiliser la fonction foo dans l'espace de nom boo\baa\buu

    \boo\baa\buu\foo();
}

namespace du {

    function foo() {
        echo __NAMESPACE__;
    }

    class Bar {
        
    }

    const BAZ = "BAZ";

    function facebook() {
        
    }

}

namespace boo\baa\buu {

    function foo() {
        echo __NAMESPACE__;
    }

}

namespace loo\lii {

    class Foo {
        
    }

}

namespace loo {
    
}

namespace boo\baa\buu {


    class Foo {

        private $foo = "houpppps";

    }

}

namespace byy\bii\bee {


    class Foo {

        private $foo = "houpppps";

    }

}

namespace work {

    use boo\baa\buu\Foo as Foo1;
    use byy\bii\bee\Foo as Foo2;

var_dump(new Foo1());
    var_dump(new Foo2());
}

