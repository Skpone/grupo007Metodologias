<form method="POST" action="medicFilterTurnos">
    <div class="col-11">
        <table class="table">
            <head>
                <tr class="filters">
                    <th>
                        Turnos
                        <select id="buscar-turnos" name="parte-del-dia">
                            <option value="todos">Todos</option>
                            <option value="manana">Mañana</option>
                            <option value="tarde">Tarde</option>
                        </select>
                    </th>
                    <th>
                        Fecha Desde:
                        <input name="fecha-desde" type="date" class="form-control">
                    </th>
                    <th>
                        Fecha Hasta:
                        <input name="fecha-hasta" type="date" class="form-control">
                    </th>
   
            </head>
        </table>
    </div>

</form>

