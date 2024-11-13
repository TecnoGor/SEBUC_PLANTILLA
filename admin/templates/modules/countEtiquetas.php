<?php

include('../includes/conn.php');

$sql = "SELECT
            COUNT(CASE WHEN usuarios.activo = 1 THEN 1 END) AS countUsuarios,
            COUNT(CASE WHEN habitantes.id_habitante != 0 THEN 1 END) AS countHabitantes,
            COUNT(CASE WHEN entrega_beneficio.id_beneficio = 1 THEN 1 END) AS countEntregas
        FROM usuarios, habitantes, entrega_beneficio;
";

$stmtProviders = $conn->prepare($sql);
$stmtProviders->execute();

$resultProviders = $stmtProviders->fetchAll(PDO::FETCH_ASSOC);

foreach($resultProviders AS $rowProviders) {
?>

<article class="full-width tile">
    <div class="tile-text">
        <span class="text-condensedLight">
            <?php echo $rowProviders['countUsuarios'];?><br>
            <small>Administrators</small>
        </span>
    </div>
    <i class="zmdi zmdi-account tile-icon"></i>
</article>
<article class="full-width tile">
    <div class="tile-text">
        <span class="text-condensedLight">
        <?php echo $rowProviders['countHabitantes'];?><br>
            <small>Clients</small>
        </span>
    </div>
    <i class="zmdi zmdi-accounts tile-icon"></i>
</article>
<article class="full-width tile">
    <div class="tile-text">
        <span class="text-condensedLight">
        <?php echo $rowProviders['countEntregas'];?><br>
            <small>Providers</small>
        </span>
    </div>
    <i class="zmdi zmdi-truck tile-icon"></i>
</article>


<?php 
}
?>