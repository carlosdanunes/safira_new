<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function minhaconta()
	{
		$this->login->checkSession();

        $data['nomepagina'] = 'Minha Conta';
		$data['config'] = $this->app->config();

        
        $this->db->where('id', $this->session->id);
		$data['usuario'] = $this->db->get('usuarios')->result();

        $this->load->view('pages/layout/header', $data);
        $this->load->view('pages/minhaconta/minhaconta', $data);
		$this->load->view('pages/layout/footer', $data);
	}
    public function editarconta()
	{
		$this->login->checkSession();

        $data['nomepagina'] = 'Editar Minha Conta';
		$data['config'] = $this->app->config();

        
        $this->db->where('id', $this->session->id);
		$data['usuario'] = $this->db->get('usuarios')->result();

        $this->load->view('pages/layout/header', $data);
        $this->load->view('pages/minhaconta/editarconta', $data);
		$this->load->view('pages/layout/footer', $data);
	}
    public function indique()
	{
		$this->login->checkSession();

        $data['nomepagina'] = 'Indique e ganhe';
		$data['config'] = $this->app->config();

        $this->db->where('id', $this->session->id);
		$data['usuario'] = $this->db->get('usuarios')->result();

        if($data['usuario'][0]->usuario == null){
            $ux = array('usuario' => rand(0, 20000).date('Ymd'));
            $this->db->where('id', $this->session->id);
            $this->db->update('usuarios', $ux);
        }

        $afiliados = "SELECT COUNT(*) as referencia, SUM(valor) as total FROM indicacoes WHERE afiliado = '{$data['usuario'][0]->usuario}' GROUP BY usuario";
        $data['afiliados'] = $this->db->query($afiliados)->result();

        if (empty($data['afiliados'])) {
            $data['afiliados'][0] = (object) array(
                'referencia' => 0,
                'total' => 0
            );
        }

        $this->load->view('pages/layout/header', $data);
        $this->load->view('pages/minhaconta/indique', $data);
		$this->load->view('pages/layout/footer', $data);
	}
    public function novo()
	{
        $email = $this->input->post('email');
        $data = $this->input->post();
        $data['senha'] = md5($this->input->post('senha'));
        $data['usuario'] = rand(0, 20000).date('Ymd');

        $this->db->where('email', $this->session->id);
        $validaEmail = $this->db->get('usuarios')->result();
        if ($validaEmail) {
            $msg = "Atenção! E-mail já está cadastrado.";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "danger");
            redirect($base_url);
        }

        $this->db->where('email', $this->input->post('email'));
        $validaEmail = $this->db->get('usuarios')->result();
        if ($validaEmail) {
            $msg = "Atenção! E-mail já está cadastrado.";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "danger");
            redirect($base_url);
        }
        /*
        $this->db->where('cpf', $this->input->post('cpf'));
        $validaCpf = $this->db->get('usuarios')->result();
        if ($validaCpf) {
            $msg = "Atenção! CPF já está cadastrado.";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "danger");
            redirect($base_url);
        }*/

        if ($this->db->insert('usuarios',$data)){
            $this->criarUsuarioAPI($email);
            $msg = "Bem Vindo ".$data['nome']."! Você já pode se logar na sua conta";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "success");
            redirect($base_url);
        } else {
            $msg = "Atenção! Tente novamente mais tarde!";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "danger");
            redirect($base_url);
        }
    }
	public function entrar()
    {
        $email =  $this->input->post('email');
        $pwd =  md5($this->input->post('senha'));

        $this->db->where('email', $email);
        $this->db->where('senha', $pwd);
        $data['login'] = $this->db->get('usuarios')->result();

        if(!$data['login'] == null){

            $session['id'] = $data['login'][0]->id;
            $session['nome'] = $data['login'][0]->nome;
            $session['email'] = $data['login'][0]->email;
            $session['afiliado'] = $data['login'][0]->afiliado;
            $session['cpf'] = $data['login'][0]->cpf;
            $session['pix'] = $data['login'][0]->chave_pix;
            $session['is_afiliado'] = $data['login'][0]->is_afiliado;
            $session['logged'] = true;

            if($data['login'][0]->usuario == null){

                $ux = array('usuario' => rand(0, 20000).date('Ymd'));
                $this->db->where('id', $this->session->id);
                $this->db->update('usuarios', $ux);
               
            }

            $this->criarFinanceiro($data['login'][0]->id);
            $this->setSaldo($data['login'][0]->id);
            $this->session->set_userdata($session);



            $msg = "Bem Vindo ".$session['nome']."! Você já pode se começar a jogar!";
                $this->session->set_flashdata('msg', $msg);
                $this->session->set_flashdata('tipo', "success");
    
            redirect($base_url);

        }else{
            $msg = "E-mail ou senha invalidos, precisa de ajuda para lembrar seu login?.";
                    $this->session->set_flashdata('msg', $msg);
                    $this->session->set_flashdata('tipo', "danger");
            redirect($base_url);
        }
    }
    public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
    }

    private function criarFinanceiro($id) {
        // Verifica se o usuário já existe na tabela 'financeiro' pelo id
        $this->db->where('usuario', $id);
        $query = $this->db->get('financeiro');
        
        if ($query->num_rows() == 0) {
            // Se o usuário não foi encontrado, cria um novo registro
            $dados_novo_usuario = array(
                'usuario' => $id,
                'saldo' => 0,
                'bonus' => 0
            );
            $this->db->insert('financeiro', $dados_novo_usuario);
            return true;
        }
        return false; // Usuário já existe na tabela
    }
    
    private function setSaldo($id){

        $this->db->where('usuario', $id);
        $query = $this->db->get('financeiro');
        $usuario = $query->row();

        $this->session->set_userdata('saldo', $usuario->saldo);
    }

    private function getKeys(){
        $this->db->where('id',0);	
        $fiverData = $this->db->get('fiverscan')->result();

        $data = array(
            'url' => $fiverData[0]->url,
            'agent_code' => $fiverData[0]->agent_code,
            'agent_token' => $fiverData[0]->agent_token
        );

        return $data;
    }

    private function criarUsuarioAPI($email) {
        // URL da API
        $keys = $this->getKeys();

        $url = $keys['url']; 

        // Dados para o corpo da requisição em formato JSON
        $data = array(
            'method' => 'user_create',
            'agent_code' => $keys['agent_code'],
            'agent_token' => $keys['agent_token'],
            'user_code' => $email
        );

        $json_data = json_encode($data);

        $ch = curl_init();

        $headerArray = ['Content-Type: application/json'];
        // Configurando as opções do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Executando a requisição e obtendo a resposta
        $response = curl_exec($ch);

        // Fechando a conexão cURL
        curl_close($ch);

        return true;
    }
    public function update($id)
	{
        $data = $this->input->post();

        $this->db->where('id', $id);
        $this->db->update('usuarios', $data);

        $msg = "Foi atualizado com sucesso!";
        $this->session->set_flashdata('msg', $msg);
        $this->session->set_flashdata('tipo', "success");

        redirect('usuarios/minhaconta');

	}
    public function afiliado()
    {
        $this->login->checkSession();

        $data['nomepagina'] = 'Afiliado';
        $data['config'] = $this->app->config();

        $this->db->where('id', $this->session->id);
        $data['usuario'] = $this->db->get('usuarios')->result();

        if ($data['usuario'][0]->is_afiliado != 1) {
            $msg = "Atenção! Você não tem permissão para acessar esta página!";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "danger");
            redirect($base_url);
        }

        $this->db->where('usuario', $this->session->id);
        $financeiro = $this->db->get('financeiro')->result();
        $data['saldo_afiliado'] = $financeiro[0]->saldo_afiliado;

        $this->db->where('afiliado', $data['usuario'][0]->usuario);
        $data['indicacoes'] = $this->db->get('indicacoes')->result();
        

        $this->load->view('pages/layout/header', $data);
        $this->load->view('pages/minhaconta/afiliado', $data);
        $this->load->view('pages/layout/footer', $data);
    }
}
