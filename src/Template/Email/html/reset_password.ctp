<html>
<head>
    <style>
        body{
            height:100%;
            font-family: sans-serif;
            background-color:#3da1ff;
            color:#262626;
        }

        .row{
            width:80%;
            margin:0 auto;
        }

        .title{
            text-align:center;
        }
        .logo{
            width:60px;
            margin: 0 auto;
        }

        .logo img{
            width:60px;
        }
        .content{
            padding:10px;
            background-color:rgba(255, 255, 255, 0.4);
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="logo">
    <img src="<?= $this->Url->build('/img/Logo.png', true) ?>"></img>
</div>
<div class="row">
    <div class="col-md-12">
        <h1 class="title">StudioDuWeb</h1>
        <div class="content">
            <p>Bonjours <?= $user->username ?>, Vous avez récement modifié votre mot de passe.</p>
            <p style="color:red">Si vous n'avez pas effectué cette modification, merci de ne pas tenir compte de cet e-mail.</p>
            <p>Pour valider la modification de votre mot de passe, veuillez cliquer ou copier-coller le lien ci-dessous :</p>
            <a href="<?= $this->Url->build(['prefix' => null, 'controller' => 'Users', 'action' => 'validatePassword', $user->token, $user->username], true) ?>"><?= $this->Url->build(['prefix' => null, 'controller' => 'Users', 'action' => 'validatePassword', $user->token, $user->username], true) ?></a>
            <p>Merci de ne pas répondre à cet e-mail.</p>
            <p>Cordialement StudioDuWeb.</p>
        </div>

    </div>
</div>
</body>
</html>