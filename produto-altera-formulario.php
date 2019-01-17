<?php 
require_once("cabecalho.php"); 

$produtoDao = new ProdutoDao($conexao);
$categoriaDao = new CategoriaDao($conexao);

$id = $_GET['id'];
$produto = $produtoDao->buscaProduto($id);
$categorias = $categoriaDao->listaCategorias($conexao);

$selecao_usado = $produto->getUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);
?>            
    <h1>Alterando produto</h1>
    <form action="altera-produto.php" method="post">
        <input type="hidden" name="id" value="<?=$produto->getId()?>">
        <table class="table">
            <?php include("produto-formulario-base.php");?>
        </table>
        <button class="btn btn-primary botao" type="submit">Alterar</button>
    </form>
<?php include("rodape.php"); ?>
