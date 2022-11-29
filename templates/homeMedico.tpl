{include file='templates/header.tpl'}
<link href="css/homeMedico.style.css" rel="stylesheet">

<div class="data-container">
{foreach from=$dataMedico item=$dm}
    <a href="{BASE_URL}detallesCuenta/{$dm->nro_medico}"><img  class="img-medico" src="templates\img\medico.jpg"/></a>
        <h2 class="medico-title">{$dm->nombre} {$dm->apellido}</h2>
    {/foreach}
</div>

{include file='templates/medicAgenda.tpl'}

{include file='templates/footer.tpl'}