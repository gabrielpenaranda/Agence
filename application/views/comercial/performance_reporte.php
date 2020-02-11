<div class="container">
    <div class="row">
        <div class="col-xs-12 offset-md-2 col-md-8 margen-superior">
                <?php
                $nombre = '';
                foreach($encabezado as $e){ ?>
                    <table class="table table-striped">
                        <br>
                        <span class="font-titulo"><?php echo $e['nombre'] ?></span>
                        <?php
                            // Inicializa variables acumuladoras
                            $acumulador_ganancia_liquida = 0;
                            $acumulador_costo_fijo = 0;
                            $acumulador_comision = 0;
                            $acumulador_lucro = 0;
                            $lucro = 0;
                        ?>
                        <!-- Encabezado -->
                          <thead>
                            <tr>
                              <th scope="col" class="text-center">Período</th>
                              <th scope="col" class="text-center">Ganancia Líquida</th>
                              <th scope="col" class="text-center">Costo Fijo</th>
                              <th scope="col" class="text-center">Comisión</th>
                              <th scope="col" class="text-center">Lucro</th>
                            </tr>
                          </thead>
                          <?php

                          //Convierte numeros de mes a cadenas de nombres
                          foreach($cuerpo as $c) {
                              if ($e['codigo'] == $c['codigo']) {
                                  switch ($c['mes'])
                                  {
                                    case 1:
                                        $mes = 'Ene';
                                        break;
                                    case 2:
                                        $mes = 'Feb';
                                        break;
                                    case 3:
                                        $mes = 'Mar';
                                        break;
                                    case 4:
                                        $mes = 'Abr';
                                        break;
                                    case 5:
                                        $mes = 'May';
                                        break;
                                    case 6:
                                        $mes = 'Jun';
                                        break;
                                    case 7:
                                        $mes = 'Jul';
                                        break;
                                    case 8:
                                        $mes = 'Ago';
                                        break;
                                    case 9:
                                        $mes = 'Sep';
                                        break;
                                    case 4:
                                        $mes = 'Oct';
                                        break;
                                    case 5:
                                        $mes = 'Nov';
                                        break;
                                    case 6:
                                        $mes = 'Dic';
                                        break;

                                  }
                                  ?>
                                  <!-- Despliegue de lineas por mes -->
                                  <tbody>
                                    <tr>
                                      <th scope="row"><?php echo $mes.' '.$c['ano'] ?></th>
                                      <td class="text-right"><?php echo MONEDA.' '.number_format($c['ganancia_liquida'], 2, ',', '.') ?></td>
                                      <td class="text-right"><?php echo MONEDA.' '.number_format($c['salario'], 2, ',', '.') ?></td>
                                      <td class="text-right"><?php echo MONEDA.' '.number_format($c['comision'], 2, ',', '.') ?></td>
                                      <?php
                                            $lucro = $c['ganancia_liquida']-($c['salario']+$c['comision']);
                                      ?>
                                      <td class="text-right <?php if ($lucro < 0) { ?> font-negativo <?php } ?>"><?php echo MONEDA.' '.number_format($lucro, 2, ',', '.') ?></td>
                                    </tr>
                                  </tbody>
                                  <?php
                                  $acumulador_ganancia_liquida += $c['ganancia_liquida'];
                                  $acumulador_costo_fijo += $c['salario'];
                                  $acumulador_comision += $c['comision'];
                                  $acumulador_lucro += $lucro;
                                  $lucro = 0;
                              }
                          }
                          ?>
                          <!-- Despliegue de totales -->
                              <tbody>
                                <tr>
                                  <th scope="row">Saldo</th>
                                  <td class="font-weight-bold text-right"><?php echo MONEDA.' '.number_format($acumulador_ganancia_liquida, 2, ',', '.') ?></td>
                                  <td class="font-weight-bold text-right"><?php echo MONEDA.' '.number_format($acumulador_costo_fijo, 2, ',', '.') ?></td>
                                  <td class="font-weight-bold text-right"><?php echo MONEDA.' '.number_format($acumulador_comision, 2, ',', '.') ?></td>
                                  <td class="font-weight-bold text-right font-lucro"><?php echo MONEDA.' '.number_format($acumulador_lucro, 2, ',', '.') ?></td>
                                </tr>
                              </tbody>
                        </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>
