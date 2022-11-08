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
 {/if}
 {if (!isset($idSecretaria))}
 <div class="data-medico">
        <span class="nombre-medico">{$medico->nombre} {$medico->apellido}</span>
        <a class="edit-medico" href=""><img src="templates/img/edit-icon.png" /></a>
        <a class="delete-medico" href="{BASE_URL}eliminarMedico/{$medico->nro_medico}" >X</a>
    </div>

    <a class="btn btn-primary" href="{BASE_URL}nuevoMedico" role="button">AGREGAR MÉDICO</a>
    <a class="btn btn-primary" href="#" role="button">ASIGNAR SECRETARIA</a>
 {/if}

{/foreach}




{include file='templates/footer.tpl'}