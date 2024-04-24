package com.mycompany.cursosdacfinal;

import java.io.*;
import java.sql.*;
import java.util.logging.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

@WebServlet(name = "UploadPDFServlet", urlPatterns = {"/UploadPDFServlet"})
@MultipartConfig
public class UploadPDFServlet extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String idCurso = request.getParameter("cajaIDCurso");
        String baseDatos=request.getParameter("BaseDatos");
        
        System.out.println(baseDatos);

        if (idCurso == null || idCurso.trim().isEmpty()) {
            System.out.println("IDCurso is null or empty");
            return;
        }

        String nombreCurso = request.getParameter("cajaNombreCurso");
        String escuela = request.getParameter("combo");

        Part filePart = request.getPart("file");
        InputStream pdfFileBytes = null;

        if (filePart != null && filePart.getContentType().equals("application/pdf")) {
            pdfFileBytes = filePart.getInputStream();
        } else {
            System.out.println("NO SE DEPOSITÓ CORRECTAMENTE EL PDF");
        }

        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");
            System.out.println(conn.toString());

            String sql = "INSERT INTO curso(IDCurso, Escuela, NombreCurso, Registro)  values (?, ?, ?, ?);";
            PreparedStatement pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, idCurso);
            pstmt.setString(2, escuela);
            pstmt.setString(3, nombreCurso);
            if (pdfFileBytes != null) {
                pstmt.setBlob(4, pdfFileBytes);
            } else {
                pstmt.setNull(4, java.sql.Types.BLOB);
            }
            pstmt.executeUpdate();
            System.out.println("AGREGACIÓN REALIZADA EXITOSAMENTE");
        } catch (SQLException e) {
            if(e.getMessage().contains("SQLIntegrityConstraintViolationException")){
                System.out.println("INFORMACIÓN ANTERIORMENTE AGREGADA");
            }
            System.out.println("NO SE CONECTÓ: " + e.toString());
            response.setStatus(HttpServletResponse.SC_INTERNAL_SERVER_ERROR);
            response.getWriter().write("Error al conectar a la base de datos: " + e.getMessage());
        }catch (ClassNotFoundException ex) {
            Logger.getLogger(UploadPDFServlet.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
    }
}
