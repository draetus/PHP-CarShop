<div class="container container-fluid bg-light collapse" 
     id="divBusca_avancada"
     style="border-radius: 20px;" >
    
    <form style="margin: 10px;"
          action="carro-frm-lista.php"
          method="POST"> 
        <br>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input class="form-control" 
                 name="vfCar_marca" 
                 value="<?=@$_POST['vfCar_marca']?>"
                 type="text"
                 placeholder="Digite uma marca"
                 >
        </div>
        <div class="form-group col-md-6">
          <input class="form-control" 
                 name="vfCar_modelo" 
                 value="<?=@$_POST['vfCar_modelo']?>"
                 type="text"
                 placeholder="Digite um modelo"
                 >
        </div>
      </div>

      <div class="form-row">

        <div class="form-group col-md-3">
          <input class="form-control" 
                 name="vfCar_ano_de" 
                 value="<?=@$_POST['vfCar_ano_de']?>"
                 type="number"
                 placeholder="Ano inicial"
                 >
        </div>

        <div class="form-group col-md-3">
          <input class="form-control" 
                 name="vfCar_ano_ate" 
                 value="<?=@$_POST['vfCar_ano_ate']?>"
                 type="number"
                 placeholder="Ano final"
                 >    
        </div>

        <div class="form-group col-md-3">
          <input class="form-control" 
                 type="number"
                 value="<?=@$_POST['vfCar_valor_de']?>"
                 name="vfCar_valor_de" 
                 placeholder="Valor inicial"
                 >    
        </div>

        <div class="form-group col-md-3">
          <input class="form-control" 
                 type="number"
                 value="<?=@$_POST['vfCar_valor_ate']?>"
                 name="vfCar_valor_ate" 
                 placeholder="Valor final"
                 >  
        </div>
        
        <?php
                include_once('caracteristica-funcoes.php');
        
                $vtCaracteristicas = caracteristica_listar();
                            
                foreach ($vtCaracteristicas as $x=>$vtCaracteristica){
                    ?>
                    <div class="form-group col-md-3">
                      <input type='checkbox'
                             name="vfCaracteristicas[<?=$x?>]"
                             value="<?=$vtCaracteristica['ctr_id']?>"
                             > <?=$vtCaracteristica['ctr_nome']?>
                    </div>

                    <?php
                }
        ?>  
      </div>
      <button type="submit" class="btn btn-primary">Pesquisar</button>
      <br><br>
    </form>
    
</div>


<script>
    
    $('#btBuscaAvancada').click( function(){
       $('#divBusca_avancada').hidden^=1; 
    });
    
</script>

    