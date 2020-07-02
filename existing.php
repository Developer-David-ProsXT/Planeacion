<?php
    include 'config.php';
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
                    <th scope="col">Teacher's name</th>
                    <th scope="col">School period</th>
                    <th scope="col">Name of the subject</th>
                    <th scope="col">Name of the unit</th>
                    <th scope="col">Initial date</th>
                    <th scope="col">Final date</th>
                    <th scope="col">Topics</th>
                    <th scope="col">Learning / Teaching Strategies</th>
                    <th scope="col">Educational Resources</th>
                    <th scope="col">References Material</th>
                    <th scope="col">Group</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($mysql, "select * from catalogo;");
                    while ($datos = mysqli_fetch_array($query)) 
                    {
                ?>
                    <tr>
                        <td><?php echo $datos['nombre_profesor'];?></td>
                        <td><?php echo $datos['nombre_periodo'];?></td>
                        <td><?php echo $datos['nombre_materia'];?></td>
                        <td><?php echo $datos['nombre_unidad'];?></td>
                        <td><?php echo $datos['fecha_inicio'];?></td>
                        <td><?php echo $datos['fecha_final'];?></td>
                        <td><?php echo $datos['topics'];?></td>
                        <td><?php echo $datos['learning'];?></td>
                        <td><?php echo $datos['resources'];?></td>
                        <td><?php echo $datos['material'];?></td>
                        <td><?php echo $datos['grupo'];?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>    
    </body>
</html>