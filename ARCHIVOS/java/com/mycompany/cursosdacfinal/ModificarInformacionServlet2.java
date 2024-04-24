package com.mycompany.cursosdacfinal;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

@WebServlet(name = "ModificarInformacionServlet2", urlPatterns = {"/ModificarInformacionServlet2"})
public class ModificarInformacionServlet2 extends HttpServlet {
    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        try {
            String nombreCurso = request.getParameter("caja1");
            String fechaInicio = request.getParameter("caja2");
            String fechaFin = request.getParameter("caja3");
            String ingresoStr = request.getParameter("caja4");
            String egresoStr = request.getParameter("caja5");
            String numP = request.getParameter("caja6");
            String baseDatos=request.getParameter("BaseDatos");
            String idCurso = "", idPeriodo = "";

            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");
                
                
                Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                String query1 = "SELECT IDCurso FROM curso WHERE NombreCurso='" + nombreCurso + "';";
                ResultSet rs = consulta.executeQuery(query1);
                while (rs.next()) {
                    idCurso = rs.getString(1);
                }

                
                
                Statement consulta3 = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                String query2 = "SELECT IDPeriodo FROM periodo WHERE IDcurso='" + idCurso + "' AND FechaInicio = STR_TO_DATE('" + fechaInicio + "', '%Y-%m-%d');";
                System.out.println("Generated SQL query: " + query2);
                ResultSet rs3 = consulta3.executeQuery(query2);
                while (rs3.next()) {
                    idPeriodo = rs3.getString(1);
                }

                
                
                
                Statement consulta2 = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                String query3 = "UPDATE periodo SET FechaInicio = '" + fechaInicio + "', FechaFin = '" + fechaFin + "', Ingresos = '" + ingresoStr + "', Egresos = '" 
                        + egresoStr + "' WHERE IDCurso = '" + idCurso + "' AND FechaInicio = '" + fechaInicio + "' AND NumeroPeriodo='" + numP + "' AND IDPeriodo='" + idPeriodo + "';";
                consulta2.executeUpdate(query3);
                
                
                
            } catch (SQLException e) {
                System.out.println(e.toString());
            }
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(ModificarInformacionServlet2.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        

        
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }
}
