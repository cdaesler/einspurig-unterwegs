<?php
if($_POST["send"]==__("Save Configuration", 'onbile')){
    
    $categoria = "";
    foreach($_POST['categories'] as $categoria) {
         $categorias .= $categoria.",";
    }
    $long=strlen($categorias)-1;
    $categorias = substr($categorias,0,$long);
    update_option("Onbile_categoriesIncludes", $categorias);
    update_option("Onbile_wantComments", $_POST['wantComments']);

   
}
onbile::generalConfiguration();

?>
