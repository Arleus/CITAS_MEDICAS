<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (isset($_GET['appid'])) {
$appid=$_GET['appid'];
}
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
JOIN appointment b
On a.icPatient = b.patientIc
JOIN doctorschedule c
On b.scheduleId=c.scheduleId
WHERE b.appId  =".$appid);

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Detalles de la Cita</title>
        
        <link rel="stylesheet" type="text/css" href="assets/css/invoice.css">
    </head>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="assets/img/logo.png" style="width:100%; max-width:300px;">
                                </td>
                                
                                <td>
                                    Código #: <?php echo $userRow['appId'];?><br>
                                    Solicitado: <?php echo date("d-m-Y");?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    <?php echo $userRow['patientAddress'];?>
                                </td>
                                
                                <td><?php echo $userRow['patientIc'];?><br>
                                    <?php echo $userRow['patientFirstName'];?> <?php echo $userRow['patientLastName'];?><br>
                                    <?php echo $userRow['patientEmail'];?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                <tr class="heading">
                    <td>
                        Detalles de la Cita
                    </td>
                    
                    <td>
                        #
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Código de Cita
                    </td>
                    
                    <td>
                       <?php echo $userRow['appId'];?>
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        ID de Cita
                    </td>
                    
                    <td>
                        <?php echo $userRow['scheduleId'];?>
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        Día de la cita
                    </td>
                    
                    <td>
                        <?php echo $userRow['scheduleDay'];?>
                    </td>
                </tr>
                

                 <tr class="item">
                    <td>
                        Fecha de la Cita
                    </td>
                    
                    <td>
                        <?php echo $userRow['scheduleDate'];?>
                    </td>
                </tr>

                 <tr class="item">
                    <td>
                        Duración de la Cita
                    </td>
                    
                    <td>
                        <?php echo $userRow['startTime'];?> hasta <?php echo $userRow['endTime'];?>
                    </td>
                </tr>

                 <tr class="item">
                    <td>
                        Síntomas del Paciente
                    </td>
                    
                    <td>
                        <?php echo $userRow['appSymptom'];?> 
                    </td>
                </tr>
                
                
                
            </table>
        </div>
        <div class="print">
        <button onclick="myFunction()">Imprimir</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>
</html>