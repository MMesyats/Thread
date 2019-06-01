<?php if(session_status()==1){session_start();}?>


<?php foreach($posts as $post): ?>
<div class="post">
    <h2>
        <a href="#post/<?echo $post['id']?>">
             <?echo $post['article']?>
        </a>
    </h2>
    
    <div class="user-info">
        <a href="#user/<?php echo $post['author_id']?>">
            <?echo $post['author']?>
        </a>
        <time>
            <?php echo $post['data']?>
        </time>
    </div>

    <div class="content">
       <? echo $post['content']?>
    </div>
    <div class="feedback">
        <div class="upvote">
            <span>Поднять</span>
            <img src="/view/img/vote.png" alt="">
        </div>
        <div class="downvote">
            <span>Опустить</span>
            <img src="/view/img/vote.png" alt="">
        </div>
        <div class="comments">
            <a href="#post/<?echo $post['id']?>">
            <span>Коментарии</span>
            <img src="/view/img/comments.png" alt="">
            </a>
        </div>
    </div>
</div>
<? endforeach;?>
