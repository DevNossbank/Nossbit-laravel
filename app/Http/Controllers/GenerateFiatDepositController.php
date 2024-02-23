<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Http\Controllers\Helper\EncryptionController;
use App\Services\AuthenticationHeaderService;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\Image\PngImageBackEnd;
use BaconQrCode\Renderer\Image\ImageBackEndInterface;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use Illuminate\Support\Facades\Response;

class GenerateFiatDepositController extends Controller
{
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
    public function depositMethod(Request $request)
    {

        $request->validate([
            'BRLdeposit' => 'required',
        ]);


        $valueWithoutFormatation = $request->input('BRLdeposit');

        $value = str_replace(',', '', $valueWithoutFormatation);


        $apiUrl = "https://brasilbitcoin.com.br/caas/generateFiatDepositQrCode";

        $headers = $this->authenticationHeaderService->getHeaders();


        $body = '{"value": ' . $value . '}';

        $response = $this->guzzleService->sendRequest('POST', $apiUrl, $body, $headers);

        $content = $response->getBody()->getContents();

        $data = json_decode($content, true);

        if ($data['success']) {

            $paymentString = $data['paymentString'];

          //  $qrCode = $this->generateDepositQRCode($paymentString);

           // return response()->json(['qrCode' => base64_encode($qrCode)]);

        
           // $headers = ['Content-Type' => 'image/png'];
            //return Response::make($qrCode, 200, $headers);

            //return $qrCode;

            return  $paymentString;


        } else {

        }

    }

    /*public function generateDepositQRCode($paymentString)
    {
        $valueForQrCode = $paymentString;

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );
        
        /*$writer = new Writer($renderer);
        $qrCode = $writer->writeString($valueForQrCode);

        $qrCodeBase64 = base64_encode($qrCode);
    
        return $qrCodeBase64;

        $writer = new Writer($renderer);
        $qrCode = $writer->writeString($valueForQrCode);
    
        return $qrCode;
    }*/
}
