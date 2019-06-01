<?php if(session_status()==1){session_start();}?>
<div class="login">
    <h2>Вход</h2>
    <form>
        <input type="text" placeholder="Введите логин..." name="login" id="name">
        <input type="password" placeholder="Введите пароль..." name="password" id="password">
        <div id="error">
        </div>
        <input type="button" value="Войти" id="login">
    </form>
</div>