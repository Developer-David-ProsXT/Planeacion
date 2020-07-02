<?php
    include 'config.php';

    function ConvertidorCadena($palabra)
    {
        $array = preg_split("/[\s]+/"   , $palabra);
        $nuevapalabra = "";
        for($i = 0; $i < sizeof($array); $i++)
        {
            if ($i == 0) {
                $nuevapalabra = $array[$i];
            } else {
                $nuevapalabra = $nuevapalabra ."_".$array[$i];
            }
        }
        return $nuevapalabra;
    }

    $category_profe = $_POST['category_profe'];
    $category_periodo = $_POST['category_periodo'];
    $category_materia = $_POST['category_materia'];
    $category_grupo = $_POST['category_grupo'];

    $query = mysqli_query($mysql, "select nombre from Grupos where id=".$category_grupo.";");
    $dato = mysqli_fetch_assoc($query);
    $grupo = $dato['nombre'];

    $nombre_profe = "";
    $periodo = "";
    $materia = "";
    $unidad = "";
    $topics = "";
    $learning = "";
    $resources = ""; 
    $material = "";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos.css">
        <title>Planning catalog</title>
    </head>
    <body>
        <h1>Planning catalog</h1>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nombre del Maestro</th>
                    <th scope="col">Periodo Escolar</th>
                    <th scope="col">Nombre de la Materia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php 
                        $query = mysqli_query($mysql, "select nombre from Profesores where id=".$category_profe.";");
                        $dato = mysqli_fetch_assoc($query);
                        echo $nombre_profe = $dato['nombre'];
                    ?></td>
                    <td><?php 
                        $query = mysqli_query($mysql, "select nombre from Periodos where id=".$category_periodo.";");
                        $dato = mysqli_fetch_assoc($query);
                        echo $periodo = $dato['nombre'];
                    ?></td>
                    <td><?php 
                        $query = mysqli_query($mysql, "select nombre from Materias where id=".$category_materia.";");
                        $dato = mysqli_fetch_assoc($query);
                        echo $materia = $dato['nombre'];
                    ?></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Unidad</th>
                    <th scope="col">Topics</th>
                    <th scope="col">Learning / Teaching Strategies</th>
                    <th scope="col">Educational Resources</th>
                    <th scope="col">References Material</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($mysql, "select m.nombre, u.nombre, u.topics, u.learning, u.resources, u.material from Unidades as u
                    inner join Materias as m on u.id_materia = m.id where u.id_materia = ".$category_materia.";");
                    while ($datos = mysqli_fetch_array($query)) 
                    {
                ?>
                    <tr>
                        <td><?php echo $unidad = $datos['nombre'];?></td>
                        <td><?php echo $topics = $datos['topics'];?></td>
                        <td><?php echo $learning = $datos['learning'];?></td>
                        <td><?php echo $resources = $datos['resources'];?></td>
                        <td><?php echo $material = $datos['material'];?></td>
                        <?php
                            $nuevo_nombre_profe = ConvertidorCadena($nombre_profe);
                            $nuevo_periodo = ConvertidorCadena($periodo);
                            $nuevo_materia = ConvertidorCadena($materia);
                            $nuevo_unidad = ConvertidorCadena($unidad);
                            $nuevo_topics = ConvertidorCadena($topics);
                            $nuevo_learning = ConvertidorCadena($learning);
                            $nuevo_resources = ConvertidorCadena($resources); 
                            $nuevo_material = ConvertidorCadena($material);
                            $nuevo_grupo = ConvertidorCadena($grupo);
                            
                            $command = "C:\\Users\\progr\\source\\repos\\CPlaneacion\\CPlaneacion\\bin\\Debug\\CPlaneacion.exe 1 ".$nuevo_nombre_profe." ".$nuevo_periodo." ".$nuevo_materia." ".$nuevo_unidad." ".$nuevo_topics." ".$nuevo_learning." ".$nuevo_resources." ".$nuevo_material." ".$nuevo_grupo;
                            exec($command);
                        ?>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>    
    </body>
</html>