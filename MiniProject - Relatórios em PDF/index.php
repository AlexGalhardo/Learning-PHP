<!-- primeira forma-->
<h1>Ola mundo</h1>
<h4>Sub título...</h4>
<!------------------->


<?php
// segund forma
$html = '
	<h1>Ola mundo</h1>
	<h4>Sub título...</h4>
';
echo $html;
?>




<?php
// terceira forma
// vai pegar tudo que for impresso e guardar na memória
// ou seja, não irá mostrar para o usuário
ob_start();
?>

<h1>Ola mundo</h1>
<h4>Sub título...</h4>

<h1>Relatório</h1>
<table>
	<thead>
		<tr>
			<th>Nome do cliente</th>
			<th>Valor do pedido</th>
			<th>Data de entrega</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Alex</td>
			<td>R$ 1.000</td>
			<td>23/09/2015</td>
		</tr>
		<tr>
			<td>Xande</td>
			<td>R$ 2.000</td>
			<td>23/10/2075</td>
		</tr>
		<tr>
			<td>Maria</td>
			<td>R$ 3.000</td>
			<td>02/07/2015</td>
		</tr>
	</tbody>
</table>

<?php
$html = ob_get_contents();
ob_end_clean();

echo $html;

// $ composer require mpdf/mpdf
require 'vendor/autoload.php';

$arquivo = md5(time().rand(0,9999)) . '.pdf';

$mpdf = new mPDF();
$mpdf->WriteHTML($html);

// é aconselhavel não mostrar mais nada depois que chamar o método output, porque este irá mostrar o conteúdo já na versão PDF
// I = abra no browser -> padrão
$mpdf->Output('arquivo.pdf', 'I');
// D = faz o download do pdf
$mpdf->Output('arquivo.pdf', 'D');
// F = salva no servidor
$mpdf->Output('arquivo.pdf', 'F');

$link = "https://galhardoo.com/pdf/arquivo.pdf";
echo "Faça o download no link: <br>" . $link;

// https://mpdf.github.io/
?>