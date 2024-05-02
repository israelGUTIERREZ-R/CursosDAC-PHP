<?php
    session_start();
    if(isset($_POST['caja1'])&&isset($_POST['BaseDatos'])){
        $nombreCurso=$_POST['caja1'];
        $fechaInicio=$_POST['caja2'];
        $fechaFin=$_POST['caja3'];
        $ingresoStr=$_POST['caja4'];
        $egresoStr=$_POST['caja5'];
        $numP=$_POST['caja6'];
        $baseDatos=$_POST['BaseDatos'];
        $idCurso = ""; $idPeriodo = "";

        $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
        $query1 = "SELECT IDCurso FROM curso WHERE NombreCurso='" . $nombreCurso . "';";
        $rs=$conexion->query($query1);
        while ($row = $rs->fetch(PDO::FETCH_ASSOC)){
            $idCurso=$row['IDCurso'];
        }
        $query2 = "SELECT IDPeriodo FROM periodo WHERE IDcurso='" . $idCurso . "' AND FechaInicio = STR_TO_DATE('" . $fechaInicio . "', '%Y-%m-%d') AND NumeroPeriodo='" . $numP . "';";
        $rs2=$conexion->query($query2);
        while ($row2 = $rs2->fetch(PDO::FETCH_ASSOC)){
            $idPeriodo=$row2['IDPeriodo'];
        }
        if($idCurso!=null&&$idPeriodo!=null){
            $query3 = "DELETE FROM periodo WHERE IDCurso = '" . $idCurso . "' AND FechaInicio = '" . $fechaInicio . "' AND NumeroPeriodo='" . $numP . "' AND IDPeriodo='" 
                        . $idPeriodo . "';";
            $conexion->exec($query3);
            exit();
        }
        
    }