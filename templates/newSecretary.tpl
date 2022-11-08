{include file='templates/header.tpl'}
</head>

   <h2>{$title}</h2>

   <form method="POST" action="agregarSecretaria">
        <div class="mb-3 mt-2">
            <label for="nombreSecretaria" class="form-label">Nombre </label>
            <input type="text" class="form-control" name="nombre" id="nombreSecretaria" placeholder="Ingrese el nombre">
        </div>

        <div class="mb-3">
            <label for="apellidoSecretaria"  class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellidoSecretaria" placeholder="Ingrese el apellido">
        </div>

        
        <button type="submit" class="btn btn-primary mb-3">AGREGAR SECRETARIA</button> 

        


    </form>

    {include file='templates/footer.tpl'}