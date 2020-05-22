<?php
	$url = explode('/',$_GET['url']);
	

	$verifica_categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[1]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[2],$categoria_info['id']));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}

	//É POR QUE MINHA NOTICIA EXISTE
	$post = $post->fetch();

?>
<section class="noticia-single">
	<div class="center">
		<header>
			<h1><i class="fa fa-calendar"></i> <?php echo $post['data'] ?> - <?php echo $post['titulo'] ?></h1>
		</header>
		<article>
			<?php echo $post['conteudo']; ?>
		</article>

		<?php
		if (Painel::logado() == false) {
		?>
			<div class="container-erro-login">
				<p><i class="fa fa-times"></i> Você precisa estar logado para comentar, clique <a href="<?php echo INCLUDE_PATH_PAINEL ?>">aqui</a> para efetuar o login. </p>
			</div>		
		<?php
		}else{ ?>
		<?php
		//Iserção dos comentários na database
		if (isset($_POST['postar_comentario'])) {
			$nome = $_POST['nome'];
			$comentario = $_POST['mensagem'];
			$noticia_id = $_POST['noticia_id'];
			if ($nome == $_SESSION['nome']) {

				$sql = MySql::conectar()->prepare("INSERT INTO `tb_site.comentarios` VALUES(null,?,?,?)");
				$sql->execute(array($nome,$comentario,$noticia_id));
				echo '<script>alert("Comentário realizado com sucesso!")</script>';
			}else{
				echo '<script>alert("Comentário não enviado, o nome precisa ser o mesmo do Login!")</script>';
			}
			
		}
		?>
			<h2 class="postar-comentario"> Faça um comentário <i class="fa fa-comment" ></i></h2>
			<form action="" method="post">
				<input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>">
				<textarea name="mensagem" placeholder="Seu comentários..." ></textarea>
				<input type="hidden" name="noticia_id" value="<?php echo $post['id'] ?>">
				<input type="submit" name="postar_comentario" value="Comentar!">
			</form>
			<br>
			<h2 class="postar-comentario">Comentários existentes <i class="fa fa-comment" ></i></h2>

			<?php
				if (isset($_POST['resposta_comentario'])) {
					$nome = $_POST['nome'];
					$resposta = $_POST['resposta'];
					$comentario = $_POST['comentario_id'];
					$noticia_id = $_POST['noticia_id'];
					if ($nome == $_SESSION['nome']) {
						$sql = MySql::conectar()->prepare("INSERT INTO `tb_site.comentarios_resposta` VALUES(null,?,?,?,?)");
						$sql->execute(array($nome,$resposta,$comentario,$noticia_id));
						echo '<script>alert("Resposta realizado com sucesso!")</script>';
					}else{
						echo '<script>alert("Resposta não enviado, o nome precisa ser o mesmo do Login!")</script>';
					}
					
				}
				?>

				<?php
					$comentarios = MySql::conectar()->prepare("SELECT * FROM `tb_site.comentarios` WHERE noticia_id = ? ORDER BY id DESC");
					$comentarios->execute(array($post['id']));
					$comentarios = $comentarios->fetchAll();
					foreach ($comentarios as $key => $value) {
					
					?>
			<div class="box-coment-noticia">
				<h3><?php echo $value['nome']; ?></h3>
				<p><?php echo $value['comentario']; ?></p>

			<?php
				$respostas = MySql::conectar()->prepare("SELECT * FROM `tb_site.comentarios_resposta` WHERE noticia_id = ? AND comentario_id = ? ORDER BY id DESC");
				$respostas->execute(array($post['id'],$value['id']));
				$respostas = $respostas->fetchAll();
				foreach ($respostas as $key => $value) {
			
			?>
			<div class="box-coment-noticia-resposta">
				<h3><?php echo $value['nome']; ?></h3>
				<p><?php echo $value['resposta']; ?></p>				
			
			</div>
			<?php } ?>

				<form  method="post">				
					<input type="text" name="nome" value="<?php echo $_SESSION['nome'] ?>">
					<textarea name="resposta"  placeholder="Responder..."></textarea>
					<input type="hidden" name="comentario_id" value="<?php echo $value['id'] ?>">
					<input type="hidden" name="noticia_id" value="<?php echo $post['id'] ?>">
					<input type="submit" name="resposta_comentario" value="Responder!">
				</form>			
			
			<?php } ?>
			
		<?php } ?>	
	</div>
</section>

