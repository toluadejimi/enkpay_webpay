<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>top up</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css"/>
    <link rel="manifest" href="{{url('')}}/public/assets/assets/__manifest.json"
          data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">

    <style>
        .btn {
            position: relative;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .loader {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border: 3px solid #f3f3f3;
            border-radius: 50%;
            border-top: 3px solid #3498db;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .btn.disabled {
            cursor: not-allowed;
            opacity: 0.6;
        }
    </style>
</head>

<body>
{{--<!-- preloade -->--}}
{{--<div class="preload preload-container">--}}
{{--    <div class="preload-logo">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- /preload -->
<div class="app-header st1">
    <div class="tf-container">
        <div class="tf-topbar d-flex justify-content-center align-items-center">
            <a href="29_topup.html#" class="back-btn"><i class="icon-left white_color"></i></a>
            <h3 class="white_color">Process Transaction</h3>

        </div>
    </div>
</div>


<div class="card-secton topup-content">
    <div class="tf-container">
        <div class="tf-balance-box">


            <form id="transactionForm" action="process-now" enctype="multipart/form-data" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger my-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session()->get('error') }}
                    </div>
                @endif


                <label>Select Site</label>
                <select class="form-control my-3" id="site_url" name="site_url" required>
                    <option value="">Select Site</option>
                    @foreach($sites as $data)
                        <option value="{{$data->verify_url}}"> {{$data->site_name}}</option>
                    @endforeach
                </select>

                <label>Enter customer email</label>
                <div class="row">
                    <div class="col-12">
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>
                </div>

                <div class="text-danger my-2" id="result">Verifying email...</div>

                <input type="text" name="username" id="usernameResult" class="form-control" readonly
                       style="display: none;">


                <script>
                    document.getElementById('email').addEventListener('input', function () {
                        document.getElementById('result').textContent = ''; // Clear previous result
                        toggleVerifyButton(false); // Disable verify button on input change
                    });

                    document.getElementById('email').addEventListener('blur', function () {
                        var email = this.value.trim();
                        if (email !== '') {
                            verifyEmail(email);
                        }
                    });

                    function toggleVerifyButton(enabled) {
                        document.getElementById('verifyButton').disabled = !enabled;
                    }

                    function verifyEmail(email) {
                        // Get the selected site URL
                        var siteUrl = document.getElementById('site_url').value;

                        if (siteUrl === '') {
                            document.getElementById('result').textContent = 'Please select a site URL.';
                            return;
                        }

                        fetch(siteUrl, { // Use the selected site URL here
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token if needed for Laravel
                            },
                            body: new URLSearchParams({
                                email: email
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    document.getElementById('result').textContent = 'Account not found or not a customer email. Please try again.';
                                    toggleVerifyButton(false); // Keep button disabled on error
                                    document.getElementById('usernameResult').style.display = 'none'; // Hide username result field on error
                                } else {
                                    console.log(data);
                                    document.getElementById('result').textContent = 'Your Username is: ' + data.username;
                                    document.getElementById('usernameResult').value = data.username; // Set username in input field
                                    document.getElementById('usernameResult').style.display = 'block'; // Show username result field
                                    toggleVerifyButton(true); // Enable button on successful verification
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                document.getElementById('result').textContent = '';
                                toggleVerifyButton(false); // Keep button disabled on error
                                document.getElementById('usernameResult').style.display = 'none'; // Hide username result field on error
                            });
                    }

                    // Disable submit button initially
                    toggleVerifyButton(false);
                </script>

                <hr>


                <label>Enter Amount</label>
                <div class="row">
                    <div class="col-12">
                        <input type="number" class="form-control" name="amount" required>
                    </div>
                </div>


                <input type="checkbox" class="my-4"  name="fund_agent">
                <label>Agent</label>


                <button id="submitBtn" type="submit" class="btn tf-btn accent large my-3">
                    <span class="btn-text">Continue</span>
                    <div class="loader" id="loader"></div>
                </button>

            </form>


        </div>

    </div>

</div>


<script>
    document.getElementById('transactionForm').addEventListener('submit', function (e) {
        // Get the button and loader
        const button = document.getElementById('submitBtn');
        const loader = document.getElementById('loader');
        const btnText = document.querySelector('.btn-text');

        // Disable the button and show loader
        button.classList.add('disabled');
        loader.style.display = 'block';
        btnText.style.display = 'none';

        // Prevent multiple submissions by disabling the button
        button.disabled = true;
    });
</script>


<script>
    document.getElementById('transactionFormwema').addEventListener('submit', function (e) {
        // Get the button and loader
        const button = document.getElementById('submitBtnwema');
        const loader = document.getElementById('loaderwema');
        const btnText = document.querySelector('.btn-text');

        // Disable the button and show loader
        button.classList.add('disabled');
        loader.style.display = 'block';
        btnText.style.display = 'none';

        // Prevent multiple submissions by disabling the button
        button.disabled = true;
    });
</script>


<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
