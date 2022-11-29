<!DOCTYPE html>
<html lang="en">

<head>
    <base href={BASE_URL}>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="main">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav justify-content-end">
                        {if isset($smarty.session.USER_ID)}
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="logout">({$smarty.session.USER_NAME})
                                    Logout</a>
                            </li>
                        {else}
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="login">Login</a>
                            </li>
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>
    </header>

</body>