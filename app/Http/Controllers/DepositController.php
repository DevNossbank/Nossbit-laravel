<?php

namespace App\Http\Controllers;

use App\Services\GuzzleService;
use App\Services\AuthenticationHeaderService;
use Illuminate\Http\Request;
use App\Traits\MethodsAPI\GetUserFiatDeposits;


class DepositController extends Controller
{

    use GetUserFiatDeposits;

    protected $guzzleService;
    protected $authenticationHeaderService;

    public function __construct(GuzzleService $guzzleService, AuthenticationHeaderService $authenticationHeaderService)
    {
        $this->guzzleService = $guzzleService;

        $this->authenticationHeaderService = $authenticationHeaderService;

    }
   
    protected function depositView(Request $request)
    {

        $deposits = $this->getUserFiatDeposits();

        return view('site.deposit', compact('deposits'));

    }
}




