<?php
// IP do servidor ####################
define("IP", $_SERVER['SERVER_ADDR']);

// CONFIGURAÇÕES DO SITE ####################
define('HOST', 'localhost');
define('USER', 'root'); 
define('PASS', '');  
/** 
 * -----------------------------------
 * Tabala do banco
 * -----------------------------------
 * CREATE TABLE agenda (
 * id INTEGER NOT NULL AUTO_INCREMENT,
 * name VARCHAR(200) NULL,
 * email VARCHAR(200) NULL,
 * telefone VARCHAR(11) NULL,
 * PRIMARY KEY(id)
 * );
*/
define('DBSA', 'meuCrud'); 


// CONFIGURAÇÃO PARA EMAIL AUTENTICADO ######
define('MAILHOST', 'mail.name.com.br');
define('MAILPORT', '25');
define('MAILUSER', 'name@hotmail.com.br');
define('MAILPASS', 'desenvolvimento#'); 

// DEFINE O REMETENTE #######################
define("REMETENTE", "name@hotmail.com.br");
define("NOMEREMETENTE", "KLSDESIGNER");

// DEFINE A INDENTIDADE DO SITE #############
define('SITENAME', 'CrudKleber');
define('SITEDESC', 'Sistema de cadastro de usuários ');// Descrição do site

// DEFINE A BASE DO SITE ####################
//define('BASE', "http://www.probilling.com.br");
define('BASE', "http://localhost/crudKleber");
define('DIR', dirname(__FILE__));

/**
 * THEME - Nome do tema do site.
 */
define('THEME', 'crudkleber'); //parta onde fica o site

/**
 * INCLUDE_PATH - Caminho absoluto do temma para o site.
 */
define('INCLUDE_PATH', BASE . '/themes/' . THEME);

/**
 * REQUIRE_PATH - Caminho relativo para o tema no site
 */
define('REQUIRE_PATH', 'themes/' . THEME);

/**
 * IMG_PATH - Caminho relativo para o imagem do tema no site
 */
define('IMG_PATH', REQUIRE_PATH . '/images');

// AUTO LOAD DE CLASSES ##################### 
function autoload($Class) {
    // cDir responsavel pelos diretorios das classes;
    $cDir = array('Conn', 'Helpers', 'Models');
    $iDir = null;
    foreach ($cDir as $dirName) {        
        if (! $iDir && file_exists(DIR . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . ".class.php") && !is_dir($dirName)) {
                        
            include_once (DIR . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . ".class.php");            
            $iDir = true;            
        }        
    }    
    if (! $iDir) {
        trigger_error("Não foi possivel incluir {$Class}.class.php", E_USER_ERROR);
        die;
    }
}

spl_autoload_register("autoload");


// TRATAMENTO DE ERROS ######################
// CSS constantes :: Mensagens de Erro
define('KL_ACCEPT', 'alert-success');
define('KL_INFOR', 'alert-info');
define('KL_ALERT', 'alert-warning');
define('KL_ERROR', 'alert-danger');

// KLErro :: Exibe erros Lançados :: Front
function KLErro($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? KL_INFOR : ($ErrNo == E_USER_WARNING ? KL_ALERT : ($ErrNo == E_USER_ERROR ? KL_ERROR : $ErrNo)));
    echo "<p class=\"trigger alert {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"> </span></p>";
    if ($ErrDie) {
        die;
    }
}
// PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? KL_INFOR : ($ErrNo == E_USER_WARNING ? KL_ALERT : ($ErrNo == E_USER_ERROR ? KL_ERROR : $ErrNo)));
    echo "<p class=\"trigger alert {$CssClass}\">";
    echo "<b>Erro na Linha: {$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"> </span></p>";
    if ($ErrNo == E_USER_ERROR) {
        die;
    }
}
set_error_handler('PHPErro');
