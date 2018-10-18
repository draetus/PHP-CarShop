<div class="alert alert-info" id="abre_busca_avancada">
    Para pesquisar um carro, utilize o filtro no topo da página ou clique em <a id="btLink_busca" href='#'>Busca Avançada</a> para mais opções de filtro. 
</div>

<div class="container container-fluid" 
     id="busca_avancada"
     style="background-color: f4f4f4; display:none">
    
    <form action="carro-frm-lista.php">
        <div class="form-group">
            <label for="car_marca">Marca:</label>
            <input type="text" 
                   class="form-control" 
                   placeholder="Digite uma marca para consulta"
                   name="car_marca"
                   value="<?=@$_GET['car_marca']?>">
        </div>
        <div class="form-group">
            <label for="car_modelo">Modelo:</label>
            <input type="text" 
                   class="form-control" 
                   placeholder="Digite um modelo para consulta"
                   name="car_modelo"
                   value="<?=@$_GET['car_modelo']?>">
        </div>
        <div class="form-group">
            <label >Ano:</label>
            <input type="number" 
                   class="form-control" 
                   placeholder="de 1990"
                   name="car_ano_de"
                   value="<?=@$_GET['car_ano_de']?>">
            <input type="number" 
                   class="form-control" 
                   placeholder="até 2018"
                   name="car_ano_ate"
                   value="<?=@$_GET['car_ano_ate']?>">
        </div>
        <div class="form-group">
            <label >Valor:</label>
            <input type="number" 
                   class="form-control" 
                   placeholder="de R$"
                   name="car_valor_de"
                   value="<?=@$_GET['car_valor_de']?>">
            <input type="number" 
                   class="form-control" 
                   placeholder="até R$"
                   name="car_valor_ate"
                   value="<?=@$_GET['car_valor_ate']?>">
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
        <a id='btFechar' class='btn btn-secondary' href='#'>Fechar</a>
        <input type='reset' class='btn btn-danger' value='Limpar Filtros'>
    </form>
</div>




<script>
    function mostraBuscaAvancada(mostra){
        if (mostra){        
            $("#busca_avancada").show();
            $("#abre_busca_avancada").hide();    
        } else {
            $("#busca_avancada").hide();
            $("#abre_busca_avancada").show();
            }
        }

        $(document).ready(function () {
            mostraBuscaAvancada(false);
        });

        $("#btLink_busca").click(function () {
            mostraBuscaAvancada(true);
        });

        $("#btFechar").click(function () {
            mostraBuscaAvancada(false);
        });
</script>




