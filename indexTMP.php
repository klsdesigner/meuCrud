<?php
require('./_app/Config.inc.php');
// $url =  BASE . "/gestao";
// header("Location:  $url");
//if (!isset($_SESSION)) {
//    session_start();
//}

// $configuracao = new Read;
// $configuracao->ExeRead("kl_configuracao");
// foreach ($configuracao->getResult() as $obj):
//     extract($obj);
// endforeach;

/**
 * Verifica a data de expiração e executa um procedimento 
 * de atualização das noticia no banco de dados mysql.
 */
//$checaNews = new Procedure;
//$checaNews->ExeProcedure("dataExpiracaoNoticias");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow" />
    <meta name="keywords" content="<?php //echo $conf_chave; 
                                    ?>" />
    <meta name="description" content="<?php //echo strip_tags($conf_descricao); 
                                        ?>" />
    <meta name="author" content="Kleber de Souza - BRAZISTELECOM">
    <meta name="copyright" content="Copyright (c) <?php //echo date('Y'); 
                                                    ?> <?php //echo SITENAME; 
                                                                                ?>" />
    <meta name="googlebot" content="index, follow" />
    <meta name="title" content="<?php //echo SITENAME . ' - ' . SITEDESC; 
                                ?>" />
    <link rev=made href="mailto: klsdesigner@hotmail.com" />
    <title><?php echo SITENAME . ' - ' . SITEDESC; ?></title>
    <!-- Bootstrap -->
    <!--<link href="<?php //echo BASE; 
                    ?>/_app/Library/bootstrap-4/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!--ICONES FA PARA BOOTSTRAP-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- FONTE ROBOTO DO GOOGLE-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900,300italic">
    <!--OWL CAROUSEL-->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!--Animate Css-->
    <link href="<?php echo BASE; ?>/css/animate.css" rel="stylesheet">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>/css/styles.css">
    <!--Favicon do site-->
    <link rel="icon" href="gestao/libs/images/favicon.ico" />
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <?php
    /** MENU */
    include_once REQUIRE_PATH . '/inc/header.inc.php';
    include_once REQUIRE_PATH . '/inc/content.inc.php';
    include_once REQUIRE_PATH . '/inc/footer.inc.php';
    ?>
    </div>
    <!--fim baseConteudo -->
    <!--BOTÃO DE VOLTAR AO TOPO-->
    <div id="topo" class="smoothscroll-top animated infinite pulse">
        <span class="scroll-top-inner">
            <i class="fa fa-chevron-up" aria-hidden="true"></i>
        </span>
    </div>
    <!-- JQUERY DA LIBRARY DO GOOGLE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- POPPER JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- BOOTSTRAP 4 JS CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!--BOOTBOX-->
    <script src="<?php echo BASE; ?>/_cdn/bootbox/bootbox.min.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/bootbox/bootbox.locales.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="<?php echo BASE; ?>/_cdn/MaskedInput.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/jquery.easing.min.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/scrolling-nav.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/geral-masks.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/scrollTop.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/jqueryAnimate.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/jquery.datetimepicker.full.min.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/owl.carousel.min.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/owlCarousel.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="themes/probilling/js/contato.js"></script>
    <script src="themes/probilling/js/trabalheconosco.js"></script>
    <script src="<?php echo BASE; ?>/_cdn/geral.js"></script>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143212204-1">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-143212204-1');
    </script>-->

</body>

</html>