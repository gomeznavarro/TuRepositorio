﻿<?php
//header('Content-Type: text/html; charset=utf-8'); 
?>
<h2><?php echo $view->label ?></h2>
<form name ="phot" id="phot" method="POST" action="index.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->phot->getId() ?>">
    <div>
        <label>T&iacute;tulo</label>
        <input type="text" name="title" id="title" value = "<?php print $view->phot->getTitulo() ?>">
    </div>
    <div>
        <label>Localizaci&oacute;n</label>
        <input type="text" name="location" id="location"value = "<?php print $view->phot->getLocaliz() ?>">
    </div>
    <div>
        <label>Publicar</label>
        <input type="text" name="publicar" id="publicar" value = "<?php print $view->phot->getPublic() ?>">
    </div>
    
    
    
    
    
    <div class="buttonsBar">
       
        <input id="submit" type="submit" name="submit" value ="Guardar" />
         <input id="cancel" type="button" value ="Cancelar" />
    </div>
</form>
