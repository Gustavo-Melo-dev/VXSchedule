<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>Cadastro de contato efetuado com sucesso!</header>
    <main>
        <p>
            O contato {{$contact->first_name . " " . $contact->last_name}} foi adicionado!
        </p>
    </main>
</body>
</html>
