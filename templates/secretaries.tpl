{include file='templates/header.tpl'}
<link href="css/style.secretaries.css" rel="stylesheet">

<h1 class="title">Listado de secretarias</h1>

{foreach from=$secretaries item=$secretaria}
<div class="data-secretaria">
    <span class="nombre-secretaria">{$secretaria->nombre} {$secretaria->apellido}</span>
    <a class="edit-secretaria" href=""><img src="templates/img/edit-icon.png" /></a>
    <a class="delete-secretaria" href="{BASE_URL}eliminarSecretaria/{$secretaria->nro_secretaria}" >X</a>
</div>
{/foreach}

<a class="btn btn-primary" href="#" role="button">AGREGAR SECRETARIA</a>
<a class="btn btn-primary" href="#" role="button">ASIGNAR MEDICO</a>

{include file='templates/footer.tpl'}