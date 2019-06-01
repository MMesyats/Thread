let comment = () =>
{
    let comment = document.getElementById("comment").value;
}

let editor = () =>
{
    let quill = new Quill('#editor', {
        placeholder:"Текст писать сюда...",
    });
    let tags = new Quill('#tags', {
        placeholder:"Теги писать сюда(через пробел пжлст)...",
    });
}

let exit = () =>
{
    let options=
        {
            method: 'get',
            parameters:
            {
                "exit":1
            },
            onSuccess: function(xhr) 
            {
                console.log(xhr);
                refs=document.getElementsByClassName("header-nav-item");
                refs[0].innerHTML="Войти";
                refs[1].innerHTML="Зарегистрироватся";
                refs[0].href="#login";
                refs[1].href="#registration";
            },
            onFailure: function(xhr) 
            {
            }
        };
    new Ajax.Request('/components/PageFunction.php', options);
}

let validateEmail = (email) =>
{
    var pattern  = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return pattern.test(email);
}
let register = () =>
{
    let error=document.getElementById("error");
    error.style.display="none";
    let name = document.getElementById("name").value;
    let password = document.getElementById("password").value;
    let email = document.getElementById("email").value;
    console.log(name+password);
    if(name.length>=5 && password.length>=5)
    {
        if(validateEmail(email))
        {
        let options=
        {
            method: 'post',
            parameters:
            {
                "name":name,
                "password":password,
                "email":email,
            },
            onSuccess: function(xhr) 
            {
                window.location.href="#";
                refs=document.getElementsByClassName("header-nav-item");
                refs[0].innerHTML="Создать пост";
                refs[1].innerHTML="Профиль";
                refs[0].href="#write";
                refs[1].href="#user/"+xhr.responseText;
            },
            onFailure: function(xhr) 
            {
                console.log('FAIL');
            }
        }
        new Ajax.Request('/components/PageFunction.php', options);

        }
        else
        {
            error.innerHTML="Что то не так с мылом";
            error.style.display='flex';
        }
    }
    else
    {
        error.innerHTML="Пароль и логин должны<br> быть длинее 5 символов";
        error.style.display='flex';
    }
}
let login = () =>
{
    let error=document.getElementById("error");
    error.style.display="none";
    let name = document.getElementById("name").value;
    let password = document.getElementById("password").value;
    if(name.length>=5 && password.length>=5)
    {
        let options=
        {
            method: 'post',
            parameters: 
            {
                "name" :name,
                "password":password,
            },
            onSuccess: function(xhr) 
            {
                console.log(xhr);
                window.location.href="#";
                refs=document.getElementsByClassName("header-nav-item");
                refs[0].innerHTML="Создать пост";
                refs[1].innerHTML="Профиль";
                refs[0].href="#write";
                refs[1].href="#user/"+xhr.responseText;

            },
            onFailure: function(xhr) 
            {
                console.log('FAIL');
            }
        };
        new Ajax.Request('/components/PageFunction.php', options);
    }
    else
    {
        error=document.getElementById("error");
        error.innerHTML="Пароль и логин должны<br> быть длинее 6 символов";
        error.style.display='flex';
    }
}
let registerLogin = () =>
{
    try
    {
        document.getElementById("login").onclick=login;
    }
    catch(err)
    {

    }
}
let registerRegistration = () =>
{
    try
    {
        document.getElementById("register").onclick=register;
    }
    catch(err)
    {
        
    }
}
let registerExit = () =>
{
    try
    {
        document.getElementById("exit").onclick=exit;
    }
    catch(err)
    {
        
    }
}
let registerLinks = () => 
{
    Array.from(document.getElementsByTagName("a")).forEach(el => 
    {
        el.onclick = (event) =>
        {
            let url = event.target.href;
            url = url.slice(url.indexOf("#")+1);
            let options={
                method: 'get',
                parameters: 'URL='+url,
                onSuccess: function(xhr) {
                    //console.log(xhr);
                    let content = document.getElementById("content");
                    content.classList.add("opacity");
                    setTimeout(() => {
                        content.innerHTML = xhr.responseText;
                        registerLinks();
                        if(url=="write")
                            editor();
                        if(url=="login")
                            registerLogin();
                        if(url=="registration")
                            registerRegistration();
                        registerExit();

                    }, 200);
                    setTimeout(() => {
                        content.classList.remove("opacity");
                    }, 300);
                },
                onFailure: function(xhr) {
                    console.log('FAIL');
                }
            };
            new Ajax.Request('/components/PageFunction.php', options);
            
        }
    }); 
   
}
window.onhashchange = () =>
{
    let url = window.location.hash;
    url = url.slice(url.indexOf("#")+1);
    let options={
        method: 'get',
        parameters: 'URL='+url,
        onSuccess: function(xhr) 
        {
           // console.log(xhr);
            let content = document.getElementById("content");
            content.classList.add("opacity");
            setTimeout(() => 
            {
                content.innerHTML = xhr.responseText;
                    if(url=="write")
                        editor();
                    if(url=="login")
                        registerLogin();
                    if(url=="registration")
                        registerRegistration();
                    registerExit();
                    
            }, 200);
            setTimeout(() => 
            {
                content.classList.remove("opacity");
            }, 300);
            },
        onFailure: function(xhr) 
        {
            console.log('FAIL');
        }
    };
    new Ajax.Request('/components/PageFunction.php', options);
    if(url=="login")
        registerLogin();
    if(url=="registration")
        registerRegistration();
}
let url = window.location.href.split("/");
url = url[url.length-1];
url = url.split("#");
url = url[0];
registerLinks();
if(url=="write")
     editor();
if(url=="login")
    registerLogin();
if(url=="registration")
    registerRegistration();
registerExit();