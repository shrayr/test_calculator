<?php

require_once "classes/calculator.php";

if (isset($_POST['button'])) {

    if ($_POST['button'] == "=") {

        // get equation from calculator
        $equation = $_POST['anzeige'];

        // make instance of Calculator class and solve equation
        $calculator = new \Calculator();
        $result = $calculator->solveInfix($equation);

        header("Location: " . 'index.php?display=' . $result, true);
        exit();

    } elseif($_POST['button'] == "C") {

        // make 'display' to null and redirect
        header("Location: " . 'index.php?display=', true);
        exit();
    } else{

        // change url's display param
        $url = urlencode($_POST['anzeige'] . $_POST['button']);

        // redirect
        header("Location: " . 'index.php?display=' . $url, true);
        exit();

    }

}