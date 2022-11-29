<div class="medico-container">

    <h1 class="title">{{title}}</h1>

    {foreach from=$agenda item=$turno}
        {if (isset($agenda))}
            <div class="data-medico">
                <span class="nombre-medico" dataIdTurno="{$turno->nro_turno}" dataIdMedico="{$turno->nro_medico}"> {$turno->nombre_paciente} - {$turno->fecha_turno} {$medico->tiempo_turno} {$medico->detalles}</span>
            </div>
        {else}
            <div class="data-medico">
                Este medico no posee turnos venideros.
            </div>
        {/if}

</div>
