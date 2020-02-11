<div class="container">


  <!-- Formulario para envio de datos a calculo -->
  <form action="<?php echo base_url('comercial/ganancia') ?>" method="post" id="formulario">

      <!-- Seleccion de fechas -->
      <div class="row">
           <div class="col-xs-12 col-md-3 margen-superior">
               <span>
                   Seleccione rango de fechas
               </span>
           </div>
      </div>

      <div class="row">
          <div class="col-xs-12 col-md-1">
              <span>
                 Período:
              </span>
          </div>
          <div class="col-xs-6 col-md-1">
              <div class="form-group">
                      <select name="mes_desde" class="form-control" id="fecha_desde">
                          <option value="1">Ene</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Abr</option>
                          <option value="5">May</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Ago</option>
                          <option value="9">Sep</option>
                          <option value="10">Oct</option>
                          <option value="11">Nov</option>
                          <option value="12">Dic</option>
                      </select>
              </div>
              </div>
              <div class="col-xs-6 col-md-1">
                  <div class="form-group">
                      <select name="ano_desde" class="form-control" id="ano_desde">
                          <option value="2003">2003</option>
                          <option value="2004">2004</option>
                          <option value="2005">2005</option>
                          <option value="2006">2006</option>
                          <option value="2007">2007</option>
                      </select>
                  </div>
              </div>
              <div class="col-xs-12 col-md-1">
                    <span>hasta</span>
              </div>
              <div class="col-xs-6 col-md-1">
                  <div class="form-group">
                      <select name="mes_hasta" class="form-control" id="fecha_desde">
                          <option value="1">Ene</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Abr</option>
                          <option value="5">May</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Ago</option>
                          <option value="9">Sep</option>
                          <option value="10">Oct</option>
                          <option value="11">Nov</option>
                          <option value="12">Dic</option>
                      </select>
                  </div>
              </div>
              <div class="col-xs-6 col-md-1">
                  <div class="form-group">
                      <select name="ano_hasta" class="form-control" id="ano_hasta">
                          <option value="2003">2003</option>
                          <option value="2004">2004</option>
                          <option value="2005">2005</option>
                          <option value="2006">2006</option>
                          <option value="2007">2007</option>
                      </select>
                  </div>
              </div>

      </div>

      <br>
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <span>
            Seleccione CONSULTOR &lt;ctrl + click izquierdo&gt;
          </span>
        </div>
      </div>

  <div class="row">

    <div class="col-xs-12 col-md-4">
        <!-- Seleccion de datos basada en usuarios activos -->
      <select name="origen[]" id="origen" multiple size="15">
        <?php
        foreach ($usuarios_activos->result() as $ua) { ?>
        <option value="<?php echo $ua->co_usuario ?>"><?php echo utf8_encode($ua->no_usuario) ?></option>
        <?php
        }
        ?>
        </select>
    </div>

    <!-- Botones para pasar seleccion de datos -->
    <div class="col-xs-12 col-md-1">
      <input type="button" class="pasar izq" value="  -> "><input type="button" class="quitar der" value="  <- "><br><br>
      <input type="button" class="pasartodos izq" value="->>"><input type="button" class="quitartodos der" value="<<-">
    </div>



      <div class="col-xs-12 col-md-4">
          <select name="destino[]" id="destino" multiple size="15">
          </select>
      </div>

      <div class="col-xs-12 col-md-1">
        <button type="submit" class="btn btn-primary submit">Ganancias</button>
      </div>


    </div>
</form>


</div>
