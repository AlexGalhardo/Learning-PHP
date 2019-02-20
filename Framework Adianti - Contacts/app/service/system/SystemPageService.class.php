<?php
class SystemPageService
{
    /**
     * Edit the current page
     */
    public static function editPage($param)
    {
        $ini = AdiantiApplicationConfig::get();
        $token = $ini['general']['token'];
        $controller = $param['controller'];
        $url = "https://manager.adiantibuilder.com.br/ws.php?method=editPage&controller={$controller}&token={$token}";
        
        if (self::checkExternalUrl($url) !== 200)
        {
            new TMessage('error', _t('Connection failed'));
        }
        else
        {
            TScript::create("__adianti_open_page('{$url}')");
        }
    }
    
    /**
     * Get page code from all pages except the informed
     */
    public static function getCodes()
    {
        $ini = AdiantiApplicationConfig::get();
        $token = $ini['general']['token'];
        $url = "https://manager.adiantibuilder.com.br/ws.php?method=getAllCodes&token={$token}";
        
        if (self::checkExternalUrl($url) !== 200)
        {
            throw new Exception(_t('Connection failed'));
        }
        
        $content = file_get_contents($url);
        $response = (array) json_decode($content);
        
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($response['status'] == 'error')
            {
                throw new Exception('Builder: '. $response['message']);
            }
        }
        else
        {
            throw new Exception(_t('Invalid return'));
        }
        
        return $response['data'];
    }
    
    /**
     * Get page code from all pages except the informed
     */
    public static function getMenu()
    {
        $ini = AdiantiApplicationConfig::get();
        $token = $ini['general']['token'];
        $url = "https://manager.adiantibuilder.com.br/ws.php?method=getMenu&token={$token}";
        
        if (self::checkExternalUrl($url) !== 200)
        {
            throw new Exception(_t('Connection failed'));
        }
        
        $content = file_get_contents($url);
        $response = (array) json_decode($content);
        
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($response['status'] == 'error')
            {
                throw new Exception('Builder: '. $response['message']);
            }
        }
        else
        {
            throw new Exception(_t('Invalid return'));
        }
        
        return $response['data'];
    }
    
    /**
     * Get page code from all pages except the informed
     */
    public static function getPermissions()
    {
        $ini = AdiantiApplicationConfig::get();
        $token = $ini['general']['token'];
        $url = "https://manager.adiantibuilder.com.br/ws.php?method=getPermissions&token={$token}";
        
        if (self::checkExternalUrl($url) !== 200)
        {
            throw new Exception(_t('Connection failed'));
        }
        
        $content = file_get_contents($url);
        $response = (array) json_decode($content);
        
        if (json_last_error() == JSON_ERROR_NONE)
        {
            if ($response['status'] == 'error')
            {
                throw new Exception('Builder: '. $response['message']);
            }
        }
        else
        {
            throw new Exception(_t('Invalid return'));
        }
        
        return $response['data'];
    }
    
    /**
     * Check if the URL is Ok
     */
    public static function checkExternalUrl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_exec($ch);
        $retCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        return $retCode;
    }
}
