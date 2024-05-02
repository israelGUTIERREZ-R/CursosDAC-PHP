<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $baseDatos = $_POST['BaseDatos'];
        $fileContent = fopen($_FILES['file']['tmp_name'], 'r');

        if ($fileContent) {
            fgetcsv($fileContent); // Skip header row
            while (($data = fgetcsv($fileContent)) !== false) {
                if (!empty($data)) {
                    insertDataIntoDatabase($baseDatos, $data);
                }
            }
            fclose($fileContent);
            echo "DATOS SUBIDOS CORRECTAMENTE";
        } else {
            echo "Error al abrir el archivo CSV";
        }

    }

    function insertDataIntoDatabase($baseDatos, $data) {
        $conn = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO periodo (IDPeriodo, IDCurso, NumeroPeriodo, FechaInicio, FechaFin, Ingresos, Egresos) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $data[0]);
        $stmt->bindParam(2, $data[1]);
        $stmt->bindParam(3, $data[2], PDO::PARAM_INT);
        $stmt->bindParam(4, $data[3]);
        $stmt->bindParam(5, $data[4]);
        $stmt->bindParam(6, $data[5], PDO::PARAM_INT);
        $stmt->bindParam(7, $data[6], PDO::PARAM_INT);

        $stmt->execute();
    }