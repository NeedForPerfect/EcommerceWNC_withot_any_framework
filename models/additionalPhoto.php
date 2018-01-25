<?php

class additionalPhoto {
    
    
    
    
    
    
    
    public static function addPhotoToDBbyProductId($id) {
        
    
        
        $db = Db::getConnection();
        
        
        
     $arr_from_db = self::getPhotoListById($id);    
     $randomName  = self::randomNameToFileName();           
     $randomName = $id.'_'.$randomName;

        
        
      if (is_null($arr_from_db)) {  $arr_from_db = array($randomName);   }

       else {  $num =  count($arr_from_db);   $arr_from_db[$num] = $randomName;   }

                  
        
      
        
        $json_to_db =  json_encode($arr_from_db);
        
        
        
        $sql = "UPDATE product SET additionaly_photo =  :json WHERE  id =:id";


        $result = $db->prepare($sql);

        $result->bindParam(':json', $json_to_db, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);


        $result->execute();
        
        
        
        if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '') {
      
  
       move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/additionalPhoto/".$randomName.".jpg");
       

        }

        
        }
        

        
    public static function getPhotoListById($id) {
        
        $db = Db::getConnection();
        
        
      //  $id = 36;
        
        
        $sql = 'SELECT additionaly_photo FROM product WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $result = $result->fetch();

     //получили данні із БД тепер декодуєм в массив

     

        $result_json  = $result['additionaly_photo'];



        $arr_from_db = json_decode($result_json, true);

        
        
        return $arr_from_db; 
        
        
        
    }
    
    
    
    
    
    
    public static function deleteByIdAndNumber($prod_id, $number) {
        
        
        
       $array = self::getPhotoListById($prod_id);
       
       $name_for_unlink = 'upload/additionalPhoto/'.$array[$number].'.jpg';
       
     //  echo 'Name for Unlink--'.$name_for_unlink.'</br>';
       
     //  echo '<img src="/'.$name_for_unlink.'" alt="Альтернативный текст" width="100" height="80" />';
       
     //  echo 'Image to delete---'.$array[$number];
       
       unlink($name_for_unlink);
       
     //  echo '</br></br>-----DO WITH ARRAY------</br></br>';
                     
       
       unset($array[$number]);
       
       
       
       $newarr = array();       
       foreach( $array as $value ) {
    
//    echo '</br>'
//    .$value.'--</br>';
    
    $newarr[] = $value;
    
}
       
//       echo '<pre>';
//       
//       print_r($newarr);
//       
//       echo '</pre></br> - Let to SEE ARRAY to UPDATE in DataBase -  </br>';
       
       $json_to_db =  json_encode($newarr);
       
//       echo $json_to_db;
       
       
       $db = Db::getConnection();
       
       $sql = "UPDATE product SET additionaly_photo =  :json WHERE  id =:id";


       $result = $db->prepare($sql);

       $result->bindParam(':json', $json_to_db, PDO::PARAM_STR);
       $result->bindParam(':id', $prod_id, PDO::PARAM_INT);


       $result->execute();
       
       
        
        
    }
    
    
    
    
    
   
    
    private static function randomNameToFileName() {


        
    $characters = '0123456789qwertyuioplkjhgfdsazxcvbnm';
    $randstring = '';
            for ($i = 0; $i < 12; $i++) {
                          $randstring .= $characters[rand(0, strlen($characters)-1)];
            }
            
            

    return $randstring;
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
}
