package com.mycompany.cursosdacfinal;

import java.io.*;
import java.sql.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

@WebServlet("/ExcelServlet")
@MultipartConfig
public class ExcelServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
        throws ServletException, IOException {
    String baseDatos = request.getParameter("BaseDatos");

    InputStream fileContent = null;
    BufferedReader br = null;

    try {
        Part filePart = request.getPart("file");
        fileContent = filePart.getInputStream();
        br = new BufferedReader(new InputStreamReader(fileContent));

        br.readLine();

        String line;
        while ((line = br.readLine()) != null) {
            if (!line.trim().isEmpty()) {
                String[] data = line.split(",");
                insertDataIntoDatabase(baseDatos, data);
            }
        }
    } catch (Exception e) {
        response.getWriter().write("Error: " + e.getMessage());
    } finally {
        if (br != null) {
            br.close();
        }
        if (fileContent != null) {
            fileContent.close();
        }
    }
}

    private void insertDataIntoDatabase(String baseDatos, String[] data) throws SQLException {
        String jdbcUrl = "jdbc:mysql://127.0.0.1/" + baseDatos + "?serverTimezone=UTC";
        String dbUser = "root";
        String dbPassword = "1234";

        try (Connection connection = DriverManager.getConnection(jdbcUrl, dbUser, dbPassword)) {
            String query = "INSERT INTO periodo (IDPeriodo, IDCurso, NumeroPeriodo, FechaInicio, FechaFin, Ingresos, Egresos) "
                    + "VALUES (?, ?, ?, ?, ?, ?, ?)";

            try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
                preparedStatement.setString(1, data[0].trim());
                preparedStatement.setString(2, data[1].trim());
                preparedStatement.setInt(3, Integer.parseInt(data[2].trim()));
                preparedStatement.setString(4, data[3].trim());
                preparedStatement.setString(5, data[4].trim());
                preparedStatement.setInt(6, Integer.parseInt(data[5].trim()));
                preparedStatement.setInt(7, Integer.parseInt(data[6].trim()));

                preparedStatement.executeUpdate();
            }
        }
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
