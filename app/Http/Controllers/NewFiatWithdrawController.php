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
            'BRLwithdrawSubmit' => 'required|min:1',
        ]);

        $pix = $request->input('PIXSubmit');
        $BRLwithdrawValueWithoutFormatation = $request->input('BRLwithdrawSubmit');

        $value = str_replace(',', '', $BRLwithdrawValueWithoutFormatation);


        $apiUrl = "https://brasilbitcoin.com.br/caas/newFiatWithdraw";

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"value": '.$value.',  "pixKey": "'.$pix.'" }';
        
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
