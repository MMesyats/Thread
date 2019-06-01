<?php if(session_status()==1){session_start();}?>

<div class = "profile">
    <h2><?php echo $user['username']?></h2>
    <div>
        <img src="/view/img<?php echo $user['image'] ?>" alt="">
    </div>
    <a href="#posts/user/<?  echo $user['id'] ?>">
        Посты пользователя
    </a> 
    <? if(intval($_SESSION['user_id'])==intval($user['id'])):?>
    <a id="exit" href="#">Выйти из профиля</a>
    <? endif;?>
</div>