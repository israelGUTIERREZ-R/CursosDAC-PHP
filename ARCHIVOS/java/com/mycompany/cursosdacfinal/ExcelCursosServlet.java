package com.mycompany.cursosdacfinal;

import java.io.*;
import java.nio.file.Files;
import java.sql.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

@WebServlet("/ExcelCursosServlet")
@MultipartConfig
public class ExcelCursosServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String baseDatos = request.getParameter("BaseDatos");

        InputStream fileContent = null;
        BufferedReader br = null;

        try {
            Part filePart = request.getPart("file");
            fileContent = filePart.getInputStream();
            br = new BufferedReader(new InputStreamReader(fileContent));

            br.readLine(); // Skip header line

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

    private void insertDataIntoDatabase(String baseDatos, String[] data) throws SQLException, IOException {
        String jdbcUrl = "jdbc:mysql://127.0.0.1/" + baseDatos + "?serverTimezone=UTC";
        String dbUser = "root";
        String dbPassword = "1234";

        try (Connection connection = DriverManager.getConnection(jdbcUrl, dbUser, dbPassword)) {
            String query = "INSERT INTO curso (IDCurso, Escuela, NombreCurso, Registro) VALUES (?, ?, ?, ?)";

            try (PreparedStatement preparedStatement = connection.prepareStatement(query)) {
                preparedStatement.setString(1, data[0].trim());
                preparedStatement.setString(2, data[1].trim());
                preparedStatement.setString(3, data[2].trim());

                // Handle PDF file path from local disk (C:)
                String pdfFilePath = data[3].trim();
                File pdfFile = new File(pdfFilePath);
                byte[] pdfData = Files.readAllBytes(pdfFile.toPath());

                preparedStatement.setBytes(4, pdfData);

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
