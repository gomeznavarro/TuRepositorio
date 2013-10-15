<?php
header('Content-Type: text/html; charset=utf-8'); 
?>
<div class="bar"> 
    <a id="new" class="button" href="javascript:void(0);">Nueva Foto</a>
</div>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Location</th>
            <th>Description</th>
            <th>Publicar</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->photos as $photo):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $photo['id'];?></td>
                <td><?php echo $photo['title'];?></td>
                <td><?php echo $photo['location'];?></td>
                <td><?php echo $photo['description'];?></td>
                <td><?php echo $photo['publicar'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $photo['id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $photo['id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

