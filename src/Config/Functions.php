<?php

function timeAgo($date)
{
    $differentTime = time() - $date;
    if ($differentTime < 1) {
        return 'Justo ahora';
    }
    $condition = array(
        12 * 30 * 24 * 60 * 60 => 'año',
        30 * 24 * 60 * 60 => 'mes',
        24 * 60 * 60 => 'dia',
        60 * 60 => 'hora',
        60 => 'minuto',
        1 => 'segundo'
    );
    foreach ($condition as $secs => $str) {
        $d = $differentTime / $secs;
        if ($d >= 1) {
            // Redondear
            $t = round($d);
            return 'hace ' . $t . ' ' . $str . ($t > 1 ? 's' : '');
        }
    }

    return $date;
}
