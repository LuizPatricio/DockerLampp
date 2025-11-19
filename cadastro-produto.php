<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4 text-primary\">Cadastro de Produto</h5>";

// Buscar fornecedores, categorias e unidades para os dropdowns
$fornecedoresController = new FornecedorController();
$fornecedores = $fornecedoresController->buscaTodos();

$categoriasController = new CategoriaController();
$categorias = $categoriasController->buscaTodos();

$unidadesController = new UnidadeController();
$unidades = $unidadesController->buscaTodos();
?>

<form id="formProduto" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="ProdutoController" value="registro">

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="codigoProduto" class="form-label">Código</label>
            <input type="number" class="form-control" id="codigoProduto" name="codigoProduto" required>
            <div class="form-text">ID único do Produto.</div>
        </div>

        <div class="col-md-8 mb-3">
            <label for="nomeProduto" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" required>
            <div class="form-text">Informe o nome completo do produto.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="codigoFornecedor" class="form-label">Fornecedor</label>
            <select class="form-control" id="codigoFornecedor" name="codigoFornecedor" required>
                <option value="">Selecione um fornecedor</option>
                <?php foreach($fornecedores as $fornecedor): ?>
                    <option value="<?=$fornecedor->codigoFornecedor?>"><?=$fornecedor->nomeFornecedor?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-text">Selecione o fornecedor do produto.</div>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="codigoCategoria" class="form-label">Categoria</label>
            <select class="form-control" id="codigoCategoria" name="codigoCategoria" required>
                <option value="">Selecione uma categoria</option>
                <?php foreach($categorias as $categoria): ?>
                    <option value="<?=$categoria->codigoCategoria?>"><?=$categoria->nomeCategoria?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-text">Selecione a categoria do produto.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="codigoUnidade" class="form-label">Unidade de Medida</label>
            <select class="form-control" id="codigoUnidade" name="codigoUnidade" required>
                <option value="">Selecione uma unidade</option>
                <?php foreach($unidades as $unidade): ?>
                    <option value="<?=$unidade->codigoUnidade?>"><?=$unidade->descricaoUnidade?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-text">Selecione a unidade de medida.</div>
        </div>
        
        <div class="col-md-6 mb-3">
            <label for="precoUnitario" class="form-label">Preço Unitário</label>
            <input type="number" step="0.01" class="form-control" id="precoUnitario" name="precoUnitario" required>
            <div class="form-text">Informe o preço unitário do produto.</div>
        </div>
    </div>

    <div class="mb-3">
        <label for="Foto" class="form-label">Foto do Produto</label>
        <input type="file" class="form-control" id="Foto" name="Foto" accept="image/*">
        <div class="form-text">Selecione uma imagem do produto (opcional).</div>
    </div>

    <div class="d-grid gap-2 my-4">
        <button type="submit" class="btn btn-success btn-lg">
            <i class="fa-solid fa-cloud-arrow-up"></i> Cadastrar Produto
        </button>
    </div>
</form>

<script>
$("form#formProduto").submit(function(e) {
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./produto-controller.php", 
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#corpo').html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function(result){      
            $('#corpo').html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText);
            $('#corpo').html("Erro: " + textStatus + " - " + errorThrown);
        }
    });
});
</script>
