<?php if(session_status()==1){session_start();}?>
<div class="post single">
    <h2>
        <?php echo $post['article'];?>
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
        <? echo $post['content'] ?>
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
    </div>
    <div class="comments-list">
        <?if(isset($_SESSION['user_id'])):?>
        <div class="comment-area">
            <textarea name="comment" id="comment" placeholder="Введите коментарий..."></textarea>
            <button id="comment-button">Отправить</button>
        </div>
        <?endif;?>
        <?foreach($comments as $comment):?>
        <div class="comment-item">
            <div class="user-info">
                <a href="#user/<?php echo $comment['author_id']?>"><?php echo $comment['author']?></a>
                <time><?php echo date("d-M-Y",strtotime($comment['date']))?></time>
            </div>
            <div class="comment-text">
                <p><?echo $comment['content']?></p>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>