<?php

/**
 * Контроллер AdminPhotoController
 * Управление товарами в админпанели
 */
class AdminMetaController extends AdminBase
   
   {

    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex()
    {
        

        self::checkAdmin();
        
        
        
        
       if (isset($_POST['submit']))   {
           
           
           
           
           
           
           MetaData::setMetaDataForPages(1, $_POST['title1'], $_POST['meta_keywords1'], $_POST['meta_description1']);
           
         //  MetaData::setMetaDataForPages(2, $_POST['title2'], $_POST['meta_keywords2'], $_POST['meta_description2']);
           
           
           header("Location: /admin/meta");
           
           
       } 
        

        
       $array = MetaData::getMetaDataForPages('golovna');
    //   $array2 = MetaData::getMetaDataForPages('catalog');
        
        
//        var_dump($array);
//        echo '<br/>';
//        var_dump($array2);
//       // die();
        
        require_once(ROOT . '/views/admin_meta/update.php');
        
        
        
        return true;
        
        
       


    }

    /**
     * Action для страницы "Добавить товар"
     */
   
    
    


}



