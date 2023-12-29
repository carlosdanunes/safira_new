<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suit extends CI_Controller {

    private function enviarRequest($url, $header, $data=null) {
        $ch = curl_init();

    
        $data_json = json_encode($data);

        // Configurando as opções do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        if(!$data == null){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Executando a requisição e obtendo a resposta
        $response = curl_exec($ch);

        // Fechando a conexão cURL
        curl_close($ch);

        return $response;
    }
    private function requestToken($url, $header, $data) {
        $ch = curl_init();

        // Configurando as opções do cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Executando a requisição e obtendo a resposta
        $response = curl_exec($ch);

        // Fechando a conexão cURL
        curl_close($ch);

        return $response;
    }

    public function criarQrCode($valor) {
        $transacao_id = 'SP'. rand(0, 999) .'-'.date('YMDHms');

        // Pega a data de hoje
        $dataDeHoje = new DateTime();

        // Adiciona um dia
        $dataDeAmanha = $dataDeHoje->modify('+1 day');

        // Formata a data para exibição
        $dataFormatada = $dataDeAmanha->format('Y-m-d');

        $this->db->where('id',0);	
        $suitpayData = $this->db->get('suitpay')->result();

        $url = $suitpayData[0]->url.'/api/v1/gateway/request-qrcode';

        $data = array(
            "requestNumber" => $transacao_id,
            "dueDate" => $dataFormatada,
            'amount' => $valor,
            "callbackUrl" => base_url(),
            'client' => array(
                'name' => $this->session->nome,
                'document' => $this->engine->cpf($this->session->cpf),
                "email" => $this->session->email
            )
        );

        $header = array(
            'ci: '.$suitpayData[0]->client_id,
            'cs: '.$suitpayData[0]->client_secret,
            'Content-Type: application/json',
        );

        $response = $this->enviarRequest($url, $header, $data);
        
        $dados = json_decode($response, true);

        if (isset($dados['idTransaction'])) {
            $insert = array(
                'transacao_id' =>  $dados['idTransaction'],
                'usuario' => $this->session->id,
                'valor' => $valor,
                'tipo' => 'deposito',
                'data_hora' => date('Y-m-d H:i:s'),
                'qrcode' => $this->generateQRCode($dados['paymentCode']),
                'status' => 'processamento',
                'code' =>  $dados['paymentCode']
            );

            $this->db->insert('transacoes', $insert);
            $this->session->set_userdata('transacao_id', $dados['idTransaction']);
            echo $this->engine->output('200', $insert);

        } else {
            $insert = array (
                "erro" => 'Erro ao tentar gerar QRCODE'
            );

            echo $this->engine->output('200', $insert);
        }
    }
    public function criarSaque(){
        $valor = $this->input->post('value');
        $tipo = $this->input->post('type');
        $key = $this->input->post('key');

        if($tipo == 'CPF'){
            $suitType = 'document';
        }
        if($tipo == 'TELEFONE'){
            $suitType = 'phoneNumber';
        }
        if($tipo == 'EMAIL'){
            $suitType = 'email';
        }
        if($tipo == 'CHAVE_ALEATORIA'){
            $suitType = 'randomKey';
        }

        $this->db->where('id',0);	
        $suitpayData = $this->db->get('suitpay')->result();

        $url = $suitpayData[0]->url.'/api/v1/gateway/pix-payment';

        $data = array(
            'value' => $valor,
            'key' => $key,
            'keyType' =>  $suitType
        );

        $header = array(
            'ci: '.$suitpayData[0]->client_id,
            'cs: '.$suitpayData[0]->client_secret,
            'Content-Type: application/json',
        );

        $response = $this->enviarRequest($url, $header, $data);
        
        $dados = json_decode($response, true);

        if ($dados['idTransaction']) {
            $insert = array(
                'transacao_id' => $dados['idTransaction'],
                'usuario' => $this->session->id,
                'valor' => $valor,
                'tipo' => 'saque',
                'data_hora' => date('Y-m-d H:i:s'),
                'status' => 'processamento'
            );

            $this->db->insert('transacoes', $insert);

            $this->session->set_userdata('transacao_id', $dados['idTransaction']);

            $msg = "Saque solicitado com sucesso!";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "success");
            
            redirect('');
        } else {
            $msg = "Erro ao solicitar saque, tente novamente mais tarde ou entre em contato com o suporte!";
            $this->session->set_flashdata('msg', $msg);
            $this->session->set_flashdata('tipo', "danger");
            redirect('');
        }
    }
    public function statusPix(){
        $uID = $this->session->id;

        $transactionId = $this->session->transacao_id;

        $this->db->where('id',0);	
        $suitpayData = $this->db->get('suitpay')->result();

        $url = $suitpayData[0]->url.'/api/v1/gateway/consult-status-transaction';

        $data = array(
            'typeTransaction' => "PIX",
            'idTransaction' => $transactionId
        );

        $header = array(
            'ci: '.$suitpayData[0]->client_id,
            'cs: '.$suitpayData[0]->client_secret,
            'Content-Type: application/json',
        );

        $response = $this->enviarRequest($url, $header, $data);

        $this->db->where('transacao_id', $transactionId);
        $valorData = $this->db->get('transacoes')->row();

        $dados = json_decode($response, true);
        
        if ($valorData->status == 'pago') {
            // Silencio
        } else {
            if ($dados === false) {
                echo 'Erro cURL: ' . curl_error($dados);
            } else {

                if ($dados == 'PAID_OUT'){

                    $insert = array(
                        'transacao_id' => $transactionId,
                        'status' => 'pago'
                    );
                    $this->db->where('transacao_id', $transactionId);
                    $this->db->update('transacoes', $insert);

                    switch ($valorData->valor) {
                        case '50.00':
                            $valor = 55;
                            break;
                        case '100.00':
                            $valor = 115;
                            break;
                        case '200.00':
                            $valor = 240;
                            break;
                        case '500.00':
                            $valor = 675;
                            break;
                        default:
                            $valor = $valorData->valor;
                            break;
                    }

                    $int_url = base_url().'/fiverscan/enviarSaldo/'.$uID.'/'.$valor;
                    $exec = file_get_contents($int_url);

                    if ($this->session->afiliado) {
                        $this->db->where('id',0);
                        $afiliado =  $this->db->get('afiliados_config')->result();
                        $saldoIndicacao = $valorData->valor - ($valorData->valor - ($valorData->valor / 100 * $afiliado[0]->porcentagemIndicacao));
                        $int_url = base_url().'/fiverscan/enviarSaldo/'.$this->session->afiliado.'/'.$saldoIndicacao;
                        $exec = file_get_contents($int_url);

                        $insert_indicacao = array(
                            'transacao_id' => $transactionId,
                            'usuario' => $this->session->id,
                            'afiliado' => $this->session->afiliado,
                            'valor' => $saldoIndicacao,
                            'data_hora' => date('Y-m-d H:i:s'),
                            'retorno' =>$exec
                        );
                        $this->db->insert('indicacoes', $insert_indicacao);
                    }

                    $this->session->set_userdata('transacao_id', 0);

                    echo json_encode($insert);
                } else {
                    $insert = array(
                        'transacao_id' => isset($dados['transactionId']) ? $dados['transactionId'] : null,
                        'status' => isset($dados['status']) ? $dados['status'] : null,
                        'afiliado' => $this->session->afiliado
                    );

                    echo $this->engine->output('200', $insert);
                }
               
            }
        }
    }
    public function generateQRCode($data) {
        // Carregue a biblioteca PHP QR Code
        require_once(APPPATH . 'libraries/phpqrcode/qrlib.php');
        
        // Caminho onde você deseja salvar o arquivo PNG do QRCode (opcional)
        $file = FCPATH . '/public/uploads/qrcode.png';

        // Gere o QRCode
        QRcode::png($data, $file);

        // Carregue o arquivo PNG do QRCode
        $qrCodeImage = file_get_contents($file);

        // Converta a imagem para base64
        $base64QRCode = base64_encode($qrCodeImage);
        
        return $base64QRCode;
    }    

    public function webhook() {
        $idTransaction = $this->input->post('idTransaction');
        $typeTransaction = $this->input->post('typeTransaction');
        $statusTransaction = $this->input->post('statusTransaction');

        if ($statusTransaction == 'PAID_OUT') {
            $insert = array(
                'transacao_id' => $transactionId,
                'status' => 'pago'
            );

            $this->db->where('transacao_id', $transactionId);
            $dadosTransacao = $this->db->get('transacoes')->row();

            $this->db->where('transacao_id', $transactionId);
            $this->db->update('transacoes', $insert);
            $int_url = base_url().'/fiverscan/enviarSaldo/'.$dadosTransacao->usuario.'/'.$valorData->valor;
            $exec = file_get_contents($int_url);

            $this->db->where('id', $dadosTransacao->usuario);
            $dadosUsuario = $this->db->get('usuarios')->row();

            if ($dadosUsuario->afiliado) {
                $this->db->where('id',0);
                $afiliado =  $this->db->get('afiliados_config')->result();
                $saldoIndicacao = $valorData->valor - ($valorData->valor - ($valorData->valor / 100 * $afiliado[0]->porcentagemIndicacao));
                $int_url = base_url().'/fiverscan/enviarSaldo/'.$dadosUsuario->afiliado.'/'.$saldoIndicacao;
                $exec = file_get_contents($int_url);

                $insert_indicacao = array(
                    'transacao_id' => $transactionId,
                    'usuario' => $dadosTransacao->usuario,
                    'afiliado' => $dadosUsuario->afiliado,
                    'valor' => $saldoIndicacao,
                    'data_hora' => date('Y-m-d H:i:s'),
                    'retorno' =>$exec
                );

                $this->db->insert('indicacoes', $insert_indicacao);
            }

            $this->session->set_userdata('transacao_id', 0);
            echo json_encode($insert);
        }
    }
}
