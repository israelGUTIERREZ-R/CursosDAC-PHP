package com.mycompany.cursosdacfinal;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet(name = "NuevaBD", urlPatterns = {"/NuevaBD"})
public class NuevaBD extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/cursosdac?serverTimezone=UTC", "root", "1234");
            Statement consulta2 = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
            String baseDatos = request.getParameter("nombreBD");
            
            String query1 = "CREATE DATABASE  IF NOT EXISTS `" + baseDatos + "`;";
            consulta2.executeUpdate(query1);
            
            String query1_5="USE `"+baseDatos+"`;";
            consulta2.executeUpdate(query1_5);
            
            String query2="CREATE TABLE `escuela` (`Siglas` varchar(45) NOT NULL, `Nombre` varchar(100) NOT NULL, PRIMARY KEY (`Siglas`)) "
                    + "ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
            consulta2.executeUpdate(query2);
            
            String query3="INSERT INTO `escuela` VALUES ('CADAVAM','Centro de Adiestramiento Avanzado de la Armada de México'), "
                    +"('CECACIGO','Centro de Entrenamiento de Control de Averías y Contraincendio del Golfo'), "
                    +"('CECACIPA','Centro de Entrenamiento de Control de Averìas y Contraincendio del Pacìfico'), "
                    +"('CECAISMAR','Centro de Capacitación Integral de Supervivencia en la Mar'),('CECANOG','Centro de Capacitación y Adiestramiento Naval Operativo del Golfo'), "
                    +"('CECANOP','Centro de Capacitación Naval Operativo del Pacífico '),('CENAREG-10','Centro de Adiestramiento Regional Número 10'),"
                    +"('CENAREG-16','Centro de Adiestramiento Regional Número 16'),('CENAREG-3','Centro de Adiestramiento Regional Número 3'),"
                    +"('CENAREG-4','Centro de Adiestramiento Regional Número 4'),('CENAREG-6','Centro de Adiestramiento Regional Número 6'),"
                    +"('CENAREG-8','Centro de Adiestramiento Regional Número 8'),('CENAREG-9','Centro de Adiestramiento Regional Número 9'),"
                    +"('CENAREG-ANF','Centro de Adiestramiento Regional Anfibio'),('CENCAEIM','Centro de Capacitación y Adiestramiento Especializado de Infantería de Marina'),"
                    +"('CENCAPETRIV','Centro de Capacitación y Entrenamiento para Tripulaciones de Vuelo'),"
                    +"('CENCASANT','Centro de Capacitación y Adiestramiento de Sistema Aéreos no Tripulados'),('CENCAVELA','Centro de capacitación y Adiestramiento de Vela'),"
                    +"('CESISCCAM','Centro de Capacitación para el Sistema de Mando y Control'),('ESBUSREB','Escuela de Búsqueda, Rescate y Buceo'),"
                    +"('ESCMAQNAV','Escuela de Maquinaria Naval'),('ESEM','Escuela de Escala de Mar'),('ESMECAVNAV','Escuela de Mecánica de Aviación Naval'),"
                    +"('IOG','Instituto Oceanográfico del Pacífico');";
            consulta2.executeUpdate(query3);
            
            String query4="CREATE TABLE `curso` (`IDCurso` varchar(20) NOT NULL, `Escuela` varchar(45) NOT NULL, `NombreCurso` varchar(75) NOT NULL, "
                    + "`Registro` longblob NOT NULL, PRIMARY KEY (`IDCurso`,`Escuela`), KEY `EEN_idx` (`Escuela`), CONSTRAINT `EEN` FOREIGN KEY (`Escuela`) REFERENCES `escuela` "
                    + "(`Siglas`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
            consulta2.executeUpdate(query4);
            
            String query5="CREATE TABLE `periodo` (`IDPeriodo` varchar(20) NOT NULL,`IDCurso` varchar(20) NOT NULL,`NumeroPeriodo` int NOT NULL, `FechaInicio` date NOT NULL, "
                    +"`FechaFin` date NOT NULL, `Ingresos` int NOT NULL, `Egresos` int NOT NULL, PRIMARY KEY (`IDPeriodo`,`IDCurso`), KEY `cursos_idx` (`IDCurso`), "
                    +"CONSTRAINT `cursos` FOREIGN KEY (`IDCurso`) REFERENCES `curso` (`IDCurso`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
            consulta2.executeUpdate(query5);
            
            String query6="CREATE TABLE `usuario` (`IDUsuario` int NOT NULL AUTO_INCREMENT, `NombreUsuario` varchar(45) NOT NULL,`Password` varchar(45) NOT NULL, "
                    +"`Rol` varchar(45) NOT NULL, `EstadoUsuario` int DEFAULT NULL, PRIMARY KEY (`IDUsuario`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";
            consulta2.executeUpdate(query6);
            
            String query7="INSERT INTO `usuario` VALUES (1,'root','1234','Admin',0),(2,'visit','1234','Invited',0),(3,'Administrador','UninaV*2024','root',0);";
            consulta2.executeUpdate(query7);

            HttpSession session = request.getSession();
            session.setAttribute("BaseDatos", baseDatos);
            String databaseName = (String) session.getAttribute("BaseDatos");
            getServletContext().setAttribute("BaseDatos", databaseName);

        } catch (SQLException e) {
            System.out.println(e.toString());
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(NuevaBD.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }

}
