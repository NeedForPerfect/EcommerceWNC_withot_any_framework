<?php

class MetaData {
    

    
    
    public static function getMetaDataForPages($page_name) { 
        
        
        
        
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM meta_data WHERE page = :page_name';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':page_name', $page_name, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
        
        
        
        
        
    }
    
    
    
    
    public static function setMetaDataForPages($page_name, $title, $keywords, $description) { 
        
//     echo $page_name;
//     echo $title;
//     echo $keywords;
//     echo $description; 
     
  //   die();
    
        
        
        
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE meta_data
            SET 
                title = :title,
                meta_keywords = :keywords,
                meta_description = :description
            WHERE id = :page_name";

        // Получение и возврат результатов. Используется подготовленный запрос       
        $result = $db->prepare($sql);
        
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':keywords', $keywords, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
      //  $result->bindParam(':page_name', $page_name, PDO::PARAM_STR);
        $result->bindParam(':page_name', $page_name, PDO::PARAM_INT);
        return $result->execute();
        
        
        
        
        
    }
    

    }

