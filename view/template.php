<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thread</title>
    <link rel="stylesheet" href="/view/css/main.css">
</head>
<body>
    <header>
        <h1>Thread</h1>
        <nav id="header-nav">
            <a href="#popular">Популярное</a>
            <a href="#new">Свежее</a>
            <? 
            if(isset($_SESSION['user_id'])):
            ?>
            <a class="header-nav-item" href="#write">Создать пост</a>
            <a class="header-nav-item" href="#user/<?echo $_SESSION['user_id']?>">Профиль</a>
            <? else: ?>
            <a class="header-nav-item" href="#login">Войти</a>
            <a class="header-nav-item" href="#registration">Зарегистрироватся</a>
            <? endif;?>
        </nav>
    </header>
    <div id="content">
        <?php echo $Router->run($Router->getURI())?>
    </div>
    <footer>
        <script src="/view/js/quill.js"></script>
        <script src="/view/js/prototype.js"></script>
        <script src="/view/js/main.js"></script>
    </footer>
</body>
</html>