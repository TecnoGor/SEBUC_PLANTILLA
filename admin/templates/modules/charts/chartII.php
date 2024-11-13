
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

        $sqlII = "SELECT 
                    COUNT(CASE WHEN id_poligonal = 1 THEN 1 END) AS countOriental,
                    COUNT(CASE WHEN id_poligonal = 2 THEN 1 END) AS countCarabobo,
                    COUNT(CASE WHEN id_poligonal = 3 THEN 1 END) AS countFJavier,
                    COUNT(CASE WHEN id_poligonal = 4 THEN 1 END) AS countPrincipal
                FROM 
                    habitantes;";

        $stmtII = $conn->prepare($sqlII);
        $stmtII->execute();
        $resultII = $stmtII->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultII as $datosII) {
    

    ?>
    <script>
        const ctxII = document.getElementById('chart2');
        var countOriental = <?= $datosII['countOriental'];?>;
        var countCarabobo = <?= $datosII['countCarabobo'];?>;
        var countFJavier = <?= $datosII['countFJavier'];?>;
        var countPrincipal = <?= $datosII['countPrincipal'];?>;

        new Chart(ctxII, {
            type: 'bar',
            data: {
            labels: ['Oriental', 'Carabobo', 'Francisco Javier', 'Principal'],
            datasets: [{
                label: '# of Votes',
                data: [countOriental, countCarabobo, countFJavier, countPrincipal],
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
    <?php 

        }

    ?>
