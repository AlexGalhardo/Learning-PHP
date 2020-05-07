<h1>Vendas - Adicionar</h1>

<form method="POST">
	<label for="client_name">Nome do Cliente</label><br/>
	<input type="hidden" name="client_id" />
	<input type="text" name="client_name" id="client_name" data-type="search_clients" /> <button class="client_add_button">+</button>
	<div style="clear:both"></div>
	<br/><br/>

	<label for="status">Status da Venda</label><br/>
	<select name="status" id="status">
		<option value="0">Aguardando Pgto.</option>
		<option value="1">Pago</option>
		<option value="2">Cancelado</option>
	</select><br/><br/>

	<label for="total_price">Preço da Venda</label><br/>
	<input type="text" name="total_price" disabled="disabled" /><br/><br/>

	<hr/>

	<h4>Produtos</h4>

	<fieldset>
		<legend>Adicionar Produto</legend>

		<input type="text" id="add_prod" data-type="search_products" />
	</fieldset>

	<table border="0" width="100%" id="products_table">
		<tr>
			<th>Nome do Produto</th>
			<th>Quantidade</th>
			<th>Preço Unit.</th>
			<th>Sub-Total</th>
			<th>Excluir</th>
		</tr>
	</table>

	<hr/>

	<input type="submit" value="Adicionar Venda" />
</form>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_sales_add.js"></script>