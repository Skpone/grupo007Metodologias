{include file='templates/header.tpl'}
<link href="css/login.style.css" rel="stylesheet">

<div class="form-container">
    <form class="login-form" method="POST" action="loginMedico">
    <input type="text" class="username" name="username" placeholder="Nombre de Usuario" required></input>
    <input type="password" class="password" name="password" placeholder="Contraseña" required></input>
    <button type="submit" class="btn-submit">Ingresar</button>
    </form>
</div>

{include file='templates/footer.tpl'}