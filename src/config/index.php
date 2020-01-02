<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once("constants.php");

/* FUNCTIONS */
require_once(DIRNAME . "../functions/XML2Array.php");
require_once(DIRNAME . "../functions/sanitize_output.php");
require_once(DIRNAME . "../functions/translate.php");
require_once(DIRNAME . "../functions/get_request.php");
require_once(DIRNAME . "../functions/not_empty.php");

/* CLASSES */
require_once(DIRNAME . "/../class/lessphp/lessc.inc.php");
require_once(DIRNAME . "../class/URL.php");
require_once(DIRNAME . "../class/Browser.php");
require_once(DIRNAME . "../class/Number.php");
require_once(DIRNAME . "../class/Text.php");
require_once(DIRNAME . "../class/Library.php");
require_once(DIRNAME . "../class/Charset.php");
require_once(DIRNAME . "../class/Database.php");
require_once(DIRNAME . "../class/Text.php");
require_once(DIRNAME . "../class/Security.php");
require_once(DIRNAME . "../class/Settings.php");
require_once(DIRNAME . "../class/Country.php");
require_once(DIRNAME . "../class/Date.php");
require_once(DIRNAME . "../class/Translate.php");
require_once(DIRNAME . "../class/Module.php");
require_once(DIRNAME . "../class/Products.php");
require_once(DIRNAME . "../class/Accounts.php");
require_once(DIRNAME . "../class/AccountsSession.php");

$less = new lessc();
$url = new URL();
$browser = new Browser();
$number = new Number();
$text = new Text();
$library = new Library();
$charset = new Charset();
$database = new Database();
$security = new Security();
$settings = new Settings();
$country = new Country();
$date = new Date();
$translate = new Translate();
$module = new Module();
$products = new Products();
$accounts = new Accounts();
$accountSession = new AccountSession();

try {
    $less->compileFile(DIRNAME . "../../public/less/risto.less", DIRNAME . "../../public/stylesheet/risto.css");
    $less->compileFile(DIRNAME . "../../public/less/risto.inet.less", DIRNAME . "../../public/stylesheet/risto.inet.css");
} catch (Exception $e) {
}

ob_start("sanitize_output");