package com.mycompany.cursosdacfinal;

import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.jfree.chart.*;
import org.jfree.chart.plot.*;
import java.io.*;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.imageio.ImageIO;
import org.jfree.chart.renderer.category.BarRenderer;
import org.jfree.data.category.DefaultCategoryDataset;
import org.jfree.chart.axis.NumberAxis;
import org.jfree.chart.axis.NumberTickUnit;
import org.jfree.chart.labels.StandardPieSectionLabelGenerator;
import org.jfree.data.general.DefaultPieDataset;

@WebServlet(name = "VerGrafica", urlPatterns = {"/VerGrafica"})
public class VerGrafica extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        
    }

    
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String ingreso = request.getParameter("ingresos");
        String egreso = request.getParameter("egresos");
        String curso = request.getParameter("curso");
        String fechaInicio = request.getParameter("fechaI");
        String fechaFin = request.getParameter("fechaF");
        int ing = Integer.parseInt(ingreso);
        int egr = Integer.parseInt(egreso);
        
        // Crear gráfica de pastel
        DefaultPieDataset pieDataset = createDataset(ing, egr);
        JFreeChart pieChart = createCustomPieChart(pieDataset, curso);

        // Crear gráfica de barras
        String fechaFormateadaInicio="",fechaFormateadaFinal="";
        
        DefaultCategoryDataset dataset = new DefaultCategoryDataset();
        dataset.setValue(ing, "Ingresos", "Elementos ingresados");
        dataset.setValue(egr, "Egresos", "Elementos egresados");
        
        SimpleDateFormat formatoOriginal = new SimpleDateFormat("yyyy-MM-dd");
        SimpleDateFormat formatoDeseado = new SimpleDateFormat("dd-MM-yyyy");
        
         try {
            Date fechaDateInicio = formatoOriginal.parse(fechaInicio);
            Date fechaDateFinal = formatoOriginal.parse(fechaFin);
            fechaFormateadaInicio = formatoDeseado.format(fechaDateInicio);
            fechaFormateadaFinal = formatoDeseado.format(fechaDateFinal);
        } catch (ParseException e) {
             System.out.println(e.toString());
        }

        JFreeChart barChart = createCustomBarChart(dataset, curso, ("Fechas de periodo: "+fechaFormateadaInicio + 
                " al " + fechaFormateadaFinal));


        // Combinar ambas gráficas en una sola imagen
        int width = 1000;
        int height = 600;
        BufferedImage combinedImage = new BufferedImage(width, height, BufferedImage.TYPE_INT_ARGB);
        Graphics2D g2d = combinedImage.createGraphics();

        // Dibujar gráfico de pastel
        g2d.drawImage(pieChart.createBufferedImage(width / 2, height, BufferedImage.TYPE_INT_ARGB, null), 0, 0, null);

        // Dibujar gráfico de barras
        g2d.drawImage(barChart.createBufferedImage(width / 2, height, BufferedImage.TYPE_INT_ARGB, null), width / 2, 0, null);

        // Enviar imagen combinada como respuesta
        try (OutputStream os = response.getOutputStream()) {
            ImageIO.write(combinedImage, "png", os);
        } catch (IOException e) {
            System.err.println("Error creando gráfico combinado.");
        }
    }

    private DefaultPieDataset createDataset(int ingresos, int egresos) {
        DefaultPieDataset dataset = new DefaultPieDataset();

        // Calcular porcentajes para ingresos y egresos
        double porcentajeEgresos = (double) ((egresos) * 100) / ingresos;
        double porcentajeIngresos = 100 - porcentajeEgresos;

        // Mostrar porcentajes en el gráfico de pastel
        dataset.setValue("No Egresados", porcentajeIngresos);
        dataset.setValue("Egresos", porcentajeEgresos);

        return dataset;
    }

    private JFreeChart createCustomPieChart(DefaultPieDataset dataset, String curso) {
        JFreeChart chart = ChartFactory.createPieChart(
                "Curso: " + curso, dataset, true, true, false);
        PiePlot plot = (PiePlot) chart.getPlot();

        // Colores personalizados para cada segmento
        plot.setSectionPaint("No Egresados", new Color(146, 146, 146));
        plot.setSectionPaint("Egresos", new Color(14, 50, 145));

        // Muestra los porcentajes en las etiquetas del gráfico
        plot.setLabelGenerator(new StandardPieSectionLabelGenerator("{0} ({2})"));
        plot.setBackgroundPaint(Color.WHITE);
        plot.setLabelOutlinePaint(new Color(255, 255, 255));

        return chart;
    }

    private JFreeChart createCustomBarChart(DefaultCategoryDataset dataset, String curso, String fecha) {
        JFreeChart chart = ChartFactory.createBarChart("Curso: " + curso, fecha, "Cantidad de elementos",
                dataset, PlotOrientation.VERTICAL, true, true, false);

        // Personalización del gráfico
        CategoryPlot plot = chart.getCategoryPlot();
        BarRenderer renderer = (BarRenderer) plot.getRenderer();
        renderer.setSeriesPaint(0, new Color(90, 227, 171)); // Ingresos
        renderer.setSeriesPaint(1, new Color(14, 50, 145));   // Egresos
        chart.setBackgroundPaint(Color.WHITE);

        plot.getDomainAxis().setCategoryMargin(0.2);
        renderer.setMaximumBarWidth(0.6);

        NumberAxis yAxis = (NumberAxis) plot.getRangeAxis();
        yAxis.setStandardTickUnits(NumberAxis.createIntegerTickUnits());
        yAxis.setAutoRangeIncludesZero(true);
        yAxis.setTickUnit(new NumberTickUnit(1.0));

        return chart;
    }
    

    
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
