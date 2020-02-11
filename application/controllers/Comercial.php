<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comercial extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Carga de modelos requeridos para generación de consultas
        $this->load->model('CaoUsuario_model', 'cu');
        $this->load->model('CaoFatura_model', 'cf');
    }

    public function performance()
    {
        //Consulta para solicitar usuarios activos
        $data['usuarios_activos'] = $this->cu->usuarios_activos();

        //Despliegue
        $this->load->view('principal/header');
        $this->load->view('principal/nav');
        $this->load->view('comercial/performance', $data);
        $this->load->view('principal/scripts');
		$this->load->view('comercial/performance_script');
        $this->load->view('principal/footer');
    }

    public function ganancia()
    {
        // Despliegue parcial
        $this->load->view('principal/header');
        $this->load->view('principal/nav');

        // Volcado de request en variables
        $destino = $this->input->post('destino');
        $mes_desde = $this->input->post('mes_desde');
        $ano_desde = $this->input->post('ano_desde');
        $mes_hasta = $this->input->post('mes_hasta');
        $ano_hasta = $this->input->post('ano_hasta');
        // Dato centinela para verificación de errores, si cambia a FALSE no realiza despliegue
        $valido = true;

        if (!is_array($destino)) {
            $data['mensaje'] = 'No selecciono consultor';
            $this->load->view('principal/mensaje', $data);
            $valido = false;
        }
        if ($ano_desde > $ano_hasta) {
            $data['mensaje'] = 'Fecha incorrecta "año hasta" menor que "año desde"';
            $this->load->view('principal/mensaje', $data);
            $valido = false;
        } else if (($ano_desde == $ano_hasta) && ($mes_desde > $mes_hasta)) {
            $data['mensaje'] = 'Fecha incorrecta "mes hasta" menor que "mes desde" para años iguales';
            $this->load->view('principal/mensaje', $data);
            $valido = false;
        }

        if ($valido) {
            $ganancia=$this->cf->calculo_ganancia($destino, $mes_desde, $mes_hasta, $ano_desde, $ano_hasta);
            if ($ganancia == null) {
                $data['mensaje'] = 'No se generaron resultados para las fechas señaladas';
                $this->load->view('principal/mensaje', $data);
            } else {
                $ganancia['destino'] = $destino;
                $this->load->view('comercial/performance_reporte', $ganancia);
            }
        }
        $this->load->view('principal/scripts');
        $this->load->view('principal/footer');
    }


}
