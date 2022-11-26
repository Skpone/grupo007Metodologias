{include file='templates/header.tpl'}
<link href="css/style.medics.css" rel="stylesheet">

<div class="medico-container">

<h1 class="title">{{title}}</h1>

{foreach from=$agenda item=$turno}
    {if (isset($idMedico))}
        {if $medico->nro_secretaria != $idSecretaria}
        <a class="set-medico" href="{BASE_URL}asignarMedico/{$idSecretaria}/{$medico->nro_medico}">
            <div class="data-medico">
                <span class="nombre-medico">{$medico->nombre_usuario} - {$medico->nombre} {$medico->apellido}</span>
                <a class="edit-medico" href=""><img src="templates/img/edit-icon.png" /></a>
                <a class="delete-medico" href="{BASE_URL}eliminarMedico/{$medico->nro_medico}">X</a>
            </div>
        </a>
        {/if}
    {/if}

