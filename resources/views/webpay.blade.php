<!doctype html>
<html>

<head>


    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>ENKPAY | WEBPAY</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        .hidden {
            display: none;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        * {
            margin: 0;
            padding: 0
        }

        body {
            overflow-x: hidden;
            background: #000000
        }

        #bg-div {
            margin: 0;
            margin-top: 100px;
            margin-bottom: 100px
        }

        #border-btm {
            padding-bottom: 20px;
            margin-bottom: 0px;
            box-shadow: 0px 35px 2px -35px lightgray
        }

        #test {
            margin-top: 0px;
            margin-bottom: 40px;
            border: 1px solid #FFE082;
            border-radius: 0.25rem;
            width: 60px;
            height: 30px;
            background-color: #FFECB3
        }

        .active1 {
            color: #070162 !important;
            font-weight: bold
        }

        .bar4 {
            width: 35px;
            height: 5px;
            background-color: #ffffff;
            margin: 6px 0
        }

        .list-group .tabs {
            color: #000000
        }

        #menu-toggle {
            height: 50px
        }

        #new-label {
            padding: 2px;
            font-size: 10px;
            font-weight: bold;
            background-color: red;
            color: #ffffff;
            border-radius: 5px;
            margin-left: 5px
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem
        }

        #sidebar-wrapper .list-group {
            width: 15rem
        }

        #page-content-wrapper {
            min-width: 100vw;
            padding-left: 20px;
            padding-right: 20px
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #fff !important;
            border-color: #fff !important
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
                display: none
            }
        }

        .card0 {
            margin-top: 10px;
            margin-bottom: 10px
        }

        .top-highlight {
            color: #02035c;
            font-weight: bold;
            font-size: 20px
        }

        .form-card input,
        .form-card textarea {
            padding: 10px 15px 5px 15px;
            border: none;
            border: 1px solid lightgrey;
            border-radius: 6px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: arial;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px
        }

        .form-card input:focus,
        .form-card textarea:focus {
            -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
            -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
            box-shadow: 0px 0px 0px 1.5px skyblue !important;
            font-weight: bold;
            border: 1px solid skyblue;
            outline-width: 0
        }

        input.btn-success {
            height: 50px;
            color: #ffffff;
            opacity: 0.9
        }

        #below-btn a {
            font-weight: bold;
            color: #000000
        }

        .input-group {
            position: relative;
            width: 100%;
            overflow: hidden
        }

        .input-group input {
            position: relative;
            height: 90px;
            margin-left: 1px;
            margin-right: 1px;
            border-radius: 6px;
            padding-top: 30px;
            padding-left: 25px
        }

        .input-group label {
            position: absolute;
            height: 24px;
            background: none;
            border-radius: 6px;
            line-height: 48px;
            font-size: 15px;
            color: gray;
            width: 100%;
            font-weight: 100;
            padding-left: 25px
        }

        input:focus+label {
            color: #1E88E5
        }

        #qr {
            margin-bottom: 150px;
            margin-top: 50px
        }

        #timer {
            height: 3vh;
            font-size: 4vmin;
            text-align: center;
            text-decoration-color: darkred;
        }

        #timerv {
            height: 3vh;
            font-size: 4vmin;
            text-align: center;
            text-decoration-color: darkred;
        }

        /* Spinner animation */
        .spinner {
            position: relative;
            top: 35%;
            width: 80px;
            height: 80px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
            animation: sk-scaleout 1.0s infinite ease-in-out;
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }

            100% {
                -webkit-transform: scale(1.0);
                opacity: 0;
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            100% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
                opacity: 0;
            }
        }
    </style>
</head>

<script>
    function hideLoader(){
      $('.page-loader').fadeOut('slow');
    }
</script>





<body className='snippet-body'>


    <div class="page-loader">
        <div class="spinner"></div>
        <div class="txt">ENKPAY</div>
    </div>


    <body onload="hideLoader()">


        <div class="container-fluid px-0" id="bg-div">

            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">


                    <div class="card card0">
                        <div class="d-flex" id="wrapper">



                            <!-- Sidebar -->
                            <div class="bg-light border-right" id="sidebar-wrapper">

                                <div class="sidebar-heading pt-5 pb-4"><img
                                        src="https://enkpay.com/asset/images/logo_1684856125.png"
                                        class="rounded float-left" alt="...">
                                </div>
                                <hr>
                                <div class="sidebar-heading pt-5 pb-4"><strong>PAY WITH</strong></div>



                                <div class="list-group list-group-flush">


                                    <a data-toggle="tab" href="#menu4" id="tab1"
                                        class="tabs list-group-item bg-light active1">
                                        <div class="list-div my-2">
                                            <div class="fa fa-home"></div> &nbsp;&nbsp; Providus Bank
                                        </div>
                                    </a>


                                    {{-- <a data-toggle="tab" href="#menu1" id="tab1"
                                        class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-home"></div> &nbsp;&nbsp; Pay with VFD
                                        </div>
                                    </a> --}}








                                    {{-- <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item">
                                        <div class="list-div my-2">
                                            <div class="fa fa-credit-card"></div> &nbsp;&nbsp; Card
                                        </div>
                                    </a> --}}


                                    <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-qrcode"></div> &nbsp;&nbsp;&nbsp; ENKPAY QR <span
                                                id="new-label">NEW</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <!-- Page Content -->



                            <div id="page-content-wrapper">
                                <div class="row pt-3" id="border-btm">
                                    <div class="col-4"> <button class="btn btn-primary mt-4 ml-3 mb-3" id="menu-toggle">
                                            <div class="bar4"></div>
                                            <div class="bar4"></div>
                                            <div class="bar4"></div>
                                        </button> </div>
                                    <div class="col-8">
                                        <div class="row justify-content-right">
                                            <div class="col-12">
                                                <p class="mb-0 mr-4 mt-4 text-right">{{ $email ?? "enkpay@mail.com"
                                                    }}</p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-right">
                                            <div class="col-12">
                                                <p class="mb-0 mr-4 text-right">Pay <span class="top-highlight">NGN {{
                                                        number_format($payable_amount ?? "0.00") }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="text-center" id="test">Pay</div>
                                </div>
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane ">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h3 class="mt-0 mb-4 text-center">

                                                        Pay to this bank details below</h3>


                                                    <div class="mt-0 mb-4 text-center">
                                                        <span>BANK NAME</span>
                                                        <div>
                                                            <h5>VFD MFB</h5>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <form onsubmit="event.preventDefault()">

                                                        <div class="row">
                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Account Number</span>
                                                                <div>
                                                                    <h5>{{ $v_account_no ?? "Not Available" }}</h5>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Account Name</span>
                                                                <div>
                                                                    <h5>{{$v_account_name ?? "Not Available"}}</h5>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Trx Ref</span>
                                                                <div>
                                                                    <h5>{{ $trans_id ?? "Not Available" }}</h5>
                                                                    <input type="text" id="trx_id" hidden
                                                                        value="{{ $trans_id}}">

                                                                    <input type="text" id="webHook" hidden
                                                                        value="{{ $webhook}}">


                                                                    <input type="text" id="Amount" hidden
                                                                        value="{{ $amount}}">





                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Trx Time</span>
                                                                <div>
                                                                    <h5 style="color:red;"><span id="sec">240
                                                                            secs</span></h5>
                                                                </div>
                                                            </div>


                                                        </div>


                                                        <hr>





                                                        <div class="row mt-5 center">

                                                            <div class="col-12">

                                                                <h4 style="color:red;" id="timerv"> <span
                                                                        id="countdownv"></span></h4>

                                                                <input type="submit" id="requestButtonv"
                                                                    value="I ve sent NGN {{ number_format($payable_amount)}}"
                                                                    class="btn btn-success">

                                                            </div>




                                                        </div>




                                                        <div class="row">
                                                            <div class="col-md-12 mt-4">
                                                                <p class="text-center mb-5" id="cancle"><a
                                                                        href="decline?trans_id={{ $trans_id }}&key={{ $key }}">
                                                                        Cancle
                                                                        Transaction </a></p>
                                                            </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-md-12 mt-4">
                                                                <p class="text-center mb-5" id="below-btn"><a
                                                                        href="https://wa.me/message/2YLDDISL57EXM1"
                                                                        target="_blank"> Chat with us</a></p>
                                                            </div>
                                                        </div>



                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="menu4" class="tab-pane in active">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h3 class="mt-0 mb-4 text-center">Pay to this bank details below
                                                    </h3>

                                                    <p class="mt-0 my-5 text-center text-danger"> Pay exactly NGN
                                                        {{number_format($payable_amount ?? "0.00") }}
                                                        <br>to avoid delay or failed transaction.
                                                    </p>


                                                    <div class="mt-0 mb-4 text-center">
                                                        <span>BANK NAME</span>
                                                        <div>
                                                            <h5>PROVIDUS BANK</h5>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <form onsubmit="event.preventDefault()">

                                                        <div class="row">
                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Account Number</span>
                                                                <div>
                                                                    <h5>{{ $p_account_no ?? "Not Available" }}</h5>
                                                                    <input type="number" id="p_account_no" hidden
                                                                        value="{{ $p_account_no}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Account Name</span>
                                                                <div>
                                                                    <h5>{{$p_account_name ?? "Not Available"}}</h5>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Trx Ref</span>
                                                                <div>
                                                                    <h5>{{ $trans_id ?? "Not Available" }}</h5>
                                                                    <input type="text" id="trx_id" hidden
                                                                        value="{{ $trans_id}}">

                                                                    <input type="text" id="webHook" hidden
                                                                        value="{{ $webhook}}">


                                                                    <input type="text" id="Amount" hidden
                                                                        value="{{ $amount}}">





                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-3 text-center">
                                                                <span>Trx Time</span>
                                                                <div>
                                                                    <h5 style="color:red;"><span id="timer">
                                                                            </span></h5>
                                                                </div>
                                                            </div>


                                                            <script>
                                                                var targetMinutes = 4;

                                                                var targetTime = targetMinutes * 60 * 1000;
                                                                var trans = {{ $trans_id }};
                                                                var key = {{ $key }};

                                                                function redirect() {
                                                                }

                                                                function countdown() {
                                                                targetTime -= 60000;

                                                                if (targetTime <= 0) {
                                                                    clearInterval(timerInterval); // Stop the countdown
                                                                    redirect(); // Redirect to the specified link
                                                                }

                                                                // Calculate remaining minutes and seconds
                                                                var minutes = Math.floor(targetTime / 60000);
                                                                var seconds = Math.floor((targetTime % 60000) / 1000);

                                                                // Display the countdown on the page
                                                                document.getElementById('timer').innerHTML = minutes + 'm ' + seconds + 's';
                                                                }

                                                                var timerInterval = setInterval(countdown, 1000);
                                                            </script>



                                                        </div>


                                                        <hr>


                                                        <div class="row mt-5 center">

                                                            <div class="col-12">


                                                                <h4 style="color:red;" id="timer"> <span
                                                                        id="countdown"></span></h4>
                                                                <input type="submit" id="requestButtonp"
                                                                    value="I ve sent NGN {{ number_format($payable_amount)}}"
                                                                    class="btn btn-success">

                                                            </div>




                                                        </div>


                                                        <div class="text-center"> <span id="statuspText"></span> </div>


                                                        <div class="row">
                                                            <div class="col-md-12 mt-4">
                                                                <p class="text-center mb-5" id="cancle"><a
                                                                        href="decline?trans_id={{ $trans_id }}&key={{ $key }}">
                                                                        Cancle
                                                                        Transaction </a></p>
                                                            </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-md-12 mt-4">
                                                                <p class="text-center mb-5" id="below-btn"><a
                                                                        href="https://wa.me/message/2YLDDISL57EXM1"
                                                                        target="_blank"> Chat with us</a></p>
                                                            </div>
                                                        </div>



                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div id="menu4" class="tab-panel">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h3 class="mt-0 mb-4 text-center">Enter bank details to pay</h3>
                                                    <form onsubmit="event.preventDefault()">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="input-group"> <input type="text" id="bk_nm"
                                                                        placeholder="BBB Bank"> <label>BANK NAME</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="input-group"> <input type="text"
                                                                        name="ben_nm" id="ben-nm"
                                                                        placeholder="John Smith">
                                                                    <label>BENEFICIARY NAME</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="input-group"> <input type="text"
                                                                        name="scode" placeholder="ABCDAB1S"
                                                                        class="placeicon" minlength="8" maxlength="11">
                                                                    <label>SWIFT
                                                                        CODE</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12"> <input type="submit"
                                                                    value="Pay $ 100" class="btn btn-success placeicon">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="text-center mb-5" id="below-btn"><a
                                                                        href="#">Try
                                                                        test card</a></p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}



                                    {{-- <div id="menu2" class="tab-pane">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h3 class="mt-0 mb-4 text-center">Enter your card details to pay
                                                    </h3>
                                                    <form onsubmit="event.preventDefault()">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="input-group"> <input type="text" id="cr_no"
                                                                        placeholder="0000 0000 0000 0000" minlength="19"
                                                                        maxlength="19"> <label>CARD NUMBER</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="input-group"> <input type="text" name="exp"
                                                                        id="exp" placeholder="MM/YY" minlength="5"
                                                                        maxlength="5"> <label>CARD EXPIRY</label> </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="input-group"> <input type="password"
                                                                        name="cvcpwd"
                                                                        placeholder="&#9679;&#9679;&#9679;"
                                                                        class="placeicon" minlength="3" maxlength="3">
                                                                    <label>CVV</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12"> <input type="submit"
                                                                    value="Pay $ 100" class="btn btn-success placeicon">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="text-center mb-5" id="below-btn"><a
                                                                        href="#">try
                                                                        test card</a></p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}












                                    <div id="menu3" class="tab-pane">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
                                                <div class="text-center mb-5">
                                                    <p>Open your ENKPAY mobile app to scan QR Code</p>
                                                </div>

                                                <div class="row justify-content-center mt-5">
                                                    {!!
                                                    SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate($data)
                                                    !!}


                                                </div>



                                                <div class="row justify-content-center mt-5">

                                                    <input type="submit" id="mybutton" onclick="myRequest()"
                                                        value="I ve sent NGN {{ number_format($payable_amount) }}"
                                                        class="btn btn-success">

                                                </div>




                                                <div class="text-center mt-4"> <span id="spText"></span> </div>


                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <p class="text-center mb-5" id="cancle"><a
                                                                href="decline?trans_id={{ $trans_id }}&key={{ $key }}">
                                                                Cancle
                                                            </a></p>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-md-12 mt-4">
                                                        <p class="text-center mb-5" id="below-btn"><a
                                                                href="https://wa.me/message/2YLDDISL57EXM1"
                                                                target="_blank">
                                                                Chat with us</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'>
        </script>

        <script type='text/javascript'>
            $(document).ready(function(){
        //Menu Toggle Script
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        // For highlighting activated tabs
        $("#tab1").click(function () {
            $(".tabs").removeClass("active1");
            $(".tabs").addClass("bg-light");
            $("#tab1").addClass("active1");
            $("#tab1").removeClass("bg-light");
        });
        $("#tab2").click(function () {
            $(".tabs").removeClass("active1");
            $(".tabs").addClass("bg-light");
            $("#tab2").addClass("active1");
            $("#tab2").removeClass("bg-light");
        });
        $("#tab3").click(function () {
            $(".tabs").removeClass("active1");
            $(".tabs").addClass("bg-light");
            $("#tab3").addClass("active1");
            $("#tab3").removeClass("bg-light");
        });
    });
        </script>

        //Providus
        <script>
            let repeatRequest = true;


        function makeRequest() {
        if (!repeatRequest) {
            return; // Stop the repetition
        }


        document.getElementById("cancle").style.visibility = "none";


        const trx_id = document.getElementById('trx_id').value;
        const p_account_no = document.getElementById('p_account_no').value;


        const url = "{{ url('') }}/verify?trans_id=" + trx_id+"&account_no="+p_account_no;

        fetch(url)
            .then(response => response.json())
            .then(data => {
            // Process the response data
            console.log(data);

            if (data.status === 'pending') {
                // Repeat the request after 5 seconds
                setTimeout(makeRequest, 3000);



            } else if (data.status === 'success') {

              const webhook = document.getElementById('webHook').value;
              const amount = document.getElementById('Amount').value;

               window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                repeatRequest = false; // Stop the repetition
            }
            })
            .catch(error => {
            // Handle any errors that occurred during the request
            console.error(error);
            });
        }



        function startTimer(duration, display) {
            let timer = duration;
            const countdownElement = document.getElementById(display);

            const intervalId = setInterval(function() {
                const minutes = Math.floor(timer / 60);
                const seconds = timer % 60;

                countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;





              if (timer === 0) {
                clearInterval(intervalId);
                countdownElement.textContent = "Have you been debited and payment still not confimed, Refresh this page and click i have paid again.";

              }

              timer--;
            }, 1000);
          }


      const btn =    document.getElementById('requestButtonp');
      btn.addEventListener("click", function(){
        document.getElementById('requestButtonp').classList.add('hidden');

        startTimer(250, 'countdown');
        makeRequest()
      })


        </script>




        //VFD
        <script>
            let repeatRequest = true;


    function makeRequest() {
    if (!repeatRequest) {
        return; // Stop the repetition
    }


    document.getElementById("cancle").style.visibility = "none";


    const trx_id = document.getElementById('trx_id').value;
    const p_account_no = document.getElementById('p_account_no').value;


    const url = "{{ url('') }}/verify?trans_id=" + trx_id+"&account_no="+p_account_no;

    fetch(url)
        .then(response => response.json())
        .then(data => {
        // Process the response data
        console.log(data);

        if (data.status === 'pending') {
            // Repeat the request after 5 seconds
            setTimeout(makeRequest, 3000);



        } else if (data.status === 'success') {

          const webhook = document.getElementById('webHook').value;
          const amount = document.getElementById('Amount').value;

           window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

            repeatRequest = false; // Stop the repetition
        }
        })
        .catch(error => {
        // Handle any errors that occurred during the request
        console.error(error);
        });
    }



    function startTimer(duration, display) {
        let timerv = duration;
        const countdownvElement = document.getElementById(display);

        const intervalId = setInterval(function() {
            const minutes = Math.floor(timer / 60);
            const seconds = timer % 60;

            countdownvElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;





          if (timerv === 0) {
            clearInterval(intervalId);
            countdownvElement.textContent = "If transaction is not confirmed yet,refresh this page and click i have paid again.";

          }

          timerv--;
        }, 1000);
      }


  const btn =    document.getElementById('requestButtonv');
  btn.addEventListener("click", function(){
    document.getElementById('requestButtonv').classList.add('hidden');

    startTimer(300, 'countdownv');
    makeRequest()
  })











        </script>








        <script>
            let rRequest = true;

        function myRequest() {
        if (!rRequest) {
            return; // Stop the repetition
        }

        const button = document.getElementById('mybutton');
        button.disabled = true; // Disable the button during the request
        sText.textContent = 'Please wait while we verify your transaction...'; // Display the status text


        document.getElementById("cancle").style.visibility = "none";



        const trx_id = document.getElementById('trx_id').value;

        const url = "https://web.enkpay.com/verify?trans_id=" + trx_id;

        fetch(url)
            .then(response => response.json())
            .then(data => {
            // Process the response data
            console.log(data);

            if (data.status === 'pending') {
                // Repeat the request after 5 seconds
                setTimeout(myRequest, 5000);



            } else if (data.status === 'success') {

              const webhook = document.getElementById('webHook').value;
              const amount = document.getElementById('Amount').value;

               window.location.href = "https://web.enkpay.com/success?trans_id=" + trx_id;

                rRequest = false; // Stop the repetition
            }
            })
            .catch(error => {
            // Handle any errors that occurred during the request
            console.error(error);
            });
        }





        </script>


    </body>

</html>
