<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Pay</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png" />
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png" />
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css" />
    <link rel="manifest" href="{{url('')}}/public/assets/assets/manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">
</head>

<body class="bg_surface_color">

<!-- preloade -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->



<div class="tf-panel up">
    <div class="panel_overlay"></div>
    <div class="panel-box panel-up overflow-hidden">
        <div class="header bg_white_color">
            <div class="tf-container">
                <div
                    class="tf-statusbar d-flex justify-content-center align-items-center">
                    <a href="ui-modal.html#" class="clear-panel"> <i
                            class="icon-close1"></i> </a>
                    <h3>up</h3>
                </div>
            </div>
        </div>
        <div class="panel-content mb-5 mt-5">
        </div>


    </div>
</div>


<div class="wrap-success">


        <div class="success_box">
            <div class="icon-1 ani3">
                <span class="circle-box lg bg-circle check-icon"></span>
            </div>
            <div class="icon-2 ani5">
                <span class="circle-box md bg-circle"></span>
            </div>
            <div class="icon-3 ani8">
                <span class="circle-box md bg-circle"></span>
            </div>
            <div class="icon-4 ani2">
                <span class="circle-box sm bg-circle"></span>
            </div>


            <div class="content">
                <div class="top">
                    <h2>Payment Successful!</h2>
                    <p class="fw_4">Wallet Funded</p>
                    <h2 class="my-3"><strong >NGN{{number_format($amount, 2)}}</strong></h2>


                </div>
                <div class="tf-spacing-16"></div>
                <div class="inner">
                    <p> Your wallet has been successfully funded </p>
                </div>

                <div class="tf-spacing-16"></div>

                <a href="{{ $recepit }}" class="tf-btn accent small my-4">View / Print Receipt</a>
                <a href="{{ $url_page }}" class="tf-btn accent small my-4">Back to Boomzy</a>




        </div>

        <span class="line-through through-1"></span>
        <span class="line-through through-2"></span>
        <span class="line-through through-3"></span>
        <span class="line-through through-4"></span>
        <span class="line-through through-5"></span>
        <span class="line-through through-6"></span>

    </div>





<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>

