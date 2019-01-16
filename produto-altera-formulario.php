<?php 
require_once("cabecalho.php"); 

$id = $_GET['id'];

$produtoDao = new ProdutoDao($conexao);
$produto = $produtoDao->buscaProduto($id);

$categoriaDao = new CategoriaDao($conexao);
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
