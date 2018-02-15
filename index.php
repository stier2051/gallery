<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="basic.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/6971b24cc1.js"></script>
        <meta charset="UTF-8">
        
        <script>
        $(document).ready(function(){
            $('.trash').hide();
            
            $('.image').mouseover(function(){
                $(this).addClass('imageover');
                
            });
            $('.image').mouseout(function(){
                $(this).removeClass('imageover');
                
            });
            $('#open').click(function(){
               $('.login').slideToggle(300);
               
            });
        });
        </script>
        <title>Фотогалерея</title>
    </head>
    <body>
        
        <?php
        
        include 'dataManager.php';
        session_start();
        
        if (empty($_SESSION['status'])) {
            echo "<div class='menu'>
                  <nav class='nav'>
                    <a class='nav-link fa fa-sign-in' id='open' href='#'> Войти</a>
                    <a class='nav-link fa fa-user-plus' href='#'> Зарегистрироваться</a>
                    <a class='nav-link fa' href='#'> О галереи</a>
                  </nav>
                  <form action='sign.php' method='post' class='login'>
                    <div class='form-group'>
                      <label for='username'>Имя</label>
                      <input class='form-control' placeholder='введите Ваше имя' type='text' name='username' id='username'>
                    </div>
                    <div class='form-group'>
                      <label for='password'>Пароль </label>
                      <input class='form-control' placeholder='введите Ваш пароль' type='password' name='password' id='password'>
                    </div>
                    <button class='btn btn-info' type='submit'>Войти</button>
                  </form>
                  </div>";
        }
        
        if ($_SESSION['status'] == 10) {
            echo "<div class='menu'>
                    <div class='loadPanel'>
                        <form class='loadForm' action='image.php' enctype='multipart/form-data' method='post'>
                        <label class='btn btn-sm' for='openFile'>
                            <i class='fa fa-folder-open-o'><input id='openFile' type='file' name='userfile' style='display:none;'> Выбрать файл</i>
                        </label>
                        <label class='btn btn-sm' for='upload'>
                            <i class='fa fa-upload'><input id='upload' type='submit' style='display: none;'></i> Загрузить
                        </label>
                        </form>
                        <form class='sign-out' action='logout.php'>
                        <button class='btn btn-sm' type='submit'>
                            <i class='fa fa-sign-out'> Выйти</i>
                        </button>
                        </form>
                    </div>
                   </div>";
        }
        echo "<h1>ФОТОГАЛЕРЕЯ</h1>";
        echo "<div class='gallery'>";
        
        $images_propage = 9;
        $page = $_GET['page'];
        $query_array = new dataManager;
        
        $total_rows_arr = $query_array->getRows("SELECT ? FROM upload", ['image_thumb']);
        $total_images = count($total_rows_arr);
        $total_pages = intval(($total_images - 1) / $images_propage) + 1;
        $page = intval($page);
        if (empty($page) or $page < 0){
            $page = 1;
        }
        if ($page > $total_pages){
            $page = $total_pages;
        }
        $start = ($page - 1) * $images_propage;
        
        $total_rows = $query_array->getRow("SELECT * FROM upload LIMIT $start, $images_propage");
        foreach ($total_rows as $row){
            echo "<div class='picture'>
                    <img class='image' src='{$row['image_thumb']}'>
                    <img class='trash' src='pic/trashwhite.png'>
                  </div><!--picture-->";
            
        }
        echo "</div><!--gallery-->";
        echo "<div class='pagination'>";
        $first_page ='';
        $page2left ='';
        $page1left='';
        $page2right='';
        $page1right='';
        $last_page='';
        $next_page='';
        $space_right='';
        
        if($page != 1) {
          $first_page = '<a href=index.php?page=1>начало</a>
                             <a href=index.php?page='.($page - 1).'> < </a> ';
        }
        if($page != $total_pages) {
          $next_page = '<a href=index.php?page='.($page + 1).'> > </a>
                             <a href=index.php?page='.$total_pages.'>конец</a>';
        }
        if($page - 2 > 0) {
          $page2left = '<a href=index.php?page='.($page - 2).'>'.($page - 2).'</a>';
        }
        if($page - 1 >0) {
          $page1left = '<a href=index.php?page='.($page - 1).'>'.($page - 1).'</a>';
        }
        if($page + 3 <= $total_pages) {
          $lastpage = '<a href=index.php?page='.($total_pages).'>'.($total_pages).'</a>';
        }
        if($page + 2 <= $total_pages) {
          $page2right = '<a href=index.php?page='.($page + 2).'>'.($page + 2).'</a>';
        }
        if($page + 1 <= $total_pages) {
          $page1right = '<a href=index.php?page='.($page + 1).'>'.($page + 1).'</a>';
        }
        if($page + 3 <= $total_pages - 1) {
          $space_right = '>>>';
        }
        echo $first_page.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$space_right.$lastpage.$next_page;
        
        echo "</div><!--pagination-->";
        ?>
        <footer>
            <div class="footer">
            <p>MUN</p>
            <p>Все права защищены</p>
            <p> 1834 - 2018</p>
            </div>
        </footer>
    </body>
</html>