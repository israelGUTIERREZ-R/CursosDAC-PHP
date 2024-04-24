package com.mycompany.cursosdacfinal;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
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

@WebServlet(name = "AgregarUser", urlPatterns = {"/AgregarUser"})
public class AgregarUser extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        String nombreUser = request.getParameter("USER");
        String rolUser = request.getParameter("ROL");
        String contraUser = request.getParameter("PASS");
        String baseDatos=(String) request.getParameter("BaseDatos");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");

            String sql = "INSERT INTO usuario(NombreUsuario, Password, Rol, EstadoUsuario)  values (?, ?, ?, ?);";
            PreparedStatement pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, nombreUser);
            pstmt.setString(2, contraUser);
            pstmt.setString(3, rolUser);
            pstmt.setInt(4, 0);
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
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1/cursosdac?serverTimezone=UTC", "root", "1234");

            String sql = "INSERT INTO usuario(NombreUsuario, Password, Rol, EstadoUsuario)  values (?, ?, ?, ?);";
            PreparedStatement pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, nombreUser);
            pstmt.setString(2, contraUser);
            pstmt.setString(3, rolUser);
            pstmt.setInt(4, 0);
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
    public String getServletInfo() {
        return "Short description";
    }

}
