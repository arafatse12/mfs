<?php

    //echo "hello";
    require_once(APPPATH . 'third_party/iyzipay/vendor/autoload.php');
    require_once(APPPATH . 'third_party/iyzipay/vendor/iyzico/iyzipay-php/IyzipayBootstrap.php');
    // require_once('config.php');
   
    $apiKey  = $iyzico_apikey;
    $secretKey = $iyzico_secret_apikey;

    $paymentUrl = "https://sandbox-api.iyzipay.com";
    $redirectUrl = base_url()."iyzico-payment-post";

    $uniqId = hexdec(uniqid()) ;
    
    //echo ($uniqId);
    $options = new \Iyzipay\Options();
    $options->setApiKey($apiKey);
    $options->setSecretKey($secretKey);
    $options->setBaseUrl($paymentUrl);
  
    // echo "options";
    // print_r($options);
    $ip = $this->input->ip_address();

    //try code
    $request = new \Iyzipay\Request\CreateSettlementToBalanceRequest();
    $request->setConversationId($uniqId);
    $request->setSubMerchantKey("3388507");
    $request->setLocale(\Iyzipay\Model\Locale::EN);
    $request->setCallbackUrl($redirectUrl);
    $request->setPrice("5");

    $settlementToBalance = \Iyzipay\Model\SettlementToBalance::create($request, $options);

    print_r($settlementToBalance);

    // $request = new \Iyzipay\Request\CreateRefundRequest();
    // $request = new \Iyzipay\Request\CreateSettlementToBalanceRequest();
    // $request->setLocale(\Iyzipay\Model\Locale::EN);
    
    // $request->setConversationId("123456789");
    // // $request->setPaymentId($uniqId);
    // $request->setPaymentTransactionId($uniqId);
    // $request->setPrice("0.5");
    // $request->setCurrency(\Iyzipay\Model\Currency::TL);
    // $request->setIp($ip);

    # make request
    // $refund = \Iyzipay\Model\Refund::create($request, $options);
    // echo "refund";
    // print_r(\Iyzipay\Model\Refund::create($request, $options));
    if($settlementToBalance){
      echo "in iyzi";
    }else
    {
        $this->session->set_flashdata('error', $checkoutFormInitialize->getErrorMessage());
    }

?>