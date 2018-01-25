
<html>
<head>
        <meta charset="utf-8">
</head>

<body>
    
    
    <?php if($photo_list != null): foreach ($photo_list as $key => $name):  ?>
    
    <?php echo '<img src="/upload/additionalPhoto/'.$name.'.jpg" alt="Альтернативный текст" width="100" height="80" />'; ?>
    
    <?php echo '<a href ="/admin/deletephoto/'.$id.'/'.$key.'">DELETE</a><br/><br/>'; ?>
    
    
    
    <?php endforeach; endif; ?>
    
    
  

    <form action="/admin/addphoto/<?php echo $id;  ?>" method="post" enctype="multipart/form-data">
<input type="file" name="image" placeholder="" value="">

 <input type="submit" name="submit" class="btn btn-default" value="SAVE">
 

 
 

</form>
    
     <br/><br/>
    
    <a href ="/admin/product">Управлять Товарами</a></br>
    
    </body>
