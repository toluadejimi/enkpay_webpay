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
        .countdown {
            font-size: 2em;
            color: #333;
        }

        .chat-button {
            display: none;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

    </style>


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
            <h3 class="white_color">{{$title}}</h3>
        </div>
    </div>
</div>


<div class="card-secton topup-content">
    <div class="tf-container">
        <div class="tf-balance-box">


            <img src="{{url('')}}/public/assets/payprocess.gif" width="100px" height="100px">

            <div class="row d-flex justify-content-center">

                <div class="col-12 d-flex justify-content-center">
                    <p class="text-danger">Please wait while we verify your transaction......</p>
                </div>

                <div class="col-12 d-flex justify-content-center my-3">
                    <div class="countdown text-danger" id="countdown">10:00</div>

                    <a href="javascript:void(0);" class="chat-button text-center btn btn-primary" onclick="location.reload()" id="chatButton">Recheck again</a>


                    <script>
                        // Set the countdown time (in seconds)
                        let countdownTime = 600; // 3 minutes

                        // Get DOM elements
                        const countdownDisplay = document.getElementById('countdown');
                        const chatButton = document.getElementById('chatButton');

                        // Function to update countdown
                        function updateCountdown() {
                            let minutes = Math.floor(countdownTime / 60);
                            let seconds = countdownTime % 60;

                            // Format minutes and seconds to two digits
                            minutes = minutes < 10 ? '0' + minutes : minutes;
                            seconds = seconds < 10 ? '0' + seconds : seconds;

                            // Update countdown display
                            countdownDisplay.textContent = `${minutes}:${seconds}`;

                            // Decrease countdown time by 1 second
                            countdownTime--;

                            // Show chat button when countdown reaches 0
                            if (countdownTime < 0) {
                                clearInterval(countdownInterval);
                                chatButton.style.display = 'inline-block';
                                countdownDisplay.style.display = 'none';

                            }
                        }

                        updateCountdown();

                        const countdownInterval = setInterval(updateCountdown, 1000);
                    </script>
                </div>



            </div>


            <hr>


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


        </div>

    </div>

</div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let repeatRequestninepsb = true; // Define repeatRequestninepsb variable

            function makeRequest() {
                if (!repeatRequestninepsb) {
                    return;
                }

                const url = "{{ url('') }}/verifyninepsb?account_no={{$account_no}}&amount={{$amount}}&ref={{$ref}}";

                var audio = new Audio('{{url('')}}/public/assets/sound.wav');

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);

                        if (data.status === 'pending') {
                            setTimeout(makeRequest, 3000);
                        } else if (data.status === 'success') {
                            audio.play();

                            window.location.href = "{{ url('') }}/success?trans_id={{$ref}}";

                        } else if (data.status === 'paid') {
                            audio.play();

                            window.location.href = "{{ url('') }}/paid-success?trans_id={{$ref}}";
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            // Call makeRequest() function immediately on page load
            makeRequest();
        });
    </script>






<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>




</body>

</html>
