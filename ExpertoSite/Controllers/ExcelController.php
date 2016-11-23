<?php
use Entity\Response;
use Entity\JsonResult;
use Entity\Envio;
use Entity\Log;

require_once("../Repositories/EnvioRepository.php");
require_once("../Repositories/LogRepository.php");
require_once("../Entity/Response.php");
require_once("../Entity/JsonResult.php");
require_once("../Entity/Envio.php");
require_once("../Entity/Constantes.php");
require_once("../Entity/Log.php");
/** Se agrega la libreria PHPExcel */
require_once("../Lib/Classes/PHPExcel.php");
    
    date_default_timezone_set('America/Mexico_City');
    if (PHP_SAPI == 'cli'){
        die('Este archivo solo se puede ver desde un navegador web');
        header('Location: Error.php');
    }

    $whereModel = 'WHERE 1 = 1 ';
    $NumeroDocumentoSearch = $_GET["NumeroDocumentoSearch"];
    $CorreoElectronicoSearch = $_GET["CorreoElectronicoSearch"];
    $FechaEnvioInicialSearch = $_GET["FechaEnvioInicialSearch"];
    $FechaEnvioFinalSearch = $_GET["FechaEnvioFinalSearch"]; 

    if($NumeroDocumentoSearch!=""){
        $whereModel .= " AND NumeroDocumento= '".$NumeroDocumentoSearch."'";
    }

    if($CorreoElectronicoSearch!=""){
        $whereModel .= " AND CorreoElectronico= '".$CorreoElectronicoSearch."'";
    }    

    if($FechaEnvioInicialSearch!=""){
        $whereModel .= " AND FechaHoraEnvio>= CAST('".$FechaEnvioInicialSearch."' AS DATETIME) ";
    }     

    if($FechaEnvioFinalSearch!=""){
        $whereModel .= " AND FechaHoraEnvio<= CAST('".$FechaEnvioFinalSearch."' AS DATETIME) ";
    }  

    $modelRepository = new EnvioRepository();
    $result = $modelRepository->findAllExport($whereModel);

    // Se crea el objeto PHPExcel
    $objPHPExcel = new PHPExcel();
    
    // Se asignan las propiedades del libro
    $objPHPExcel->getProperties()->setCreator("Falabella") // Nombre del autor
    ->setLastModifiedBy("Falabella") //Ultimo usuario que lo modificó
    ->setTitle("Reporte GoftCard") // Titulo
    ->setSubject("Asunto Reporte GoftCard") //Asunto
    ->setDescription("Reporte de GoftCard") //Descripción
    ->setKeywords("GoftCard") //Etiquetas
    ->setCategory("ReporteExcel"); //Categorias
    
    $estiloTituloColumnas = new PHPExcel_Style();
    $estiloTituloColumnas->applyFromArray( array(
        'font' => array(
            'name'  => 'Calibri',
            'bold'  => true,
            'size'  => 11,
            'color' => array(
                'rgb' => 'FFFFFF'
            )
        ),
        'fill' => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array(
                'rgb' => '006600')
        ),
        'borders' => array(
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            )
        ),
        'alignment' =>  array(
            'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap'      => TRUE
        )
    ));

    $estiloInformacion = new PHPExcel_Style();
    $estiloInformacion->applyFromArray( array(
        'font' => array(
            'name'  => 'Calibri',
            'bold'  => true,
            'size'  => 11,
            'color' => array(
                'rgb' => '000000'
            )
        ),
        'fill' => array(
            'type'  => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array(
                'rgb' => 'FFFFFF')
        ),
        'borders' => array(
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN ,
                'color' => array(
                    'rgb' => '000000'
                )
            )
        ),
        'alignment' =>  array(
            'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap'      => TRUE
        )
    ));       
    
    // Se asigna el nombre a la hoja
    $objPHPExcel->getActiveSheet()->setTitle('GiftCard');
    
    // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
    $objPHPExcel->setActiveSheetIndex(0);
    
    ////////////REPORTE BI RETAIL 1
    
    $tituloReporte = "REPORTE GIFTCARD";
    $titulosColumnas = array('ID', 'TIPO PERSONA', 'NOMBRES', 'APELLIDOS', 'TIPO DOCUMENTO', 'NÚMERO DOCUMENTO', 'CORREO','TIPO PRODUCTO', 'CÓDIGO','NÚMERO','FECHA CADUCIDAD','MONTO','PUNTOS','ESTADO ENVÍO', 'NÚMERO ENVÍOS', 'FECHA ENVIO', 'FECHA REENVÍO');
    
    $i = 1; //Numero de fila donde se va a comenzar a rellenar
    $j = count($titulosColumnas);    
    $inicial = "A";
    $final = "Q";
    // Se agregan los titulos del reporte
    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$i,  $titulosColumnas[0])
    ->setCellValue('B'.$i,  $titulosColumnas[1])
    ->setCellValue('C'.$i,  $titulosColumnas[2])
    ->setCellValue('D'.$i,  $titulosColumnas[3])
    ->setCellValue('E'.$i,  $titulosColumnas[4])
    ->setCellValue('F'.$i,  $titulosColumnas[5])
    ->setCellValue('G'.$i,  $titulosColumnas[6])
    ->setCellValue('H'.$i,  $titulosColumnas[7])
    ->setCellValue('I'.$i,  $titulosColumnas[8])
    ->setCellValue('J'.$i,  $titulosColumnas[9])
    ->setCellValue('K'.$i,  $titulosColumnas[10])
    ->setCellValue('L'.$i,  $titulosColumnas[11])
    ->setCellValue('M'.$i,  $titulosColumnas[12])
    ->setCellValue('N'.$i,  $titulosColumnas[13])
    ->setCellValue('O'.$i,  $titulosColumnas[14])
    ->setCellValue('P'.$i,  $titulosColumnas[15])
    ->setCellValue('Q'.$i,  $titulosColumnas[16]);

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloTituloColumnas, $inicial.$i.":".$final.$i);
    
    //Se agregan los datos
    $i = 2; //Numero de fila donde se va a comenzar a rellenar

    foreach ($result as $detalle):

        $estadoEnvio = "";
        switch ($detalle->EstadoEnvio) {
            case "1":
                $estadoEnvio = "Enviado";
                break;
            case "2":
                $estadoEnvio = "No Enviado";
                break;
            case "3":
                $estadoEnvio = "Reenviado";
                break;
            
            default:
                $estadoEnvio = "";
                break;
        }

        $fechaHoraReenvio = "";
        if($detalle->FechaHoraReEnvio!=null){
            $fechaHoraReenvio = substr($detalle->FechaHoraReEnvio,0,10);
        }

        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $detalle->Id)
        ->setCellValue('B'.$i, ($detalle->TipoPersona == "1")? "Beneficiario":"Titular")
        ->setCellValue('C'.$i, $detalle->Nombres)
        ->setCellValue('D'.$i, $detalle->Apellidos)
        ->setCellValue('E'.$i, $detalle->TipoDocumento)
        ->setCellValue('F'.$i, $detalle->NumeroDocumento)
        ->setCellValue('G'.$i, $detalle->CorreoElectronico)
        ->setCellValue('H'.$i, $detalle->TipoProducto)
        ->setCellValue('I'.$i, $detalle->Codigo)
        ->setCellValue('J'.$i, $detalle->Numero)
        ->setCellValue('K'.$i, $detalle->FechaCaducidad)
        ->setCellValue('L'.$i, $detalle->Monto)
        ->setCellValue('M'.$i, $detalle->Puntos)
        ->setCellValue('N'.$i, $estadoEnvio)
        ->setCellValue('O'.$i, $detalle->NumeroEnvios)
        ->setCellValue('P'.$i, substr($detalle->FechaHoraEnvio,0,10))
        ->setCellValue('Q'.$i, $fechaHoraReenvio);

        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, $inicial.$i.":".$final.$i);       

        $i++;
    endforeach;       
    
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
    
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('../Download/ReporteGiftCard.xlsx');
        
    header('Content-type: application/json; charset=utf-8');
    echo json_encode('Download/ReporteGiftCard.xlsx'); 
    
?>