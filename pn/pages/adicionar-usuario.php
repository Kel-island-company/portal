<?php Permissao::verificaPermissaoPagina(1);?>
<div class="conteudo-painel">
	<h2>Adicionar usuario</h2>
	<form method="post" enctype="multipart/form-data">
		<label>Login:</label>
		<input type="text" name="usuario">
		<label>Senha:</label>
		<input type="password" name="senha">
		<label>Nome:</label>
		<input type="text" name="nome">
		<label>Cargo:</label>
		<select>
			<?php
				foreach (Painel::$cargos as $key => $value) {
					if($key > $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
				}
			?>
		</select>
		<label>Imagem:</label>
		<input type="file" name="imagem">

		<input type="submit" name="acao">
	</form>
</div><!--conteudo-painel-->