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


        .loaderpsb {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto; /* Center loader */
            display: none; /* Initially hidden */
        }

        .loaderwema {
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
                <h2 class="text-center text-danger my-2">Update !!!!</h2>
                <h6 class="text-muted text-center mb-3">Please read carefully</h6>


                <div class="card border-0 my-2 mt-4 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body border-0">
                        <h4 class="text-danger text-center">
                            New payment has been added<br> Payment does not require refrence...
                        </h4>
                    </div>
                </div>


                <div class="group-cb mt-3 d-flex justify-content-center">
                    <div class="cb">
                        <input type="checkbox" class="tf-checkbox st1" checked>
                    </div>
                    <span class="fw_3 mb-4">I agree to the Term of service and conditions</span>
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
            <a href="#" class="back-btn"><i class="icon-left white_color"></i></a>
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
                                   aria-expanded="false" aria-controls="opay" class="fw_6">Pay Using Opay
                                </a>
                            </h4>
                            <p>Refrence is required in note/remarks/refrence</p>
                        </div>
                    </div>


                    <div id="opay" class="accordion-collapse collapse"
                         data-bs-parent="#accordionExample">

                        <p class="text-danger my-3 text-center">Please don't forget to add your payment reference in
                            narration/remarks/notes to avoid loosing your funds</p>


                        <a class="d-flex justify-content-center btn btn-primary my-3"
                           href="https://www.youtube.com/shorts/Zn_dALbDhSI" target="_blank">Watch how to make
                            payment</a>

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

                            function makeRequestopay() {
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

                                            setTimeout(makeRequestopay, 3000);


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
                                makeRequestopay();
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

