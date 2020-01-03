<?php
require_once("../../../../src/config/index.php");

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RISTO Intranet</title>
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <?php
    $library->setExtension("css");
    $library->ignoreFiles("risto.css");
    $library->ignoreFiles("la.min.css");
    $library->ignoreFiles("ls.css");
    $library->setPath("../../../../public/stylesheet/");
    $library->import();
    ?>
    <script type="text/javascript">
        function FocusOnInput() {
            document.getElementById("username").focus();
        }
    </script>
</head>
<body onload="FocusOnInput()">
<div id="wrapper">

    <div class="authenticate-box" style="opacity: 0;">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-xl-6">
                <div class="left-banner"></div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-6">
                <div class="auth-form">
                    <form action="" method="POST">
                        <a href="<?= SERVER_URL ?>" class="target black">Voltar a <b>ristocucina.com</b></a>
                        <h3>Olá,<br/> tudo bem?</h3>
                        <div class="input-block">
                            <label for="username">Nome de Usuário</label>
                            <div class="half">
                                <input type="text" name="username" id="username"/>
                                <div class="complete">@ristocucina.com</div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="input-block">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password"/>
                        </div>
                        <div class="input-block">
                            <button class="btn large">Fazer Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>