{include file='templates/header.tpl'}

<h1 class="title">Listado de secretarias</h1>

{foreach from=$secretaries item=$secretaria}
<div class="data-secretaria">
    <span class="nombre-secretaria">{$secretaria->nombre} {$secretaria->apellido}</span>
    <a class="edit-secretaria" href=""><img src="templates/img/edit-icon.png" /></a>
    <a class="delete-secretaria" href="{BASE_URL}eliminarSecretaria/{$secretaria->nro_secretaria}" >X</a>
</div>
{/foreach}

{include file='templates/footer.tpl'}