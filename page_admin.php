<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="basic.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <script src="https://use.fontawesome.com/6971b24cc1.js"></script>
        <meta charset="UTF-8">
        <title>Фотогалерея</title>
    </head>
    <body>
        <!--<nav class="nav nav-pills flex-column flex-sm-row">
            <a class="nav-item nav-link active fa fa-sign-in" href="#"> Войти</a>
            <a class="nav-item nav-link fa fa-user-plus" href="#"> Зарегистрироваться</a>
            <a class="nav-item nav-link fa" href="#"> О галереи</a>
        </nav>-->
        
        <div class="loadPanel">
            <form class="loadForm" action="image.php" enctype="multipart/form-data" method="post">
            <label class="btn btn-sm" for="openFile">
                <i class="fa fa-folder-open-o"><input id="openFile" type="file" name="userfile" style="display:none;"> Выбрать файл</i>
            </label>
            <label class="btn btn-sm" for="upload">
                <i class="fa fa-upload"><input id="upload" type="submit" style="display: none;"></i> Загрузить
            </label>
         </form>
         <form class="sign-out" action="">
            <button class="btn btn-sm" type="submit">
                <i class="fa fa-sign-out"> Выйти</i>
            </button>
         </form>
        </div>
        <h1>ФОТОГАЛЕРЕЯ</h1>
         <?php
         
        ?>
    </body>
</html>