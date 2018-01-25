<?php

/**
 * Контроллер ProductController
 * Товар
 */
class ProductController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($productId)
    {
        // Список категорий для левого меню
    //покішо колі відключив  //  $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);

        
            //  $product['additionaly_photo'].'-------<br/>';
       
        $title = $product['name'];
        $meta_keywords = $product['meta_keywords'];
        $meta_description = $product['meta_description'];
        
        
  

        

        
        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

}
