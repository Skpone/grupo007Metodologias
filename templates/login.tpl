{include file='templates/header.tpl'}
<link href="css/login.style.css" rel="stylesheet">

<div class="form-container">
    <form class="login-form" method="POST" action="loginMedico">
        <input type="text" class="username" name="username" placeholder="Nombre de Usuario" required></input>
        <input type="password" class="password" name="password" placeholder="Contraseña" required></input>
        {if $error}
            {$error}
        {/if}
        <button type="submit" class="btn-submit">Ingresar</button>
    </form>
</div>

<img class="login-img" src="templates\img\login-img.png" />

{include file='templates/footer.tpl'}