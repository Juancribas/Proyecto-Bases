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
        </form>
       
        <br>
        <table class="table">
        <form method="POST" action="consultas2.php">
                <button class="btn btn-primary" type="submit" name="btnConsulta8">Siguientes Consultas</button>
        </form>  
            <thead>
                <tr>
                    <th>Activo</th>
                    <th>ID de empleado</th>
                    <th>Primer Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Equipo/Área</th>
                    <th>País/región</th>
                    <th>Título</th>
                    <th>Calificación</th>
                    <th>Estado de progreso</th>
                    <th>Fecha de finalización</th>
                    <th>ID de artículo</th>
                    <th>Tipo de artículo</th>
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
                        $sql = "SELECT * FROM reporte_horas_historico_1 GROUP BY `ID de empleado` LIMIT 10;";
                    }
                    if (isset($_POST['btnConsulta2'])) {
                        $sql = "SELECT * FROM reporte_horas_historico_1 WHERE `Fecha de finalización` < '2023-05-23' ORDER BY `Fecha de finalización` DESC LIMIT 10";
                    }
                    if (isset($_POST['btnConsulta3'])) {
                        $sql = "SELECT * FROM reporte_horas_historico_1 JOIN reporte_cursos ON reporte_cursos.`ID de artículo` = reporte_horas_historico_1.`ID de artículo` WHERE `País/región` = 'Panamá' LIMIT 5;";
                    }
                    if (isset($_POST['btnConsulta4'])) {
                        $sql = "SELECT * FROM reporte_horas_historico_1 JOIN reporte_cursos ON reporte_cursos.`ID de artículo` = reporte_horas_historico_1.`ID de artículo` WHERE `País/región` = 'Costa Rica' LIMIT 5;";
                    }
                    if (isset($_POST['btnConsulta5'])) {
                        $sql = "SELECT * FROM reporte_horas_historico_1
                        WHERE `País/región` = 'Colombia' AND`Tipo de artículo` = 'Virtual' 
                        LIMIT 10;";
                    }
                    if (isset($_POST['btnConsulta6'])) {
                        $sql = "SELECT * FROM reporte_horas_historico_1
                        WHERE `País/región` = 'Colombia' AND`Tipo de artículo` = 'PRES' 
                        LIMIT 10;";
                    }
                    if (isset($_POST['btnConsulta7'])) {
                        $sql = "SELECT *
                        FROM reporte_horas_historico_1
                        WHERE Calificación = 100
                        GROUP BY `ID de empleado`
                        LIMIT 10;";
                    }

                    $result = $conexion->query($sql);

                    if (empty($sql)) {
                        die("La consulta está vacía");
                    }
                    if(!$result){
                        die("Consulta invalida:". $conexion->error);
                    }else{
                        while($row = $result->fetch_assoc()){
                            $activo = $row['Activo'];
                            $id_Em = $row['ID de empleado'];
                            $primerNom = $row['Primer Nombre'];
                            $primerApe = $row['Primer Apellido'];
                            $equiAr = $row['Equipo/Área'];
                            $pr = $row['País/región'];
                            $Titulo = $row['Título'];
                            $Calificacion = $row['Calificación'];
                            $estpro = $row['Estado de progreso'];
                            $fechaFin = $row['Fecha de finalización'];
                            $idAr = $row['ID de artículo'];
                            $tipoAr = $row['Tipo de artículo'];

                            echo '
                            <tr>
                            <th scope="row">'.$activo.'</th>
                            <td>'.$id_Em.'</td>
                            <td>'.$primerNom.'</td>
                            <td>'.$primerApe.'</td>
                            <td>'.$equiAr.'</td>
                            <td>'.$pr.'</td>
                            <td>'.$Titulo.'</td>
                            <td>'.$Calificacion.'</td>
                            <td>'.$estpro.'</td>
                            <td>'.$fechaFin.'</td>
                            <td>'.$idAr.'</td>
                            <td>'.$tipoAr.'</td>
                            </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
    </div>
</body>
</html>