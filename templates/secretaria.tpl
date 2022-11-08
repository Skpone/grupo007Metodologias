{include file='templates/header.tpl'}
<link href="css/style.secretaries.css" rel="stylesheet">
<div class="secretaria-container">
<img  class="secretaria-img" src="templates/img/secretaria.jpg"/>
{foreach from=$secretaria item=$s}
<div class="data-secretaria-particular">
     <h2>Secretaria: {$s->nombre} {$s->apellido}</h2>
</div>
    <button class="agregar-medico"><a class="go-asignar-medico" href="{BASE_URL}elegirMedico/{$s->nro_secretaria}">ASIGNAR MEDICO</a></button>
</div>
<div class="medico-container">
<h2>Medicos Asociados</h2>
{foreach from=$medicos item=$medico}
        {if {$s->nro_secretaria} == {$medico->nro_secretaria} }
            <div>
                <p class="nombre-medico">{$medico->nombre} {$medico->apellido} - {$medico->especialidad}</p>
            </div> 
        {/if}
{/foreach}
</div>
{/foreach}


{include file='templates/footer.tpl'} 