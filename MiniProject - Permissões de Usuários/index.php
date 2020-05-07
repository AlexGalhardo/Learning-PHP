<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'classes/documentos.class.php';

if(!isset($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();
?>
<h1>Sistema</h1>

<?php if($usuarios->temPermissao('ADD')): ?>
<a href="">Adicionar Documento</a><br/><br/>
<?php endif; ?>

<?php if($usuarios->temPermissao('SECRET')): ?>
<a href="secreto.php">Página Secreta</a><br/><br/>
<?php endif; ?>

<table border="1" width="100%">

	<tr>
		<th>Nome do arquivo</th>
		<th>Ações</th>
	</tr>
	
	<?php foreach($lista as $item): ?>
	
	<tr>
		<td><?php echo utf8_encode($item['titulo']); ?></td>
		<td>
			<?php if($usuarios->temPermissao('EDIT')): ?>
			<a href="">Editar</a>
			<?php endif; ?>
			<?php if($usuarios->temPermissao('DEL')): ?>
			<a href="">Excluir</a>
			<?php endif; ?>
		</td>	
	</tr>
	
	<?php endforeach; ?>

</table>









