<?php
    session_start();

    $pdfId = $_GET['EEN'];
    $nombreCurso = $_GET['curso'];
    $baseDatos = $_GET['BaseDatos'];

    $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
    $query = "SELECT Registro FROM curso WHERE escuela='" . $pdfId . "' AND nombreCurso='" . $nombreCurso . "';";
    $resultado = $conexion->query($query);
    if ($row=$resultado->fetch(PDO::FETCH_ASSOC)){
        $pdfData = $row['Registro'];
        header('Content-Type: application/pdf');
        echo $pdfData;
    }else {
        echo "No se encontraron datos PDF para el ID proporcionado.";
    }