<?php

// surcharger la configuration de php.ini
ini_set('max_execution_time', 2);

// catcher l'erreur pour afficher un message
register_shutdown_function(function () {
    echo "it's finish";
    var_dump(memory_get_usage(true) . ' octets');
});

for (; ;) ;