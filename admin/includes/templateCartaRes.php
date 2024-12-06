<?php

    require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
    include('conn.php');
    \PhpOffice\PhpWord\Autoloader::register();

    use PhpOffice\PhpWord\TemplateProcessor;

    $templateWord = new TemplateProcessor('plantilla.docx');
    $cedula = $_GET['cedHabitante'];
    $timeRes = $_GET['timeRes'];
    $sql = "SELECT nombres, apellidos, nacionalidad, cedula, p.nombre AS namePoligonal FROM habitantes as h INNER JOIN tipo_habitante AS th, estado_civil ec, poligonal p WHERE h.id_tipoHabitante = th.id && h.id_edoCivil = ec.id && h.id_poligonal = p.id && h.cedula = $cedula;";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $nombres = "Robert";

    // $templateWord->setValue('nombre_habitante',$nombres);

    // $templateWord->saveAs('carta_res_formato2.docx');

    // header("Content-Disposition: attachment; filename=carta_res_formato2.docx; charset=iso-8859-1");
    // echo file_get_contents('carta_res_formato2.docx');

    foreach($result as $datos) {

        $nombres = $datos['nombres'];
        $apellidos = $datos['apellidos'];
        $nacionalidad = $datos['nacionalidad'];
        $cedula = $datos['cedula'];
        $poligonal = $datos['namePoligonal'];
        $tiempo = $timeRes;
        $dia = date('d');
        $mes = date('m');
        $anio = date('Y');

        $templateWord->setValue('nombre_habitante',$nombres);
        $templateWord->setValue('apellidos',$apellidos);
        $templateWord->setValue('nacionalidad',$nacionalidad);
        $templateWord->setValue('cedula',$cedula);
        $templateWord->setValue('poligonal',$poligonal);
        $templateWord->setValue('tiempo',$tiempo);
        $templateWord->setValue('dia',$dia);
        $templateWord->setValue('mes',$mes);
        $templateWord->setValue('anio',$anio);

    // --- Guardamos el documento
        $templateWord->saveAs('carta_res_formato3.docx');

        header("Content-Disposition: attachment; filename=carta_res_formato3.docx; charset=iso-8859-1");
        echo file_get_contents('carta_res_formato3.docx');


    }


    // $nombre = "Sandra S.L.";
    // $direccion = "Mi direcci�n";
    // $municipio = "Mrd";
    // $provincia = "Bdj";
    // $cp = "02541";
    // $telefono = "24536784";


    // --- Asignamos valores a la plantilla
    

?>