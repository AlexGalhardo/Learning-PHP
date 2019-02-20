<?php
/**
 * Translation utility class
 * Copyright (c) 2006-2010 Pablo Dall'Oglio
 * @author  Pablo Dall'Oglio
 * @version 2.0, 2007-08-01
 */
class ApplicationTranslator
{
    private static $instance; // singleton instance
    private $lang;            // target language
    
    /**
     * Class Constructor
     */
    private function __construct()
    {
        $this->messages['en'][] = 'File not found';
        $this->messages['en'][] = 'Search';
        $this->messages['en'][] = 'Register';
        $this->messages['en'][] = 'Record saved';
        $this->messages['en'][] = 'Do you really want to delete ?';
        $this->messages['en'][] = 'Record deleted';
        $this->messages['en'][] = 'Function';
        $this->messages['en'][] = 'Table';
        $this->messages['en'][] = 'Tool';
        $this->messages['en'][] = 'Data';
        $this->messages['en'][] = 'New';
        $this->messages['en'][] = 'Open';
        $this->messages['en'][] = 'Save';
        $this->messages['en'][] = 'Edit';
        $this->messages['en'][] = 'Delete';
        $this->messages['en'][] = 'Find';
        $this->messages['en'][] = 'Cancel';
        $this->messages['en'][] = 'Yes';
        $this->messages['en'][] = 'No';
        $this->messages['en'][] = 'January';
        $this->messages['en'][] = 'February';
        $this->messages['en'][] = 'March';
        $this->messages['en'][] = 'April';
        $this->messages['en'][] = 'May';
        $this->messages['en'][] = 'June';
        $this->messages['en'][] = 'July';
        $this->messages['en'][] = 'August';
        $this->messages['en'][] = 'September';
        $this->messages['en'][] = 'October';
        $this->messages['en'][] = 'November';
        $this->messages['en'][] = 'December';
        $this->messages['en'][] = 'Today';
        $this->messages['en'][] = 'Close';
        $this->messages['en'][] = 'The field ^1 can not be less than ^2 characters';
        $this->messages['en'][] = 'The field ^1 can not be greater than ^2 characters';
        $this->messages['en'][] = 'The field ^1 can not be less than ^2';
        $this->messages['en'][] = 'The field ^1 can not be greater than ^2';
        $this->messages['en'][] = 'The field ^1 is required';
        $this->messages['en'][] = 'The field ^1 has not a valid CNPJ';
        $this->messages['en'][] = 'The field ^1 has not a valid CPF';
        $this->messages['en'][] = 'The field ^1 contains an invalid e-mail';
        $this->messages['en'][] = 'Incorrect login';
        $this->messages['en'][] = 'Login';
        $this->messages['en'][] = 'Password';
        $this->messages['en'][] = 'Language';
        $this->messages['en'][] = 'Categories';
        $this->messages['en'][] = 'Posts';
        $this->messages['en'][] = 'Title';
        $this->messages['en'][] = 'Category';
        $this->messages['en'][] = 'Post';
        $this->messages['en'][] = 'Keywords';
        $this->messages['en'][] = 'Name';
        $this->messages['en'][] = 'Content';
        $this->messages['en'][] = 'Side panel';
        $this->messages['en'][] = 'Subtitle';
        $this->messages['en'][] = 'Date';
        $this->messages['en'][] = 'User';
        $this->messages['en'][] = 'Log in';
        $this->messages['en'][] = 'Clear';
        
        $this->messages['pt'][] = 'Arquivo não encontrado';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Cadastrar';
        $this->messages['pt'][] = 'Registro salvo';
        $this->messages['pt'][] = 'Deseja realmente excluir ?';
        $this->messages['pt'][] = 'Registro excluído';
        $this->messages['pt'][] = 'Função';
        $this->messages['pt'][] = 'Tabela';
        $this->messages['pt'][] = 'Ferramenta';
        $this->messages['pt'][] = 'Dados';
        $this->messages['pt'][] = 'Novo';
        $this->messages['pt'][] = 'Abrir';
        $this->messages['pt'][] = 'Salvar';
        $this->messages['pt'][] = 'Editar';
        $this->messages['pt'][] = 'Excluir';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Cancelar';
        $this->messages['pt'][] = 'Sim';
        $this->messages['pt'][] = 'Não';
        $this->messages['pt'][] = 'Janeiro';
        $this->messages['pt'][] = 'Fevereiro';
        $this->messages['pt'][] = 'Março';
        $this->messages['pt'][] = 'Abril';
        $this->messages['pt'][] = 'Maio';
        $this->messages['pt'][] = 'Junho';
        $this->messages['pt'][] = 'Julho';
        $this->messages['pt'][] = 'Agosto';
        $this->messages['pt'][] = 'Setembro';
        $this->messages['pt'][] = 'Outubro';
        $this->messages['pt'][] = 'Novembro';
        $this->messages['pt'][] = 'Dezembro';
        $this->messages['pt'][] = 'Hoje';
        $this->messages['pt'][] = 'Fechar';
        $this->messages['pt'][] = 'O campo ^1 não pode ter menos de ^2 caracteres';
        $this->messages['pt'][] = 'O campo ^1 não pode ter mais de ^2 caracteres';
        $this->messages['pt'][] = 'O campo ^1 não pode ser menor que ^2';
        $this->messages['pt'][] = 'O campo ^1 não pode ser maior que ^2';
        $this->messages['pt'][] = 'O campo ^1 é obrigatório';
        $this->messages['pt'][] = 'O campo ^1 não contém um CNPJ válido';
        $this->messages['pt'][] = 'O campo ^1 não contém um CPF válido';
        $this->messages['pt'][] = 'O campo ^1 contém um e-mail inválido';
        $this->messages['pt'][] = 'Login incorreto';
        $this->messages['pt'][] = 'Usuário';
        $this->messages['pt'][] = 'Senha';
        $this->messages['pt'][] = 'Linguagem';
        $this->messages['pt'][] = 'Categorias';
        $this->messages['pt'][] = 'Posts';
        $this->messages['pt'][] = 'Título';
        $this->messages['pt'][] = 'Categoria';
        $this->messages['pt'][] = 'Post';
        $this->messages['pt'][] = 'Palavras-chave';
        $this->messages['pt'][] = 'Nome';
        $this->messages['pt'][] = 'Conteúdo';
        $this->messages['pt'][] = 'Painel lateral';
        $this->messages['pt'][] = 'Subtítulo';
        $this->messages['pt'][] = 'Data';
        $this->messages['pt'][] = 'Usuário';
        $this->messages['pt'][] = 'Entrar';
        $this->messages['pt'][] = 'Limpar';
    }
    
    /**
     * Returns the singleton instance
     * @return  Instance of ApplicationTranslator
     */
    public static function getInstance()
    {
        // if there's no instance
        if (empty(self::$instance))
        {
            // creates a new object
            self::$instance = new ApplicationTranslator;
        }
        // returns the created instance
        return self::$instance;
    }
    
    /**
     * Define the target language
     * @param $lang     Target language index
     */
    public static function setLanguage($lang)
    {
        $instance = self::getInstance();
        $instance->lang = $lang;
    }
    
    /**
     * Returns the target language
     * @return Target language index
     */
    public static function getLanguage()
    {
        $instance = self::getInstance();
        return $instance->lang;
    }
    
    /**
     * Translate a word to the target language
     * @param $word     Word to be translated
     * @return          Translated word
     */
    static public function translate($word, $param1 = NULL, $param2 = NULL, $param3 = NULL)
    {
        // get the ApplicationTranslator unique instance
        $instance = self::getInstance();
        // search by the numeric index of the word
        $key = array_search($word, $instance->messages['en']);
        if ($key !== FALSE)
        {
            // get the target language
            $language = self::getLanguage();
            // returns the translated word
            $message = $instance->messages[$language][$key];
            
            if (isset($param1))
            {
                $message = str_replace('^1', $param1, $message);
            }
            if (isset($param2))
            {
                $message = str_replace('^2', $param2, $message);
            }
            if (isset($param3))
            {
                $message = str_replace('^3', $param3, $message);
            }
            return $message;
        }
        else
        {
            return 'Message not found: '. $word;
        }
    }
    
    /**
     * Translate a template file
     */
    static public function translateTemplate($template)
    {
        // get the ApplicationTranslator unique instance
        $instance = self::getInstance();
        // search by the numeric index of the word
        foreach ($instance->messages['en'] as $word)
        {
            $translated = _t($word);
            $template = str_replace('_t{'.$word.'}', $translated, $template);
        }
        return $template;
    }
}

/**
 * Facade to translate words
 * @param $word  Word to be translated
 * @param $param1 optional ^1
 * @param $param2 optional ^2
 * @param $param3 optional ^3
 * @return Translated word
 */
function _t($msg, $param1 = null, $param2 = null, $param3 = null)
{
        return ApplicationTranslator::translate($msg, $param1, $param2, $param3);
}
?>
