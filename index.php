<?php

 require_once("../resources/config.php");
 include_once(databaza);

 $db=new database();

 $header_css="../css/style2.css";

include(templates_header);
?>

  
 
<div class="container">
    <div class="row">
    <div class="col-12">
    <section class="padded">
            <h3 class="padded">5 Udhetimet e ardhshme Aeroplan</h3>
            <form method='Post' action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type='hidden' id='udhetimiId' name='udhetimiId'>
                <table class='tabela' cellspacing='0'>
                    <thead>
                        <th style="align:left">Prej</th>
                        <th style="align:left">Deri</th>
                        <th style="align:left">Data</th>
                        <th style='width: auto;'></th>
                    </thead>
                    <?php 
                    $rez = $db->getData("Select * From flights Where flight_date >= Now() order by flight_date Limit 5");
                    
                    foreach ($rez as $rreshti) {
                        echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td style='text-align: center'>"                       
                        . "<input type='submit' class='btn btn-primary btn-rounded mr-2' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['id']."'></td></tr>";
                    }
                    ?>
                </table>
            </form>
    <section>
    </div>
    </div>
</div>
        
<?php include(templates_footer);?>