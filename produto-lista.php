<?php 
    require_once("cabecalho.php");
?>
    <table class="table table-striped table-bordered">

        <?php          
            $produtoDao = new ProdutoDao($conexao) ;      
            $produtos = $produtoDao->listaProdutos();
            foreach($produtos as $produto):
        ?>
        <tr>
            <td><?=$produto->getNome()?></td>
            <td><?=$produto->getPreco()?></td>
            //Polimorfismo: capacidade de um objeto ser referenciado de várias formas
            //O PHP chama o primeiro o método da classe mais especifica, se não encontrar, procura na classe pai
            <td><?=$produto->calculaImposto()?></td>
            <td><?=$produto->precoComDesconto()?></td>
            <td><?=substr($produto->getDescricao(), 0, 40) ?></td>
            <td><?=$produto->getCategoria()->getNome()?></td>
            <td>
                <?php 
                    if($produto->temIsbn()){
                        echo "ISBN: " . $produto->getIsbn();
                    }
                ?>
            </td>
            <td><a class="btn btn-primary botao" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar</a></td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>">
                    <button class="btn btn-danger botao">remover</button>
                </form>                    
            </td>
        </tr>
        <?php
            endforeach
        ?>
    </table>

<?php include("rodape.php");?>
