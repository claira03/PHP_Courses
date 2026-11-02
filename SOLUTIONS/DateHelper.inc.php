<?php

function dateEnMots($dateStr, $langue) {
    //$langue = 'fr' pour Francais et 'en' pour anglais
    $langue = strtolower($langue);
   
    $dateTimeObj = new DateTime($dateStr, new DateTimeZone('America/Moncton'));

    if($langue == 'en'){
        $strDate = IntlDateFormatter::formatObject( 
            $dateTimeObj, 
            'eeee  MMMM dd  y', 
            $langue 
          );
    }else{
        $strDate = IntlDateFormatter::formatObject( 
            $dateTimeObj, 
            'eeee, dd MMMM  y', 
            $langue 
          );
    }
    
   
    return $strDate;
}

function retournerDate() {
    $dateTimeObj = new DateTime('now', new DateTimeZone('America/Moncton'));

    return dateEnMots(IntlDateFormatter::formatObject($dateTimeObj,'yyyy-MM-dd'), 'fr');
}

function retournerHeure() {
    
   return date('H:i:s', time());
}

function dateEtHeure() {
    return retournerDate() . ' ' . retournerHeure();
}



?>