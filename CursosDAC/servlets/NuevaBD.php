<?php
    session_start();
    if (isset($_POST['nombreBD'])){
        $baseDatos=$_POST['nombreBD'];
        $conexion = new PDO('mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8', 'root', '1234');
        $query1 = "CREATE DATABASE  IF NOT EXISTS `" . $baseDatos . "`;";
        $conexion->exec($query1);
        $query1_5="USE `".$baseDatos."`;";
        $conexion->exec($query1_5);
        $query2="CREATE TABLE `escuela` (`Siglas` varchar(45) NOT NULL, `Nombre` varchar(100) NOT NULL, PRIMARY KEY (`Siglas`)) "
                    . "ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
        $conexion->exec($query2);
        $query3 = <<<SQL
            INSERT INTO `escuela` VALUES 
            ('CADAVAM','Centro de Adiestramiento Avanzado de la Armada de México'),
            ('CECACIGO','Centro de Entrenamiento de Control de Averías y Contraincendio del Golfo'),
            ('CECACIPA','Centro de Entrenamiento de Control de Averìas y Contraincendio del Pacìfico'),
            ('CECAISMAR','Centro de Capacitación Integral de Supervivencia en la Mar'),
            ('CECANOG','Centro de Capacitación y Adiestramiento Naval Operativo del Golfo'),
            ('CECANOP','Centro de Capacitación Naval Operativo del Pacífico '),
            ('CENAREG-10','Centro de Adiestramiento Regional Número 10'),
            ('CENAREG-16','Centro de Adiestramiento Regional Número 16'),
            ('CENAREG-3','Centro de Adiestramiento Regional Número 3'),
            ('CENAREG-4','Centro de Adiestramiento Regional Número 4'),
            ('CENAREG-6','Centro de Adiestramiento Regional Número 6'),
            ('CENAREG-8','Centro de Adiestramiento Regional Número 8'),
            ('CENAREG-9','Centro de Adiestramiento Regional Número 9'),
            ('CENAREG-ANF','Centro de Adiestramiento Regional Anfibio'),
            ('CENCAEIM','Centro de Capacitación y Adiestramiento Especializado de Infantería de Marina'),
            ('CENCAPETRIV','Centro de Capacitación y Entrenamiento para Tripulaciones de Vuelo'),
            ('CENCASANT','Centro de Capacitación y Adiestramiento de Sistema Aéreos no Tripulados'),
            ('CENCAVELA','Centro de capacitación y Adiestramiento de Vela'),
            ('CESISCCAM','Centro de Capacitación para el Sistema de Mando y Control'),
            ('ESBUSREB','Escuela de Búsqueda, Rescate y Buceo'),
            ('ESCMAQNAV','Escuela de Maquinaria Naval'),
            ('ESEM','Escuela de Escala de Mar'),
            ('ESMECAVNAV','Escuela de Mecánica de Aviación Naval'),
            ('IOG','Instituto Oceanográfico del Pacífico');
            SQL;
        $conexion->exec($query3);
        $query4="CREATE TABLE `curso` (`IDCurso` varchar(20) NOT NULL, `Escuela` varchar(45) NOT NULL, `NombreCurso` varchar(75) NOT NULL, "
                    . "`Registro` longblob NOT NULL, PRIMARY KEY (`IDCurso`,`Escuela`), KEY `EEN_idx` (`Escuela`), CONSTRAINT `EEN` FOREIGN KEY (`Escuela`) REFERENCES `escuela` "
                    . "(`Siglas`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
        $conexion->exec($query4);
        $query5=<<<SQL
            CREATE TABLE `periodo` (`IDPeriodo` varchar(20) NOT NULL,
                    `IDCurso` varchar(20) NOT NULL,
                    `NumeroPeriodo` int NOT NULL,
                    `FechaInicio` date NOT NULL,
                    `FechaFin` date NOT NULL,
                    `Ingresos` int NOT NULL,
                    `Egresos` int NOT NULL,
                    PRIMARY KEY (`IDPeriodo`,`IDCurso`),
                    KEY `cursos_idx` (`IDCurso`),
                    CONSTRAINT `cursos` FOREIGN KEY (`IDCurso`) REFERENCES `curso` (`IDCurso`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
        SQL;
        $conexion->exec($query5);
        $query6=<<<SQL
            CREATE TABLE `usuario` (`IDUsuario` INT NOT NULL AUTO_INCREMENT,
                    `NombreUsuario` varchar(45) NOT NULL,
                    `Password` varchar(45) NOT NULL,
                    `Rol` varchar(45) NOT NULL,
                    `EstadoUsuario` int DEFAULT NULL,
                    PRIMARY KEY (`IDUsuario`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
        SQL;
        $conexion->exec($query6);
        $query7="INSERT INTO `usuario` VALUES (1,'root','1234','Admin',0),(2,'visit','1234','Invited',0),(3,'Administrador','UninaV*2024','root',0);";
        $conexion->exec($query7);

        exit();

    }