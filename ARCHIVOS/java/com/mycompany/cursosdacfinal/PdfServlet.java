package com.mycompany.cursosdacfinal;

import java.io.IOException;
import java.sql.Blob;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/pdf_Registro")
public class PdfServlet extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String pdfId = request.getParameter("EEN");
        String nombreCurso = request.getParameter("curso");
        String baseDatos=request.getParameter("BaseDatos");
        
        System.out.println("EEN: " + pdfId);
System.out.println("nombreCurso: " + nombreCurso);
System.out.println("BaseDatos: " + baseDatos);

        byte[] pdfData = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");
            Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
            String query = "SELECT Registro FROM curso WHERE escuela=\"" + pdfId + "\" AND nombreCurso=\""+nombreCurso+"\";";
            System.out.println("SQL Query: " + query);
            ResultSet rs = consulta.executeQuery(query);
            if (rs.next()) {
                Blob pdfBlob = rs.getBlob("Registro");
                if (pdfBlob != null) {
                    pdfData = pdfBlob.getBytes(1, (int) pdfBlob.length());
                }
            }
        } catch (SQLException ex) {
            System.out.println("Se produjo una excepción durante la conexión:" + ex);
        } catch (ClassNotFoundException ex) {
            System.out.println("Se produjo una excepción:" + ex);
        }

        if (pdfData != null) {
            response.setContentType("application/pdf");
            response.getOutputStream().write(pdfData);
        } else {
            response.getWriter().println("No se encontraron datos PDF para el ID proporcionado.");
        }
    }
}
