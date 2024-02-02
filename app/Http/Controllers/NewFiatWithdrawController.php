<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;



class NewFiatWithdrawController extends Controller
{
    protected $guzzleService;
    protected $authenticationHeaderService; 

    public function __construct(GuzzleService $guzzleService,  AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;
   
    }

    
    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdrawMethod(Request $request) 
    {

        $request->validate([
            'PIXSubmit' => 'required',
            'BRLwithdrawSubmit' => 'required',
        ]);

        $pix = $request->input('PIXSubmit');
        $BRLwithdrawValue = $request->input('BRLwithdrawSubmit');

        $apiUrl = "https://brasilbitcoin.com.br/caas/sandbox/newFiatWithdraw";

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"value": '.$BRLwithdrawValue.',  "pixKey": "'.$pix.'" }';
        
        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['id']!="") {

            $status = $data['status'];

            return $status;
       } else {

        }
       
    }
}
