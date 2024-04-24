package com.mycompany.cursosdacfinal;

import java.io.*;
import java.sql.*;
import java.util.Random;
import java.util.logging.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name = "UploadPeriodo", urlPatterns = {"/UploadPeriodo"})
public class UploadPeriodo extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        Random rand = new Random();
        int num=(int)rand.nextInt(100000) + 1;
        System.out.println(num);
        String idPeriodo = "Per"+(String.valueOf(num));
        String idCurso = request.getParameter("comboC");
        String periodo = request.getParameter("per");
        String fechaInicio = request.getParameter("fechaIn");
        String fechaFin = request.getParameter("fechaFn");
        String ingresos = request.getParameter("ingresos");
        String egresos = request.getParameter("egresos");
        
        String baseDatos=request.getParameter("BaseDatos");

        System.out.println("idPeriodo: " + idPeriodo);
        System.out.println("idCurso: " + idCurso);

        if (idCurso == null || idCurso.trim().isEmpty()) {
            System.out.println("IDCurso is null or empty");
            // Handle the error, maybe return a response or redirect
            return;
        }

        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");

            String sql = "INSERT INTO periodo(IDPeriodo, IDCurso, NumeroPeriodo, FechaInicio, FechaFin, Ingresos, Egresos)  values (?, ?, ?, ?, ?, ?, ?);";
            PreparedStatement pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, idPeriodo);
            pstmt.setString(2, idCurso);
            pstmt.setString(3, periodo);
            pstmt.setString(4, fechaInicio);
            pstmt.setString(5, fechaFin);
            pstmt.setString(6, ingresos);
            pstmt.setString(7, egresos);

            pstmt.executeUpdate();
            System.out.println("AGREGACIÓN REALIZADA EXITOSAMENTE");
        } catch (SQLException e) {
            System.out.println("NO SE CONECTÓ: " + e.toString());
            response.setStatus(HttpServletResponse.SC_INTERNAL_SERVER_ERROR);
            response.getWriter().write("Error al conectar a la base de datos: " + e.getMessage());
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(UploadPDFServlet.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
    }

}
