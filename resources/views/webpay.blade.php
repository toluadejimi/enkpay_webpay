<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="{{ url('') }}/public/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>ENKPAY | Make Payment</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotron/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="{{ url('') }}/public/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .accordion-item:first-of-type .accordion-button {
            border-top-left-radius: var(--bs-accordion-inner-border-radius);
            border-top-right-radius: var(--bs-accordion-inner-border-radius);
            background: lavender;
            color: rgb(0, 0, 59);
        }

        .accordion-item:last-of-type .accordion-button.collapsed {
            border-bottom-right-radius: var(--bs-accordion-inner-border-radius);
            border-bottom-left-radius: var(--bs-accordion-inner-border-radius);
            background: lavender;
            color: rgb(0, 0, 59);
        }


        .button-34 {
            background: #5e5df0;
            border-radius: 999px;
            box-shadow: #5e5df0 0 10px 20px -10px;
            box-sizing: border-box;
            color: #ffffff;
            cursor: pointer;
            font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji",
                NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji",
                EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto,
                "Helvetica Neue", "Noto Sans", sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 16px 92px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
        }

        .button-35 {
            background: #5e5df0;
            border-radius: 999px;
            box-shadow: #5e5df0 0 10px 20px -10px;
            box-sizing: border-box;
            color: #ffffff;
            cursor: pointer;
            font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji", NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji", EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 15px 58px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
            margin-top: 20px;
        }



        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .accordion-body {
            padding: var(--bs-accordion-body-padding-y) var(--bs-accordion-body-padding-x);
            background: lavender;
            padding-bottom: 30px;
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        p {
       
                margin-top: 0;
                margin-bottom: 1px;
                font-size: 10px;
                color: #8a8a8a;
                font-weight: 300;
            
        }



        /* === HEADING STYLE #2 === */
        .two h3 {
            text-transform: capitalize;
        }

        .two h3:before {
            position: absolute;
            left: 142%;
            bottom: 29px;
            width: 70px;
            height: 2px;
            content: "";
            background-color: #4051b5;
            margin: 10px;
            font-size: 14px;

        }

        h3, h3 {
            font-size: 12px;
        }

        .two h3 span {
            font-size: 19px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            line-height: 3em;
            padding-left: 0.25em;
            color: rgb(0 0 0) padding-bottom: 10px;
        }

        .text-center {
            font-size: 20px;
            text-align: center;
            font-weight: 500;
        }

        .alt-two h3 {
            text-align: center;
        }

        .alt-two h3:before {
            left: 50%;
            margin-left: -30px;
        }



        .accordion-button {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x);
            font-size: 1rem;
            color: var(--bs-accordion-btn-color);
            text-align: left;
            background-color: lavender;
            color: white;
            border-radius: 0;
            overflow-anchor: none;
        }

        ul {
            list-style: none;
            margin: 0px 0px 0px 0px;
            padding: revert-layer;
        }

        .title,
        .list {
            margin: auto;
            display: flex;
            justify-content: center;
        }

        .stylel {
            list-style-type: none;
            margin-right: 50px;
        }

        .title {
            color: #cccccc;
        }

        .title:hover {
            color: #040650;
            cursor: default;
        }

        .list {}

        li {
            margin: 7px;
            background-color: #f3f3f3;
            color: black;
            width: 257px;
            height: 42px;
            text-align: center;
            padding: 15px;
            padding-top: 13px;
            border-radius: 18px;
            font-size: 13px;
        }

        li:hover {
            background-color: #0b0139;
            color: white;
            cursor: pointer;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
        }


        .button-38 {
            background: #ea0341;
            border-radius: 999px;
            box-shadow: #9f0126 0 10px 20px -10px;
            box-sizing: border-box;
            color: #ffffff;
            cursor: pointer;
            font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji",
                NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji",
                EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto,
                "Helvetica Neue", "Noto Sans", sans-serif;
            font-size: 14px;
            font-weight: 500;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 16px 50px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
        }
        
        .button-39 {
            background: #ff8604;
            border-radius: 999px;
            box-shadow: #855901 0 10px 20px -10px;
            box-sizing: border-box;
            color: #ffffff;
            cursor: pointer;
            font-family: Inter, Helvetica, "Apple Color Emoji", "Segoe UI Emoji",
                NotoColorEmoji, "Noto Color Emoji", "Segoe UI Symbol", "Android Emoji",
                EmojiSymbols, -apple-system, system-ui, "Segoe UI", Roboto,
                "Helvetica Neue", "Noto Sans", sans-serif;
            font-size: 14px;
            font-weight: 500;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 16px 50px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
        }
        
    </style>




    <script type="text/javascript">
        $(window).on('load', function() {
            $('#warning').modal('show');
        });
    </script>


    <style>
        .modal {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: none;
            overflow: hidden;
            outline: 0;
            background-color: rgb(0, 0, 0);

        }

        .modal-backdrop.show {
            opacity: 10%;
        }

    </style>

  





    <style>
        #button2 {
            float: right;
            line-height: 12px;
            width: 18px;
            font-size: 8pt;
            font-family: tahoma;
            margin-top: 1px;
            margin-right: 1px;
        }


        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(0, 0, 0);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            opacity: 1;
            transition: opacity 1s ease;
        }

        .loader.active {
            opacity: 0;
            pointer-events: none;
            transition: opacity 1s ease;
        }

        .spinner {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        .content {
            display: none;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
        }

        h5 {
            color: #030200;
            font-size: 20px;
        }

        p {
            color: #737373;
            font-size: 12px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: auto;
        }

        body {
            font-family: 'Poppins';
        }
    </style>


    <script>
        setTimeout(function() {
            document.querySelector('.loader').classList.add('active');
            document.querySelector('.content').style.display = 'block';
        }, 5000); // 3 seconds
    </script>


</head>

<body style="">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>









        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>


    <main>


        <div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">



                    <div class="card border-0">

                        <div class="card-body border-0">


                            <img class="center" src="https://pngimg.com/uploads/bank/bank_PNG13.png"
                                height="10" width="20">

                            <strong>
                                <p class="text-center text-re text-muted my-2 p-2">Pay <br> ₦{{
                                number_format($payable_amount, 2) }}</p>

                            </strong>

                            <div class="text-center my-3 ">
                                <h5><strong>Before you make this transfer</strong></h5>
                            </div>

                            <div class="text-center container-fluid alert alert-warning my-2 p-4" role="alert">
                                <h6><i class="fa fa-check-circle"> Transfer only exact amount</i></h6>
                                <p class="text-small">Do not transfer an incorret amount</p>
                                <hr>

                                <h6><i class="fa fa-check-circle"> Do not save or resuse the account</i>
                                </h6>
                                <p class="text-small">Only Transfer to the account details provided</p>

                                <hr>

                                <button type="button" class="btn btn-primary btn-lg btn-block my-3" data-bs-dismiss="modal">I Understand</button>

                             

                            </div>




                        </div>

                      


                    </div>





                </div>


            </div>


         

        </div>

      
    </div>



        <div class="loader">
            <div class="spinner"></div>
        </div>
    

        <div class="container py-4 d-flex align-items-center justify-content-center">



            <div class="card border-0 my-3 p-md-5 p-xl-5 p-lg-5 p-sm-3 shadow-lg p-3 mb-3 bg-body-tertiary rounded col-xl-6 col-md-12 col-sm-12 text-center">



                <p class="text-small text-danger mt-4">Do not refresh payment page</p>



                <p class="text-small text-warning mt-4 mb-1">Payment Expires in</p>
                <div class="mb-3" id="timers">15:00</div>



                <div class="card shadow-lg p-3 mb-3 bg-body-tertiary rounded mb-4 border-0">
                    <div class="card-body">

                        <div class="two alt-two">
                            <h3>Amount to Pay<br>
                                <span>₦{{ number_format($payable_amount, 2) }}</span>
                            </h3>
                        </div>
                    </div>
                </div>

                <p class="text-small mt-3 mb-3">Choose your prferred payment method</p>

                <div class="accordion border-0" id="accordionExample">

                    @if($card == 1)
                    <div class="accordion-item border-0">
                        <h6 class="accordion-header" style="bbackground: #070079;">
                            <button class="accordion-button collapsed" style="bbackground: #070079;" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                                <i class="bi bi-credit-card-2-back-fill"></i>|
                                Pay With Card

                            </button>
                            </h2>
                        </h6>

                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body mb-3">
                            <a style="text-decoration:none " href="{{ $pre_link }}" class="button-34"> <i
                                    class="bi bi-credit-card-2-back-fill"> Pay Now </a></i>
                        </div>
                    </div>
                    @endif



                    @if($transfer == 1 && $bank == 1)
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header text-dark" >
                            <button class="accordion-button collapsed border-0 text-dark" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bank" viewBox="0 0 16 16">
                                    <path
                                        d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />
                                </svg>


                                | Pay with Transfer


                            </button>
                        </h2>


                        <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">


                                <div class="list">
                                    <ul class="stylel">
                                        <p>BANK</p>
                                        <li>PROVIDUS BANK</li>
                                        <p>ACCOUNT NO</p>
                                        <li>{{$p_account_no ?? "Not Available"}}</li>
                                        <input hidden value="{{ $p_account_no }}" id="p_account_no">

                                        <p>ACCOUNT NAME</p>
                                        <li>{{$p_account_name ?? "Not Available"}}</li>


                                    </ul>

                                    <form onsubmit="event.preventDefault()">

                                        <input type="text" id="trx_id" hidden value="{{ $trans_id}}">

                                        <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                        <input type="text" id="Amount" hidden value="{{ $amount}}">

                                    </form>


                                </div>



                                <div>

                                    <button data-toggle="modal" data-target="#exampleModalCenter" type="button"
                                        id="requestButtonp" class="button-35">I
                                        ve sent ₦{{
                                        number_format($payable_amount)}}</button>

                                </div>



                            </div>
                        </div>
                    </div>
                    @endif


                    <div class="my-3">
                        <div class="text-center">
                            <hp style="color:rgb(232, 3, 106);" id="timer"><span id="countdown"></span></p>
                        </div>

                    </div>


                    <div class="mt-2">
                        <div class="text-center">
                            <p style="color:rrgb(11, 1, 63)" id="message"></p>
                        </div>

                    </div>



                    <div class="mt-4 mb-4">

                        <a style="text-decoration:none" href="decline?trans_id={{ $trans_id }}&key={{ $key }}"
                            class="button-38 my-3" aria-label="Close">Cancle Transaction</a>

                       

                    </div>


                    <div class="mt-4 mb-4">

                     
                            <a style="text-decoration:none" href="#" class="button-39 my-3" aria-label="Close">Report
                                Transaction</a>


                    </div>




                </div>

            </div>


        </div>


    </main>
    <script src="{{ url('') }}/public/assets/dist/js/bootstrap.bundle.min.js"></script>




    <script>
        let repeatRequest = true;


        function makeRequest() {
        if (!repeatRequest) {
            return; // Stop the repetition
        }




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
                countdownElement.textContent = "Have you been debited and payment still not confimed, Return to marchant website to resolve or report transaction";

              }

              timer--;
            }, 1000);
        }

        function startMessage(){

            var messageDisplay = document.getElementById('message');
            messageDisplay.innerHTML = "Please wait while we confirm your payment";

        }


      const btn =    document.getElementById('requestButtonp');
      btn.addEventListener("click", function(){
        const btn = document.getElementById('requestButtonp');

        startTimer(1200, 'countdown');
        makeRequest();
        startMessage();
        btn.disabled = true;

      })


    </script>

   

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

    startTimer(2500, 'countdownv');
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


    <script>
        // Set the time limit in seconds
        var customTimerLimitInSeconds = 600; // 10 minutes
    
        // Function to start the custom timer and redirect after the time limit
        function startCustomTimer() {
            var countdown = customTimerLimitInSeconds;
            var timerDisplay = document.getElementById('timers');
    
            // Update the timer display and check if the time is up
            function updateTimer() {
                var minutes = Math.floor(countdown / 60);
                var seconds = countdown % 60;
    
                // Display the time in HH:MM format
                timerDisplay.innerHTML = formatTime(minutes) + ':' + formatTime(seconds);
    
                if (countdown === 0) {
                    // Redirect to the specified link after the timer reaches zero
                    window.location.href = '{{ url('') }}/decline?trans_id={{ $trans_id }}&key={{ $key }}';
                } else {
                    countdown--;
                    setTimeout(updateTimer, 1000); // Update every 1 second
                }
            }
    
            // Format time with leading zeros
            function formatTime(time) {
                return time < 10 ? '0' + time : time;
            }
    
            // Start the custom timer
            updateTimer();
        }
    
        // Call the startCustomTimer function when the page loads
        window.onload = startCustomTimer;
    </script>
    





</body>



</html>