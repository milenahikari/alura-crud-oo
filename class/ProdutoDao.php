<?php
class ProdutoDao {

    private $conexao;

    function __construct ($conexao) {
        $this->conexao = $conexao;
    }

    function listaProdutos() {
        $produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome 
			from produtos as p join categorias as c on c.id=p.categoria_id");

		while($produto_array = mysqli_fetch_assoc($resultado)) {

			$tipoProduto = $produto_array['tipoProduto'];
			$produto_id = $produto_array['id'];
			$categoria_nome = $produto_array['categoria_nome'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_array);
			$produto->atualizaBaseadoEm($produto_array);

			$produto->setId($produto_id);
			$produto->getCategoria()->setNome($categoria_nome);

			array_push($produtos, $produto);
		}

		return $produtos;
    }
    
    function insertProduto(Produto $produto) {

        $isbn = "";
        if($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }
        $taxaImpressao = "";
        if($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }
        $waterMark = "";
        if($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);

        $nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $categoria = mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId());
        $usado = $produto->getUsado();
    
        if(!empty($nome) && !empty($preco) && !empty($categoria)){
            $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto, taxaImpressao, waterMark) values ('{$nome}', {$preco}, '{$descricao}', '{$categoria}', {$usado}, '{$isbn}', '{$tipoProduto}', '{$taxaImpressao}', '{$waterMark}')";
        
            return mysqli_query($this->conexao, $query);
        } else {
            return false;
        }
    }

    function alteraProduto(Produto $produto){
        $isbn = "";
        if($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $waterMark = "";
        if($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $taxaImpressao = "";
        if($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $tipoProduto = get_class($produto);

        $query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()}, isbn = '{$isbn}', tipoProduto = '{$tipoProduto}', waterMark = '{$waterMark}', taxaImpressao = '{$taxaImpressao}' where id = '{$produto->getId()}'";

        return mysqli_query($this->conexao, $query);
}
    function buscaProduto($id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);
    
        $tipoProduto = $produto_buscado['tipoProduto'];
        $produto_id = $produto_buscado['id'];
        $categoria_id = $produto_buscado['categoria_id'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $produto_buscado);
        $produto->atualizaBaseadoEm($produto_buscado);
    
        $produto->setId($produto_id);
        $produto->getCategoria()->setId($categoria_id);
    
        return $produto;
    }

    function removeProduto($id){
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }        

}
