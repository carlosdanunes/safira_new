<?php

namespace App\Http\Controllers;

use App\User;
use App\UserSlots;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SlotsController extends Controller
{

    const TOKEN_SHOP = 'q0rUnlzMW0w7D6AqUtZmMoPl6JVghfjdghsddsadaskh18d4fsdsds51gdf5sfjkbvsjÇÇgç';
    const NOME = 'betevolution';
    const SHOP_URL = 'https://bet7fyre.online';
    const SHOP_CADASTRO = '/launcher/cadastro';
    const SHOP_BALANCE = '/launcher/balance';

    private static function HTTP(){
        return new Client([
            'base_uri' => self::SHOP_URL,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . self::TOKEN_SHOP
            ],
        ]);
    }

    private function registroUser($user){
        try{
            
            $response = self::HTTP()->post(self::SHOP_CADASTRO, [
                'json' => [
                    "nome" => self::NOME,
                    "email" => $user['email'],
                    "username" => $user['username'],
                    "password" => $user['password'],
                ],
            ]);
    
            $array = json_decode($response->getBody(), true);
            $userSlots = UserSlots::create([
                'iduser'     => $user['id'],
                'idusergold' => $array['iduser'],
                'token'      => $array['token']
            ]);

            return $userSlots;

        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => 'Erro ao registrar usuário.'.$e->getMessage()]);
        }
    }

    private static function UpBalanceGold($game,$token,$balance){
        $url = self::SHOP_BALANCE.'/'.$game.'/'.$token.'/'.$balance;
        self::HTTP()->get($url);
    }

    public function upBlanceSeedGold(Request $request){
        $token = $request->input('token');
        if(empty($token)){
            return response()->json(['success' => false, 'msg' => 'Token não informado.']);
        }
        $userSlots = UserSlots::where('token', $token)->first();
        if(empty($userSlots)){
            return response()->json(['success' => false, 'msg' => 'Usuário não encontrado.']);
        }
        $user = User::where('id', $userSlots->iduser)->first();
        $user->balance = $request->input('balance');
        $user->save();

        return response()->json(['success' => true, 'msg' => 'Saldo atualizado com sucesso.']);
    }

    public function newGame($game, $demo, $client)
    {
        if (!$this->user) return response()->json(['success' => false, 'msg' => 'Precisa estar logado.', 'type' => 'error']);

        $iduserGold = UserSlots::where('iduser', $this->user['id'])->first();
        if(empty($iduserGold)){
            $iduserGold = $this->registroUser($this->user);
        }

        //dd($iduserGold);
        $token = $iduserGold->token;
        $user = User::where('id', $this->user['id'])->first();
        self::UpBalanceGold($game,$token,$user['balance']);
    
        $parms = $game.'/'.$token;
        $chama = self::SHOP_URL.'/launcher/newgame/'.$parms;
        return redirect($chama);
    }
}
