<?php

echo file_get_contents(__DIR__ . '/../../components/helpers.php');

function formatSpanishDate($date)
{ 
    setlocale(LC_TIME, 'es_ES.UTF-8');
    return strftime("%d de %B del %Y", strtotime($date));
}