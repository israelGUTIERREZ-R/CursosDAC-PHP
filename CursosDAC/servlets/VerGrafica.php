<?php
    session_start();
    $ingresos=$_GET['ingresos'];
    $egresos=$_GET['egresos'];
    $curso=$_GET['curso'];
    $fechaI=$_GET['fechaI'];
    $fechaF=$_GET['fechaF'];

    $fechaDateInicio = DateTime::createFromFormat('Y-m-d', $fechaI);
    $fechaDateFinal = DateTime::createFromFormat('Y-m-d', $fechaF);
    if ($fechaDateInicio && $fechaDateFinal) {
        $fechaFormateadaInicio = $fechaDateInicio->format('d-m-Y');
        $fechaFormateadaFinal = $fechaDateFinal->format('d-m-Y');

        $fechaI=$fechaFormateadaInicio;
        $fechaF=$fechaFormateadaFinal;
    } else {
        echo "Error: Formato de fecha no válido.";
    }


?>
<!DOCTYPE html>
<html>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<body>

<div id="myPlot" style="width:100%;max-width:700px"></div>
<div id="mySecondPlot" style="width:100%;max-width:700px"></div>

<script>
const xArray = ["Elementos ingresados", "Elementos egresados"];
const yArray = [Number(<?php echo $ingresos?>),Number(<?php echo $egresos?>)];

const xArray2 = ["No egresados", "Egresados"];
const yArray2 = [Number(<?php echo ($ingresos - $egresos)?>), Number(<?php echo $egresos?>)];;

console.log(yArray2);

const data = [{
  x:xArray,
  y:yArray,
  type:"bar",
  orientation:"v",
  marker: {color:"rgba(0,0,255,0.6)"},
  width: 0.3
}];

const data2 = [{labels:xArray2, values:yArray2, type:"pie"}];

const layout = {
  title:"<?php echo $curso?>",
  annotations: [{
    text: "<?php echo $fechaI?> al <?php echo $fechaF?>",
    showarrow: false,
    align: 'center',
    xref: 'paper',
    yref: 'paper',
    x: 0.5,
    y: 1.1
  }]
};

const layout2 = {
  title:"Porcentajes de egresos",
};

Plotly.newPlot("myPlot", data, layout);
Plotly.newPlot("mySecondPlot", data2, layout2);
</script>

</body>
</html>