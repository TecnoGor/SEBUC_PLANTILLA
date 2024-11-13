<?php

include('../includes/conn.php');

$sql = "SELECT
           (SELECT COUNT(CASE WHEN u.activo = 1 THEN 1 END) FROM usuarios u) AS countUsuarios,
           (SELECT COUNT(CASE WHEN h.id_habitante != 0 THEN 1 END) FROM habitantes h) AS countHabitantes,
           (SELECT COUNT(CASE WHEN eb.id_beneficio != 0 THEN 1 END) FROM entrega_beneficio eb) AS countEntregas;
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
            <small>Usuarios</small>
        </span>
    </div>
    <i class="zmdi zmdi-account tile-icon"></i>
</article>
<article class="full-width tile">
    <div class="tile-text">
        <span class="text-condensedLight">
        <?php echo $rowProviders['countHabitantes'];?><br>
            <small>Habitantes</small>
        </span>
    </div>
    <i class="zmdi zmdi-accounts tile-icon"></i>
</article>
<article class="full-width tile">
    <div class="tile-text">
        <span class="text-condensedLight">
        <?php echo $rowProviders['countEntregas'];?><br>
            <small>Entregas</small>
        </span>
    </div>
    <i class="zmdi zmdi-truck tile-icon"></i>
</article>


<?php 
}
?>