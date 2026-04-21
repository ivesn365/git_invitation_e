<?php

class ConvertA
{

    public static function mois($mois){
        if ($mois == 'January') return 'Janvier';
        elseif ($mois == 'February') return 'Février';
        elseif ($mois == 'March') return 'Mars';
        elseif ($mois == 'April') return 'Avril';
        elseif ($mois == 'May') return 'Mai';
        elseif ($mois == 'June') return 'Juin';
        elseif ($mois == 'July') return 'Juillet';
        elseif ($mois == 'August') return 'Août';
        elseif ($mois == 'September') return 'Septembre';
        elseif ($mois == 'October') return 'Octobre';
        elseif ($mois == 'November') return 'Novembre';
        elseif ($mois == 'December') return 'Décembre';
        else return $mois;
    }


    public static function jour($jour){
        if ($jour == 'Monday') return 'Lundi';
        if ($jour == 'Tuesday') return 'Mardi';
        if ($jour == 'Wednesday') return 'Mercredi';
        if ($jour == 'Thursday') return 'Jeudi';
        if ($jour == 'Friday') return 'Vendredi';
        if ($jour == 'Saturday') return 'Samedi';
        if ($jour == 'Sunday') return 'Dimanche';
    }

}