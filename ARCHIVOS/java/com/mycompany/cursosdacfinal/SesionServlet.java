package com.mycompany.cursosdacfinal;

import java.io.IOException;
import static java.lang.System.out;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.sql.*;

@WebServlet(name = "SesionServlet", urlPatterns = {"/SesionServlet"})
public class SesionServlet extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        HttpSession session = request.getSession(false);
        
        if (session != null) {
            String user = (String) session.getAttribute("User");
            String rol = (String) session.getAttribute("RolUser");
            String baseDatos=(String) request.getParameter("BaseDatos");
            System.out.println(baseDatos);
            
            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/cursosdac?serverTimezone=UTC", "root", "1234");
                String query2 = "UPDATE usuario SET usuario.EstadoUsuario=0 WHERE usuario.nombreUsuario=\"" + user + "\" AND usuario.Rol=\"" + rol + "\";";
                Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                consulta.executeUpdate(query2);
            } catch (SQLException ex) {
                out.println("Se produjo una excepción durante la conexión:" + ex);
            } catch (Exception ex) {
                out.println("Se produjo una excepción:" + ex);
            }
            
            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");
                String query2 = "UPDATE usuario SET usuario.EstadoUsuario=0 WHERE usuario.nombreUsuario=\"" + user + "\" AND usuario.Rol=\"" + rol + "\";";
                Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                consulta.executeUpdate(query2);
            } catch (SQLException ex) {
                out.println("Se produjo una excepción durante la conexión:" + ex);
            } catch (Exception ex) {
                out.println("Se produjo una excepción:" + ex);
            }
            
            response.sendRedirect("index.jsp");
            response.setHeader("Cache-Control", "no-cache, no-store, must-revalidate");
            response.setHeader("Pragma", "no-cache");
            response.setDateHeader("Expires", 0);
            session.invalidate();
        }

    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

}
