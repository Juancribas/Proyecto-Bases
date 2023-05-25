<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Consultas Celsia</h2>
        <form method="POST" action="">
            <button class="btn btn-primary" type="submit" name="btnConsulta1">Consulta 1</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta2">Consulta 2</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta3">Consulta 3</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta4">Consulta 4</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta5">Consulta 5</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta6">Consulta 6</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta7">Consulta 7</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta8">Consulta 8</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta9">Consulta 9</button>
            <button class="btn btn-primary" type="submit" name="btnConsulta10">Consulta 10</button>
        </form>

        <br>
        <table class= "table">
            <form method="POST" action="index.php">
                <button class="btn btn-primary" type="submit" name="btnConsulta8">Consultas Anteriores</button>
            </form>
                <thead>
                    <tr>
                        <th>Idioma</th>
                        <th>Estado de progreso</th>
                        <th>Calificación</th>
                        <th>ID de artículo</th>
                        <th>Promedio</th>
                        <th>País/región</th>
                        <th>Count(*)</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    $host = 'localhost';
                    $basededatos = 'proyectobases';
                    $username = 'root';
                    $password = '12345';
                
                    $conexion = new mysqli($host, $username, $password, $basededatos);
                
                    if ($conexion->connect_errno) {
                        echo "Nuestro sitio experimenta fallos....";
                            exit();
                    }
                    $sql = "";

                    if (isset($_POST['btnConsulta1'])) {
                        $sql = "SELECT `reporte_cursos`.`Idioma`, `reporte_horas_historico_1`.`Estado de progreso`, `reporte_horas_historico_1`.`Calificación`, COUNT(*) as Count FROM `reporte_cursos`
                        INNER JOIN `reporte_horas_historico_1` ON `reporte_cursos`.`ID de artículo` = `reporte_horas_historico_1`.`ID de artículo`
                        WHERE `reporte_cursos`.`Idioma` = 'Inglés'";
                    }
                    if (isset($_POST['btnConsulta2'])) {
                        $sql = "SELECT COUNT(*) FROM reporte_cursos WHERE Idioma = 'Español';";
                    }
                    if (isset($_POST['btnConsulta3'])) {
                        $sql = "SELECT COUNT(*) FROM reporte_cursos WHERE Idioma = 'Holandés';";
                    }
                    if (isset($_POST['btnConsulta4'])) {
                        $sql = "SELECT COUNT(*) FROM reporte_cursos WHERE Idioma = 'Francés';";
                    }
                    if (isset($_POST['btnConsulta5'])) {
                        $sql = "SELECT COUNT(*) AS Cantidad FROM reporte_horas_historico_1 WHERE `Estado de progreso` = 'Aprobado';";
                    }
                    if (isset($_POST['btnConsulta6'])) {
                        $sql = "SELECT COUNT(*) FROM reporte_horas_historico_1 WHERE `Estado de progreso` <> 'Aprobado';";
                    }
                    if (isset($_POST['btnConsulta7'])) {
                        $sql = "SELECT AVG(Calificación) FROM reporte_horas_historico_1 WHERE País/región = 'Colombia';";
                        $promedio = true;
                    }
                    if (isset($_POST['btnConsulta8'])) {
                        $sql = "SELECT AVG(Calificación) AS Promedio FROM reporte_horas_historico_1 WHERE País/región = 'Costa Rica';";
                        $promedio = true;
                    }
                    if (isset($_POST['btnConsulta9'])) {
                        $sql = "SELECT AVG(Calificación) AS Promedio FROM reporte_horas_historico_1 WHERE País/región = 'Honduras';";
                        $promedio = true;
                    }
                    if (isset($_POST['btnConsulta10'])) {
                        $sql = "SELECT AVG(Calificación) AS Promedio FROM reporte_horas_historico_1 WHERE País/región = 'Panamá';";
                        $promedio = true;
                    }

                    $result = $conexion->query($sql);

                    if(!$result){
                        die("Consulta invalida:". $conexion->error);
                    }else{
                        while($row = $result->fetch_assoc()){
                            $idioma = $row['Idioma'];
                            $estProg = $row['Estado de progreso'];
                            $califi = $row['Calificación'];
                            $idAr = $row['ID de artículo'];
                            $promedio = $row['Promedio'];
                            $paRe = $row['País/región'];
                            $count = $row['Count(*)'];
                            echo '
                            <tr>
                            <th scope="row">'.$idioma.'</th>
                            <td>'.$estProg.'</td>
                            <td>'.$califi.'</td>
                            <td>'.$idAr.'</td>
                            <td>'.$promedio.'</td>
                            <td>'.$paRe.'</td>
                            <td>'.$count.'</td>
                            </tr>
                            ';
                            }
                    }
                ?>
            </tbody>
        </div>
</body>
</html>