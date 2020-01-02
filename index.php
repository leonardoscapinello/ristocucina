<?php
require_once("src/config/index.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RISTO | Tradição, família e união. Acreditamos nisso!</title>
    <?php
    $library->setExtension("css");
    $library->ignoreFiles("fawsm.css");
    $library->ignoreFiles("la.min.css");
    $library->ignoreFiles("ls.css");
    $library->ignoreFiles("risto.inet.css");
    $library->setPath("./public/stylesheet/");
    $library->import();
    ?>
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
<div id="wrapper">
    <?php require_once("src/components/shop/header.php"); ?>
    <?php require_once("src/components/shop/featured-banner.php"); ?>
    <?php require_once("src/components/shop/featured-gnocchi.php"); ?>
    <?php require_once("src/components/shop/featured-ingredients.php"); ?>
    <?php require_once("src/components/shop/featured-pasta.php"); ?>
    <?php require_once("src/components/shop/footer.php"); ?>
</div>
<?php
$library->setExtension("js");
$library->setPath("./public/javascript/");
$library->import();
?>
<script type="text/javascript">
    window.onscroll = function () {
        headerOnScroll()
    };

    function headerOnScroll() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            document.getElementById("header").className = "scroll";
        } else {
            document.getElementById("header").className = "";
        }
    }
</script>
</body>
</html>