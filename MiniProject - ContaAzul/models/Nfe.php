<?php
class Nfe extends model {

	public function emitirNFE($cNF, $destinatario, $prods, $fatinfo) {
		$nfe = new NFePHP\NFe\MakeNFe();
		$nfeTools = new NFePHP\NFe\ToolsNFe("nfe/files/config.json");

		//Dados da NFe - infNFe
		$cUF = $nfeTools->aConfig['cUF']; //codigo numerico do estado
		$natOp = 'Venda de Produto'; //natureza da operação
		$indPag = '0'; //0=Pagamento à vista; 1=Pagamento a prazo; 2=Outros
		$mod = '55'; //modelo da NFe 55 ou 65 essa última NFCe
		$serie = '1'; //serie da NFe
		$nNF = $cNF; // numero da NFe
		$dhEmi = date("Y-m-d\TH:i:sP"); // Data de emissão
		$dhSaiEnt = date("Y-m-d\TH:i:sP"); //Data de entrada/saida
		$tpNF = '1'; // 0=entrada; 1=saida
		$idDest = '1'; //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
		$cMunFG = $nfeTools->aConfig['cMun']; // Código do Município
		$tpImp = '1'; //0=Sem geração de DANFE; 1=DANFE normal, Retrato; 2=DANFE normal, Paisagem; 3=DANFE Simplificado; 4=DANFE NFC-e; 5=DANFE NFC-e em mensagem eletrônica
		$tpEmis = '1'; //1=Emissão normal (não em contingência);
		               //2=Contingência FS-IA, com impressão do DANFE em formulário de segurança;
		               //3=Contingência SCAN (Sistema de Contingência do Ambiente Nacional);
		               //4=Contingência DPEC (Declaração Prévia da Emissão em Contingência);
		               //5=Contingência FS-DA, com impressão do DANFE em formulário de segurança;
		               //6=Contingência SVC-AN (SEFAZ Virtual de Contingência do AN);
		               //7=Contingência SVC-RS (SEFAZ Virtual de Contingência do RS);
		               //9=Contingência off-line da NFC-e (as demais opções de contingência são válidas também para a NFC-e);
		               //Nota: Para a NFC-e somente estão disponíveis e são válidas as opções de contingência 5 e 9.
		$tpAmb = $nfeTools->aConfig['tpAmb']; //1=Produção; 2=Homologação
		$finNFe = '1'; //1=NF-e normal; 2=NF-e complementar; 3=NF-e de ajuste; 4=Devolução/Retorno.
		$indFinal = '0'; //0=Normal; 1=Consumidor final;
		$indPres = '2'; //0=Não se aplica (por exemplo, Nota Fiscal complementar ou de ajuste);
		               //1=Operação presencial;
		               //2=Operação não presencial, pela Internet;
		               //3=Operação não presencial, Teleatendimento;
		               //4=NFC-e em operação com entrega a domicílio;
		               //9=Operação não presencial, outros.
		$procEmi = '0'; //0=Emissão de NF-e com aplicativo do contribuinte;
		                //1=Emissão de NF-e avulsa pelo Fisco;
		                //2=Emissão de NF-e avulsa, pelo contribuinte com seu certificado digital, através do site do Fisco;
		                //3=Emissão NF-e pelo contribuinte com aplicativo fornecido pelo Fisco.
		$verProc = $nfeTools->aConfig['vApp']; //versão do aplicativo emissor
		$dhCont = ''; //entrada em contingência AAAA-MM-DDThh:mm:ssTZD
		$xJust = ''; //Justificativa da entrada em contingência
		$cnpj = $nfeTools->aConfig['cnpj']; // CNPJ do emitente

		//Numero e versão da NFe (infNFe)
		$ano = date('y', strtotime($dhEmi));
		$mes = date('m', strtotime($dhEmi));
		
		$chave = $nfe->montaChave($cUF, $ano, $mes, $cnpj, $mod, $serie, $nNF, $tpEmis, $nNF);
		$versao = $nfeTools->aConfig['nfeVersao'];
		$resp = $nfe->taginfNFe($chave, $versao);

		$cDV = substr($chave, -1); //Digito Verificador da Chave de Acesso da NF-e, o DV é calculado com a aplicação do algoritmo módulo 11 (base 2,9) da Chave de Acesso.
		//tag IDE
		$resp = $nfe->tagide($cUF, $nNF, $natOp, $indPag, $mod, $serie, $nNF, $dhEmi, $dhSaiEnt, $tpNF, $idDest, $cMunFG, $tpImp, $tpEmis, $cDV, $tpAmb, $finNFe, $indFinal, $indPres, $procEmi, $verProc, $dhCont, $xJust);

		//Dados do emitente
		$CPF = ''; // Para Emitente CPF
		$xNome = $nfeTools->aConfig['razaosocial'];
		$xFant = $nfeTools->aConfig['nomefantasia'];
		$IE = $nfeTools->aConfig['ie']; // Inscrição Estadual
		$IEST = $nfeTools->aConfig['iest']; // IE do Substituti Tributário
		$IM = $nfeTools->aConfig['im']; // Inscrição Municipal
		$CNAE = $nfeTools->aConfig['cnae']; // CNAE Fiscal
		$CRT = $nfeTools->aConfig['regime']; // CRT (Código de Regime Tributário), 1=simples nacional
		$resp = $nfe->tagemit($cnpj, $CPF, $xNome, $xFant, $IE, $IEST, $IM, $CNAE, $CRT);

		//endereço do emitente
		$xLgr = $nfeTools->aConfig['xLgr'];
		$nro = $nfeTools->aConfig['nro'];
		$xCpl = $nfeTools->aConfig['xCpl'];
		$xBairro = $nfeTools->aConfig['xBairro'];
		$cMun = $nfeTools->aConfig['cMun'];
		$xMun = $nfeTools->aConfig['xMun'];
		$UF = $nfeTools->aConfig['UF'];
		$CEP = $nfeTools->aConfig['CEP'];
		$cPais = $nfeTools->aConfig['cPais'];
		$xPais = $nfeTools->aConfig['xPais'];
		$fone = $nfeTools->aConfig['fone'];
		$resp = $nfe->tagenderEmit($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);

		//destinatário
		$CNPJ = $destinatario['cnpj'];
		$CPF = $destinatario['cpf'];
		$idEstrangeiro = $destinatario['idestrangeiro'];
		$xNome = $destinatario['nome']; // Nome/Razão Social
		$email = $destinatario['email'];
		$indIEDest = $destinatario['iedest']; // Indica se tem IE (vazio ou 1)
		$IE = $destinatario['ie']; // Insc. Estadual
		$ISUF = $destinatario['isuf']; // Insc. SUFRAMA
		$IM = $destinatario['im']; // Insc. Municipal
		$resp = $nfe->tagdest($CNPJ, $CPF, $idEstrangeiro, $xNome, $indIEDest, $IE, $ISUF, $IM, $email);

		//Endereço do destinatário
		$xLgr = $destinatario['end']['logradouro'];
		$nro = $destinatario['end']['numero'];
		$xCpl = $destinatario['end']['complemento'];
		$xBairro = $destinatario['end']['bairro'];
		$xMun = $destinatario['end']['mu'];
		$UF = $destinatario['end']['uf'];
		$CEP = $destinatario['end']['cep'];
		$xPais = $destinatario['end']['pais'];
		$fone = $destinatario['end']['fone'];
		$cMun = $destinatario['end']['cmu']; // Código do Municipio
		$cPais = $destinatario['end']['cpais']; // Código do País
		$resp = $nfe->tagenderDest($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);

		// Inicialização de váriaveis
	    $vBC = 0;
		$vICMSDeson = 0;
		$vProd = 0;
		$vFrete = 0;
		$vSeg = 0;
		$vDesc = 0;
		$vOutro = 0;
		$vII = 0;
		$vIPI = 0;
		$vIOF = 0;
		$vPIS = 0;
		$vCOFINS = 0;
		$vICMS = 0;
		$vBCST = 0;
		$vST = 0;
		$vISS = 0;

		$nItem = 1;
		foreach($prods as $prod) {

			$cProd = $prod['cProd']; // Código do Produto
		    $cEAN = $prod['cEAN']; // Código de Barras (EAN)
		    $xProd = $prod['xProd']; // Descrição do Produto
		    $NCM = $prod['NCM']; // Código NCM (Nomenclatura Comum do MERCOSUL)
		    $EXTIPI = $prod['EXTIPI']; // Código de excessão do NCM
		    $CFOP = $prod['CFOP']; // Código Fiscal de Operações e Prestações
		    $uCom = $prod['uCom']; // Unidade Comercial do produto
		    $qCom = $prod['qCom']; // Quantidade
		    $vUnCom = $prod['vUnCom']; // Valor Unitário
		    $vProd += $prod['vProd']; // Valor do Produto
		    $cEANTrib = $prod['cEANTrib']; // Código de Barra Tributável
		    $uTrib = $prod['uTrib']; // Unidade Tributável
		    $qTrib = $prod['qTrib']; // Quantidade Tributável
		    $vUnTrib = $prod['vUnTrib']; // Valor Unitário de tributação
		    $vFrete += $prod['vFrete']; // Valor Total do Frete
		    $vSeg += $prod['vSeg']; // Valor Total do Seguro
		    $vDesc += $prod['vDesc']; // Valor do Desconto
		    $vOutro += $prod['vOutro']; // Outras Despesas
		    $indTot = $prod['indTot']; // Indica se valor do Item (vProd) entra no valor total da NF-e. As vezes é um brinde
		    $xPed = $prod['xPed']; // Número do Pedido de Compra
		    $nItemPed = $prod['nItemPed']; // Item do Pedido de Compra
		    $nFCI = $prod['nFCI']; // Número de controle da FCI - Importação
		    $vBC += $prod['bc']; // Base de cálculo

		    // Adiciona o produto na nota
		    $nfe->tagprod($nItem, $cProd, $cEAN, $xProd, $NCM, $EXTIPI, $CFOP, $uCom, $qCom, $vUnCom, $prod['vProd'], $cEANTrib, $uTrib, $qTrib, $vUnTrib, $prod['vFrete'], $prod['vSeg'], $prod['vDesc'], $prod['vOutro'], $indTot, $xPed, $nItemPed, $nFCI);

		    // Imposto Total deste produto
		    $vTotTrib = $prod['impostoTotal']; // ICMS + IPI + PIS + COFINS, etc...
			$nfe->tagimposto($nItem, $vTotTrib);

			// ICMS
			$vICMS += $prod['icms'];
			//$nfe->tagICMS(...);

			// IPI
			$vIPI += $prod['ipi'];
			//$nfe->tagIPI(...);

			// PIS
			$vPIS += $prod['pis'];
			//$nfe->tagPIS(...);

			// CONFINS
			$vCOFINS += $prod['cofins'];
			//$nfe->tagCOFINS(...);

			$nItem++;
		}

		// Valor da NF
		$vNF = number_format($vProd-$vDesc-$vICMSDeson+$vST+$vFrete+$vSeg+$vOutro+$vII+$vIPI, 2, '.', '');

		// Valor Total Tributável
		$vTotTrib = number_format($vICMS+$vST+$vII+$vIPI+$vPIS+$vCOFINS+$vIOF+$vISS, 2, '.', '');

		// Grupos Totais
		$nfe->tagICMSTot($vBC, $vICMS, $vICMSDeson, $vBCST, $vST, $vProd, $vFrete, $vSeg, $vDesc, $vII, $vIPI, $vPIS, $vCOFINS, $vOutro, $vNF, $vTotTrib);

		// Frete
		$modFrete = '9'; //0=Por conta do emitente; 1=Por conta do destinatário/remetente; 2=Por conta de terceiros; 9=Sem Frete;
		$nfe->tagtransp($modFrete);

		// Dados da fatura
		$nFat = $fatinfo['nfat']; // Número da Fatura
		$vOrig = $fatinfo['vorig']; // Valor original da fatura
		$vDesc = $fatinfo['vdesc']; // Valor do desconto
		$vLiq = $fatinfo['nfat']; // Valor Líquido
		$nfe->tagfat($nFat, $vOrig, $vDesc, $vLiq);

		// Monta a NF-e e retorna o resultado
		$resp = $nfe->montaNFe();
		if($resp === true) {
			$xml = $nfe->getXML();

			// Assina o XML
			$xml = $nfeTools->assina($xml);

			// Valida o XML
			$v = $nfeTools->validarXml($xml);
			
			if($v == false) {
				foreach($nfeTools->errors as $erro) {
					if(is_array($erro)) {
						foreach($erro as $er) {
							echo $er."<br/>";
						}
					} else {
						echo $erro."<br/>";
					}
				}

				exit;
			}

			$idLote = '';
			$indSinc = '0'; // 0=asíncrono, 1=síncrono
			$flagZip = false;
			$resposta = array();

			// Envia para o SEFAZ
			$nfeTools->sefazEnviaLote($xml, $tpAmb, $idLote, $resposta, $indSinc, $flagZip);

			// Consulta o RECIBO
			$protXML = $nfeTools->sefazConsultaRecibo($resposta['nRec'], $tpAmb);

			// Chave aleatória para o XML/PDF
			$chave = md5(time().rand(0,9999));
			$xmlName = $chave.'.xml';
			$danfeName = $chave.'.pdf';

			// Salva os arquivos temporário e validado
			$pathNFefile = "nfe/files/nfe/validadas/".$xmlName;
			$pathProtfile = "nfe/files/nfe/temp/".$xmlName;
			$pathDanfeFile = "nfe/files/nfe/danfe/".$danfeName;
			file_put_contents($pathNFefile, $xml);
			file_put_contents($pathProtfile, $protXML);

			// Adiciona o Protocolo
			$nfeTools->addProtocolo($pathNFefile, $pathProtfile, true);

			// Gera o DANFE
			$docxml = new NFePHP\Common\Files\FilesFolders::readFile($pathProtfile);

			$docFormat = $nfeTools->aConfig['aDocFormat']->format;
			$docPaper = $nfeTools->aConfig['aDocFormat']->paper;
			$docLogo = $nfeTools->aConfig['aDocFormat']->pathLogoFile;

			$danfe = new NFePHP\Extras\Danfe($docxml, $docFormat, $docPaper, $docLogo);
			$danfe->montaDANFE();
			$danfe->printDANFE($pathDanfeFile, "F");

			return $chave;
		} else {
			foreach($nfe->erros as $erro) {
				echo $erro['tag'].' - '.$erro['desc']."<br/>";
			}
		}

	}

}












