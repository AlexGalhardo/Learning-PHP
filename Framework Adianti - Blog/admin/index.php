<?php
require_once 'init.php';
$theme  = $ini['general']['theme'];
new TSession;

if (TSession::getValue('logged'))
{
    $content = file_get_contents("app/templates/{$theme}/admin.html");
}
else
{
    $content = file_get_contents("app/templates/{$theme}/login.html");
}

$content  = ApplicationTranslator::translateTemplate($content);
$content  = str_replace('{LIBRARIES}', file_get_contents("app/templates/{$theme}/libraries.html"), $content);
$content  = str_replace('{class}', isset($_REQUEST['class']) ? $_REQUEST['class'] : '', $content);
$content  = str_replace('{template}', $theme, $content);
$content  = str_replace('{login}', TSession::getValue('login'), $content);
$css      = TPage::getLoadedCSS();
$js       = TPage::getLoadedJS();
$content  = str_replace('{HEAD}', $css.$js, $content);

echo $content;

if (TSession::getValue('logged'))
{
    if (isset($_REQUEST['class']))
    {
        $method = isset($_REQUEST['method']) ? $_REQUEST['method'] : NULL;
        AdiantiCoreApplication::loadPage($_REQUEST['class'], $method, $_REQUEST);
    }
}
else
{
    AdiantiCoreApplication::loadPage('LoginForm', '', $_REQUEST);
}
