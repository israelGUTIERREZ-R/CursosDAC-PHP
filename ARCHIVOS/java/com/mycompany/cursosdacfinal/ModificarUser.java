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

@WebServlet(name = "ModificarUser", urlPatterns = {"/ModificarUser"})
public class ModificarUser extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        request.setCharacterEncoding("UTF-8");
        try {
            String nombreUser = request.getParameter("USER");
            String rolUser = request.getParameter("ROL");
            String contraUser = request.getParameter("PASS");
            
            String baseDatos=(String) request.getParameter("BaseDatos");

            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");
                
                Statement consulta2 = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                String query3 = "UPDATE usuario SET NombreUsuario = '" + nombreUser +"' WHERE password = '" + contraUser + "' AND rol = '" + rolUser + "';";
                System.out.println(query3);
                consulta2.executeUpdate(query3);
                
                Connection conexion2 = DriverManager.getConnection("jdbc:mysql://127.0.0.1/cursosdac?serverTimezone=UTC", "root", "1234");
                Statement consulta3 = conexion2.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                String query4 = "UPDATE usuario SET NombreUsuario = '" + nombreUser +"' WHERE password = '" + contraUser + "' AND rol = '" + rolUser + "';";
                System.out.println(query4);
                consulta3.executeUpdate(query3);
                
                HttpSession session = request.getSession();
                session.setAttribute("User", nombreUser);
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
    }// </editor-fold>

}

