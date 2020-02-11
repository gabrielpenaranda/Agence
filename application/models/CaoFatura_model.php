<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CaoFatura_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('caol');
    }

    public function calculo_ganancia($destino, $mes_desde, $mes_hasta, $ano_desde, $ano_hasta)
    {
        //Query para generación de consulta de ganancias
        $facturas=$this->db->query("SELECT cao_usuario.no_usuario, permissao_sistema.co_usuario, cao_salario.brut_salario, YEAR(cao_fatura.data_emissao) as ano, MONTH(cao_fatura.data_emissao) as mes, cao_fatura.valor,  cao_fatura.total_imp_inc, SUM(ROUND((cao_fatura.valor)-((cao_fatura.total_imp_inc/100)*(cao_fatura.valor)),2))  as ganancia_liquida, SUM(
            ROUND((cao_fatura.valor-(cao_fatura.valor*(cao_fatura.total_imp_inc/100)))
            *(cao_fatura.comissao_cn/100),2)) as comision
            FROM cao_os, cao_fatura, permissao_sistema, cao_usuario, cao_salario
            WHERE cao_os.co_os=cao_fatura.co_os AND
            cao_os.co_usuario=permissao_sistema.co_usuario AND
            cao_usuario.co_usuario=permissao_sistema.co_usuario AND
            cao_salario.co_usuario=permissao_sistema.co_usuario AND
            permissao_sistema.in_ativo='S' AND
            permissao_sistema.co_sistema=1 AND
            (permissao_sistema.co_tipo_usuario=0 OR
            permissao_sistema.co_tipo_usuario=1 OR
            permissao_sistema.co_tipo_usuario=2) AND
            (MONTH(cao_fatura.data_emissao)>=".$mes_desde." AND
            MONTH(cao_fatura.data_emissao)<=".$mes_hasta.") AND
            (YEAR(cao_fatura.data_emissao)>=".$ano_desde." AND
            YEAR(cao_fatura.data_emissao)<=".$ano_hasta.")
            GROUP BY cao_usuario.co_usuario, YEAR(cao_fatura.data_emissao), MONTH(cao_fatura.data_emissao)
            HAVING ((cao_fatura.valor)-(cao_fatura.total_imp_inc/100)*(cao_fatura.valor))
            ORDER BY cao_usuario.no_usuario ASC,
            YEAR(cao_fatura.data_emissao) ASC,
            MONTH(cao_fatura.data_emissao) ASC;");

        if ($facturas->num_rows() > 0) {
            // Genera arreglo de encabezado y de cuerpo para despliegue de datos en reporte
            $nombre = '';

            foreach($facturas->result() as $f) {
                foreach($destino as $d) {
                    if ($d == $f->co_usuario) {
                        if ($nombre != $f->no_usuario) {
                            $nombre = $f->no_usuario;
                            $encabezado[] = array('codigo' => $d, 'nombre' => utf8_encode($f->no_usuario));
                        }
                        $cuerpo[] = array('codigo' => $f->co_usuario, 'salario' => $f->brut_salario, 'ano' => $f->ano, 'mes' => $f->mes, 'ganancia_liquida' => $f->ganancia_liquida, 'comision' => $f->comision);

                    }
                }
            }
            if (isset($encabezado)) {
                $ganancia['encabezado'] = $encabezado;
                $ganancia['cuerpo'] = $cuerpo;
                return $ganancia;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
