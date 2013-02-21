<div id="menu">
<? loadmenu("menu_usuario");?>
</div>
<div id="conteudo">
	<form name="frm_cad_usuario" method="POST" action="">
		<div id="telas">
		<div class="titulo_table">Cadastro Usuário</div>
			<table border="0" class='tables'>
				<tr height="50">
					<td align="right" width="100">Nome:</td>
					<td colspan="3"><input type="text" name="nome" value="<?= $Usuario->getNome();?>" style="width: 600px"></td>
				</tr>
				<tr>
					<td align="right">E-Mail:</td>
					<td colspan="3"><input type="text" name="email" value="<?= $Usuario->getEmail();?>" style="width: 600px"></td>
				</tr>
				<tr>
					<td align="right">Login:</td>
					<td><input type="text" name="login" value="<?= $Usuario->getLogin();?>" maxlength="10"></td>
					<td align="right">Senha:</td>
					<td><input type="password" name="senha" value="<?= $Usuario->getSenha();?>" maxlength="8"></td>
				</tr>
				<tr>
					<td align="right">Ativo:</td>
					<td><input type="checkbox" name="ativo" value="on" <?if($Usuario->getAtivo() == "s") echo " checked "?>></td>
					<td align="right"	>Administrador:</td>
					<td><input type="checkbox" name="administrador" value="on" <?if($Usuario->getAdministrador() == "s") echo " checked "?>></td>
				</tr>
				<tr>
					<td colspan="4" align="center">
						<input type="hidden" name="id" value="<?= $Usuario->getId(); ?>" />
						<input class="botao" type="submit" name="btnacao" value="Gravar">
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>