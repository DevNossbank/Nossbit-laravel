<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;
use Illuminate\Support\Facades\Response;
use App\Traits\MethodsAPI\GetUserWalletTrait;


class GetCryptoAddress extends Controller
{
    use GetUserWalletTrait;
    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getWallet(Request $request)
    {
        $request->validate([
            'coinToken' => 'required',
        ]);


        $coinToken = $request->input('coinToken');

        $wallet = $this->userWallet($coinToken);

        
        return $wallet;

        


    }
}