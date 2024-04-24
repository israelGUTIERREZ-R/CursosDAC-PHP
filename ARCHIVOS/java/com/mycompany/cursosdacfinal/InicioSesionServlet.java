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

@WebServlet(name = "InicioSesionServlet", urlPatterns = {"/InicioSesionServlet"})
public class InicioSesionServlet extends HttpServlet {


    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        HttpSession session = request.getSession();
        if (session != null) {
            String user = (String) session.getAttribute("User");
            String rol = (String) session.getAttribute("RolUser");
            String baseDatos=(String) request.getParameter("BaseDatos");
            System.out.println(baseDatos);
            
            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/"+baseDatos+"?serverTimezone=UTC", "root", "1234");
                String query2 = "UPDATE usuario SET usuario.EstadoUsuario=1 WHERE usuario.nombreUsuario=\"" + user + "\" AND usuario.Rol=\"" + rol + "\";";
                Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                consulta.executeUpdate(query2);
            } catch (SQLException ex) {
                out.println("Se produjo una excepción durante la conexión:" + ex);
            } catch (ClassNotFoundException ex) {
                out.println("Se produjo una excepción:" + ex);
            }
        }
    }

}
