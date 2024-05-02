<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $idCurso = $_POST['cajaIDCurso'];
        $baseDatos = $_POST['BaseDatos'];

        if (empty($idCurso)) {
            echo "IDCurso is null or empty";
            return;
        }

        $nombreCurso = $_POST['cajaNombreCurso'];
        $escuela = $_POST['combo'];
        $pdfFile = $_FILES['file']['tmp_name'];
        $pdfContent = file_get_contents($pdfFile);

        $conn = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
        $sql = "INSERT INTO curso(IDCurso, Escuela, NombreCurso, Registro) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $idCurso);
            $stmt->bindParam(2, $escuela);
            $stmt->bindParam(3, $nombreCurso);
            $stmt->bindParam(4, $pdfContent, PDO::PARAM_LOB);
            $stmt->execute();
    }