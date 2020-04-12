<?php

function dd($val = null)
{
    print_r('<pre>'); print_r($val); print_r('<pre>'); die();
}

function dump($val = null)
{
    print_r('<pre>'); print_r($val); print_r('<pre>');
}