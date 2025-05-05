<div id="cadastroUsuarios" class="box">
				<h2><i class="fa fa-user-plus"></i>&nbsp; Cadastro de Usuários</h2>
				<form>
					<div class="line">
						<label>Nome de Usuário: </label>
						<input type="text" name="novo_usuario"/>
					</div>
					<div class="line">
						<label>Nova Senha: </label>
						<input type="text" name="nova_senha"/>
					</div>
					<div class="line">
						<label>Tipo de Usuário: </label>
						<select>
							<option disabled selected> Selecione ... </option>
							<option value="externo"> Externo </option>
							<option value="atendente"> Atendente </option>
							<option value="administrador"> Administrador </option>
						</select>						
					</div>
					<div class="line">
						<br><br>
						<label> </label>
						<input type="submit" id="cadastrar_usuario" value="CADASTRAR">
					</div>
					<div style="clear: both"></div>
				</form>
			</div>