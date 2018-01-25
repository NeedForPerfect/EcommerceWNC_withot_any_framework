<?php

/**
 * Контроллер AdminPhotoController
 * Управление товарами в админпанели
 */
class AdminPhotoController extends AdminBase
   
   {

    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex($id)
    {
        

         self::checkAdmin();
        
         
        echo 'HELLO IM PAGE FOR ADDITONALY PHOHO MANAGING</br>';
        
        echo 'EDIT PHOTO PRODUCT # - '.$id.'</br></br>';
        
         
        /* мы маємо данні id/  та можем получити номер кожної фотки
         * при ітерації массиву
         * робим силку для екшена деліт в необхіднім форматі
         *  
         * ОСКІЛЬКИ ВСЯ ІНФОРМАЦІЯ ТУТ Є. то нам  лишається тільки використати її в view  
         */
        
   
        $photo_list = additionalPhoto::getPhotoListById($id);
        
       
        
        
        require_once(ROOT . '/views/admin_photo/index.php');
        
        
        
        return true;
        
        
       


    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionAdd($id)
    {
        // Проверка доступа
        self::checkAdmin();
         
        
      //  echo 'HELLO ';
        
       
    
        additionalPhoto::addPhotoToDBbyProductId($id);
        
        
        //зроби тут редірект назад 
     
         $redirect = 'Location: /admin/additionalyphoto/'.$id;
      
          header($redirect);
        
        
        return true;
        
        
        
      
    }
    
    
    
    
    
    
     public function actionDelete($prod_id, $photo_num){
        
          self::checkAdmin();
         
         
//        echo 'HELLO I WILL BE DELETE PHOTO</br>';
//        
//        echo 'ИД Продукта---'.$prod_id.'</br>';
//        echo 'Photo_NUM-----'.$photo_num.'</br>';
        
        additionalPhoto::deleteByIdAndNumber($prod_id, $photo_num);
        
        $redirect = 'Location: /admin/additionalyphoto/'.$prod_id;
        header($redirect);
        
        return true;
        
    }
    
    

  
    
    

   
    

    





}



