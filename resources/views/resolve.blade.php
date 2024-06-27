<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>top up</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png" />
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png" />
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css" />
    <link rel="manifest" href="{{url('')}}/public/assets/assets/__manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">
</head>

<body>
<!-- preloade -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->
<div class="app-header st1">
    <div class="tf-container">
        <div class="tf-topbar d-flex justify-content-center align-items-center">
            <a href="29_topup.html#" class="back-btn"><i class="icon-left white_color"></i></a>
            <h3 class="white_color">Resolve Transaction</h3>
        </div>
    </div>
</div>


<div class="card-secton topup-content">
    <div class="tf-container">
        <div class="tf-balance-box">



            <form action="submit-resolve" method="POST">
                @csrf


                <label>Select Subject</label>
                <select class="form-control" name="subject" required>

                    <option value=""> Select Subject </option>
                    <option value="1"> I Didn't Add Refrence </option>
                    <option value="2"> I entered wrong amount </option>
                    <option value="3"> I added valid Refrence but not processed </option>

                </select>


                <hr>

                <label>Enter valid Email from site</label>
                <input name="email" type="email" class="form-control" placeholder="jack@gmail.com">

                <hr>

                <label>Enter Refrence (optional)</label>
                <input name="ref" type="text" class="form-control" placeholder="24557758BS">

                <hr>

                <label>Enter Deposit Amount</label>
                <input name="d_amount" type="number" class="form-control" placeholder="1000" required>

                <hr>

                <label>Enter Receipt Amount</label>
                <input name="r_amount" type="number" class="form-control" placeholder="1000" required>

                <hr>

                <label>Upload Bank Receipt</label>
                <input name="recepit" type="file" class="form-control" placeholder="add recepit" required>


                <button type="submit" id="btn-popup-up" class="tf-btn accent large my-3">Resolve now</button>

            </form>

<hr>
            <a href="track-request" class="d-flex justify-content-center tf-btn accent large my-3"> Track Previous Request</a>


        </div>

    </div>

</div>



<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
