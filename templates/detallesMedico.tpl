{include file='templates/header.tpl'}
<link href="css/homeMedico.style.css" rel="stylesheet">

<div class="data-container">
{foreach from=$dataMedico item=$dm}
    <img  class="img-medico-detalle" src="templates\img\medico.jpg"/>
        <div class="data-medico">
        <h1 class="medico-nombre">{$dm->nombre} {$dm->apellido}</h1>
        <h2 class="medico-os"><u>Atiende con</u> {$dm->obra_social}</h2>
        <h2 class="medico-especialidad"><u>Especialidad</u> {$dm->especialidad}</h2>
        </div>
    {/foreach}
</div>

{include file='templates/footer.tpl'}