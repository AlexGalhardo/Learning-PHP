<?php
class salesController extends controller {

	public function __construct() {
        parent::__construct();

        $u = new Users();
        if($u->isLogged() == false) {
        	header("Location: ".BASE_URL."/login");
        	exit;
        }
    }

    public function index() {
    	$data = array();
    	$u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        $data['statuses'] = array(
            '0'=>'Aguardando Pgto.',
            '1'=>'Pago',
            '2'=>'Cancelado'
        );

        if($u->hasPermission('sales_view')) {
            $s = new Sales();
            $offset = 0;

            $data['sales_list'] = $s->getList($offset, $u->getCompany());
        	
        	$this->loadTemplate("sales", $data);
        } else {
    		header("Location: ".BASE_URL);
    	}
    }

    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('sales_view')) {
            $s = new Sales();

            if(isset($_POST['client_id']) && !empty($_POST['client_id'])) {
                $client_id = addslashes($_POST['client_id']);
                $status = addslashes($_POST['status']);
                $quant = $_POST['quant'];

                $s->addSale($u->getCompany(), $client_id, $u->getId(), $quant, $status);
                header("Location: ".BASE_URL."/sales");
            }
            
            $this->loadTemplate("sales_add", $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        $data['statuses'] = array(
            '0'=>'Aguardando Pgto.',
            '1'=>'Pago',
            '2'=>'Cancelado'
        );

        if($u->hasPermission('sales_view')) {
            $s = new Sales();

            $data['permission_edit'] = $u->hasPermission('sales_edit');

            if(isset($_POST['status']) && $data['permission_edit']) {
                $status = addslashes($_POST['status']);

                $s->changeStatus($status, $id, $u->getCompany());

                header("Location: ".BASE_URL."/sales");
            }

            $data['sales_info'] = $s->getInfo($id, $u->getCompany());

            $this->loadTemplate("sales_edit", $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function emitir_nfe() {

        $nfe = new NFePHP\NFe\MakeNFe();
        $nfeTools = new NFePHP\NFe\ToolsNFe('nfe/config.json');
        $nfeTools->setModelo('55');

        //Dados da NFe - infNFe
$cUF = '52'; //codigo numerico do estado
$cNF = '00000010'; //numero aleatório da NF
$natOp = 'Venda de Produto'; //natureza da operação
$indPag = '0'; //0=Pagamento à vista; 1=Pagamento a prazo; 2=Outros
$mod = '55'; //modelo da NFe 55 ou 65 essa última NFCe
$serie = '1'; //serie da NFe
$nNF = '10'; // numero da NFe
$dhEmi = date("Y-m-d\TH:i:sP");//Formato: “AAAA-MM-DDThh:mm:ssTZD” (UTC - Universal Coordinated Time).
$dhSaiEnt = date("Y-m-d\TH:i:sP");//Não informar este campo para a NFC-e.
$tpNF = '1';
$idDest = '1'; //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
$cMunFG = '5200258';
$tpImp = '1'; //0=Sem geração de DANFE; 1=DANFE normal, Retrato; 2=DANFE normal, Paisagem;
              //3=DANFE Simplificado; 4=DANFE NFC-e; 5=DANFE NFC-e em mensagem eletrônica
              //(o envio de mensagem eletrônica pode ser feita de forma simultânea com a impressão do DANFE;
              //usar o tpImp=5 quando esta for a única forma de disponibilização do DANFE).
$tpEmis = '1'; //1=Emissão normal (não em contingência);
               //2=Contingência FS-IA, com impressão do DANFE em formulário de segurança;
               //3=Contingência SCAN (Sistema de Contingência do Ambiente Nacional);
               //4=Contingência DPEC (Declaração Prévia da Emissão em Contingência);
               //5=Contingência FS-DA, com impressão do DANFE em formulário de segurança;
               //6=Contingência SVC-AN (SEFAZ Virtual de Contingência do AN);
               //7=Contingência SVC-RS (SEFAZ Virtual de Contingência do RS);
               //9=Contingência off-line da NFC-e (as demais opções de contingência são válidas também para a NFC-e);
               //Nota: Para a NFC-e somente estão disponíveis e são válidas as opções de contingência 5 e 9.
$tpAmb = '2'; //1=Produção; 2=Homologação
$finNFe = '1'; //1=NF-e normal; 2=NF-e complementar; 3=NF-e de ajuste; 4=Devolução/Retorno.
$indFinal = '0'; //0=Normal; 1=Consumidor final;
$indPres = '9'; //0=Não se aplica (por exemplo, Nota Fiscal complementar ou de ajuste);
               //1=Operação presencial;
               //2=Operação não presencial, pela Internet;
               //3=Operação não presencial, Teleatendimento;
               //4=NFC-e em operação com entrega a domicílio;
               //9=Operação não presencial, outros.
$procEmi = '0'; //0=Emissão de NF-e com aplicativo do contribuinte;
                //1=Emissão de NF-e avulsa pelo Fisco;
                //2=Emissão de NF-e avulsa, pelo contribuinte com seu certificado digital, através do site do Fisco;
                //3=Emissão NF-e pelo contribuinte com aplicativo fornecido pelo Fisco.
$verProc = '4.0.43'; //versão do aplicativo emissor
$dhCont = ''; //entrada em contingência AAAA-MM-DDThh:mm:ssTZD
$xJust = ''; //Justificativa da entrada em contingência
//Numero e versão da NFe (infNFe)
$ano = date('y', strtotime($dhEmi));
$mes = date('m', strtotime($dhEmi));
$cnpj = $nfeTools->aConfig['cnpj'];
$chave = $nfe->montaChave($cUF, $ano, $mes, $cnpj, $mod, $serie, $nNF, $tpEmis, $cNF);
$versao = '3.10';
$resp = $nfe->taginfNFe($chave, $versao);
$cDV = substr($chave, -1); //Digito Verificador da Chave de Acesso da NF-e, o DV é calculado com a aplicação do algoritmo módulo 11 (base 2,9) da Chave de Acesso.
//tag IDE
$resp = $nfe->tagide($cUF, $cNF, $natOp, $indPag, $mod, $serie, $nNF, $dhEmi, $dhSaiEnt, $tpNF, $idDest, $cMunFG, $tpImp, $tpEmis, $cDV, $tpAmb, $finNFe, $indFinal, $indPres, $procEmi, $verProc, $dhCont, $xJust);

//Dados do emitente - (Importando dados do config.json)
$CNPJ = $nfeTools->aConfig['cnpj'];
$CPF = ''; // Utilizado para CPF na nota
$xNome = $nfeTools->aConfig['razaosocial'];
$xFant = $nfeTools->aConfig['nomefantasia'];
$IE = $nfeTools->aConfig['ie'];
$IEST = $nfeTools->aConfig['iest'];
$IM = $nfeTools->aConfig['im'];
$CNAE = $nfeTools->aConfig['cnae'];
$CRT = $nfeTools->aConfig['regime'];
$resp = $nfe->tagemit($CNPJ, $CPF, $xNome, $xFant, $IE, $IEST, $IM, $CNAE, $CRT);
//endereço do emitente
$xLgr = 'Av. Rio de Janeiro';
$nro = 's/n';
$xCpl = 'Qd. 38 Lt. 4,5 e 34';
$xBairro = 'Jardim Pinheiros I';
$cMun = '5200258';
$xMun = 'Águas Lindas de Goiás';
$UF = 'GO';
$CEP = '72910000';
$cPais = '1058';
$xPais = 'Brasil';
$fone = '6239324097';
$resp = $nfe->tagenderEmit($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);
        
//destinatário
$CNPJ = '23401454000170';
$CPF = '';
$idEstrangeiro = '';
$xNome = 'Chinnon Santos - Tecnologia e Assessoria em Softwares';
$indIEDest = '1';
$IE = '';
$ISUF = '';
$IM = '4128095';
$email = 'nfe@chinnonsantos.com';
$resp = $nfe->tagdest($CNPJ, $CPF, $idEstrangeiro, $xNome, $indIEDest, $IE, $ISUF, $IM, $email);
//Endereço do destinatário
$xLgr = 'Av. Vila Alpes';
$nro = 's/n';
$xCpl = '';
$xBairro = 'Vila Alpes';
$cMun = '5208707';
$xMun = 'Goiânia';
$UF = 'GO';
$CEP = '74310010';
$cPais = '1058';
$xPais = 'Brasil';
$fone = '6292779404';
$resp = $nfe->tagenderDest($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);

//produtos 1 (Limite da API é de 56 itens por Nota)
$aP[] = array(
        'nItem' => 1,
        'cProd' => '15',
        'cEAN' => '97899072659522',
        'xProd' => 'Chopp Pilsen - Barril 30 Lts',
        'NCM' => '22030000',
        'EXTIPI' => '',
        'CFOP' => '5101',
        'uCom' => 'Un',
        'qCom' => '4',
        'vUnCom' => '210.00',
        'vProd' => '840.00',
        'cEANTrib' => '',
        'uTrib' => 'Lt',
        'qTrib' => '120',
        'vUnTrib' => '7.00',
        'vFrete' => '',
        'vSeg' => '',
        'vDesc' => '',
        'vOutro' => '',
        'indTot' => '1',
        'xPed' => '16',
        'nItemPed' => '1',
        'nFCI' => '');
//produtos 2        
$aP[] = array(
        'nItem' => 2,
        'cProd' => '56',
        'cEAN' => '7896030801822',
        'xProd' => 'Copo Personalizado Klima 300ml',
        'NCM' => '39241000',
        'EXTIPI' => '',
        'CFOP' => '5102',
        'uCom' => 'Cx',
        'qCom' => '2',
        'vUnCom' => '180.00',
        'vProd' => '360.00',
        'cEANTrib' => '',
        'uTrib' => 'Cx',
        'qTrib' => '2',
        'vUnTrib' => '180.00',
        'vFrete' => '',
        'vSeg' => '',
        'vDesc' => '',
        'vOutro' => '',
        'indTot' => '1',
        'xPed' => '16',
        'nItemPed' => '2',
        'nFCI' => '');
foreach ($aP as $prod) {
    $nItem = $prod['nItem'];
    $cProd = $prod['cProd'];
    $cEAN = $prod['cEAN'];
    $xProd = $prod['xProd'];
    $NCM = $prod['NCM'];
    $EXTIPI = $prod['EXTIPI'];
    $CFOP = $prod['CFOP'];
    $uCom = $prod['uCom'];
    $qCom = $prod['qCom'];
    $vUnCom = $prod['vUnCom'];
    $vProd = $prod['vProd'];
    $cEANTrib = $prod['cEANTrib'];
    $uTrib = $prod['uTrib'];
    $qTrib = $prod['qTrib'];
    $vUnTrib = $prod['vUnTrib'];
    $vFrete = $prod['vFrete'];
    $vSeg = $prod['vSeg'];
    $vDesc = $prod['vDesc'];
    $vOutro = $prod['vOutro'];
    $indTot = $prod['indTot'];
    $xPed = $prod['xPed'];
    $nItemPed = $prod['nItemPed'];
    $nFCI = $prod['nFCI'];
    $resp = $nfe->tagprod($nItem, $cProd, $cEAN, $xProd, $NCM, $EXTIPI, $CFOP, $uCom, $qCom, $vUnCom, $vProd, $cEANTrib, $uTrib, $qTrib, $vUnTrib, $vFrete, $vSeg, $vDesc, $vOutro, $indTot, $xPed, $nItemPed, $nFCI);
}
$nfe->tagCEST(1, '2345');
$nfe->tagCEST(2, '9999');

//Impostos
$nItem = 1; //produtos 1
$vTotTrib = '449.90'; // 226.80 ICMS + 51.50 ICMSST + 50.40 IPI + 39.36 PIS + 81.84 CONFIS
$resp = $nfe->tagimposto($nItem, $vTotTrib);
$nItem = 2; //produtos 2
$vTotTrib = '74.34'; // 61.20 ICMS + 2.34 PIS + 10.80 CONFIS
$resp = $nfe->tagimposto($nItem, $vTotTrib);
//ICMS - Imposto sobre Circulação de Mercadorias e Serviços
$nItem = 1; //produtos 1
$orig = '0';
$cst = '00'; // Tributado Integralmente
$modBC = '3';
$pRedBC = '';
$vBC = '840.00'; // = $qTrib * $vUnTrib
$pICMS = '27.00'; // Alíquota do Estado de GO p/ 'NCM 2203.00.00 - Cervejas de Malte, inclusive Chope'
$vICMS = '226.80'; // = $vBC * ( $pICMS / 100 )
$vICMSDeson = '';
$motDesICMS = '';
$modBCST = '';
$pMVAST = '';
$pRedBCST = '';
$vBCST = '';
$pICMSST = '';
$vICMSST = '';
$pDif = '';
$vICMSDif = '';
$vICMSOp = '';
$vBCSTRet = '';
$vICMSSTRet = '';
$resp = $nfe->tagICMS($nItem, $orig, $cst, $modBC, $pRedBC, $vBC, $pICMS, $vICMS, $vICMSDeson, $motDesICMS, $modBCST, $pMVAST, $pRedBCST, $vBCST, $pICMSST, $vICMSST, $pDif, $vICMSDif, $vICMSOp, $vBCSTRet, $vICMSSTRet);

$nItem = 2; //produtos 2
$orig = '0';
$cst = '00';
$modBC = '3';
$pRedBC = '';
$vBC = '360.00'; // = $qTrib * $vUnTrib
$pICMS = '17.00'; // Alíquota Interna do Estado de GO 
$vICMS = '61.20'; // = $vBC * ( $pICMS / 100 )
$vICMSDeson = '';
$motDesICMS = '';
$modBCST = '';
$pMVAST = '';
$pRedBCST = '';
$vBCST = ''; 
$pICMSST = '';
$vICMSST = '';
$pDif = '';
$vICMSDif = '';
$vICMSOp = '';
$vBCSTRet = '';
$vICMSSTRet = '';
$resp = $nfe->tagICMS($nItem, $orig, $cst, $modBC, $pRedBC, $vBC, $pICMS, $vICMS, $vICMSDeson, $motDesICMS, $modBCST, $pMVAST, $pRedBCST, $vBCST, $pICMSST, $vICMSST, $pDif, $vICMSDif, $vICMSOp, $vBCSTRet, $vICMSSTRet);

//Inicialização de váriaveis não declaradas...
$vII = isset($vII) ? $vII : 0;
$vIPI = isset($vIPI) ? $vIPI : 0;
$vIOF = isset($vIOF) ? $vIOF : 0;
$vPIS = isset($vPIS) ? $vPIS : 0;
$vCOFINS = isset($vCOFINS) ? $vCOFINS : 0;
$vICMS = isset($vICMS) ? $vICMS : 0;
$vBCST = isset($vBCST) ? $vBCST : 0;
$vST = isset($vST) ? $vST : 0;
$vISS = isset($vISS) ? $vISS : 0;

//total
$vBC = '1200.00';
$vICMS = '288.00';
$vICMSDeson = '0.00';
$vBCST = '1030.80';
$vST = '51.50';
$vProd = '1200.00';
$vFrete = '0.00';
$vSeg = '0.00';
$vDesc = '0.00';
$vII = '0.00';
$vIPI = '50.40';
$vPIS = '41.70';
$vCOFINS = '92.64';
$vOutro = '0.00';
$vNF = number_format($vProd-$vDesc-$vICMSDeson+$vST+$vFrete+$vSeg+$vOutro+$vII+$vIPI, 2, '.', '');
$vTotTrib = number_format($vICMS+$vST+$vII+$vIPI+$vPIS+$vCOFINS+$vIOF+$vISS, 2, '.', '');
$resp = $nfe->tagICMSTot($vBC, $vICMS, $vICMSDeson, $vBCST, $vST, $vProd, $vFrete, $vSeg, $vDesc, $vII, $vIPI, $vPIS, $vCOFINS, $vOutro, $vNF, $vTotTrib);
//frete
$modFrete = '0'; //0=Por conta do emitente; 1=Por conta do destinatário/remetente; 2=Por conta de terceiros; 9=Sem Frete;
$resp = $nfe->tagtransp($modFrete);

//Dados dos Volumes Transportados
$aVol = array(
    array('4','Barris','','','120.000','120.000',''),
    array('2','Volume','','','10.000','10.000','')
);
foreach ($aVol as $vol) {
    $qVol = $vol[0]; //Quantidade de volumes transportados
    $esp = $vol[1]; //Espécie dos volumes transportados
    $marca = $vol[2]; //Marca dos volumes transportados
    $nVol = $vol[3]; //Numeração dos volume
    $pesoL = intval($vol[4]); //Kg do tipo Int, mesmo que no manual diz que pode ter 3 digitos verificador...
    $pesoB = intval($vol[5]); //...se colocar Float não vai passar na expressão regular do Schema. =\
    $aLacres = $vol[6];
    $resp = $nfe->tagvol($qVol, $esp, $marca, $nVol, $pesoL, $pesoB, $aLacres);
}

//dados da fatura
$nFat = '000035342';
$vOrig = '1200.00';
$vDesc = '';
$vLiq = '1200.00';
$resp = $nfe->tagfat($nFat, $vOrig, $vDesc, $vLiq);

// Calculo de carga tributária similar ao IBPT - Lei 12.741/12
$federal = number_format($vII+$vIPI+$vIOF+$vPIS+$vCOFINS, 2, ',', '.');
$estadual = number_format($vICMS+$vST, 2, ',', '.');
$municipal = number_format($vISS, 2, ',', '.');
$totalT = number_format($federal+$estadual+$municipal, 2, ',', '.');
$textoIBPT = "Valor Aprox. Tributos R$ {$totalT} - {$federal} Federal, {$estadual} Estadual e {$municipal} Municipal.";
//Informações Adicionais
//$infAdFisco = "SAIDA COM SUSPENSAO DO IPI CONFORME ART 29 DA LEI 10.637";
$infAdFisco = "";
$infCpl = "Pedido Nº16 - {$textoIBPT} ";
$resp = $nfe->taginfAdic($infAdFisco, $infCpl);

//monta a NFe e retorna na tela
$resp = $nfe->montaNFe();
$xml = $nfe->getXML();

$xml = $nfeTools->assina($xml);

if (! $nfeTools->validarXml($xml) || sizeof($nfeTools->errors)) {
    foreach ($nfeTools->errors as $erro) {
        if (is_array($erro)) { 
            foreach ($erro as $err) {
                echo "$err <br>";
            }
        } else {
            echo "$erro <br>";
        }
    }
    exit;
}

$aResposta = array();
$idLote = '';
$indSinc = '1';
$flagZip = false;
$retorno = $nfe->sefazEnviaLote($aXml, $tpAmb, $idLote, $aResposta, $indSinc, $flagZip);

$tpAmb = '2';
$recibo = '521000011732162';
$retorno = $nfe->sefazConsultaRecibo($recibo, $tpAmb, $aResposta);

$indSinc = '1'; //0=asíncrono, 1=síncrono
$pathNFefile = "D:/xampp/htdocs/GIT-nfephp-org/nfephp/xmls/NF-e/homologacao/assinadas/{$chave}-nfe.xml";
if (! $indSinc) {
    $pathProtfile = "D:/xampp/htdocs/GIT-nfephp-org/nfephp/xmls/NF-e/homologacao/temporarias/201605/{$recibo}-retConsReciNFe.xml";
} else {
    $pathProtfile = "D:/xampp/htdocs/GIT-nfephp-org/nfephp/xmls/NF-e/homologacao/temporarias/201605/{$recibo}-retEnviNFe.xml";
}
$saveFile = true;
$retorno = $nfe->addProtocolo($pathNFefile, $pathProtfile, $saveFile);

$docxml = NFePHP\Common\Files\FilesFolders::readFile($xmlProt);
$danfe = new NFePHP\Extras\Danfe($docxml, 'P', 'A4', $nfe->aConfig['aDocFormat']->pathLogoFile, 'I', '');
$id = $danfe->montaDANFE();
$salva = $danfe->printDANFE($pdfDanfe, 'F'); //Salva o PDF na pasta

    }
}






