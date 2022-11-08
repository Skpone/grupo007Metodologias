{include file='templates/header.tpl'}
<link href="css/style.secretaries.css" rel="stylesheet">

<h1 class="title">Listado de secretarias</h1>

{foreach from=$secretaries item=$secretaria}
    <div>
        <div class="data-secretaria">
            <span class="nombre-secretaria">{$secretaria->nombre} {$secretaria->apellido}</span>
            <a class="edit-secretaria" href=""><img src="templates/img/edit-icon.png" /></a>
            <a class="delete-secretaria" href="{BASE_URL}eliminarSecretaria/{$secretaria->nro_secretaria}" >X</a>

            <button class="asignar-medico"><a class="go-asignar-medico" href="{BASE_URL}elegirMedico/{$secretaria->nro_secretaria}">ASIGNAR MÉDICO</a></button> 
        </div>
    </div>



    {foreach from=$medics item=$medico}
        {if {$secretaria->nro_secretaria} == {$medico->nro_secretaria} }
            <div>
            <span class="nombre-secretaria">{$medico->nombre} {$medico->apellido}</span>
            </div> 
        {/if}
    {/foreach}
{/foreach}

<button class="agregar-secretaria"><a class="go-asignar-medico" href="{BASE_URL}nuevaSecretaria"><img src="templates/img/plus-icon.png"/>AGREGAR SECRETARIA</button>
<button class="asignar-medico"><a class="go-asignar-medico" href="{BASE_URL}elegirMedico/{$secretaria->nro_secretaria}">ASIGNAR MÉDICO</a></button>
{include file='templates/footer.tpl'} 
