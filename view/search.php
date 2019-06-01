<?php if(session_status()==1){session_start();}?>

<div class="search">
    <form action="">
        <input type="text" placeholder="Введите тег для поиска...">
        <button>
    </form>
</div>

<? include(ROOT."/view/posts.php"); ?>