<section class="banner-container">
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form.jpg');" class="banner-single"></div><!--banner-single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form2.jpg');" class="banner-single"></div><!--banner-single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form3.jpg');" class="banner-single"></div><!--banner-single-->
        <div class="overlay"></div><!--overlay-->
        <div class="center">        
            <form method="post">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email"  required/>
                <input type="hidden" name="identificador" value="form_home" />
                <input type="submit" name="acao" value="Cadastrar!">
            </form> <!--banner-principal-->
        </div><!--center-->
        <div class="bullets"></div><!--bullets-->
</section><!--banner-container-->

<section class="descricao-autor">
    <div class="center" >
        <div class="w50 left ">
            <h2>Danilo A. Pacheco</h2>
            <p>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco sé
            fictício padrão do setor desde os anos 1500culos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.</p>
            <p>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500,
            fictício padrão do setor desde os anos 1500 quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.</p>
        </div><!--w50 left-->
        <div class="w50 left ">
            <img class="right" src="<?php echo INCLUDE_PATH; ?>images/foto.jpg" alt="foto">
        </div><!--w50 left-->
        <div class="clear"></div>  
    </div><!--center-->      
</section><!--descricao-autor-->

<section class="especialidades">        
    <div class="center">
        <h2 class="title">Especialidades</h2>
        <div class="w33 left box-especialidade">
            <h3><i class="fab fa-css3-alt"></i></h3>
            <h4>CSS3</h4>
            <p>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo </p>
        </div><!--box-especialidade-->        
        <div class="w33 left box-especialidade">
            <h3><i class="fab fa-html5"></i></h3>
            <h4>HTML5</h4>
            <p>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo </p>
        </div><!--box-especialidade-->
        <div class="w33 left box-especialidade">
            <h3><i class="fab fa-js"></i></h3>
            <h4>JavaScript</h4>
            <p>Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo </p>
        </div><!--box-especialidade-->
        <div class="clear" ></div>
    </div><!--center--> 
</section><!--especialidades-->


<section class="extras">

    <div class="center">
        <div  id="depoimentos" class="w50 left depoimentos-container">
            <h2 class="title">Depoimentos dos nossos clientes</h2>
            <?php 
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
                $sql->execute();
                $depoimentos = $sql->fetchAll();
                foreach($depoimentos as $key => $value){
            ?>
            <div class="depoimento-single">
                <p class="depoimento-descricao">"<?php echo $value['depoimento']; ?>"</p>
                <p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
            </div><!--depoimento-single-->
            <?php } ?>
           
        </div><!--w50 left-->
        <div id="servicos" class="w50 left servicos-container">
            <h2 class="title">Serviços</h2>
            <div class="servicos">
            <ul>
                <?php 
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3");
                    $sql->execute();
                    $servicos = $sql->fetchAll();
                    foreach($servicos as $key => $value){
                ?>
                <li><?php echo $value['servico']; ?></li>
                    <?php } ?>
            </ul>
            </div><!--servicos-->
            </div><!--depoimento-single-->
        </div><!--w50 left-->
        <div class="clear"></div>  
    </div><!--center-->

</section><!--extras-->
