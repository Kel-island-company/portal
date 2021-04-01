<?php
	Permissao::verificaPermissaoPagina(1);
	$tabela = 'tb_admin.classificados';
	if(isset($_GET['deletar'])){
		$idExcluir = intval($_GET['deletar']);
		$selecionarImg = MySql::conectar()->prepare("SELECT img FROM `$tabela` WHERE id = ?");
		$selecionarImg->execute(array($idExcluir));
		$selecionarImg = $selecionarImg->fetch();
		Painel::deleteFile($selecionarImg['img']);
		Painel::deletar($tabela,$idExcluir);
		header('location:'.INCLUDE_PATH_PAINEL.'gerenciar-classificados');
		die();
	}
?>
<div class="conteudo-painel">
	<h2>Classificados cadastrados</h2>

	<div class="table-overflow"> 
		<table> 
			<tr> 
				<th>Nome</th>
				<th>#</th> 
				<th>#</th> 
			</tr> 
			<?php
				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY nome"); 
				$sql->execute(); 
				$classificados = $sql->fetchAll();
		
				foreach ($classificados as $key => $value) {

			?>
			<tr>
				<td><?php echo $value['nome']?></td>
				<td><a class="btn editar" href="<?php echo INCLUDE_PATH_PAINEL?>editar-classificado?id=<?php echo $value['id']?>">Editar</a></td>
				<td><a class="btn excluir" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciar-classificados?deletar=<?php echo $value['id']?>">Excluir</a></td>
			</tr>
			<?php }?>
		</table>
	</div><!--table-overflow-->
</div><!--conteudo-painel-->