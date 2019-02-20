<?php
/**
 * ApplicationTranslator
 *
 * @version    5.6
 * @package    util
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class ApplicationTranslator
{
    private static $instance; // singleton instance
    private $messages;
    private $enWords;
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
        $this->messages['en'][] = 'Open';
        $this->messages['en'][] = 'New';
        $this->messages['en'][] = 'Save';
        $this->messages['en'][] = 'Find';
        $this->messages['en'][] = 'Delete';
        $this->messages['en'][] = 'Edit';
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
        $this->messages['en'][] = 'Permission denied';
        $this->messages['en'][] = 'Generate';
        $this->messages['en'][] = 'List';
        $this->messages['en'][] = 'Detail';
        $this->messages['en'][] = 'Back';
        $this->messages['en'][] = 'Clear';
        $this->messages['en'][] = 'Program';
        $this->messages['en'][] = 'Path';
        $this->messages['en'][] = 'Results';
        $this->messages['en'][] = 'Search program';
        $this->messages['en'][] = 'Search code';
        $this->messages['en'][] = 'Persistence';
        $this->messages['en'][] = 'Setup';
        $this->messages['en'][] = 'Database Transactions';
        $this->messages['en'][] = 'Manual Prepared Query';
        $this->messages['en'][] = 'Transaction information';
        $this->messages['en'][] = 'Manual connection';
        $this->messages['en'][] = 'Active Records';
        $this->messages['en'][] = 'Objects';
        $this->messages['en'][] = 'Object Store';
        $this->messages['en'][] = 'Object Load';
        $this->messages['en'][] = 'Object Static Load';
        $this->messages['en'][] = 'Lazy Load';
        $this->messages['en'][] = 'Object Render and evaluate';
        $this->messages['en'][] = 'Object Update';
        $this->messages['en'][] = 'Transaction class log';
        $this->messages['en'][] = 'Transaction logger function';
        $this->messages['en'][] = 'Encapsulation';
        $this->messages['en'][] = 'Object Delete';
        $this->messages['en'][] = 'First and Last ID';
        $this->messages['en'][] = 'Array conversion';
        $this->messages['en'][] = 'JSON conversion';
        $this->messages['en'][] = 'Hook methods';
        $this->messages['en'][] = 'Collections';
        $this->messages['en'][] = 'Criteria API';
        $this->messages['en'][] = 'Collection count';
        $this->messages['en'][] = 'Collection simple count';
        $this->messages['en'][] = 'Collection count objects';
        $this->messages['en'][] = 'Collection static simple count';
        $this->messages['en'][] = 'Collection load';
        $this->messages['en'][] = 'Collection paginated load';
        $this->messages['en'][] = 'Collection simple paginated load';
        $this->messages['en'][] = 'Collection simple load';
        $this->messages['en'][] = 'Collection static simple load';
        $this->messages['en'][] = 'Collection get objects';
        $this->messages['en'][] = 'Collection update';
        $this->messages['en'][] = 'Collection batch update';
        $this->messages['en'][] = 'Collection static batch update';
        $this->messages['en'][] = 'Collection delete';
        $this->messages['en'][] = 'Collection simple delete';
        $this->messages['en'][] = 'Collection static simple delete';
        $this->messages['en'][] = 'Relationships';
        $this->messages['en'][] = 'Object Association';
        $this->messages['en'][] = 'Object Composition';
        $this->messages['en'][] = 'Object Simple Composition';
        $this->messages['en'][] = 'Object Aggregation';
        $this->messages['en'][] = 'Object Simple Aggregation';
        $this->messages['en'][] = 'Relationships shortcuts';
        $this->messages['en'][] = 'Presentation';
        $this->messages['en'][] = 'Containers';
        $this->messages['en'][] = 'Table';
        $this->messages['en'][] = 'Table Columns';
        $this->messages['en'][] = 'Table Multi Cell';
        $this->messages['en'][] = 'Panel';
        $this->messages['en'][] = 'Notebook';
        $this->messages['en'][] = 'Bootstrap Notebook Wrapper';
        $this->messages['en'][] = 'Bootstrap Notebook Vertical';
        $this->messages['en'][] = 'Notebook Styling';
        $this->messages['en'][] = 'Panel group';
        $this->messages['en'][] = 'Scroll';
        $this->messages['en'][] = 'Frame';
        $this->messages['en'][] = 'Vertical Box';
        $this->messages['en'][] = 'Horizontal Box';
        $this->messages['en'][] = 'Window';
        $this->messages['en'][] = 'Dialogs';
        $this->messages['en'][] = 'Information dialog';
        $this->messages['en'][] = 'Error dialog';
        $this->messages['en'][] = 'Question dialog';
        $this->messages['en'][] = 'Input dialog';
        $this->messages['en'][] = 'Alerts';
        $this->messages['en'][] = 'Forms';
        $this->messages['en'][] = 'Quick Forms';
        $this->messages['en'][] = 'Quick Tabbed Forms';
        $this->messages['en'][] = 'Custom Tabbed Forms';
        $this->messages['en'][] = 'Bootstrap Form Wrapper';
        $this->messages['en'][] = 'Bootstrap vertical form';
        $this->messages['en'][] = 'Bootstrap Column Form';
        $this->messages['en'][] = 'Bootstrap Inline Form';
        $this->messages['en'][] = 'Bootstrap Form Builder';
        $this->messages['en'][] = 'Bootstrap Form Builder 2';
        $this->messages['en'][] = 'Form field list';
        $this->messages['en'][] = 'Styled buttons';
        $this->messages['en'][] = 'Input masks';
        $this->messages['en'][] = 'Form validation';
        $this->messages['en'][] = 'Static selections';
        $this->messages['en'][] = 'Manual database selections';
        $this->messages['en'][] = 'Automatic database selections';
        $this->messages['en'][] = 'Client interactions';
        $this->messages['en'][] = 'Dynamic interactions';
        $this->messages['en'][] = 'Enable/disable interactions';
        $this->messages['en'][] = 'Show/hide rows';
        $this->messages['en'][] = 'Seek button';
        $this->messages['en'][] = 'Html Editor';
        $this->messages['en'][] = 'Sort List';
        $this->messages['en'][] = 'Datagrids';
        $this->messages['en'][] = 'Quick Datagrids';
        $this->messages['en'][] = 'Custom Datagrids';
        $this->messages['en'][] = 'Bootstrap Datagrid';
        $this->messages['en'][] = 'Datagrids Actions group';
        $this->messages['en'][] = 'Datagrids Columns group';
        $this->messages['en'][] = 'Datagrids Conditional actions';
        $this->messages['en'][] = 'Datagrids with popover';
        $this->messages['en'][] = 'Scrollable Datagrids';
        $this->messages['en'][] = 'Datagrid column actions';
        $this->messages['en'][] = 'Datagrid transformers';
        $this->messages['en'][] = 'Datagrid transformers II';
        $this->messages['en'][] = 'Datagrid calculations';
        $this->messages['en'][] = 'Datagrid with image';
        $this->messages['en'][] = 'Datagrid with label';
        $this->messages['en'][] = 'Datagrid with progress bar';
        $this->messages['en'][] = 'Datagrid with input fields';
        $this->messages['en'][] = 'Datagrids with input dialog';
        $this->messages['en'][] = 'Datagrids with new Window';
        $this->messages['en'][] = 'Datagrids with Checkbutton';
        $this->messages['en'][] = 'Page transitions';
        $this->messages['en'][] = 'Multi Step Form';
        $this->messages['en'][] = 'Multi Step Form II';
        $this->messages['en'][] = 'Dynamic Multi Step Form';
        $this->messages['en'][] = 'Multi Step Form';
        $this->messages['en'][] = 'Multi Step Wizard';
        $this->messages['en'][] = 'Utility widgets';
        $this->messages['en'][] = 'Calendar';
        $this->messages['en'][] = 'Full Calendar';
        $this->messages['en'][] = 'Tree View';
        $this->messages['en'][] = 'Dropdown';
        $this->messages['en'][] = 'BreadCrumb';
        $this->messages['en'][] = 'SourceCode';
        $this->messages['en'][] = 'Designer';
        $this->messages['en'][] = 'Designed containers';
        $this->messages['en'][] = 'Designed form Elements';
        $this->messages['en'][] = 'Designed datagrids';
        $this->messages['en'][] = 'Designed form and datagrid';
        $this->messages['en'][] = 'Reports';
        $this->messages['en'][] = 'Tabular report';
        $this->messages['en'][] = 'Designed PDF shapes';
        $this->messages['en'][] = 'Designed PDF report';
        $this->messages['en'][] = 'Designed PDF NFE';
        $this->messages['en'][] = 'Document HTML->PDF';
        $this->messages['en'][] = 'Charts';
        $this->messages['en'][] = 'Line chart';
        $this->messages['en'][] = 'Bar chart';
        $this->messages['en'][] = 'Pie chart';
        $this->messages['en'][] = 'Dashboard';
        $this->messages['en'][] = 'Barcode labels';
        $this->messages['en'][] = 'Barcode';
        $this->messages['en'][] = 'QRCode';
        $this->messages['en'][] = 'Screen labels';
        $this->messages['en'][] = 'Extending';
        $this->messages['en'][] = 'Template View basic';
        $this->messages['en'][] = 'Template View advanced';
        $this->messages['en'][] = 'Template View repeated';
        $this->messages['en'][] = 'Using jQuery plugins';
        $this->messages['en'][] = 'Creating new components';
        $this->messages['en'][] = 'Extras';
        $this->messages['en'][] = 'Form components';
        $this->messages['en'][] = 'Texts and links';
        $this->messages['en'][] = 'Form opening window';
        $this->messages['en'][] = 'Form confirmation';
        $this->messages['en'][] = 'Expander';
        $this->messages['en'][] = 'Selection breaks';
        $this->messages['en'][] = 'Form inside Popover';
        $this->messages['en'][] = 'Conditional submission';
        $this->messages['en'][] = 'Reusable MVC Forms';
        $this->messages['en'][] = 'Datagrid Window Form';
        $this->messages['en'][] = 'Datagrid details';
        $this->messages['en'][] = 'Stylized Datagrids';
        $this->messages['en'][] = 'Internal pages (inbox)';
        $this->messages['en'][] = 'Organization';
        $this->messages['en'][] = 'Standard controls';
        $this->messages['en'][] = 'Standard Form';
        $this->messages['en'][] = 'Standard DataGrid';
        $this->messages['en'][] = 'Standard Form/DataGrid';
        $this->messages['en'][] = 'Manual controls';
        $this->messages['en'][] = 'Manual form';
        $this->messages['en'][] = 'Manual DataGrid';
        $this->messages['en'][] = 'Manual Form/DataGrid';
        $this->messages['en'][] = 'Designed views';
        $this->messages['en'][] = 'Designed form';
        $this->messages['en'][] = 'Designed datagrid';
        $this->messages['en'][] = 'Complex views';
        $this->messages['en'][] = 'Customer list';
        $this->messages['en'][] = 'Customer Status';
        $this->messages['en'][] = 'Product list';
        $this->messages['en'][] = 'Inline editing datagrid';
        $this->messages['en'][] = 'Batch update list';
        $this->messages['en'][] = 'Batch instant update list';
        $this->messages['en'][] = 'Batch delete list';
        $this->messages['en'][] = 'Batch selection list';
        $this->messages['en'][] = 'Multi check form';
        $this->messages['en'][] = 'Checkout form';
        $this->messages['en'][] = 'POS form (Master/detail)';
        $this->messages['en'][] = 'Sale list';
        $this->messages['en'][] = 'Sale master-detail form I';
        $this->messages['en'][] = 'Sale master-detail form II';
        $this->messages['en'][] = 'Sale master-detail form III';
        $this->messages['en'][] = 'Sales chart';
        $this->messages['en'][] = 'Hierarchical combo';
        $this->messages['en'][] = 'Dynamic filtering';
        $this->messages['en'][] = 'Product catalog';
        $this->messages['en'][] = 'Agenda';
        $this->messages['en'][] = 'Full calendar';
        $this->messages['en'][] = 'Complete registrations';
        $this->messages['en'][] = 'Query screens';
        $this->messages['en'][] = 'Batch operations';
        $this->messages['en'][] = 'Checkout screens';
        $this->messages['en'][] = 'Field interactions';
        $this->messages['en'][] = 'Calendars';
        $this->messages['en'][] = 'Custom views';
        $this->messages['en'][] = 'Labels';
        $this->messages['en'][] = 'Connections';
        $this->messages['en'][] = 'Utilities';
        $this->messages['en'][] = 'Templates';
        $this->messages['en'][] = 'Collection transform';
        $this->messages['en'][] = 'Collection filter';
        $this->messages['en'][] = 'Warning dialog';
        $this->messages['en'][] = 'Collection as array';
        $this->messages['en'][] = 'Form with static post';
        $this->messages['en'][] = 'Pages';
        $this->messages['en'][] = 'Single page';
        $this->messages['en'][] = 'Horizontal Scrollable Datagrids';
        $this->messages['en'][] = 'Vertical Scrollable Datagrids';
        $this->messages['en'][] = 'Data calendar';
        $this->messages['en'][] = 'Page with external content';
        $this->messages['en'][] = 'Sort DB List';
        $this->messages['en'][] = 'Page with embedded PDF';
        $this->messages['en'][] = 'Window with embedded PDF';
        $this->messages['en'][] = 'Window with external system';
        $this->messages['en'][] = 'Alternative Object Store';
        $this->messages['en'][] = 'On demand window';
        $this->messages['en'][] = 'Bootstrap form';
        $this->messages['en'][] = 'Bootstrap form grid';
        $this->messages['en'][] = 'Bootstrap 1 column form';
        $this->messages['en'][] = 'Bootstrap 1 line form';
        $this->messages['en'][] = 'Form events';
        $this->messages['en'][] = 'Common page';
        $this->messages['en'][] = 'Common window';
        $this->messages['en'][] = 'Window events';
        $this->messages['en'][] = 'Datagrid';
        $this->messages['en'][] = 'Quick datagrid';
        $this->messages['en'][] = 'Datagrid formatting';
        $this->messages['en'][] = 'Datagrid date conversion';
        $this->messages['en'][] = 'Page center';
        $this->messages['en'][] = 'Studio designer';
        $this->messages['en'][] = 'Samples';
        $this->messages['en'][] = 'Product';
        $this->messages['en'][] = 'Template View masks';
        $this->messages['en'][] = 'Sunday';
        $this->messages['en'][] = 'Monday';
        $this->messages['en'][] = 'Tuesday';
        $this->messages['en'][] = 'Wednesday';
        $this->messages['en'][] = 'Thursday';
        $this->messages['en'][] = 'Friday';
        $this->messages['en'][] = 'Saturday';
        
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
        $this->messages['pt'][] = 'Abrir';
        $this->messages['pt'][] = 'Novo';
        $this->messages['pt'][] = 'Salvar';
        $this->messages['pt'][] = 'Buscar';
        $this->messages['pt'][] = 'Excluir';
        $this->messages['pt'][] = 'Editar';
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
        $this->messages['pt'][] = 'Permissão negada';
        $this->messages['pt'][] = 'Gerar';
        $this->messages['pt'][] = 'Listar';
        $this->messages['pt'][] = 'Detalhe';
        $this->messages['pt'][] = 'Voltar';
        $this->messages['pt'][] = 'Limpar';
        $this->messages['pt'][] = 'Programa';
        $this->messages['pt'][] = 'Caminho';
        $this->messages['pt'][] = 'Resultados';
        $this->messages['pt'][] = 'Busca programa';
        $this->messages['pt'][] = 'Busca código';
        $this->messages['pt'][] = 'Persistência';
        $this->messages['pt'][] = 'Setup';
        $this->messages['pt'][] = 'Transações de banco';
        $this->messages['pt'][] = 'Query manual com prepare';
        $this->messages['pt'][] = 'Informações da transação';
        $this->messages['pt'][] = 'Conexão Manual';
        $this->messages['pt'][] = 'Active Records';
        $this->messages['pt'][] = 'Objetos';
        $this->messages['pt'][] = 'Gravação de objeto';
        $this->messages['pt'][] = 'Carregar objeto';
        $this->messages['pt'][] = 'Carregar objeto estaticamente';
        $this->messages['pt'][] = 'Carga Lazy';
        $this->messages['pt'][] = 'Renderização e cálculo com objeto';
        $this->messages['pt'][] = 'Alterar objeto';
        $this->messages['pt'][] = 'Log da transação com classe';
        $this->messages['pt'][] = 'Log da transação com função';
        $this->messages['pt'][] = 'Encapsulamento';
        $this->messages['pt'][] = 'Excluir objeto';
        $this->messages['pt'][] = 'Primeiro e último ID';
        $this->messages['pt'][] = 'Conversão Array';
        $this->messages['pt'][] = 'Conversão JSON';
        $this->messages['pt'][] = 'Métodos gancho';
        $this->messages['pt'][] = 'Coleções';
        $this->messages['pt'][] = 'API de critérios';
        $this->messages['pt'][] = 'Contar coleção';
        $this->messages['pt'][] = 'Contar coleção simples';
        $this->messages['pt'][] = 'Contar coleção com countObjects';
        $this->messages['pt'][] = 'Contar coleção estaticamente';
        $this->messages['pt'][] = 'Carregar coleção';
        $this->messages['pt'][] = 'Carregar coleção paginada';
        $this->messages['pt'][] = 'Carregar coleção paginada simples';
        $this->messages['pt'][] = 'Carregar coleção simples';
        $this->messages['pt'][] = 'Carregar coleção estaticamente';
        $this->messages['pt'][] = 'Carregar coleção com getObjects';
        $this->messages['pt'][] = 'Alterar coleção de objetos';
        $this->messages['pt'][] = 'Alterar coleção em lote';
        $this->messages['pt'][] = 'Alterar coleção em lote estaticamente';
        $this->messages['pt'][] = 'Excluir coleção de objetos';
        $this->messages['pt'][] = 'Excluir coleção de objetos simples';
        $this->messages['pt'][] = 'Excluir coleção de objetos estaticamente';
        $this->messages['pt'][] = 'Relacionamentos';
        $this->messages['pt'][] = 'Associação de objetos';
        $this->messages['pt'][] = 'Composição de objetos';
        $this->messages['pt'][] = 'Composição de objetos simples';
        $this->messages['pt'][] = 'Agregação de objetos';
        $this->messages['pt'][] = 'Agregação de objetos simples';
        $this->messages['pt'][] = 'Atalhos de relacionamentos';
        $this->messages['pt'][] = 'Apresentação';
        $this->messages['pt'][] = 'Contêineres';
        $this->messages['pt'][] = 'Tabela';
        $this->messages['pt'][] = 'Tabelas com colunas';
        $this->messages['pt'][] = 'Tabelas com multi célula';
        $this->messages['pt'][] = 'Painel';
        $this->messages['pt'][] = 'Notebook';
        $this->messages['pt'][] = 'Notebook bootstrap';
        $this->messages['pt'][] = 'Notebook bootstrap vertical';
        $this->messages['pt'][] = 'Notebook com estilo';
        $this->messages['pt'][] = 'Panel group';
        $this->messages['pt'][] = 'Scroll';
        $this->messages['pt'][] = 'Frame';
        $this->messages['pt'][] = 'Caixa vertical';
        $this->messages['pt'][] = 'Caixa horizontal';
        $this->messages['pt'][] = 'Janela';
        $this->messages['pt'][] = 'Diálogos';
        $this->messages['pt'][] = 'Diálogo de informação';
        $this->messages['pt'][] = 'Diálogo de erro';
        $this->messages['pt'][] = 'Diálogo de questão';
        $this->messages['pt'][] = 'Diálogo de input';
        $this->messages['pt'][] = 'Alertas';
        $this->messages['pt'][] = 'Formulários';
        $this->messages['pt'][] = 'Formulários rápidos';
        $this->messages['pt'][] = 'Formulários rápidos com abas';
        $this->messages['pt'][] = 'Formulários custom com abas';
        $this->messages['pt'][] = 'Formulários Bootstrap Wrapper';
        $this->messages['pt'][] = 'Formulário Bootstrap vertical';
        $this->messages['pt'][] = 'Formulário Bootstrap em colunas';
        $this->messages['pt'][] = 'Formulário Bootstrap inline';
        $this->messages['pt'][] = 'Formulário Bootstrap Builder';
        $this->messages['pt'][] = 'Formulário Bootstrap Builder 2';
        $this->messages['pt'][] = 'Formulário com lista de campos';
        $this->messages['pt'][] = 'Botões com estilo';
        $this->messages['pt'][] = 'Máscaras de input';
        $this->messages['pt'][] = 'Validação de formulário';
        $this->messages['pt'][] = 'Seletores estáticos';
        $this->messages['pt'][] = 'Seletores manuais com dados';
        $this->messages['pt'][] = 'Seletores automáticos';
        $this->messages['pt'][] = 'Interações no lado cliente';
        $this->messages['pt'][] = 'Interações dinâmicas';
        $this->messages['pt'][] = 'Interações habilita/desabilita';
        $this->messages['pt'][] = 'Exibe/esconde linhas';
        $this->messages['pt'][] = 'Botão de busca';
        $this->messages['pt'][] = 'Editor Html';
        $this->messages['pt'][] = 'Lista de ordenação';
        $this->messages['pt'][] = 'Datagrids';
        $this->messages['pt'][] = 'Datagrids rápidas';
        $this->messages['pt'][] = 'Datagrids custom';
        $this->messages['pt'][] = 'Datagrid Bootstrap';
        $this->messages['pt'][] = 'Datagrid com grupo de ações';
        $this->messages['pt'][] = 'Datagrid com grupo de colunas';
        $this->messages['pt'][] = 'Datagrid com ações condicionais';
        $this->messages['pt'][] = 'Datagrid com popover';
        $this->messages['pt'][] = 'Datagrids com scroll';
        $this->messages['pt'][] = 'Datagrid com ações em colunas';
        $this->messages['pt'][] = 'Datagrid transformers';
        $this->messages['pt'][] = 'Datagrid transformers II';
        $this->messages['pt'][] = 'Datagrid com cálculos';
        $this->messages['pt'][] = 'Datagrid com imagem';
        $this->messages['pt'][] = 'Datagrid com label';
        $this->messages['pt'][] = 'Datagrid com barra de progresso';
        $this->messages['pt'][] = 'Datagrid com campos de input';
        $this->messages['pt'][] = 'Datagrid com diálogo de input';
        $this->messages['pt'][] = 'Datagrid com nova janela';
        $this->messages['pt'][] = 'Datagrid com checkbutton';
        $this->messages['pt'][] = 'Transições de páginas';
        $this->messages['pt'][] = 'Multi Step Form';
        $this->messages['pt'][] = 'Multi Step Form II';
        $this->messages['pt'][] = 'Dynamic Multi Step Form';
        $this->messages['pt'][] = 'Formulário multi etapa';
        $this->messages['pt'][] = 'Wizard multi etapa';
        $this->messages['pt'][] = 'Widgets utilitários';
        $this->messages['pt'][] = 'Calendário';
        $this->messages['pt'][] = 'Calendário completo';
        $this->messages['pt'][] = 'Tree View';
        $this->messages['pt'][] = 'Dropdown';
        $this->messages['pt'][] = 'BreadCrumb';
        $this->messages['pt'][] = 'Código-fonte';
        $this->messages['pt'][] = 'Designer';
        $this->messages['pt'][] = 'Designed containers';
        $this->messages['pt'][] = 'Designed form Elements';
        $this->messages['pt'][] = 'Designed datagrids';
        $this->messages['pt'][] = 'Designed form and datagrid';
        $this->messages['pt'][] = 'Relatórios';
        $this->messages['pt'][] = 'Relatório tabular';
        $this->messages['pt'][] = 'PDF Desenhado com formas';
        $this->messages['pt'][] = 'PDF Desenhado com relatório';
        $this->messages['pt'][] = 'PDF Desenhado com NFE';
        $this->messages['pt'][] = 'Documento HTML->PDF';
        $this->messages['pt'][] = 'Gráficos';
        $this->messages['pt'][] = 'Gráfico de linhas';
        $this->messages['pt'][] = 'Gráfico de barras';
        $this->messages['pt'][] = 'Gráfico de pizza';
        $this->messages['pt'][] = 'Dashboard';
        $this->messages['pt'][] = 'Etiquetas com códigos';
        $this->messages['pt'][] = 'Barcode';
        $this->messages['pt'][] = 'QRCode';
        $this->messages['pt'][] = 'Etiquetas em tela';
        $this->messages['pt'][] = 'Estendendo';
        $this->messages['pt'][] = 'Template básico';
        $this->messages['pt'][] = 'Template avançado';
        $this->messages['pt'][] = 'Template com repetição';
        $this->messages['pt'][] = 'Usando plugins jquery';
        $this->messages['pt'][] = 'Criando componentes';
        $this->messages['pt'][] = 'Extras';
        $this->messages['pt'][] = 'Componentes de formulários';
        $this->messages['pt'][] = 'Textos e links';
        $this->messages['pt'][] = 'Formulário abrindo janela';
        $this->messages['pt'][] = 'Confirmação de formulário';
        $this->messages['pt'][] = 'Expander';
        $this->messages['pt'][] = 'Quebras em seletores';
        $this->messages['pt'][] = 'Formulário em popover';
        $this->messages['pt'][] = 'Submissão condicional';
        $this->messages['pt'][] = 'Formulários MVC reutilizáveis';
        $this->messages['pt'][] = 'Datagrid com formulário em janela';
        $this->messages['pt'][] = 'Details em datagrid';
        $this->messages['pt'][] = 'Datagrids com estilo';
        $this->messages['pt'][] = 'Páginas internas (inbox)';
        $this->messages['pt'][] = 'Organização';
        $this->messages['pt'][] = 'Cadastros padronizados';
        $this->messages['pt'][] = 'Formulário padronizado';
        $this->messages['pt'][] = 'Datagrid padronizada';
        $this->messages['pt'][] = 'Form/datagrid padronizada';
        $this->messages['pt'][] = 'Cadastros manuais';
        $this->messages['pt'][] = 'Formulário manual';
        $this->messages['pt'][] = 'Datagrid manual';
        $this->messages['pt'][] = 'Form/datagrid manual';
        $this->messages['pt'][] = 'Views desenhadas';
        $this->messages['pt'][] = 'Formulário desenhado';
        $this->messages['pt'][] = 'Datagrid desenhada';
        $this->messages['pt'][] = 'Views complexas';
        $this->messages['pt'][] = 'Lista de clientes';
        $this->messages['pt'][] = 'Status do cliente';
        $this->messages['pt'][] = 'Lista de produtos';
        $this->messages['pt'][] = 'Datagrid com edição inline';
        $this->messages['pt'][] = 'Lista de edição em lote';
        $this->messages['pt'][] = 'Lista de edição instantânea';
        $this->messages['pt'][] = 'Lista de exclusão em lote';
        $this->messages['pt'][] = 'Lista de seleção em lote';
        $this->messages['pt'][] = 'Formulário com checagem múltipla';
        $this->messages['pt'][] = 'Formulário de checkout';
        $this->messages['pt'][] = 'Tela PDV (Mestre/detalhe)';
        $this->messages['pt'][] = 'Lista de vendas';
        $this->messages['pt'][] = 'Form mestre-detalhe de vendas I';
        $this->messages['pt'][] = 'Form mestre-detalhe de vendas II';
        $this->messages['pt'][] = 'Form mestre-detalhe de vendas III';
        $this->messages['pt'][] = 'Gráfico de venda';
        $this->messages['pt'][] = 'Combo hierárquica';
        $this->messages['pt'][] = 'Filtragem dinâmica';
        $this->messages['pt'][] = 'Catálogo de produtos';
        $this->messages['pt'][] = 'Agenda';
        $this->messages['pt'][] = 'Calendário completo';
        $this->messages['pt'][] = 'Cadastros completos';
        $this->messages['pt'][] = 'Telas de consulta';
        $this->messages['pt'][] = 'Operações em lote';
        $this->messages['pt'][] = 'Telas de checkout';
        $this->messages['pt'][] = 'Interações entre campos';
        $this->messages['pt'][] = 'Calendários';
        $this->messages['pt'][] = 'Views personalizadas';
        $this->messages['pt'][] = 'Etiquetas';
        $this->messages['pt'][] = 'Conexões';
        $this->messages['pt'][] = 'Utilitários';
        $this->messages['pt'][] = 'Templates';
        $this->messages['pt'][] = 'Transformação de coleção';
        $this->messages['pt'][] = 'Filtro de coleção';
        $this->messages['pt'][] = 'Diálogo de aviso';
        $this->messages['pt'][] = 'Coleção como vetor';
        $this->messages['pt'][] = 'Formulário com post estático';
        $this->messages['pt'][] = 'Páginas';
        $this->messages['pt'][] = 'Página simples';
        $this->messages['pt'][] = 'Datagrid com scroll horizontal';
        $this->messages['pt'][] = 'Datagrid com scroll vertical';
        $this->messages['pt'][] = 'Calendário com dados';
        $this->messages['pt'][] = 'Página com conteúdo externo';
        $this->messages['pt'][] = 'Lista de ordenação do banco';
        $this->messages['pt'][] = 'Página com PDF Embutido';
        $this->messages['pt'][] = 'Janela com PDF Embutido';
        $this->messages['pt'][] = 'Janela com sistema externo';
        $this->messages['pt'][] = 'Gravação de objeto alternativa';
        $this->messages['pt'][] = 'Janela sob demanda';
        $this->messages['pt'][] = 'Formulário Bootstrap';
        $this->messages['pt'][] = 'Formulário Bootstrap colunas';
        $this->messages['pt'][] = 'Formulário Bootstrap 1 coluna';
        $this->messages['pt'][] = 'Formulário Bootstrap 1 linha';
        $this->messages['pt'][] = 'Eventos de formulário';
        $this->messages['pt'][] = 'Página comum';
        $this->messages['pt'][] = 'Janela comum';
        $this->messages['pt'][] = 'Eventos de janela';
        $this->messages['pt'][] = 'Datagrid';
        $this->messages['pt'][] = 'Datagrid rápida';
        $this->messages['pt'][] = 'Datagrid com formatação';
        $this->messages['pt'][] = 'Datagrid conversão de data';
        $this->messages['pt'][] = 'Central de páginas';
        $this->messages['pt'][] = 'Studio designer';
        $this->messages['pt'][] = 'Exemplos';
        $this->messages['pt'][] = 'Produto';
        $this->messages['pt'][] = 'Template com máscaras';
        $this->messages['pt'][] = 'Domingo';
        $this->messages['pt'][] = 'Segunda-feira';
        $this->messages['pt'][] = 'Terça-feira';
        $this->messages['pt'][] = 'Quarta-feira';
        $this->messages['pt'][] = 'Quinta-feira';
        $this->messages['pt'][] = 'Sexta-feira';
        $this->messages['pt'][] = 'Sábado';
        
        $this->enWords = [];
        foreach ($this->messages['en'] as $key => $value)
        {
            $this->enWords[$value] = $key;
        }
    }
    
    /**
     * Returns the singleton instance
     * @return  Instance of self
     */
    public static function getInstance()
    {
        // if there's no instance
        if (empty(self::$instance))
        {
            // creates a new object
            self::$instance = new self;
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
    public static function translate($word, $param1 = NULL, $param2 = NULL, $param3 = NULL)
    {
        // get the self unique instance
        $instance = self::getInstance();
        // search by the numeric index of the word
        
        if (isset($instance->enWords[$word]) and !is_null($instance->enWords[$word]))
        {
            $key = $instance->enWords[$word]; //$key = array_search($word, $instance->messages['en']);
            
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
    public static function translateTemplate($template)
    {
        // get the self unique instance
        $instance = self::getInstance();
        // search by translated words
        if(preg_match_all( '!_t\{(.*?)\}!i', $template, $match ) > 0)
        {
            foreach($match[1] as $word)
            {
                $translated = _t($word);
                $template = str_replace('_t{'.$word.'}', $translated, $template);
            }
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
