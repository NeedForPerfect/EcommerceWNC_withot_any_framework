<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                    
                     <h4> Редактировать Метаданных Главной Страницы </h4>
                        
                        <br/><br/>

                        <p>TITLE</p>
                        <input type="text" name="title1" placeholder="" value="<?php echo $array['title']; ?>">

                        <br/><br/>

                        
                        <p>META - Keywords</p>
                        <input type="text" name="meta_keywords1" placeholder="" value="<?php echo $array['meta_keywords']; ?>">

                        <br/><br/>
                        
                          <p>META - Description</p>
                        <input type="text" name="meta_description1" placeholder="" value="<?php echo $array['meta_description']; ?>">

                        <br/><br/>
                        
                        
                        
                        
                       
                        

                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

