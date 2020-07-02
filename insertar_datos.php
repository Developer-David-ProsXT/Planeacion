<?php
    $Nmateria = $_POST['Nmateria'];
    $Nunidad = $_POST['Nunidad'];
    $topics = $_POST['topics'];
    $learning = $_POST['learning'];
    $MEducativo = $_POST['MEducativo'];
    $referencias = $_POST['referencias'];

    $nuevoNmateria = ConvertidorCadena($Nmateria);
    $nuevoNunidad = ConvertidorCadena($Nunidad);
    $nuevotopics = ConvertidorCadena($topics);
    $nuevolearning = ConvertidorCadena($learning);
    $nuevoMEducativo = ConvertidorCadena($MEducativo);
    $nuevoreferencias = ConvertidorCadena($referencias);

    $command = "start C:\\Users\\Pots\\source\\repos\\PlanClase\\PlanClase\\bin\\Debug\\PlanClase.exe 1 ".$nuevoNmateria." ".$nuevoNunidad." ".$nuevotopics." ".$nuevolearning." ".$nuevoMEducativo." ".$nuevoreferencias;    
    exec($command);

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
?>