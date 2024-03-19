<?php

namespace App\Http\Controllers;

use App\Traits\MethodsAPI\GetUserCryptoWithdrawsTrait;
use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;
Use App\Traits\MethodsAPI\GetUserCryptoDeposits;

class TransferCryptoController extends Controller
{
    use GetUserCryptoDeposits;

    use GetUserCryptoWithdrawsTrait;
    protected $guzzleService;
    protected $authenticationHeaderService;


    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }

    
    protected function transferCrypto(Request $request)
    {

        $withdrawsCrypto = $this->getUserCryptoWithdraws();

        $depositsCrypto = $this->getUserCryptoDeposits();

        return view('site.transferCrypto', compact('withdrawsCrypto','depositsCrypto'));

    }
}
