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
                        $sql = "SELECT COUNT(`Idioma`) as `Count(*)` FROM `reporte_cursos` WHERE `Idioma` = 'Inglé';";
                    }
                    if (isset($_POST['btnConsulta2'])) {
                        $sql = "SELECT COUNT(`Idioma`) as `Count(*)` FROM `reporte_cursos` WHERE `Idioma` = 'Españo';";
                    }
                    if (isset($_POST['btnConsulta3'])) {
                        $sql = "SELECT COUNT(`Idioma`) as `Count(*)` FROM `reporte_cursos` WHERE `Idioma` = 'Holandé';";
                    }
                    if (isset($_POST['btnConsulta4'])) {
                        $sql = "SELECT COUNT(`Idioma`) as `Count(*)` FROM reporte_cursos WHERE Idioma = 'Francé';";
                    }
                    if (isset($_POST['btnConsulta5'])) {
                        $sql = "SELECT COUNT(`Estado de progreso`) as `Count(*)` FROM reporte_horas_historico_1 WHERE `Estado de progreso` LIKE '%Aprobado%';";
                    }
                    if (isset($_POST['btnConsulta6'])) {
                        $sql = "SELECT COUNT(`Estado de progreso`) as `Count(*)` FROM reporte_horas_historico_1 WHERE `Estado de progreso` LIKE '%No aprobado%';";
                    }
                    if (isset($_POST['btnConsulta7'])) {
                        $sql = "SELECT AVG(`Calificación`) as `Count(*)` FROM reporte_horas_historico_1 WHERE `País/región` = 'Colombia';";
                    }
                    if (isset($_POST['btnConsulta8'])) {
                        $sql = "SELECT AVG(`Calificación`) as `Count(*)` FROM `reporte_horas_historico_1` WHERE `País/región` = 'Costa Rica';";
                    }
                    if (isset($_POST['btnConsulta9'])) {
                        $sql = "SELECT AVG(`Calificación`) as `Count(*)` FROM reporte_horas_historico_1 WHERE `País/región` = 'Honduras';";
                    }
                    if (isset($_POST['btnConsulta10'])) {
                        $sql = "SELECT AVG(`Calificación`) as `Count(*)` FROM reporte_horas_historico_1 WHERE `País/región` = 'Panamá';";
                    }

                    $result = $conexion->query($sql);

                    if(!$result){
                        die("Consulta invalida:". $conexion->error);
                    }else{
                        while($row = $result->fetch_assoc()){
                            $count = $row['Count(*)'];
                            echo '
                            <tr>
                            <th scope="row">'.$count.'</th>
                            </tr>
                            ';
                            }
                    }
                ?>
            </tbody>
        </div>
</body>
</html>