<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Pay</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css"/>
    <link rel="manifest" href="{{url('')}}/public/assets/assets/manifest.json"
          data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        @keyframes pulseAnim {
            0% {
                transform: scale(1);
                opacity: 0.7
            }
            50% {
                transform: scale(1.2);
                opacity: 0.4
            }
            100% {
                transform: scale(1);
                opacity: 0.7
            }
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #6610f2;

            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            /*  box-shadow: 2px 2px 3px #999; */
            z-index: 100;


        }

        .pulse {
            z-index: 0;
            position: fixed;
            content: '';
            bottom: 35px;
            right: 35px;
            width: 70px;
            height: 70px;
            border-radius: 100%;
            background-color: #6610f2;
            animation-name: pulseAnim;
            animation-duration: 3s;
            animation-iteration-count: infinite;
        }

        .my-float {
            margin-top: 16px;

        }


        /* Styles for lazy loader */
        .loader2 {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto; /* Center loader */
            display: none; /* Initially hidden */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }


    </style>


</head>

<body class="bg_surface_color">

<!-- preloade -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->


<div class="modal fade" id="warning7">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="heading">
                <h2>Privacy</h2>
                <p class="mt-1 fw_3">
                    A mobile app privacy policy is a legal statement that must be clear, conspicuous, and consented to
                    by all users. It must disclose how a mobile app gathers, stores, and uses the personally
                    identifiable information it collects from its users.
                    A mobile privacy app is developed and presented to users so that mobile app developers stay
                    compliant with state, federal, and international laws. As a result, they fulfill the legal
                    requirement to safeguard user privacy while protecting the company itself from legal challenges.

                </p>
                <h2 class="mt-3">Authorized Users</h2>
                <p class="fw-3">
                    A mobile app privacy policy is a legal statement that must be clear, conspicuous, and consented to
                    by all users. It must disclose how a mobile app gathers, stores, and uses the personally
                    identifiable information it collects from its users.
                </p>
                <div class="group-cb mt-3 align-items-center">
                    <div class="cb">
                        <input type="checkbox" class="tf-checkbox st1" checked>
                    </div>
                    <span class="fw_3">I agree to the Term of sevice and Privacy policyy</span>
                </div>

            </div>
            <div class="bottom mt-5">
                <a href="home.html#" class="tf-btn accent large" data-bs-dismiss="modal">I Accept</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="warning" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="heading">
                <h2 class="text-center text-danger my-2">Terms and Conditions</h2>
                <h6 class="text-muted text-center mb-3">Please read carefully</h6>

                <div class="card border-0 my-2 mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body border-0">
                        <h4 class="text-danger text-center">
                            Add valid Reference to payment,<br> or you will loose your money
                        </h4>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-3">
                    <a href="https://www.youtube.com/shorts/Zn_dALbDhSI" target="_blank" class="btn btn-danger"> <i
                            class="fa fa-play"> </i> Watch how to add refrence to payment</a>
                </div>


                <div class="group-cb mt-3 d-flex justify-content-center">
                    <div class="cb">
                        <input type="checkbox" class="tf-checkbox st1" checked>
                    </div>
                    <span class="fw_3 mb-4">I agree to the Term of sevice and conditions</span>
                </div>

            </div>
            <div class="bottom mt-5">
                <a href="#" class="tf-btn accent large" data-bs-dismiss="modal">I Accept</a>
            </div>
        </div>
    </div>
</div>


<div class="app-header st1">
    <div class="tf-container">
        <div class="tf-topbar d-flex justify-content-center align-items-center">
            <a href="25_payment-source.html%3F.html#" class="back-btn"><i class="icon-left white_color"></i></a>
            <h3 class="white_color">Amount to Pay</h3>
        </div>
    </div>
</div>


<div class="card-secton transfer-section">
    <div class="tf-container">
        <div class="tf-balance-box transfer-amount">
            <div class="top mt-1">
                <p class="text-small text-danger my-2">Do not refresh payment page</p>

                <svg class="my-2" width="38" height="38" viewBox="0 0 49 53" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0 5.53874C0 2.38739 2.436 0 5.25 0H43.75C46.564 0 49 2.38739 49 5.53874V26.9297C49 30.0811 46.564 32.4685 43.75 32.4685H5.25C2.436 32.4685 0 30.0811 0 26.9297V5.53874ZM31.5 16.2342C31.5 18.2604 30.7625 20.2036 29.4497 21.6363C28.137 23.069 26.3565 23.8739 24.5 23.8739C22.6435 23.8739 20.863 23.069 19.5503 21.6363C18.2375 20.2036 17.5 18.2604 17.5 16.2342C17.5 14.2081 18.2375 12.2649 19.5503 10.8322C20.863 9.39948 22.6435 8.59459 24.5 8.59459C26.3565 8.59459 28.137 9.39948 29.4497 10.8322C30.7625 12.2649 31.5 14.2081 31.5 16.2342ZM12.25 17.1892C12.25 16.813 12.1821 16.4404 12.0502 16.0929C11.9183 15.7453 11.7249 15.4295 11.4812 15.1634C11.2374 14.8974 10.948 14.6864 10.6295 14.5424C10.3111 14.3984 9.96972 14.3243 9.625 14.3243C9.28028 14.3243 8.93894 14.3984 8.62046 14.5424C8.30198 14.6864 8.0126 14.8974 7.76884 15.1634C7.52509 15.4295 7.33173 15.7453 7.19982 16.0929C7.0679 16.4404 7 16.813 7 17.1892C7 17.949 7.27656 18.6777 7.76884 19.215C8.26113 19.7522 8.92881 20.0541 9.625 20.0541C10.3212 20.0541 10.9889 19.7522 11.4812 19.215C11.9734 18.6777 12.25 17.949 12.25 17.1892ZM39.375 14.3243C40.0712 14.3243 40.7389 14.6262 41.2312 15.1634C41.7234 15.7007 42 16.4294 42 17.1892C42 17.949 41.7234 18.6777 41.2312 19.215C40.7389 19.7522 40.0712 20.0541 39.375 20.0541C38.6788 20.0541 38.0111 19.7522 37.5188 19.215C37.0266 18.6777 36.75 17.949 36.75 17.1892C36.75 16.4294 37.0266 15.7007 37.5188 15.1634C38.0111 14.6262 38.6788 14.3243 39.375 14.3243ZM17.9375 40.1081C17.9375 39.4749 17.707 38.8677 17.2968 38.42C16.8866 37.9722 16.3302 37.7207 15.75 37.7207C15.1698 37.7207 14.6134 37.9722 14.2032 38.42C13.793 38.8677 13.5625 39.4749 13.5625 40.1081V47.7477C13.5625 48.3809 13.793 48.9882 14.2032 49.4359C14.6134 49.8836 15.1698 50.1351 15.75 50.1351C16.3302 50.1351 16.8866 49.8836 17.2968 49.4359C17.707 48.9882 17.9375 48.3809 17.9375 47.7477V40.1081ZM33.25 37.7207C34.4575 37.7207 35.4375 38.7903 35.4375 40.1081V47.7477C35.4375 48.0613 35.3809 48.3717 35.271 48.6614C35.1611 48.951 34.9999 49.2142 34.7968 49.4359C34.5937 49.6576 34.3525 49.8334 34.0871 49.9534C33.8217 50.0734 33.5373 50.1351 33.25 50.1351C32.9627 50.1351 32.6783 50.0734 32.4129 49.9534C32.1475 49.8334 31.9063 49.6576 31.7032 49.4359C31.5001 49.2142 31.3389 48.951 31.229 48.6614C31.1191 48.3717 31.0625 48.0613 31.0625 47.7477V40.1081C31.0625 38.7903 32.0425 37.7207 33.25 37.7207ZM24.5 40.5856C25.7075 40.5856 26.6875 41.6551 26.6875 42.973V50.6126C26.6875 51.2458 26.457 51.853 26.0468 52.3008C25.6366 52.7485 25.0802 53 24.5 53C23.9198 53 23.3634 52.7485 22.9532 52.3008C22.543 51.853 22.3125 51.2458 22.3125 50.6126V42.973C22.3125 41.6551 23.2925 40.5856 24.5 40.5856Z"
                          fill="#092374"/>
                </svg>


                <h1>₦{{ number_format($payable_amount, 2) }}</h1>
                <h4 class="secondary_color text-center fw_4 mb-3">Make sure you send exact amount</h4>
                <hr>
                <h4 class="text-danger text-center fw_4 mb-3">PLEASE ALWAYS ADD REFERENCE</h4>
                <a class="d-flex justify-content-center btn btn-primary my-3"
                   href="https://www.youtube.com/shorts/Zn_dALbDhSI" target="_blank">Watch how to make payment</a>


            </div>
            <div class="bottom d-flex justify-content-between align-items-center">
                <p class="text-small text-warning">Payment Expires in</p>
                <h4>
                    <div class="" id="timers">15:00</div>
                </h4>
            </div>

        </div>

    </div>
</div>


<div class="my-4 d-flex justify-content-center">
    <h4>Choose your preferred payment method
    </h4>
</div>


<div class="transfer-card">


    <div class="tf-container">

        @if($boomzy ==  1)
            @if($ninepsb == 1)

                <div id=""
                     class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                    <div class="accordion-item border-0">
                        <div class="inner d-flex align-items-center">
                            <svg width="140" height="51" viewBox="0 0 238 102" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="238" height="102" fill="url(#pattern0_441_411)"/>
                                <defs>
                                    <pattern id="pattern0_441_411" patternContentUnits="objectBoundingBox" width="1"
                                             height="1">
                                        <use xlink:href="#image0_441_411"
                                             transform="matrix(0.00420168 0 0 0.00980392 -0.0252101 0)"/>
                                    </pattern>
                                    <image id="image0_441_411" width="342" height="102"
                                           xlink:href="data:image/png;base64,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"/>
                                </defs>
                            </svg>


                            <div class="content">
                                <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#ninepsb"
                                       aria-expanded="false" aria-controls="ninepsb" class="fw_6">Pay Using 9
                                        PaymentSB</a></h4>
                                <p>40 seconds confirmation (recommended)</p>
                            </div>
                        </div>


                        <div id="ninepsb" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">


                            <div class="tf-container my-2">
                                <a id="openModalBtnninepsb" class="tf-btn success large">Pay To 9 PaymentSB</a>
                            </div>

                            <div id="myModalninepsb" class="modal">
                                <div class="modal-content">


                                    <span class="close my-2">&times;</span>


                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center">
                                            <div class="row">

                                                <div class="text-center">
                                                    <svg width="172" height="75" viewBox="0 0 172 75" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect width="150" height="48" fill="url(#pattern0_441_411)"/>
                                                        <defs>
                                                            <pattern id="pattern0_441_411"
                                                                     patternContentUnits="objectBoundingBox" width="1"
                                                                     height="1">
                                                                <use xlink:href="#image0_441_411"
                                                                     transform="matrix(0.00420168 0 0 0.00980392 -0.0252101 0)"/>
                                                            </pattern>
                                                            <image id="image0_441_411" width="342" height="102"
                                                                   xlink:href="data:image/png;base64,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"/>
                                                        </defs>
                                                    </svg>
                                                </div>

                                                @if($ninepsb_acct == null)

                                                    <div
                                                        style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                        class="modal fade" id="myModalninepsbshow"
                                                        data-backdrop="static"
                                                        data-keyboard="false">
                                                        <div class="modal-dialog "
                                                             style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                            <div class="modal-content border-0"
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                <div class="modal-body p-5 my-4">
                                                                    <div class="tf-container p-5">

                                                                        <div class="payment-loader mb-4">

                                                                            <div class="text-center">
                                                                                <p style="color:rgb(232, 3, 106);"
                                                                                   id="timer"><span
                                                                                        id="countdown"></span></p>
                                                                            </div>


                                                                            <div class="pad mt-3">
                                                                                <div class="chip"></div>
                                                                                <div class="line line1"></div>
                                                                                <div class="line line2"></div>
                                                                            </div>

                                                                            <div class="loader-text">
                                                                                <p class="text-center mb-4"
                                                                                   style="color:rrgb(11, 1, 63)"
                                                                                   id="messageninepsb"></p>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="tf-container my-5">
                                                                    <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                       class="tf-btn danger large mt-5">Cancel
                                                                        Transaction</a>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="info-container">
                                                        <!-- Placeholder for fetched information -->
                                                    </div>

                                                    <button onclick="fetchInfo()">Fetch Information</button>
                                                    <div class="loader2" id="loader2"></div>

                                                    <script>
                                                        let fetchTimeout;

                                                        function fetchInfo() {
                                                            // Display the loader
                                                            document.getElementById('loader2').style.display = 'block';

                                                            // Reset timeout if retrying
                                                            clearTimeout(fetchTimeout);

                                                            // Simulating a POST request (replace with actual API call)
                                                            fetch('{{url('')}}/api/get-account', {
                                                                //  fetch('http://127.0.0.1:8001/api/create-account-dymamic', {
                                                                method: 'POST',
                                                                headers: {
                                                                    'Content-Type': 'application/json'
                                                                },
                                                                body: JSON.stringify({
                                                                    userId: 95,
                                                                    description: "Payment",
                                                                    name: "CHECKOUT",
                                                                    amount: {{$payable_amount}}

                                                                }) // Replace with actual data to send
                                                            })
                                                                .then(response => {
                                                                    if (!response.ok) {
                                                                        throw new Error('Network response was not ok');
                                                                    }
                                                                    return response.json();
                                                                })

                                                                .then(data => {
                                                                    console.log(data.result.account_name);
                                                                    console.log(data.result.account_no);
                                                                    const accountNo = data.result.account_no;
                                                                    const accountName = data.result.account_name;


                                                                    fetch('{{ url('') }}/api/ninepsb-transfer-transaction', {
                                                                        method: 'POST',
                                                                        headers: {
                                                                            'Content-Type': 'application/json'
                                                                        },
                                                                        body: JSON.stringify({
                                                                            ref: '{{ $transref }}',

                                                                        }) // Replace with actual data to send
                                                                    })
                                                                        .then(response => {
                                                                            if (!response.ok) {
                                                                                throw new Error('Network response was not ok');
                                                                            }
                                                                            return response.json(); // Parse the JSON from the response
                                                                        })
                                                                        .then(data => {
                                                                            console.log('POST request successful:', data);
                                                                            // Handle the data returned by the server
                                                                        })
                                                                        .catch(error => {
                                                                            console.error('Error during POST request:', error);
                                                                            // Handle errors during the POST request
                                                                        })


                                                                    // Constructing HTML to display fetched information
                                                                    const infoHTML = `

<hr>
<div class = "row mt-3">
                                                        <div class="col">
                                                            <div class="d-flex justify-content-start p-1">
                                                                <h5 class="text-start text-muted">
                                                                    ACCT NO
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">
                                                                <h5 style="border-right: 4px; font-size: 15px;"

                                                                    id="text_element">${accountNo}</h5>
                                                                <input hidden
                                                                       value="${accountNo}"
                                                                       id="ninepsb_account_no">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboard('text_element')">

                                                                </i>




                                            </div>
                                        </div>
</div>
<hr>
<div class = "row mt-3">
                                                        <div class="col">
                                                            <div class="d-flex justify-content-start p-1">
                                                                <h5 class="text-start text-muted">
                                                                    ACCT NAME
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">
                                                                <h5 style="border-right: 4px; font-size: 15px;"

                                                                    id="text_element">${accountName}</h5>
                                                                <input hidden
                                                                       value="${accountName}"
                                                                       id="ninepsb_account_name">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboard('text_element')">

                                                                </i>




                                            </div>
                                        </div>
</div>

                                                    <form action="/verifypsb" method="POST">
                                                    @csrf

                                                                    <input type="text" id="trx_id" name="trx_id" hidden value="{{ $trans_id}}">

                                                        <input type="text" id="webHook" name="webhook" hidden value="{{ $webhook}}">

                                                        <input type="text" id="Amount" hidden name="amount" value="{{ $amount }}">

                                                        <input type="text" id="Amount" hidden name="account_no" value="${accountNo}">

                                                        <!-- Button trigger modal -->

                                                        <button class="tf-btn accent large my-3 request-btn"
                                                                id="requestninepsb">I
                                                            ve sent ₦{{ number_format($payable_amount )}},</button>


                                                                </form>


`;

                                                                    // Display fetched information in info-container
                                                                    const infoContainer = document.getElementById('info-container');
                                                                    infoContainer.innerHTML = infoHTML;

                                                                    // Hide the loader after displaying information
                                                                    document.getElementById('loader2').style.display = 'none';
                                                                })
                                                                .catch(error => {
                                                                    console.error('Error fetching data:', error);
                                                                    const infoContainer = document.getElementById('info-container');
                                                                    infoContainer.innerHTML = '<p>Error fetching data. Please retry.</p>';

                                                                    // Hide the loader
                                                                    document.getElementById('loader2').style.display = 'none';
                                                                });

                                                            // Set timeout for retrying
                                                            fetchTimeout = setTimeout(() => {
                                                                const infoContainer = document.getElementById('info-container');
                                                                infoContainer.innerHTML = '<p>Request timed out. Please retry.</p>';
                                                                document.getElementById('loader2').style.display = 'none';
                                                            }, 30000000); // 30 seconds timeout
                                                        }
                                                    </script>

                                                    <script>
                                                        function copyToClipboard(elementId) {
                                                            var aux = document.createElement("input");
                                                            aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                            document.body.appendChild(aux);
                                                            aux.select();
                                                            document.execCommand("copy");
                                                            document.body.removeChild(aux);
                                                        }

                                                        function log() {
                                                            console.log('---')
                                                        }
                                                    </script>

                                                @else
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <h4 class="text-muted text-center my-2"></h4>
                                                            <hr>
                                                        </div>


                                                        <div class="col">
                                                            <div class="d-flex justify-content-start
                                                     p-1">
                                                                <h5 class="text-start text-muted">
                                                                    ACCT NO
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">

                                                                <h5 style="border-right: 4px; font-size: 15px;"
                                                                    id="text_element">{{ $ninepsb->account_no ?? "Not Available"}}</h5>
                                                                <input hidden
                                                                       value="{{ $ninepsb->account_no ?? "Not Available" }}"
                                                                       id="ninepsb_account_no">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboard('text_element')">

                                                                </i>

                                                                <script>
                                                                    function copyToClipboard(elementId) {
                                                                        var aux = document.createElement("input");
                                                                        aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                        document.body.appendChild(aux);
                                                                        aux.select();
                                                                        document.execCommand("copy");
                                                                        document.body.removeChild(aux);
                                                                    }

                                                                    function log() {
                                                                        console.log('---')
                                                                    }
                                                                </script>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <h4 class="text-muted text-center my-2"></h4>
                                                            <hr>
                                                        </div>


                                                        <div class="col">
                                                            <div class="d-flex justify-content-start
                                                     p-1">
                                                                <h5 class="text-start text-muted">
                                                                    ACCT NAME
                                                                </h5>
                                                            </div>
                                                        </div>


                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                    p-1">

                                                                <h5 style="font-size: 15px;"
                                                                    id="text_element">{{ $ninepsb->account_name ?? "Not Available"}}</h5>
                                                                </i>

                                                                <script>
                                                                    function copyToClipboard(elementId) {
                                                                        var aux = document.createElement("input");
                                                                        aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                        document.body.appendChild(aux);
                                                                        aux.select();
                                                                        document.execCommand("copy");
                                                                        document.body.removeChild(aux);
                                                                    }

                                                                    function log() {
                                                                        console.log('---')
                                                                    }
                                                                </script>

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <h4 class="text-muted text-center my-2"></h4>
                                                            <hr>
                                                        </div>


                                                        <div class="col">
                                                            <div class="d-flex justify-content-start
                                                     p-1">
                                                                <h5 class="text-start text-muted">
                                                                    REFERENCE
                                                                </h5>
                                                            </div>
                                                        </div>


                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                    p-1">

                                                                <h3 style="border-right: 4px; font-size: 15px; color: darkred"
                                                                    id="text_element1">{{ $transref ?? "Not Available" ?? "Not Available"}}</h3>
                                                                <input hidden value="{{ $trans_id }}" id="trfninepsb">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboard('text_element1')">
                                                                </i>

                                                                <script>
                                                                    function copyToClipboard(elementId) {
                                                                        var aux = document.createElement("input");
                                                                        aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                        document.body.appendChild(aux);
                                                                        aux.select();
                                                                        document.execCommand("copy");
                                                                        document.body.removeChild(aux);
                                                                    }

                                                                    function log() {
                                                                        console.log('---')
                                                                    }
                                                                </script>

                                                            </div>
                                                        </div>
                                                        <hr class="my-1">

                                                    </div>
                                                    <small style="font-size: 13px" class="text-danger text-center my-2">Please
                                                        add Reference to your transaction narration to avoide delay in
                                                        confirmation</small>
                                                    <form onsubmit="event.preventDefault()">

                                                        <input type="text" id="trx_id" hidden value="{{ $trans_id}}">

                                                        <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                        <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                        <!-- Button trigger modal -->


                                                        <!-- Modal -->
                                                        <div
                                                            style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                            class="modal fade" id="myModalninepsbshow"
                                                            data-backdrop="static"
                                                            data-keyboard="false">
                                                            <div class="modal-dialog "
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                                <div class="modal-content border-0"
                                                                     style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                    <div class="modal-body p-5 my-4">
                                                                        <div class="tf-container p-5">

                                                                            <div class="payment-loader mb-4">

                                                                                <div class="text-center">
                                                                                    <p style="color:rgb(232, 3, 106);"
                                                                                       id="timer"><span
                                                                                            id="countdown"></span></p>
                                                                                </div>


                                                                                <div class="pad mt-3">
                                                                                    <div class="chip"></div>
                                                                                    <div class="line line1"></div>
                                                                                    <div class="line line2"></div>
                                                                                </div>

                                                                                <div class="loader-text">
                                                                                    <p class="text-center mb-4"
                                                                                       style="color:rrgb(11, 1, 63)"
                                                                                       id="messageninepsb"></p>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                    <div class="tf-container my-5">
                                                                        <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                           class="tf-btn danger large mt-5">Cancel
                                                                            Transaction</a>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>


                                                        <button class="tf-btn accent large my-3 request-btn"
                                                                id="requestninepsb">I
                                                            ve sent ₦{{
                                        number_format($payable_amount )}}

                                                        </button>


                                                    </form>
                                                @endif


                                            </div>


                                        </div>

                                    </div>


                                </div>


                            </div>

                            <script>
                                document.getElementById("openModalBtnninepsb").onclick = function () {
                                    document.getElementById("myModalninepsb").style.display = "block";
                                };

                                document.getElementsByClassName("close")[0].onclick = function () {
                                    document.getElementById("myModalninepsb").style.display = "none";
                                };


                            </script>


                            {{--                <script>--}}
                            {{--                    document.getElementById('openModalBtnninepsb').addEventListener('click', function () {--}}
                            {{--                        const url = '{{ url('') }}/api/ninepsb-transfer-transaction';--}}
                            {{--                        const data = {--}}
                            {{--                            ref: '{{ $transref }}',--}}
                            {{--                        };--}}

                            {{--                        fetch(url, {--}}
                            {{--                            method: 'POST',--}}
                            {{--                            headers: {--}}
                            {{--                                'Content-Type': 'application/json',--}}
                            {{--                            },--}}
                            {{--                            body: JSON.stringify(data),--}}
                            {{--                        })--}}
                            {{--                            .then(response => response.json())--}}
                            {{--                            .then(data => {--}}
                            {{--                                console.log('Response:', data);--}}
                            {{--                            })--}}
                            {{--                            .catch(error => {--}}
                            {{--                                console.error('Error:', error);--}}
                            {{--                            });--}}
                            {{--                    });--}}
                            {{--                </script>--}}


                            <script>
                                let repeatRequestninepsb = true;

                                function makeRequest() {
                                    if (!repeatRequestninepsb) {
                                        return;
                                    }

                                    const trx_id = document.getElementById('trfninepsb').value;
                                    const account_no = document.getElementById('ninepsb_account_no').value;
                                    const url = "{{ url('') }}/verifyninepsb?trans_id=" + trx_id + "&account_no=" + account_no;

                                    var audio = new Audio('{{url('')}}/public/assets/sound.wav');


                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);

                                            if (data.status === 'pending') {
                                                setTimeout(makeRequest, 3000);
                                            } else if (data.status === 'success') {

                                                audio.play();

                                                const webhook = document.getElementById('webHook').value;
                                                const amount = document.getElementById('Amount').value;

                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                                                repeatRequestkuda = false; // Adjusted variable name here
                                            } else if (data.status === 'paid') {
                                                audio.play();
                                                window.location.href = "{{ url('') }}/paid-success?trans_id=" + trx_id;

                                                repeatRequestkuda = false; // Adjusted variable name here
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                }

                                function startTimer(duration, display) {
                                    let timer = duration;
                                    const countdownElement = document.getElementById(display);

                                    const intervalId = setInterval(function () {
                                        const minutes = Math.floor(timer / 60);
                                        const seconds = timer % 60;

                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

                                        if (timer === 0) {
                                            clearInterval(intervalId);
                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to merchant website to resolve or report transaction";
                                        }

                                        timer--;
                                    }, 1000);
                                }

                                function startMessage() {
                                    var messageDisplay = document.getElementById('messageninepsb');
                                    messageDisplay.innerHTML = "Confirming 9psb payment...";
                                }

                                const requestninepsbBtn = document.getElementById('requestninepsb');
                                requestninepsbBtn.addEventListener("click", function () {
                                    const requestninepsbBtn = document.getElementById('requestninepsb');

                                    startTimer(1200, 'countdown');
                                    makeRequest();
                                    startMessage();
                                    $('#myModalninepsbshow').modal('show');
                                    requestkudaBtn.disabled = true;
                                    requestkudaBtn.hidden = true;
                                });
                            </script>


                        </div>


                    </div>
                </div>

            @endif
        @else
            @if($opay_transfer == 1)

                <div id=""
                     class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                    <div class="accordion-item border-0">
                        <div class="inner d-flex align-items-center">
                            <svg width="140" height="51" viewBox="0 0 155 61" fill="none"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="155" height="61" fill="url(#pattern0_2019_28)"/>
                                <defs>
                                    <pattern id="pattern0_2019_28" patternContentUnits="objectBoundingBox" width="1"
                                             height="1">
                                        <use xlink:href="#image0_2019_28"
                                             transform="matrix(0.00645161 0 0 0.0163934 -0.225806 -1.36066)"/>
                                    </pattern>
                                    <image id="image0_2019_28" width="225" height="225"
                                           xlink:href="data:image/png;base64,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"/>
                                </defs>
                            </svg>
                            <div class="content">
                                <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#opay"
                                       aria-expanded="false" aria-controls="opay" class="fw_6">Click here to get account
                                        details
                                    </a>
                                </h4>
                                <p>40 seconds confirmation (recommended)</p>
                            </div>
                        </div>


                        <div id="opay" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">

                            <p class="text-danger my-3 text-center">Please don't forget to add your payment reference in
                                narration/remarks/notes to avoid loosing your funds</p>

                            <div class="tf-container my-2">
                                <input hidden class="" type="checkbox" id="agreeCheckbox">
                                <a id="openModalBtnopay" class="tf-btn success large" disabled>Continue to make
                                    payment</a>
                            </div>

                            <script>

                                document.addEventListener('DOMContentLoaded', function () {
                                    var agreeCheckbox = document.getElementById('agreeCheckbox');
                                    var payButton = document.getElementById('openModalBtnopay');
                                    var modal = document.getElementById('myModal');
                                    var closeModal = document.getElementsByClassName('close')[0];

                                    // Disable button by default
                                    payButton.disabled = true;

                                    // Enable button when checkbox is clicked
                                    agreeCheckbox.addEventListener('change', function () {
                                        payButton.disabled = !this.checked;
                                    });

                                    // Open modal when button is clicked and checkbox is checked
                                    payButton.addEventListener('click', function () {
                                        if (agreeCheckbox.checked) {
                                            modal.style.display = "block";
                                        } else {
                                            alert("Please dont forget to  add referencee to your  transaction narration / Remarks / Note.");
                                        }
                                    });
                                });


                            </script>


                            {{--                        <div class="tf-container my-2">--}}
                            {{--                            <a id="openModalBtnopay" class="tf-btn success large">Pay To Opay</a>--}}
                            {{--                        </div>--}}

                            <div id="myModalopay" class="modal">
                                <div class="modal-content">


                                    <span class="close my-2">&times;</span>


                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center">
                                            <div class="row">

                                                <div class="text-center">
                                                    <svg width="140" height="51" viewBox="0 0 155 61" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect width="155" height="61" fill="url(#pattern0_2019_28)"/>
                                                        <defs>
                                                            <pattern id="pattern0_2019_28"
                                                                     patternContentUnits="objectBoundingBox" width="1"
                                                                     height="1">
                                                                <use xlink:href="#image0_2019_28"
                                                                     transform="matrix(0.00645161 0 0 0.0163934 -0.225806 -1.36066)"/>
                                                            </pattern>
                                                            <image id="image0_2019_28" width="225" height="225"
                                                                   xlink:href="data:image/png;base64,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"/>
                                                        </defs>
                                                    </svg>
                                                </div>


                                                <div class="row">

                                                    <div class="col-12">
                                                        <h4 class="text-muted text-center my-2"></h4>
                                                        <hr>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-start
                                                     p-1">
                                                            <h5 class="text-start text-muted">
                                                                ACCT NO
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="d-flex justify-content-end
                                                    p-1">

                                                            <h5 style="border-right: 4px; font-size: 15px;"
                                                                id="text_element">{{ $opay_acct->account_no ?? "Not Available"}}</h5>
                                                            <input hidden value="{{ $opay_acct->account_no }}"
                                                                   id="opayaccountno">


                                                            <i style="font-size: 1em; margin-left: 4px"
                                                               class="fa fa-copy"
                                                               onclick="copyToClipboard('text_element')">

                                                            </i>

                                                            <script>
                                                                function copyToClipboard(elementId) {
                                                                    var aux = document.createElement("input");
                                                                    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                    document.body.appendChild(aux);
                                                                    aux.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(aux);
                                                                }

                                                                function log() {
                                                                    console.log('---')
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-12">
                                                        <h4 class="text-muted text-center my-2"></h4>
                                                        <hr>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-start
                                                     p-1">
                                                            <h5 class="text-start text-muted">
                                                                ACCT NAME
                                                            </h5>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-end
                                                    p-1">

                                                            <h5 style="font-size: 15px;"
                                                                id="text_element">{{ $opay_acct->account_name ?? "Not Available"}}</h5>
                                                            </i>

                                                            <script>
                                                                function copyToClipboard(elementId) {
                                                                    var aux = document.createElement("input");
                                                                    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                    document.body.appendChild(aux);
                                                                    aux.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(aux);
                                                                }

                                                                function log() {
                                                                    console.log('---')
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="row">

                                                    <div class="col-12">
                                                        <h4 class="text-muted text-center my-2"></h4>
                                                        <hr>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-start
                                                     p-1">
                                                            <h5 class="text-start text-muted">
                                                                REFERENCE
                                                            </h5>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-end
                                                    p-1">

                                                            <h3 style="border-right: 4px; font-size: 15px; color: darkred"
                                                                id="text_element1">{{ $transref ?? "Not Available" ?? "Not Available"}}</h3>
                                                            <input hidden value="{{ $transref }}" id="trfopay">


                                                            <i style="font-size: 1em; margin-left: 4px"
                                                               class="fa fa-copy"
                                                               onclick="copyToClipboard('text_element1')">
                                                            </i>

                                                            <script>
                                                                function copyToClipboard(elementId) {
                                                                    var aux = document.createElement("input");
                                                                    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                    document.body.appendChild(aux);
                                                                    aux.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(aux);
                                                                }

                                                                function log() {
                                                                    console.log('---')
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>
                                                    <hr class="my-1">

                                                </div>


                                                <small style="font-size: 12px" class="text-danger text-center my-2">Please
                                                    add Reference to your transaction narration to avoide delay in
                                                    confirmation and loosing your funds</small>


                                                <form onsubmit="event.preventDefault()">

                                                    <input type="text" id="trx" hidden value="{{ $trans_id }}">

                                                    <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                    <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div
                                                        style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                        class="modal fade" id="myModal" data-backdrop="static"
                                                        data-keyboard="false">
                                                        <div class="modal-dialog "
                                                             style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                            <div class="modal-content border-0"
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                <div class="modal-body p-5 my-4">
                                                                    <div class="tf-container p-5">

                                                                        <div class="payment-loader mb-4">

                                                                            <div class="text-center">
                                                                                <p style="color:rgb(232, 3, 106);"
                                                                                   id="timer"><span
                                                                                        id="countdown"></span></p>
                                                                            </div>


                                                                            <div class="pad mt-3">
                                                                                <div class="chip"></div>
                                                                                <div class="line line1"></div>
                                                                                <div class="line line2"></div>
                                                                            </div>

                                                                            <div class="loader-text">
                                                                                <p class="text-center mb-4"
                                                                                   style="color:rrgb(11, 1, 63)"
                                                                                   id="message"></p>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="tf-container my-5">
                                                                    <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                       class="tf-btn danger large mt-5">Cancel
                                                                        Transaction</a>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="tf-btn accent large my-3" id="requestopay">I
                                                        ve sent ₦{{
                                        number_format($payable_amount )}}

                                                    </button>


                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById("openModalBtnopay").onclick = function () {
                                    document.getElementById("myModalopay").style.display = "block";
                                };

                                // Function to close the modal when the close button is clicked
                                document.getElementsByClassName("close")[0].onclick = function () {
                                    document.getElementById("myModalopay").style.display = "none";
                                };

                                // Function to close the modal when the user clicks outside of it
                                window.onclick = function (event) {
                                    if (event.target == document.getElementById("myModalopay")) {
                                        document.getElementById("myModalopay").style.display = "none";
                                    }
                                };

                            </script>

                            <script>
                                let repeatRequest = true;

                                function makeRequest() {
                                    if (!repeatRequest) {
                                        return;
                                    }

                                    const trx_id = document.getElementById('trx').value;
                                    const trx = document.getElementById('trfopay').value;
                                    const opay_account_no = document.getElementById('opayaccountno').value;
                                    const url = "{{ url('') }}/verify?trans_id=" + trx_id + "&account_no=" + opay_account_no + "&trx=" + trx;
                                    var audio = new Audio('{{url('')}}/public/assets/sound.wav');


                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);

                                            if (data.status === 'pending') {

                                                setTimeout(makeRequest, 3000);


                                            } else if (data.status === 'success') {

                                                const webhook = document.getElementById('webHook').value;
                                                const amount = document.getElementById('Amount').value;

                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                                                repeatRequestopay = false;
                                            } else if (data.status === 'paid') {

                                                window.location.href = "{{ url('') }}/paid-success?trans_id=" + trx_id;

                                                repeatRequestopay = false; // Adjusted variable name here
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                }

                                function startTimer(duration, display) {
                                    let timer = duration;
                                    const countdownElement = document.getElementById(display);

                                    const intervalId = setInterval(function () {
                                        const minutes = Math.floor(timer / 60);
                                        const seconds = timer % 60;

                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;


                                        if (timer === 0) {
                                            clearInterval(intervalId);
                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to marchant website to resolve or report transaction";

                                        }

                                        timer--;
                                    }, 1000);
                                }

                                function startMessage() {

                                    var messageDisplay = document.getElementById('message');
                                    messageDisplay.innerHTML = "Confirming Opay payment...";

                                }


                                const requestopayBtn = document.getElementById('requestopay');
                                requestopayBtn.addEventListener("click", function () {
                                    const requestopayBtn = document.getElementById('requestopay');


                                    startTimer(1200, 'countdown');
                                    makeRequest();
                                    startMessage();
                                    $('#myModal').modal('show');
                                    requestopayBtn.disabled = true;
                                    requestopayBtn.hidden = true;

                                })


                            </script>

                        </div>


                    </div>
                </div>

            @endif
            @if($palmpay_transfer == 1)

                <div id=""
                     class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                    <div class="accordion-item border-0">
                        <div class="inner d-flex align-items-center">
                            <svg width="140" height="51" viewBox="0 0 188 53" fill="none"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="188" height="53" fill="url(#pattern0_2023_14)"/>
                                <defs>
                                    <pattern id="pattern0_2023_14" patternContentUnits="objectBoundingBox" width="1"
                                             height="1">
                                        <use xlink:href="#image0_2023_14"
                                             transform="matrix(0.00243902 0 0 0.00865163 0 -0.0320755)"/>
                                    </pattern>
                                    <image id="image0_2023_14" width="410" height="123"
                                           xlink:href="data:image/png;base64,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"/>
                                </defs>
                            </svg>

                            <div class="content">
                                <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#palmpay"
                                       aria-expanded="false" aria-controls="palmpay" class="fw_6">Click here to get
                                        account
                                        details
                                    </a>
                                </h4>
                                <p>40 seconds confirmation (recommended)</p>
                            </div>
                        </div>


                        <div id="palmpay" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">

                            <p class="text-danger my-3 text-center">Please don't forget to add your payment reference in
                                narration/remarks/notes</p>


                            <div class="tf-container my-2">
                                <input hidden class="" type="checkbox" id="agreeCheckboxpalmpay">
                                <a id="openModalBtnpalmpay" class="tf-btn success large" disabled>Continue to make
                                    payment</a>
                            </div>

                            <script>

                                document.addEventListener('DOMContentLoaded', function () {
                                    var agreeCheckbox = document.getElementById('agreeCheckboxpalmpay');
                                    var payButton = document.getElementById('openModalBtnpalmpay');
                                    var modal = document.getElementById('modalpalm');
                                    var closeModal = document.getElementsByClassName('close')[0];

                                    // Disable button by default
                                    payButton.disabled = true;

                                    // Enable button when checkbox is clicked
                                    agreeCheckbox.addEventListener('change', function () {
                                        payButton.disabled = !this.checked;
                                    });

                                    // Open modal when button is clicked and checkbox is checked
                                    payButton.addEventListener('click', function () {
                                        if (agreeCheckbox.checked) {
                                            modal.style.display = "block";
                                        } else {
                                            alert("Please dont forget to  add generated reference  to your  transaction narration / Remarks / Note.");
                                        }
                                    });
                                });


                            </script>


                            <div id="myModalpalmpay" class="modal">
                                <div class="modal-content">


                                    <span class="close my-2">&times;</span>


                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center">
                                            <div class="row">

                                                <div class="text-center">
                                                    <svg width="140" height="51" viewBox="0 0 188 53" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect width="188" height="53" fill="url(#pattern0_2023_14)"/>
                                                        <defs>
                                                            <pattern id="pattern0_2023_14"
                                                                     patternContentUnits="objectBoundingBox" width="1"
                                                                     height="1">
                                                                <use xlink:href="#image0_2023_14"
                                                                     transform="matrix(0.00243902 0 0 0.00865163 0 -0.0320755)"/>
                                                            </pattern>
                                                            <image id="image0_2023_14" width="410" height="123"
                                                                   xlink:href="data:image/png;base64,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"/>
                                                        </defs>
                                                    </svg>

                                                </div>


                                                <div class="row">

                                                    <div class="col-12">
                                                        <h4 class="text-muted text-center my-2"></h4>
                                                        <hr>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-start
                                                     p-1">
                                                            <h5 class="text-start text-muted">
                                                                ACCT NO
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="d-flex justify-content-end
                                                    p-1">

                                                            <h5 style="border-right: 4px; font-size: 15px;"
                                                                id="text_element">{{ $palmpay_acct->account_no ?? "Not Available"}}</h5>
                                                            <input hidden value="{{ $palmpay_acct->account_no }}"
                                                                   id="palmpay_account_no">

                                                            <i style="font-size: 1em; margin-left: 4px"
                                                               class="fa fa-copy"
                                                               onclick="copyToClipboard('text_element')">

                                                            </i>

                                                            <script>
                                                                function copyToClipboard(elementId) {
                                                                    var aux = document.createElement("input");
                                                                    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                    document.body.appendChild(aux);
                                                                    aux.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(aux);
                                                                }

                                                                function log() {
                                                                    console.log('---')
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-12">
                                                        <h4 class="text-muted text-center my-2"></h4>
                                                        <hr>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-start
                                                     p-1">
                                                            <h5 class="text-start text-muted">
                                                                ACCT NAME
                                                            </h5>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-end
                                                    p-1">

                                                            <h5 style="font-size: 15px;"
                                                                id="text_element">{{ $palmpay_acct->account_name ?? "Not Available"}}</h5>
                                                            </i>

                                                            <script>
                                                                function copyToClipboard(elementId) {
                                                                    var aux = document.createElement("input");
                                                                    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                    document.body.appendChild(aux);
                                                                    aux.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(aux);
                                                                }

                                                                function log() {
                                                                    console.log('---')
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>


                                                </div>


                                                <div class="row">

                                                    <div class="col-12">
                                                        <h4 class="text-muted text-center my-2"></h4>
                                                        <hr>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-start
                                                     p-1">
                                                            <h5 class="text-start text-muted">
                                                                REFERENCE
                                                            </h5>
                                                        </div>
                                                    </div>


                                                    <div class="col">
                                                        <div class="d-flex justify-content-end
                                                    p-1">

                                                            <h3 style="border-right: 4px; font-size: 15px; color: darkred"
                                                                id="text_element1">{{ $transref ?? "Not Available" ?? "Not Available"}}</h3>
                                                            <input hidden value="{{ $trans_id }}" id="trfpalmpay">

                                                            <i style="font-size: 1em; margin-left: 4px"
                                                               class="fa fa-copy"
                                                               onclick="copyToClipboard('text_element1')">
                                                            </i>

                                                            <script>
                                                                function copyToClipboard(elementId) {
                                                                    var aux = document.createElement("input");
                                                                    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                    document.body.appendChild(aux);
                                                                    aux.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(aux);
                                                                }

                                                                function log() {
                                                                    console.log('---')
                                                                }
                                                            </script>

                                                        </div>
                                                    </div>
                                                    <hr class="my-1">

                                                </div>


                                                <small style="font-size: 13px" class="text-danger text-center my-2">Please
                                                    add Reference to your transaction narration to avoide delay in
                                                    confirmation</small>


                                                <form onsubmit="event.preventDefault()">

                                                    <input type="text" id="trx_id" hidden value="{{ $trans_id }}">

                                                    <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                    <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div
                                                        style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                        class="modal fade" id="myModalpalmpayshow"
                                                        data-backdrop="static"
                                                        data-keyboard="false">
                                                        <div class="modal-dialog "
                                                             style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                            <div class="modal-content border-0"
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                <div class="modal-body p-5 my-4">
                                                                    <div class="tf-container p-5">

                                                                        <div class="payment-loader mb-4">

                                                                            <div class="text-center">
                                                                                <p style="color:rgb(232, 3, 106);"
                                                                                   id="timer"><span
                                                                                        id="countdown"></span></p>
                                                                            </div>


                                                                            <div class="pad mt-3">
                                                                                <div class="chip"></div>
                                                                                <div class="line line1"></div>
                                                                                <div class="line line2"></div>
                                                                            </div>

                                                                            <div class="loader-text">
                                                                                <p class="text-center mb-4"
                                                                                   style="color:rrgb(11, 1, 63)"
                                                                                   id="messagep"></p>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="tf-container my-5">
                                                                    <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                       class="tf-btn danger large mt-5">Cancel
                                                                        Transaction</a>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="tf-btn accent large my-3 request-btn"
                                                            id="requestpalmpay">I
                                                        ve sent ₦{{
                                        number_format($payable_amount )}}

                                                    </button>


                                                </form>

                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </div>

                            <script>
                                document.getElementById("openModalBtnpalmpay").onclick = function () {
                                    document.getElementById("myModalpalmpay").style.display = "block";
                                };

                                document.getElementsByClassName("close")[0].onclick = function () {
                                    document.getElementById("myModalpalmpay").style.display = "none";
                                };


                            </script>


                            <script>
                                document.getElementById('openModalBtnpalmpay').addEventListener('click', function () {
                                    const url = '{{ url('') }}/api/palmpay-transfer-transaction';
                                    const data = {
                                        ref: '{{ $transref }}'
                                    };

                                    fetch(url, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(data),
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log('Response:', data);
                                        })
                                        .catch(error => {

                                            console.error('Error:', error);
                                        });
                                });
                            </script>


                            <script>
                                let repeatRequestp = true;

                                function makeRequestp() {
                                    if (!repeatRequestp) {
                                        return;
                                    }

                                    const trx_id = document.getElementById('trx_id').value;
                                    const trx = document.getElementById('trfpalmpay').value;
                                    const palmpay_account_no = document.getElementById('palmpay_account_no').value;
                                    const url = "{{ url('') }}/verify?trans_id=" + trx_id + "&account_no=" + palmpay_account_no + "&trx=" + trx;
                                    var audio = new Audio('{{url('')}}/public/assets/sound.wav');


                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);

                                            if (data.status === 'pending') {
                                                setTimeout(makeRequestp, 3000);


                                            } else if (data.status === 'success') {


                                                audio.play();
                                                const webhook = document.getElementById('webHook').value;
                                                const amount = document.getElementById('Amount').value;

                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx;

                                                repeatRequestopay = false;
                                            } else if (data.status === 'paid') {

                                                audio.play();
                                                window.location.href = "{{ url('') }}/paid-success?trans_id=" + trx_id;

                                                repeatRequestopay = false; // Adjusted variable name here
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                }

                                function startTimer(duration, display) {
                                    let timer = duration;
                                    const countdownElement = document.getElementById(display);

                                    const intervalId = setInterval(function () {
                                        const minutes = Math.floor(timer / 60);
                                        const seconds = timer % 60;

                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;


                                        if (timer === 0) {
                                            clearInterval(intervalId);
                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to marchant website to resolve or report transaction";

                                        }

                                        timer--;
                                    }, 1000);
                                }

                                function startMessagep() {

                                    var messageDisplayp = document.getElementById('messagep');
                                    messageDisplayp.innerHTML = "Confirming Palmpay payment...";

                                }


                                const requestpalmpayBtn = document.getElementById('requestpalmpay');
                                requestpalmpayBtn.addEventListener("click", function () {
                                    //const requestpalmpayBtn = document.getElementById('requestpalmpay');


                                    startTimer(1200, 'countdown');
                                    makeRequestp();
                                    startMessagep();
                                    $('#myModalpalmpayshow').modal('show');
                                    requestpalmpayBtn.disabled = true;
                                    requestpalmpayBtn.hidden = true;

                                })


                            </script>

                            {{--                            <script>--}}
                            {{--                                let repeatRequestpalmpay = true;--}}

                            {{--                                function makeRequest(trx_id, palmpay_account_no) {--}}
                            {{--                                    if (!repeatRequestpalmpay) {--}}
                            {{--                                        return;--}}
                            {{--                                    }--}}
                            {{--                                    const url = "{{ url('') }}/verifypalmpay?trans_id=" + trx_id + "&account_no=" + palmpay_account_no;--}}

                            {{--                                    fetch(url)--}}
                            {{--                                        .then(response => response.json())--}}
                            {{--                                        .then(data => {--}}
                            {{--                                            console.log(data);--}}

                            {{--                                            if (data.status === 'pending') {--}}
                            {{--                                                setTimeout(makeRequest, 3000, trx_id, palmpay_account_no);--}}
                            {{--                                            } else if (data.status === 'success') {--}}
                            {{--                                                const webhook = document.getElementById('webHook').value;--}}
                            {{--                                                const amount = document.getElementById('Amount').value;--}}

                            {{--                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;--}}

                            {{--                                                repeatRequestpalmpay = false; // Adjusted variable name here--}}
                            {{--                                            }--}}
                            {{--                                        })--}}
                            {{--                                        .catch(error => {--}}
                            {{--                                            console.error(error);--}}
                            {{--                                        });--}}
                            {{--                                }--}}

                            {{--                                function startTimer(duration, display) {--}}
                            {{--                                    let timer = duration;--}}
                            {{--                                    const countdownElement = document.getElementById(display);--}}

                            {{--                                    const intervalId = setInterval(function () {--}}
                            {{--                                        const minutes = Math.floor(timer / 60);--}}
                            {{--                                        const seconds = timer % 60;--}}

                            {{--                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;--}}

                            {{--                                        if (timer === 0) {--}}
                            {{--                                            clearInterval(intervalId);--}}
                            {{--                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to marchant website to resolve or report transaction";--}}
                            {{--                                        }--}}

                            {{--                                        timer--;--}}
                            {{--                                    }, 1000);--}}
                            {{--                                }--}}



                            {{--                                function startMessage() {--}}

                            {{--                                    var messageDisplay = document.getElementById('message');--}}
                            {{--                                    messageDisplay.innerHTML = "Confirming palmpay payment...";--}}

                            {{--                                }--}}


                            {{--                                const requestpalmpayBtn = document.getElementById('requestpalmpay');--}}
                            {{--                                requestpalmpayBtn.addEventListener("click", function () {--}}
                            {{--                                    const requestpalmpayBtn = document.getElementById('requestpalmpay');--}}


                            {{--                                    startTimer(1200, 'countdown');--}}
                            {{--                                    makeRequest();--}}
                            {{--                                    startMessage();--}}
                            {{--                                    $('#myModalpalmpayshow').modal('show');--}}
                            {{--                                    requestpalmpayBtn.disabled = true;--}}
                            {{--                                    requestpalmpayBtn.hidden = true;--}}

                            {{--                                })--}}


                            {{--                            </script>--}}


                        </div>


                    </div>
                </div>

            @endif
            @if($transfer == 1 && $bank == 1)

                <div id=""
                     class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                    <div class="accordion-item border-0">
                        <div class="inner d-flex align-items-center">
                            <i class="logo icon-bank2"></i>
                            <div class="content">
                                <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                       aria-expanded="false" aria-controls="collapseTwo" class="fw_6">Pay To Providus
                                        Bank</a></h4>
                                <p>Transfer to providus bank account</p>
                            </div>
                        </div>


                        <div id="collapseTwo" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">


                            <div class="card border-0">
                                <div class="card-body d-flex justify-content-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-muted text-center my-2">BANK</h4>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="text-center my-1">PROVIDUS BANK</h6>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-muted text-center my-2">ACCOUNT NO</h4>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="text-center my-1">{{$p_account_no ?? "Not Available"  }}</h6>
                                        </div>
                                        <input hidden value="{{ $p_account_no }}" id="p_account_no">

                                        <div class="col-12">
                                            <h4 class="text-muted text-center my-2">ACCOUNT NAME</h4>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="text-center my-1">{{$p_account_name ?? "Not Available"}}</h6>
                                        </div>


                                        <form onsubmit="event.preventDefault()">

                                            <input type="text" id="trx_id" hidden value="{{ $trans_id }}">

                                            <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                            <input type="text" id="Amount" hidden value="{{ $amount }}">

                                            <!-- Button trigger modal -->


                                            <!-- Modal -->
                                            <div
                                                style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                class="modal fade" id="myModalprovidus" data-backdrop="static"
                                                data-keyboard="false">
                                                <div class="modal-dialog "
                                                     style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                    <div class="modal-content border-0"
                                                         style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                        <div class="modal-body p-5 my-4">
                                                            <div class="tf-container p-5">

                                                                <div class="payment-loader mb-4">

                                                                    <div class="text-center">
                                                                        <p style="color:rgb(232, 3, 106);"
                                                                           id="timer"><span
                                                                                id="countdown"></span></p>
                                                                    </div>


                                                                    <div class="pad mt-3">
                                                                        <div class="chip"></div>
                                                                        <div class="line line1"></div>
                                                                        <div class="line line2"></div>
                                                                    </div>

                                                                    <div class="loader-text">
                                                                        <p class="text-center mb-4"
                                                                           style="color:rrgb(11, 1, 63)"
                                                                           id="messageprovidus"></p>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="tf-container my-5">
                                                            <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                               class="tf-btn danger large mt-5">Cancel
                                                                Transaction</a>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                            <button class="tf-btn accent large my-3" id="requestButtonp">I
                                                ve sent ₦{{
                                        number_format($payable_amount )}}

                                            </button>


                                        </form>

                                        <script>
                                            let repeatRequestprovidus = true;

                                            function makeRequest() {
                                                if (!repeatRequestprovidus) {
                                                    return;
                                                }

                                                const trx_id = document.getElementById('trx_id').value;
                                                const p_account_no = document.getElementById('p_account_no').value;
                                                const url = "{{ url('') }}/verify?trans_id=" + trx_id + "&account_no=" + p_account_no;

                                                var audio = new Audio('{{url('')}}/public/assets/sound.wav');

                                                fetch(url)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        console.log(data);

                                                        if (data.status === 'pending') {

                                                            setTimeout(makeRequest, 3000);


                                                        } else if (data.status === 'success') {

                                                            const webhook = document.getElementById('webHook').value;
                                                            const amount = document.getElementById('Amount').value;
                                                            audio.play();

                                                            window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                                                            repeatRequestprovidus = false;
                                                        } else if (data.status === 'paid') {
                                                            audio.play();

                                                            window.location.href = "{{ url('') }}/paid-success?trans_id=" + trx_id;

                                                            repeatRequestprovidus = false; // Adjusted variable name here
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            }

                                            function startTimer(duration, display) {
                                                let timer = duration;
                                                const countdownElement = document.getElementById(display);

                                                const intervalId = setInterval(function () {
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

                                            function startMessage() {

                                                var messageDisplay = document.getElementById('message');
                                                messageDisplay.innerHTML = "Confirming payment...";

                                            }


                                            const pbtn = document.getElementById('requestButtonp');
                                            pbtn.addEventListener("click", function () {
                                                const pbtn = document.getElementById('requestButtonp');

                                                startTimer(1200, 'countdown');
                                                makeRequest();
                                                startMessage();
                                                $('#myModalprovidus').modal('show');
                                                pbtn.disabled = true;
                                                pbtn.hidden = true;

                                            })


                                        </script>

                                    </div>


                                </div>


                            </div>
                        </div>


                    </div>
                </div>

            @endif
            @if($card == 1)
                <div class="tf-card-block d-flex align-items-center justify-content-between">
                    <div class="inner d-flex align-items-center">
                        <i class="logo icon-credit-card2"></i>
                        <div class="content">
                            <h4><a href="{{ $pre_link }}" class="fw_6">Pay with Debit Card</a></h4>
                            <i>Transaction may attract extra charge</i>
                        </div>
                    </div>
                </div>
            @endif
                @if($ninepsb == 1)

                    <div id=""
                         class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                        <div class="accordion-item border-0">
                            <div class="inner d-flex align-items-center">
                                <svg width="140" height="51" viewBox="0 0 238 102" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="238" height="102" fill="url(#pattern0_441_411)"/>
                                    <defs>
                                        <pattern id="pattern0_441_411" patternContentUnits="objectBoundingBox" width="1"
                                                 height="1">
                                            <use xlink:href="#image0_441_411"
                                                 transform="matrix(0.00420168 0 0 0.00980392 -0.0252101 0)"/>
                                        </pattern>
                                        <image id="image0_441_411" width="342" height="102"
                                               xlink:href="data:image/png;base64,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"/>
                                    </defs>
                                </svg>


                                <div class="content">
                                    <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#ninepsb"
                                           aria-expanded="false" aria-controls="ninepsb" class="fw_6">Pay Using 9
                                            PaymentSB</a></h4>
                                    <p>40 seconds confirmation (recommended)</p>
                                </div>
                            </div>


                            <div id="ninepsb" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">


                                <div class="tf-container my-2">
                                    <a id="openModalBtnninepsb" class="tf-btn success large">Pay To 9 PaymentSB</a>
                                </div>

                                <div id="myModalninepsb" class="modal">
                                    <div class="modal-content">


                                        <span class="close my-2">&times;</span>


                                        <div class="card">
                                            <div class="card-body d-flex justify-content-center">
                                                <div class="row">

                                                    <div class="text-center">
                                                        <svg width="172" height="75" viewBox="0 0 172 75" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <rect width="150" height="48" fill="url(#pattern0_441_411)"/>
                                                            <defs>
                                                                <pattern id="pattern0_441_411"
                                                                         patternContentUnits="objectBoundingBox" width="1"
                                                                         height="1">
                                                                    <use xlink:href="#image0_441_411"
                                                                         transform="matrix(0.00420168 0 0 0.00980392 -0.0252101 0)"/>
                                                                </pattern>
                                                                <image id="image0_441_411" width="342" height="102"
                                                                       xlink:href="data:image/png;base64,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"/>
                                                            </defs>
                                                        </svg>
                                                    </div>

                                                    @if($ninepsb_acct == null)

                                                        <div
                                                            style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                            class="modal fade" id="myModalninepsbshow"
                                                            data-backdrop="static"
                                                            data-keyboard="false">
                                                            <div class="modal-dialog "
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                                <div class="modal-content border-0"
                                                                     style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                    <div class="modal-body p-5 my-4">
                                                                        <div class="tf-container p-5">

                                                                            <div class="payment-loader mb-4">

                                                                                <div class="text-center">
                                                                                    <p style="color:rgb(232, 3, 106);"
                                                                                       id="timer"><span
                                                                                            id="countdown"></span></p>
                                                                                </div>


                                                                                <div class="pad mt-3">
                                                                                    <div class="chip"></div>
                                                                                    <div class="line line1"></div>
                                                                                    <div class="line line2"></div>
                                                                                </div>

                                                                                <div class="loader-text">
                                                                                    <p class="text-center mb-4"
                                                                                       style="color:rrgb(11, 1, 63)"
                                                                                       id="messageninepsb"></p>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                    <div class="tf-container my-5">
                                                                        <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                           class="tf-btn danger large mt-5">Cancel
                                                                            Transaction</a>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div id="info-container">
                                                            <!-- Placeholder for fetched information -->
                                                        </div>

                                                        <button onclick="fetchInfo()">Fetch Information</button>
                                                        <div class="loader2" id="loader2"></div>

                                                        <script>
                                                            let fetchTimeout;

                                                            function fetchInfo() {
                                                                // Display the loader
                                                                document.getElementById('loader2').style.display = 'block';

                                                                // Reset timeout if retrying
                                                                clearTimeout(fetchTimeout);

                                                                // Simulating a POST request (replace with actual API call)
                                                                {{--fetch('{{url('')}}/api/get-account', {--}}
                                                                    fetch('https://etopagency.com/api/create-account-dymamic', {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Content-Type': 'application/json'
                                                                    },
                                                                    body: JSON.stringify({
                                                                        user_id: 95,
                                                                        description: "Payment",
                                                                        name: "CHECKOUT",
                                                                        amount: {{$payable_amount}}

                                                                    }) // Replace with actual data to send
                                                                })
                                                                    .then(response => {
                                                                        if (!response.ok) {
                                                                            throw new Error('Network response was not ok');
                                                                        }
                                                                        return response.json();
                                                                    })

                                                                    .then(data => {
                                                                        console.log(data.result.account_name);
                                                                        console.log(data.result.account_no);
                                                                        const accountNo = data.result.account_no;
                                                                        const accountName = data.result.account_name;



                                                                        fetch('{{ url('') }}/api/ninepsb-transfer-transaction', {
                                                                            method: 'POST',
                                                                            headers: {
                                                                                'Content-Type': 'application/json'
                                                                            },
                                                                            body: JSON.stringify({
                                                                                ref: '{{ $transref }}',
                                                                                accountNo: '${accountNo}',
                                                                                name:'${accountName}'


                                                                            }) // Replace with actual data to send
                                                                        })
                                                                            .then(response => {
                                                                                if (!response.ok) {
                                                                                    throw new Error('Network response was not ok');
                                                                                }
                                                                                return response.json(); // Parse the JSON from the response
                                                                            })
                                                                            .then(data => {
                                                                                console.log('POST request successful:', data);
                                                                                // Handle the data returned by the server
                                                                            })
                                                                            .catch(error => {
                                                                                console.error('Error during POST request:', error);
                                                                                // Handle errors during the POST request
                                                                            })


                                                                        // Constructing HTML to display fetched information
                                                                        const infoHTML = `

<hr>
<div class = "row mt-3">
                                                        <div class="col">
                                                            <div class="d-flex justify-content-start p-1">
                                                                <h5 class="text-start text-muted">
                                                                    ACCT NO
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">
                                                                <h5 style="border-right: 4px; font-size: 15px;"

                                                                    id="text_element">${accountNo}</h5>
                                                                <input hidden
                                                                       value="${accountNo}"
                                                                       id="ninepsb_account_no">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboard('text_element')">

                                                                </i>




                                            </div>
                                        </div>
</div>
<hr>
<div class = "row mt-3">
                                                        <div class="col">
                                                            <div class="d-flex justify-content-start p-1">
                                                                <h5 class="text-start text-muted">
                                                                    ACCT NAME
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">
                                                                <h5 style="border-right: 4px; font-size: 15px;"

                                                                    id="text_element">${accountName}</h5>
                                                                <input hidden
                                                                       value="${accountName}"
                                                                       id="ninepsb_account_name">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboard('text_element')">

                                                                </i>




                                            </div>
                                        </div>
</div>

                                                    <form action="/verifypsb" method="POST">
                                                    @csrf

                                                                        <input type="text" id="trx_id" name="trx_id" hidden value="{{ $trans_id}}">

                                                        <input type="text" id="webHook" name="webhook" hidden value="{{ $webhook}}">

                                                        <input type="text" id="Amount" hidden name="amount" value="{{ $amount }}">

                                                        <input type="text" id="Amount" hidden name="account_no" value="${accountNo}">

                                                        <!-- Button trigger modal -->

                                                        <button class="tf-btn accent large my-3 request-btn"
                                                                id="requestninepsb">I
                                                            ve sent ₦{{ number_format($payable_amount )}},</button>


                                                                </form>


`;

                                                                        // Display fetched information in info-container
                                                                        const infoContainer = document.getElementById('info-container');
                                                                        infoContainer.innerHTML = infoHTML;

                                                                        // Hide the loader after displaying information
                                                                        document.getElementById('loader2').style.display = 'none';
                                                                    })
                                                                    .catch(error => {
                                                                        console.error('Error fetching data:', error);
                                                                        const infoContainer = document.getElementById('info-container');
                                                                        infoContainer.innerHTML = '<p>Error fetching data. Please retry.</p>';

                                                                        // Hide the loader
                                                                        document.getElementById('loader2').style.display = 'none';
                                                                    });

                                                                // Set timeout for retrying
                                                                fetchTimeout = setTimeout(() => {
                                                                    const infoContainer = document.getElementById('info-container');
                                                                    infoContainer.innerHTML = '<p>Request timed out. Please retry.</p>';
                                                                    document.getElementById('loader2').style.display = 'none';
                                                                }, 30000000); // 30 seconds timeout
                                                            }
                                                        </script>

                                                        <script>
                                                            function copyToClipboard(elementId) {
                                                                var aux = document.createElement("input");
                                                                aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                document.body.appendChild(aux);
                                                                aux.select();
                                                                document.execCommand("copy");
                                                                document.body.removeChild(aux);
                                                            }

                                                            function log() {
                                                                console.log('---')
                                                            }
                                                        </script>

                                                    @else
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <h4 class="text-muted text-center my-2"></h4>
                                                                <hr>
                                                            </div>


                                                            <div class="col">
                                                                <div class="d-flex justify-content-start
                                                     p-1">
                                                                    <h5 class="text-start text-muted">
                                                                        ACCT NO
                                                                    </h5>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="d-flex justify-content-end
                                                                                   p-1">

                                                                    <h5 style="border-right: 4px; font-size: 15px;"
                                                                        id="text_element">{{ $ninepsb->account_no ?? "Not Available"}}</h5>
                                                                    <input hidden
                                                                           value="{{ $ninepsb->account_no ?? "Not Available" }}"
                                                                           id="ninepsb_account_no">

                                                                    <i style="font-size: 1em; margin-left: 4px"
                                                                       class="fa fa-copy"
                                                                       onclick="copyToClipboard('text_element')">

                                                                    </i>

                                                                    <script>
                                                                        function copyToClipboard(elementId) {
                                                                            var aux = document.createElement("input");
                                                                            aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                            document.body.appendChild(aux);
                                                                            aux.select();
                                                                            document.execCommand("copy");
                                                                            document.body.removeChild(aux);
                                                                        }

                                                                        function log() {
                                                                            console.log('---')
                                                                        }
                                                                    </script>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <h4 class="text-muted text-center my-2"></h4>
                                                                <hr>
                                                            </div>


                                                            <div class="col">
                                                                <div class="d-flex justify-content-start
                                                     p-1">
                                                                    <h5 class="text-start text-muted">
                                                                        ACCT NAME
                                                                    </h5>
                                                                </div>
                                                            </div>


                                                            <div class="col">
                                                                <div class="d-flex justify-content-end
                                                    p-1">

                                                                    <h5 style="font-size: 15px;"
                                                                        id="text_element">{{ $ninepsb->account_name ?? "Not Available"}}</h5>
                                                                    </i>

                                                                    <script>
                                                                        function copyToClipboard(elementId) {
                                                                            var aux = document.createElement("input");
                                                                            aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                            document.body.appendChild(aux);
                                                                            aux.select();
                                                                            document.execCommand("copy");
                                                                            document.body.removeChild(aux);
                                                                        }

                                                                        function log() {
                                                                            console.log('---')
                                                                        }
                                                                    </script>

                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <h4 class="text-muted text-center my-2"></h4>
                                                                <hr>
                                                            </div>


                                                            <div class="col">
                                                                <div class="d-flex justify-content-start
                                                     p-1">
                                                                    <h5 class="text-start text-muted">
                                                                        REFERENCE
                                                                    </h5>
                                                                </div>
                                                            </div>


                                                            <div class="col">
                                                                <div class="d-flex justify-content-end
                                                    p-1">

                                                                    <h3 style="border-right: 4px; font-size: 15px; color: darkred"
                                                                        id="text_element1">{{ $transref ?? "Not Available" ?? "Not Available"}}</h3>
                                                                    <input hidden value="{{ $trans_id }}" id="trfninepsb">

                                                                    <i style="font-size: 1em; margin-left: 4px"
                                                                       class="fa fa-copy"
                                                                       onclick="copyToClipboard('text_element1')">
                                                                    </i>

                                                                    <script>
                                                                        function copyToClipboard(elementId) {
                                                                            var aux = document.createElement("input");
                                                                            aux.setAttribute("value", document.getElementById(elementId).innerHTML);
                                                                            document.body.appendChild(aux);
                                                                            aux.select();
                                                                            document.execCommand("copy");
                                                                            document.body.removeChild(aux);
                                                                        }

                                                                        function log() {
                                                                            console.log('---')
                                                                        }
                                                                    </script>

                                                                </div>
                                                            </div>
                                                            <hr class="my-1">

                                                        </div>
                                                        <small style="font-size: 13px" class="text-danger text-center my-2">Please
                                                            add Reference to your transaction narration to avoide delay in
                                                            confirmation</small>
                                                        <form onsubmit="event.preventDefault()">

                                                            <input type="text" id="trx_id" hidden value="{{ $trans_id}}">

                                                            <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                            <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                            <!-- Button trigger modal -->


                                                            <!-- Modal -->
                                                            <div
                                                                style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                                class="modal fade" id="myModalninepsbshow"
                                                                data-backdrop="static"
                                                                data-keyboard="false">
                                                                <div class="modal-dialog "
                                                                     style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                                    <div class="modal-content border-0"
                                                                         style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                        <div class="modal-body p-5 my-4">
                                                                            <div class="tf-container p-5">

                                                                                <div class="payment-loader mb-4">

                                                                                    <div class="text-center">
                                                                                        <p style="color:rgb(232, 3, 106);"
                                                                                           id="timer"><span
                                                                                                id="countdown"></span></p>
                                                                                    </div>


                                                                                    <div class="pad mt-3">
                                                                                        <div class="chip"></div>
                                                                                        <div class="line line1"></div>
                                                                                        <div class="line line2"></div>
                                                                                    </div>

                                                                                    <div class="loader-text">
                                                                                        <p class="text-center mb-4"
                                                                                           style="color:rrgb(11, 1, 63)"
                                                                                           id="messageninepsb"></p>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                        <div class="tf-container my-5">
                                                                            <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                               class="tf-btn danger large mt-5">Cancel
                                                                                Transaction</a>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <button class="tf-btn accent large my-3 request-btn"
                                                                    id="requestninepsb">I
                                                                ve sent ₦{{
                                        number_format($payable_amount )}}

                                                            </button>


                                                        </form>
                                                    @endif


                                                </div>


                                            </div>

                                        </div>


                                    </div>


                                </div>

                                <script>
                                    document.getElementById("openModalBtnninepsb").onclick = function () {
                                        document.getElementById("myModalninepsb").style.display = "block";
                                    };

                                    document.getElementsByClassName("close")[0].onclick = function () {
                                        document.getElementById("myModalninepsb").style.display = "none";
                                    };


                                </script>


                                {{--                <script>--}}
                                {{--                    document.getElementById('openModalBtnninepsb').addEventListener('click', function () {--}}
                                {{--                        const url = '{{ url('') }}/api/ninepsb-transfer-transaction';--}}
                                {{--                        const data = {--}}
                                {{--                            ref: '{{ $transref }}',--}}
                                {{--                        };--}}

                                {{--                        fetch(url, {--}}
                                {{--                            method: 'POST',--}}
                                {{--                            headers: {--}}
                                {{--                                'Content-Type': 'application/json',--}}
                                {{--                            },--}}
                                {{--                            body: JSON.stringify(data),--}}
                                {{--                        })--}}
                                {{--                            .then(response => response.json())--}}
                                {{--                            .then(data => {--}}
                                {{--                                console.log('Response:', data);--}}
                                {{--                            })--}}
                                {{--                            .catch(error => {--}}
                                {{--                                console.error('Error:', error);--}}
                                {{--                            });--}}
                                {{--                    });--}}
                                {{--                </script>--}}


                                <script>
                                    let repeatRequestninepsb = true;

                                    function makeRequest() {
                                        if (!repeatRequestninepsb) {
                                            return;
                                        }

                                        const trx_id = document.getElementById('trfninepsb').value;
                                        const account_no = document.getElementById('ninepsb_account_no').value;
                                        const url = "{{ url('') }}/verifyninepsb?trans_id=" + trx_id + "&account_no=" + account_no;

                                        var audio = new Audio('{{url('')}}/public/assets/sound.wav');


                                        fetch(url)
                                            .then(response => response.json())
                                            .then(data => {
                                                console.log(data);

                                                if (data.status === 'pending') {
                                                    setTimeout(makeRequest, 3000);
                                                } else if (data.status === 'success') {

                                                    audio.play();

                                                    const webhook = document.getElementById('webHook').value;
                                                    const amount = document.getElementById('Amount').value;

                                                    window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                                                    repeatRequestkuda = false; // Adjusted variable name here
                                                } else if (data.status === 'paid') {
                                                    audio.play();
                                                    window.location.href = "{{ url('') }}/paid-success?trans_id=" + trx_id;

                                                    repeatRequestkuda = false; // Adjusted variable name here
                                                }
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    }

                                    function startTimer(duration, display) {
                                        let timer = duration;
                                        const countdownElement = document.getElementById(display);

                                        const intervalId = setInterval(function () {
                                            const minutes = Math.floor(timer / 60);
                                            const seconds = timer % 60;

                                            countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

                                            if (timer === 0) {
                                                clearInterval(intervalId);
                                                countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to merchant website to resolve or report transaction";
                                            }

                                            timer--;
                                        }, 1000);
                                    }

                                    function startMessage() {
                                        var messageDisplay = document.getElementById('messageninepsb');
                                        messageDisplay.innerHTML = "Confirming 9psb payment...";
                                    }

                                    const requestninepsbBtn = document.getElementById('requestninepsb');
                                    requestninepsbBtn.addEventListener("click", function () {
                                        const requestninepsbBtn = document.getElementById('requestninepsb');

                                        startTimer(1200, 'countdown');
                                        makeRequest();
                                        startMessage();
                                        $('#myModalninepsbshow').modal('show');
                                        requestkudaBtn.disabled = true;
                                        requestkudaBtn.hidden = true;
                                    });
                                </script>


                            </div>


                        </div>
                    </div>

                @endif
        @endif


    </div>

</div>


<div class="tf-container my-5">
    <a href="decline?trans_id={{ $trans_id }}&key={{ $key }}" class="tf-btn danger large">Cancel
        Transaction</a>
</div>


<script src="{{ url('') }}/public/assets/dist/js/bootstrap.bundle.min.js"></script>


<script>
    document.getElementById('CardPost').addEventListener('click', function () {
        const url = '{{ url('') }}/api/card-transaction';
        const data = {
            ref: '{{ $ref }}'
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {

                console.log('Response:', data);
            })
            .catch(error => {

                console.error('Error:', error);
            });
    });
</script>

<script>
    document.getElementById('openModalBtnopay').addEventListener('click', function () {
        const url = '{{ url('') }}/api/opay-transfer-transaction';
        const data = {
            ref: '{{ $transref }}'
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
            })
            .catch(error => {

                console.error('Error:', error);
            });
    });
</script>


<script>
    document.getElementById('openModalBtnkuda').addEventListener('click', function () {
        const url = '{{ url('') }}/api/kuda-transfer-transaction';
        const data = {
            ref: '{{ $transref }}'
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
            })
            .catch(error => {

                console.error('Error:', error);
            });
    });
</script>


<script>
    var customTimerLimitInSeconds = 2400;

    function startCustomTimer() {
        var countdown = customTimerLimitInSeconds;
        var timerDisplay = document.getElementById('timers');

        function updateTimer() {
            var minutes = Math.floor(countdown / 60);
            var seconds = countdown % 60;

            timerDisplay.innerHTML = formatTime(minutes) + ':' + formatTime(seconds);

            if (countdown === 0) {
                window.location.href = '{{ url('') }}/decline?trans_id={{ $trans_id }}&key={{ $key}}';
            } else {
                countdown--;
                setTimeout(updateTimer, 1000);
            }
        }

        function formatTime(time) {
            return time < 10 ? '0' + time : time;
        }

        updateTimer();

        const p_account_no = document.getElementById('p_account_no').value;
        const url = "{{ url('') }}/change-state?account_no=" + p_account_no;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    }


    window.onload = startCustomTimer;
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        $("#warning").modal('show');
    });
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Support Channel</h5>

            </div>
            <div class="modal-body border-0">


                <div class="card border-0">

                    <div class="card-body">
                        <div id=""
                             class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                            <div class="accordion-item border-0">
                                <div class="inner d-flex align-items-center">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.316071 1.44129 0 2.20435 0 3V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V3C20 2.20435 19.6839 1.44129 19.1213 0.87868C18.5587 0.316071 17.7956 0 17 0ZM8 2H12V5.13L10.55 4.13C10.3867 4.02247 10.1955 3.96516 10 3.96516C9.8045 3.96516 9.61328 4.02247 9.45 4.13L8 5.13V2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V3C2 2.73478 2.10536 2.48043 2.29289 2.29289C2.48043 2.10536 2.73478 2 3 2H6V7C6.00048 7.1809 6.05003 7.35829 6.14336 7.51326C6.2367 7.66823 6.37032 7.79498 6.53 7.88C6.68637 7.96029 6.86115 7.99795 7.03671 7.98917C7.21227 7.98039 7.38242 7.92549 7.53 7.83L10 6.2L12.45 7.83C12.6004 7.92905 12.7748 7.98565 12.9547 7.99381C13.1346 8.00198 13.3133 7.96142 13.4721 7.87641C13.6308 7.7914 13.7637 7.66509 13.8566 7.51083C13.9495 7.35657 13.9991 7.18008 14 7V2H17C17.2652 2 17.5196 2.10536 17.7071 2.29289C17.8946 2.48043 18 2.73478 18 3V17Z"
                                            fill="black"/>
                                    </svg>

                                    <div class="content">
                                        <h4><a href="{{$support_channel ?? "#"}}" class="fw_6">Product or Item
                                                Issues
                                            </a>
                                        </h4>
                                        <p>Get support on products issues only</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card border-0">

                    <div class="card-body">
                        <div id=""
                             class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                            <div class="accordion-item border-0">
                                <div class="inner d-flex align-items-center">
                                    <svg width="20" height="20" viewBox="0 0 14 14" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_111_79)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M0 1.45C0 0.625 0.696 0 1.5 0H12.5C13.304 0 14 0.625 14 1.45V7.05C14 7.875 13.304 8.5 12.5 8.5H1.5C0.696 8.5 0 7.875 0 7.05V1.45ZM9 4.25C9 4.78043 8.78929 5.28914 8.41421 5.66421C8.03914 6.03929 7.53043 6.25 7 6.25C6.46957 6.25 5.96086 6.03929 5.58579 5.66421C5.21071 5.28914 5 4.78043 5 4.25C5 3.71957 5.21071 3.21086 5.58579 2.83579C5.96086 2.46071 6.46957 2.25 7 2.25C7.53043 2.25 8.03914 2.46071 8.41421 2.83579C8.78929 3.21086 9 3.71957 9 4.25ZM3.5 4.5C3.5 4.40151 3.4806 4.30398 3.44291 4.21299C3.40522 4.12199 3.34997 4.03931 3.28033 3.96967C3.21069 3.90003 3.12801 3.84478 3.03701 3.80709C2.94602 3.7694 2.84849 3.75 2.75 3.75C2.65151 3.75 2.55398 3.7694 2.46299 3.80709C2.37199 3.84478 2.28931 3.90003 2.21967 3.96967C2.15003 4.03931 2.09478 4.12199 2.05709 4.21299C2.0194 4.30398 2 4.40151 2 4.5C2 4.69891 2.07902 4.88968 2.21967 5.03033C2.36032 5.17098 2.55109 5.25 2.75 5.25C2.94891 5.25 3.13968 5.17098 3.28033 5.03033C3.42098 4.88968 3.5 4.69891 3.5 4.5ZM11.25 3.75C11.4489 3.75 11.6397 3.82902 11.7803 3.96967C11.921 4.11032 12 4.30109 12 4.5C12 4.69891 11.921 4.88968 11.7803 5.03033C11.6397 5.17098 11.4489 5.25 11.25 5.25C11.0511 5.25 10.8603 5.17098 10.7197 5.03033C10.579 4.88968 10.5 4.69891 10.5 4.5C10.5 4.30109 10.579 4.11032 10.7197 3.96967C10.8603 3.82902 11.0511 3.75 11.25 3.75ZM5.125 10.5C5.125 10.3342 5.05915 10.1753 4.94194 10.0581C4.82473 9.94085 4.66576 9.875 4.5 9.875C4.33424 9.875 4.17527 9.94085 4.05806 10.0581C3.94085 10.1753 3.875 10.3342 3.875 10.5V12.5C3.875 12.6658 3.94085 12.8247 4.05806 12.9419C4.17527 13.0592 4.33424 13.125 4.5 13.125C4.66576 13.125 4.82473 13.0592 4.94194 12.9419C5.05915 12.8247 5.125 12.6658 5.125 12.5V10.5ZM9.5 9.875C9.845 9.875 10.125 10.155 10.125 10.5V12.5C10.125 12.5821 10.1088 12.6633 10.0774 12.7392C10.046 12.815 9.99998 12.8839 9.94194 12.9419C9.88391 13 9.81501 13.046 9.73918 13.0774C9.66335 13.1088 9.58208 13.125 9.5 13.125C9.41792 13.125 9.33665 13.1088 9.26082 13.0774C9.18499 13.046 9.11609 13 9.05806 12.9419C9.00002 12.8839 8.95398 12.815 8.92257 12.7392C8.89117 12.6633 8.875 12.5821 8.875 12.5V10.5C8.875 10.155 9.155 9.875 9.5 9.875ZM7 10.625C7.345 10.625 7.625 10.905 7.625 11.25V13.25C7.625 13.4158 7.55915 13.5747 7.44194 13.6919C7.32473 13.8092 7.16576 13.875 7 13.875C6.83424 13.875 6.67527 13.8092 6.55806 13.6919C6.44085 13.5747 6.375 13.4158 6.375 13.25V11.25C6.375 10.905 6.655 10.625 7 10.625Z"
                                                  fill="black"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_111_79">
                                                <rect width="14" height="14" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>


                                    <div class="content">
                                        <h4>
                                            <a href="{{$support}}"
                                               class="fw_6"> Instant Payment
                                                Issues only
                                            </a>
                                        </h4>
                                        <p>Get support on instant payment issues channel</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="float" target="_blank">
    <i class="fa fa-comment my-float"></i>
</a>
<div class="pulse"></div>


<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>

