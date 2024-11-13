<canvas id="chart1"></canvas>

<?php 

        $host = "localhost";
        $dbname = "sebuc";
        $user = "root";
        $password = "";

        $conn = "mysql:host=".$host.";dbname=".$dbname;

        try {
            $conn = new PDO($conn, $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexion establecida";
        } catch (PDOException $e) {
            echo "Error al establecer conexion" . $e->getMessage();
        }

        $sql = "SELECT 
                    COUNT(CASE WHEN id_tipoHabitante = 1 THEN 1 END) AS countJefes,
                    COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) < 18 THEN 1 END) AS countMenor,
                    COUNT(CASE WHEN discapacidad != 'Ninguna' THEN 1 END) AS countDiscapacitado,
                    COUNT(CASE WHEN id_tipoHabitante = 2 THEN 1 END) AS countIntegrantes
                FROM 
                    habitantes;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $datos) {

    ?>

<script>
    const ctxI = document.getElementById('chart1');

    let countJefes = <?= $datos['countJefes'];?>;
    let countIntegrantes = <?= $datos['countIntegrantes'];?>;
    let countDiscapacitado = <?= $datos['countDiscapacitado'];?>;
    let countMenor = <?= $datos['countMenor'];?>;

    <?php

        }
?>

    new Chart(ctxI, {
        type: 'bar',
        data: {
        labels: ['Jefes de Familia', 'Integrantes de Familia', 'Diversidad Funcional', 'Menores de edad'],
        datasets: [{
            label: '# of Votes',
            data: [countJefes, countIntegrantes, countDiscapacitado, countMenor],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
</script>

