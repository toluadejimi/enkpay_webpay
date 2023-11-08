<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/dollar.png" type="image/png" sizes="16x16">
    <title>Payment Success</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<style>
    body {
        background: #a9ddff;
        margin: 0;
        height: 100%;

    }



    .container {
        max-width: 380px;
        margin: 100px auto;
        overflow: hidden;
    }

    .printer-top {
        z-index: 1;
        border: 6px solid #666666;
        height: 6px;
        border-bottom: 0;
        border-radius: 6px 6px 0 0;
        background: #333333;
    }

    .printer-bottom {
        z-index: 0;
        border: 6px solid #666666;
        height: 6px;
        border-top: 0;
        border-radius: 0 0 6px 6px;
        background: #333333;
    }

    .paper-container {
        position: relative;
        overflow: hidden;
        height: 467px;
    }

    .paper {
        background: #ffffff;
        font-family: 'Poppins', sans-serif;
        height: 447px;
        position: absolute;
        z-index: 2;
        margin: 0 12px;
        margin-top: -12px;
        animation: print 2000ms cubic-bezier(0.68, -0.55, 0.265, 0.9);
    }

    .main-contents {
        margin: 0 12px;
        padding: 24px;
    }

    // Paper Jagged Edge
    .jagged-edge {
        position: relative;
        height: 20px;
        width: 100%;
        margin-top: -1px;
    }

    .jagged-edge:after {
        content: "";
        display: block;
        position: absolute;
        //bottom: 20px;
        left: 0;
        right: 0;
        height: 20px;
        background: linear-gradient(45deg,
                transparent 33.333%,
                #ffffff 33.333%,
                #ffffff 66.667%,
                transparent 66.667%),
            linear-gradient(-45deg,
                transparent 33.333%,
                #ffffff 33.333%,
                #ffffff 66.667%,
                transparent 66.667%);
        background-size: 16px 40px;
        background-position: 0 -20px;
    }

    .success-icon {
        text-align: center;
        font-size: 48px;
        height: 72px;
        background: #359d00;
        border-radius: 50%;
        width: 72px;
        height: 72px;
        margin: 16px auto;
        color: #fff;
    }

    .success-title {
        font-size: 22px;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        color: #666;
        font-weight: bold;
        margin-bottom: 16px;
    }

    .success-description {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        line-height: 21px;
        color: #999;
        text-align: center;
        margin-bottom: 24px;
    }

    .order-details {
        text-align: center;
        color: #333;
        font-weight: bold;

    }

    .order-number-label {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .order-number {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        line-height: 20px;
        font-size: 20px;
        padding: 8px 0;
        margin-bottom: 24px;
    }

    .complement {
        font-size: 10px;
        margin-bottom: 8px;
        color: rgb(6, 0, 62);
    }

    }

    @keyframes print {
        0% {
            transform: translateY(-90%);
        }

        100% {
            transform: translateY(0%);
        }
    }

    @-webkit-keyframes print {
        0% {
            -webkit-transform: translateY(-90%);
        }

        100% {
            -webkit-transform: translateY(0%);
        }
    }

    @-moz-keyframes print {
        0% {
            -moz-transform: translateY(-90%);
        }

        100% {
            -moz-transform: translateY(0%);
        }
    }

    @-ms-keyframes print {
        0% {
            -ms-transform: translateY(-90%);
        }

        100% {
            -ms-transform: translateY(0%);
        }
    }
</style>

<body>
    <div class="container">
        <div class="printer-top"></div>

        <div class="paper-container">
            <div class="printer-bottom"></div>

            <div class="paper">
                <div class="main-contents">
                    <div class="success-icon">&#10004;</div>
                    <div class="success-title">
                        Payment Successful
                    </div>


                    @if($wc != 'custpay' )
                    <div class="success-description">
                        <p>You should be automatically redirected back to merchant in <span id="seconds">7</span>
                            seconds.
                        </p>
                    </div>


                    <div class="order-details">
                        <div class="order-number-label">Transaction ID</div>
                        <div class="order-number">{{ $trans_id ?? "Refrence No" }}</div>
                    </div>


                        @else

                        <div class="col-md-12 text-center text-white mb-5">
                            <a href="{{ $recepit }}"
                                class="btn btn-success">View / Print Recepit</a>
                        </div>


                        @endif







                    <div class="complement text-center my-3">Thank You for choosing ENKPAY</div>

                </div>
                <div class="jagged-edge"></div>
            </div>
        </div>
    </div>



    <script>
        var seconds = 7; // seconds for HTML
        var foo; // variable for clearInterval() function
        var url = "{{ $marchant_url }}?amount={{ $amount }}&trans_id={{ $trans_id }}&status=success&wc_order={{ $wc_order }}&client_id={{ $client_id }}";

        function redirect() {
            document.location.href = url;
        }

        function updateSecs() {
            document.getElementById("seconds").innerHTML = seconds;
            seconds--;
            if (seconds == -1) {
                clearInterval(foo);
                redirect();
            }
        }

        function countdownTimer() {
            foo = setInterval(function () {
                updateSecs()
            }, 1000);
        }

        countdownTimer();
    </script>


</body>

</html>
