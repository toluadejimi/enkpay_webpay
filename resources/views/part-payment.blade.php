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




            <div class="content">
                <div class="top">
                    <h1 class="text-danger">Payment Pending</h1>
                </div>

                <div class="tf-spacing-16"></div>


                <div class="inner">
                    <p class="on_surface_color fw_6">Expected Amount</p>
                    <p class="fw_3 text-dark">NGN {{number_format($expected_amount,2 )}}</p>

                    <hr>

                    <p class="on_surface_color fw_6">Amount Paid</p>
                    <p class="fw_3 text-success">NGN {{number_format($amount_paid, 2) }}</p>

                    <hr>

                    <p class="on_surface_color fw_6 text-warning">Amount Remaining</p>
                    <p class="fw_3 text-dark">NGN {{number_format($amount_remain, 2) }}</p>

                    <hr>

                    <p class="on_surface_color fw_6">Account No</p>
                    <p class="fw_3 text-dark">{{$acct_no ?? "ACCOUNT" }} </p>

                    <hr>

                    <p class="on_surface_color fw_6">Bank</p>
                    <p class="fw_3 text-dark">WEMA BANK</p>


                </div>

                <div class="tf-spacing-16"></div>


                <div class="bottom">
                    <p>Please balance up the remaining to complete your transaction.</p>
                </div>

                <hr>


                <form action="/verifycharm" method="POST">
                    @csrf



                    <input type="text" id="trx_id" name="trx_id" hidden value="{{$ref}}">
                    <input type="text" id="Amount" hidden name="amount" value="{{ $amount_remain }}">
                    <input type="text" id="Amount" hidden name="account_no" value="{{$acct_no}}">
                    <input type="text" id="pref" hidden name="pref" value="{{$ref}}">




                    <!-- Button trigger modal -->

                    <button class="tf-btn accent large my-3 request-btn"
                            id="requestcharm">I
                        ve sent ₦{{ number_format($amount_remain )}}</button>


                </form>








            </div>

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

