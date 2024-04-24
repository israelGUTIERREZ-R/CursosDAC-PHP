package com.mycompany.cursosdacfinal;

import javax.servlet.ServletContextEvent;
import javax.servlet.ServletContextListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import javax.servlet.annotation.WebListener;
import javax.servlet.http.HttpSession;

@WebListener
public class AppContextListener implements ServletContextListener {

    @Override
    public void contextDestroyed(ServletContextEvent sce) {
        String databaseName = (String) sce.getServletContext().getAttribute("BaseDatos");
        System.out.println("DSATABASE LOGOUT="+databaseName);
        updateUsersStatus(sce.getServletContext().getAttribute("LastLoggedInUser"), databaseName);
    }

    private void updateUsersStatus(Object lastLoggedInUser, String databaseName) {
        if (lastLoggedInUser != null) {
            String username = (String) lastLoggedInUser;
            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection connection = DriverManager.getConnection("jdbc:mysql://127.0.0.1/" + databaseName + "?serverTimezone=UTC", "root", "1234");

                // Assuming you have a column named 'EstadoUsuario' in the 'usuario' table
                String updateQuery = "UPDATE usuario SET EstadoUsuario = 0 WHERE nombreUsuario = ?";
                try (PreparedStatement statement = connection.prepareStatement(updateQuery)) {
                    statement.setString(1, username);
                    statement.executeUpdate();
                }
                connection.close();
            } catch (SQLException | ClassNotFoundException e) {
                e.printStackTrace(); // Handle exceptions appropriately
            }
            
            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection connection2 = DriverManager.getConnection("jdbc:mysql://127.0.0.1/cursosdac?serverTimezone=UTC", "root", "1234");

                // Assuming you have a column named 'EstadoUsuario' in the 'usuario' table
                String updateQuery = "UPDATE usuario SET EstadoUsuario = 0 WHERE nombreUsuario = ?";
                try (PreparedStatement statement = connection2.prepareStatement(updateQuery)) {
                    statement.setString(1, username);
                    statement.executeUpdate();
                }
                connection2.close();
            } catch (SQLException | ClassNotFoundException e) {
                e.printStackTrace(); // Handle exceptions appropriately
            }
        }
    }

    @Override
    public void contextInitialized(ServletContextEvent sce) {
        // Initialization logic if needed
    }
}
