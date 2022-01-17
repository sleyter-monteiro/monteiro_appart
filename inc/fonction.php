<?php 

// fonction pour footer

function dateFR() {
    setlocale(LC_TIME, 'fra_fra');
    echo "Nous sommes le ";
    echo utf8_encode( strftime('%A, %d, %B, %Y'));
}


// création d'une fonction pour print_r

function jeprint_r($mavariable){
    echo "<pre>";
    print_r($mavariable);
    echo "</pre>";
}

// création d'une fonction pour debug

function debug($mavar){
    echo "<br> <small class=\"bg-warning text-white\">....var_dump</small><pre class=\"alert alert-warning w-50\">";
    var_dump($mavar);
    echo "</pre>";
}




?>