<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>ENKPAY | WEBPAY</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        body {
            font-family: sans-serif;
            display: grid;
            height: 100vh;
            place-items: center;
        }

        .base-timer {
            position: relative;
            width: 300px;
            height: 300px;
        }

        .base-timer__svg {
            transform: scaleX(-1);
        }

        .base-timer__circle {
            fill: none;
            stroke: none;
        }

        .base-timer__path-elapsed {
            stroke-width: 7px;
            stroke: grey;
        }

        .base-timer__path-remaining {
            stroke-width: 7px;
            stroke-linecap: round;
            transform: rotate(90deg);
            transform-origin: center;
            transition: 1s linear all;
            fill-rule: nonzero;
            stroke: currentColor;
        }

        .base-timer__path-remaining.green {
            color: rgb(65, 184, 131);
        }

        .base-timer__path-remaining.orange {
            color: orange;
        }

        .base-timer__path-remaining.red {
            color: red;
        }

        .base-timer__label {
            position: absolute;
            width: 300px;
            height: 300px;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }


        ::-webkit-scrollbar {
            width: 8px;
        }



        .btn-success {
            color: #fff;
            background-color: #160456;
            border-color: #f6f7f6;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #000000;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #ffffff;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #160456;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #ffffff;
        }

        body {
            background: #000000
        }

        .rounded {
            border-radius: 2rem
        }

        .nav-pills .nav-link {
            color: #555
        }

        .nav-pills .nav-link.active {
            color: white
        }

        input[type="radio"] {
            margin-right: 5px
        }

        .bold {
            font-weight: bold
        }

        .input_copy_wrapper {
            width: 450px;
            padding: 50px;
            margin: 0 auto;
        }

        .input_copy {
            padding: 15px 25px;
            background: #eee;
            border: 2px solid #aaa;
            color: #aaa;
            font-size: .8em;
        }

        .input_copy .icon {
            display: block;
            max-width: 25px;
            cursor: pointer;
            float: right;
        }

        .input_copy .icon img {
            max-width: 25px;
        }

        .input_copy .txt {
            width: 80%;
            display: inline-block;
            overflow: hidden;
        }


        /* click animation */

        .flashBG {
            animation-name: flash;
            animation-timing-function: ease-out;
            animation-duration: 1s;
        }

        @keyframes flash {
            0% {
                background: #28a745;
            }

            100% {
                background: transparent;
            }
        }
    </style>

</head>

<body>

    <body className='snippet-body'>
        <div class="container py-5">
            <!-- For demo purpose -->
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6"></h1>
                </div>
            </div> <!-- End -->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card ">
                        <div class="card-header">

                            <div class="row pt-3 my-3" id="border-btm">
                                <div class="col-4">
                                    <img src="{{ $logo_url ?? 'https://enkpay.com/asset/wp-content/uploads/sites/110/2022/11/logo-black.png' }}"
                                        height="60" , width="65">
                                </div>
                                <div class="col-8">
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 display-6 text-right">{{
                                                $email ??
                                                "no_email@enkpay.com"
                                                }}</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 text-right"><strong class="top-highlight">NGN
                                                    {{
                                                    $payable_amount }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white shadow-sm pt-5 pl-2 pr-2 pb-2">

                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                    <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                            class="nav-link active "> <i class="fas fa-home mr-2"></i>Pay
                                            With Bank
                                            Transfer
                                        </a> </li>
                                    <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link ">
                                            <i class="fa-qrcode mr-2"></i>
                                            Pay with QR CODE </a> </li>

                                </ul>
                            </div> <!-- End -->
                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->

                                <div id="credit-card" class="tab-pane fade show active pt-3">

                                    <div id="menu4" class="tab-pane in active">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h5 class="mt-0 mb-4 text-center">Pay
                                                        to this bank details
                                                        below
                                                    </h5>

                                                    {{-- <p class="mt-0 my-5 text-center text-danger">
                                                        Pay exactly NGN
                                                        {{number_format($payable_amount
                                                        ?? "0.00") }}
                                                        <br>to avoid delay
                                                        or failed
                                                        transaction.
                                                    </p> --}}

                                                    <div class="mt-0 mb-4 text-center">
                                                        <span class="text-muted">BANK
                                                            NAME</span>
                                                        <div>
                                                            <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple123/v4/0f/7f/1e/0f7f1eac-e93f-0517-2e7b-23c6ef9d920e/AppIcon-0-1x_U007emarketing-0-0-GLES2_U002c0-512MB-sRGB-0-0-0-85-220-0-0-0-5.png/1200x600wa.png"
                                                                height="70" width="160">
                                                            <h6>PROVIDUS
                                                                BANK</h6>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <form onsubmit="event.preventDefault()">

                                                        <div class="row">
                                                            <div class="col-6 mt-3 text-center">
                                                                <span class="text-muted">Account
                                                                    Number</span>
                                                                <div>
                                                                    <h6>{{
                                                                        $p_account_no
                                                                        ??
                                                                        "Not Available"
                                                                        }}</h6>
                                                                    <input hidden value="{{ $p_account_no }}"
                                                                        id="p_account_no">

                                                                </div>
                                                            </div>

                                                            <div class="col-6 mt-3 text-center">
                                                                <span class="text-muted">Account
                                                                    Name</span>
                                                                <div>
                                                                    <h6>{{$p_account_name
                                                                        ??
                                                                        "Not Available"}}</h6>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-12 mt-3 text-center">
                                                                <span class="text-muted">Trx
                                                                    Ref</span>
                                                                <div>
                                                                    <h5>{{
                                                                        $trans_id
                                                                        ??
                                                                        "Not Available"
                                                                        }}</h5>
                                                                    <input type="text" id="trx_id" hidden
                                                                        value="{{ $trans_id}}">

                                                                    <input type="text" id="webHook" hidden
                                                                        value="{{ $webhook}}">

                                                                    <input type="text" id="Amount" hidden
                                                                        value="{{ $amount}}">

                                                                </div>
                                                            </div>

                                                            {{-- <div class="col-6 mt-3 text-center">
                                                                <span class="text-muted">Trx
                                                                    Time
                                                                    Remaining</span>
                                                                <div>
                                                                    <h5 style="color:rgb(255, 0, 144);"><span
                                                                            class="nav-pills rounded"
                                                                            id="timers"></span></h5>
                                                                </div>
                                                            </div> --}}

                                                            {{-- <script>
                                                                var targetMinutes = 15000;

                                                                var targetTime = targetMinutes * 60 * 1000;
                                                                var trans = "{{ $trans_id }}";
                                                                var key = {{ $key }};



                                                                function redirect() {
                                                                window.location.href = "https://web.enkpay.com/decline?trans_id="+trans+"&key="+key;
                                                                }

                                                                function countdown() {
                                                                targetTime -= 150000;

                                                                if (targetTime <= 0) {
                                                                    clearInterval(timerInterval); // Stop the countdown
                                                                    redirect(); // Redirect to the specified link
                                                                }

                                                                // Calculate remaining minutes and seconds
                                                                var minutes = Math.floor(targetTime / 60000);
                                                                var seconds = Math.floor((targetTime % 60000) / 1000);

                                                                // Display the countdown on the page
                                                                document.getElementById('timers').innerHTML = minutes + 'secs ';
                                                                }

                                                                var timerInterval = setInterval(countdown, 1000);
                                                            </script> --}}

                                                        </div>

                                                        <hr>

                                                        <div id="app"></div>

                                                        <div class="d-grid gap-2 text-center my-5">
                                                            <button data-toggle="modal"
                                                                data-target="#exampleModalCenter" type="button"
                                                                id="requestButtonp" class="btn btn-success btn-lg">I
                                                                ve sent ₦{{
                                                                number_format($payable_amount)}}</button>

                                                        </div>



                                                        <div id="app"></div>

                                                        <div class="d-grid gap-2 text-center my-5">
                                                            <a class="btn btn-outline-danger" href="decline?trans_id={{ $trans_id }}&key={{ $key }}">Cancle Transaction</a>
                                                        </div>



                                                        {{-- <div class="d-grid gap-2 text-center mb-5">
                                                            <a href="decline?trans_id={{ $trans_id }}&key={{ $key }}"
                                                                class="btn btn-danger" role="button"
                                                                data-bs-toggle="button">Cancle
                                                                Transaction</a>
                                                        </div> --}}

                                                        {{-- <div class="row">
                                                            <div class="col-md-12 mt-4">
                                                                <p class="text-center mb-5" id="below-btn"><a
                                                                        style="color:rgb(255, 0, 98);"
                                                                        href="#"
                                                                        target="_blank">Report
                                                                        Transaction</a></p>
                                                            </div>
                                                        </div> --}}

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                    </div>



                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" data-keyboard="false"
                                        data-backdrop="static" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                                    <a class="close"
                                                        href="decline?trans_id={{ $trans_id }}&key={{ $key }}"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </a>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="d-flex justify-content-center">
                                                        <h6 class="mt-1">Payment
                                                            Processing</h6>

                                                    </div>

                                                    <div class="d-flex justify-content-center p-4">
                                                        <script
                                                            src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs"
                                                            type="module"></script>
                                                        <dotlottie-player
                                                            src="https://lottie.host/0af67ec1-fef7-4a93-bc78-8c7df7ce435b/79p7ffiBfn.json"
                                                            background="transparent" speed="2"
                                                            style="width: 100; height: 100" direction="1" mode="normal"
                                                            loop autoplay></dotlottie-player>
                                                    </div>

                                                    <div class="d-flex justify-content-center">
                                                        <div class="text-center">
                                                            <hp style="color:rgb(255, 0, 98);" id="timer"> <span
                                                                    id="countdown"></span></p>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">

                                                    <a href="#"
                                                        class="btn btn-danger">Report Transaction</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- End -->
                                <!-- Paypal info -->
                                <div id="paypal" class="tab-pane fade pt-3">

                                    <div id="menu3" class="tab-pane">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <h3 class="mt-0 mb-4 text-center">Scan
                                                    the QR code to pay</h3>
                                                <div class="text-center mb-5">
                                                    <p>Open your ENKPAY
                                                        mobile app to scan
                                                        QR Code</p>
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

                                                <div class="row justify-content-center mt-5">

                                                    <input type="submit" id="mybutton" onclick="myRequest()"
                                                        value="I ve sent NGN {{ number_format($payable_amount) }}"
                                                        class="btn btn-success">

                                                </div>

                                                <div class="text-center mt-4">
                                                    <span id="spText"></span>
                                                </div>
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

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div id="test" class="tab-pane fade pt-3">

                                    <div id="menu4" class="tab-pane">
                                        <div class="row justify-content-center">
                                            <div class="col-11">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center my-4">

                <p class="text-white">Powered by | <img
                        src="https://enkpay.com/asset/wp-content/uploads/sites/110/2022/11/fintex-logo-white-2.png"
                        height="25" width="150" </p>

            </div>
        </div>
        <script type='text/javascript'
            src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript'>
            $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
        </script>
        <script type='text/javascript'>
            var myLink = document.querySelector('a[href="#"]');
                myLink.addEventListener('click', function (e) {
                    e.preventDefault();
                });
        </script>

    </body>

    <script>
        function myFunction() {
          // Get the text field
          var copyText = document.getElementById("p_account_no");

          // Select the text field
          copyText.select();
          copyText.setSelectionRange(0, 99999); // For mobile devices

          // Copy the text inside the text field
          navigator.clipboard.writeText(copyText.value);

          // Alert the copied text
          alert("Copied the text: " + copyText.value);
        }
    </script>

    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'>
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
                countdownElement.textContent = "Have you been debited and payment still not confimed, Return to marchant website to resolve or report transaction";

              }

              timer--;
            }, 1000);
          }


      const btn =    document.getElementById('requestButtonp');
      btn.addEventListener("click", function(){
        document.getElementById('requestButtonp').classList.add('hidden');

        startTimer(1200, 'countdown');
        makeRequest()
      })


    </script>

    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }

         var addrsField = $('.input_copy .txt');
        addrsField.text(window.location);
        $('.input_copy .icon').click(function() {
                copyToClipboard('.input_copy .txt');
                addrsField.addClass('flashBG')
                  .delay('1000').queue(function(){
                    addrsField.removeClass('flashBG').dequeue();
                });
            });


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

</body>

</html>
