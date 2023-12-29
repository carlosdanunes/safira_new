<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function ver($provedora, $game)
	{
		$this->login->checkSession();
				
		$data = array(
			'nomepagina' => 'Jogo',
			'config' => $this->app->config(),
			'provedora' => $provedora,
			'game' => $game
		); 

		if(strtolower($provedora) == "evolution"){
			redirect('fiverscan/getLink/'.$provedora.'/'.$game);
		} else if(strtolower($provedora) == 'ezugi') {
			redirect('fiverscan/getLink/'.$provedora.'/'.$game);
		}

		//var_dump($data);
		//$this->load->view('pages/layout/header', $data);
		$this->load->view('pages/welcome/game', $data);
	}

	public function provedor ($provedor) {
		$data['nomepagina'] = $provedor;
		$data['config'] = $this->app->config();
		$data['nome_provedor'] = $provedor;
		$query = "SELECT * FROM games WHERE provider = '{$provedor}'";
		$data['jogos'] = $this->db->query($query)->result();

		$this->load->view('pages/layout/header', $data);
		$this->load->view('pages/welcome/provedor', $data);
		$this->load->view('pages/layout/footer', $data);
	}
}
