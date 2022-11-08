{include file='templates/header.tpl'}
<link href="css/style.medics.css" rel="stylesheet">

<h1 class="title">Listado de Médicos</h1>

{foreach from=$medics item=$medico}
 {if (isset($idSecretaria))}
    <a class="set-medico" href="{BASE_URL}asignarMedico/{$idSecretaria}/{$medico->nro_medico}">
        <div class="data-medico">
            <span class="nombre-medico">{$medico->nombre} {$medico->apellido}</span>
            <a class="edit-medico" href=""><img src="templates/img/edit-icon.png" /></a>
            <a class="delete-medico" href="{BASE_URL}eliminarMedico/{$medico->nro_medico}" >X</a>
        </div>
    </a>
    {else}
    <div class="data-medico">
        <span class="nombre-medico">{$medico->nombre} {$medico->apellido}</span>
        <a class="edit-medico" href=""><img src="templates/img/edit-icon.png" /></a>
        <a class="delete-medico" href="{BASE_URL}eliminarMedico/{$medico->nro_medico}" >X</a>
    </div>
 {/if}

{/foreach}

{include file='templates/footer.tpl'}