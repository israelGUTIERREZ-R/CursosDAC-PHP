package com.mycompany.cursosdacfinal;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet(name = "ModificarInformacionServlet", urlPatterns = {"/ModificarInformacionServlet"})
public class ModificarInformacionServlet extends HttpServlet {
    protected void processRequest(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        HttpSession session = request.getSession(false);
        if (session != null) {
            String user = (String) session.getAttribute("User");
            String rol = (String) session.getAttribute("RolUser");
            session.setAttribute("User", user);
            session.setAttribute("RolUser", rol);
        }
        response.sendRedirect("ModificarInformacion.jsp");
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
