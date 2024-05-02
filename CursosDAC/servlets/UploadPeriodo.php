<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num = rand(1, 100000);
        $idPeriodo = "Per" . $num;
        $idCurso = $_POST['comboC'];
        $periodo = $_POST['per'];
        $fechaInicio = $_POST['fechaIn'];
        $fechaFin = $_POST['fechaFn'];
        $ingresos = $_POST['ingresos'];
        $egresos = $_POST['egresos'];
        $baseDatos = $_POST['BaseDatos'];

        $conn = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO periodo(IDPeriodo, IDCurso, NumeroPeriodo, FechaInicio, FechaFin, Ingresos, Egresos) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idPeriodo);
            $stmt->bindParam(2, $idCurso);
            $stmt->bindParam(3, $periodo);
            $stmt->bindParam(4, $fechaInicio);
            $stmt->bindParam(5, $fechaFin);
            $stmt->bindParam(6, $ingresos);
            $stmt->bindParam(7, $egresos);
            $stmt->execute();
    }