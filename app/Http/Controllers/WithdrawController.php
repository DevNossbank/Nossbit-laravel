<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;
use App\Traits\MethodsAPI\GetUserFiatWithdrawsTrait;
use App\Traits\MethodsAPI\GetUserBalanceTrait;


class WithdrawController extends Controller
{
    use GetUserFiatWithdrawsTrait;

    use GetUserBalanceTrait;

    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }

    protected function withdrawView(Request $request)
    {

        $withdraws = $this->getUserFiatWithdraws();

        $saldo = $this->getUserBalance();

        return view('site.withdraw', compact('withdraws','saldo'));

    }
}




