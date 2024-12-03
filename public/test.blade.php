@if($wema == 1)
    <div id=""
         class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
        <div class="accordion-item border-0">
            <div class="inner d-flex align-items-center">
                <img src="{{url('')}}/public/wema.svg">
                <div class="content col-12" >
                    <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#wema"
                           aria-expanded="false" aria-controls="wema" class="fw_6">Pay Using Wema</a></h4>
                    <p>No refrence required</p>
                </div>
            </div>


            <div id="wema" class="accordion-collapse collapse"
                 data-bs-parent="#accordionExample">


                <div class="tf-container my-2">
                    <a id="openModalBtnwema" class="tf-btn success large">Pay To Wema Account</a>
                </div>

                <div id="myModalwema" class="modal">
                    <div class="modal-content">


                        <span class="close my-2">&times;</span>


                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                                <div class="row">

                                    @php
                                        if($payable_amount > 15000){
                                            $f_amount = $payable_amount + $psb_cap;
                                        }else{
                                          $f_amount = $payable_amount + $psb_charge;
                                        }

                                    @endphp

                                    <div class="col-12">
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
                                                    <img src="{{url('')}}/public/wema.svg"  width="342" height="102">

                                                </defs>
                                            </svg>
                                        </div>


                                        <div class="col-12 d-flex justify-content-center">
                                            <h5>You are about to pay</h5>
                                        </div>


                                        <div class="col-12 my-3 d-flex justify-content-center">
                                            <h2>₦{{number_format($f_amount,2)}}</h2>
                                        </div>



                                    </div>






                                    @if($wema == null)

                                        <div
                                            style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                            class="modal fade" id="myModalwema"
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
                                                                       id="messagewema"></p>
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

                                        <button class="p-2" id="fetch" style="color: #03103a" onclick="fetchInfowema()">Get
                                            Account Details
                                        </button>
                                        <div class="loader2" id="loaderwema"></div>



                                        <b class="text-center my-1">Bank charges applies</b>


                                        <script>
                                            let fetchTimeout;

                                            function fetchInfo() {
                                                // Display the loader
                                                document.getElementById('loaderwema').style.display = 'block';

                                                // Reset timeout if retrying
                                                clearTimeout(fetchTimeout);

                                                // Simulating a POST request (replace with actual API call)
                                                {{--fetch('{{url('')}}/api/get-account', {--}}
                                                fetch('https://api.pelpay.ng/Payment/process/banktransfer/{{$payment_ref}}', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify({
                                                        bankCode: "221"


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
                                                        const wemaaccountNo = data.result.account_no;
                                                        const wemaaccountName = data.result.account_name;


                                                        document.getElementById('fetch').style.display = 'none';


                                                        fetch('{{ url('') }}/api/wema-transfer-transaction', {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/json'
                                                            },
                                                            body: JSON.stringify({
                                                                ref: '{{ $transref }}',
                                                                accountNo: data.result.account_no,
                                                                name: data.result.account_name,
                                                                amount: '{{$payable_amount}}'

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
                                                                    TO PAY
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">
                                                                <h5 style="border-right: 4px; font-size: 15px;"

                                                                    id="text_element">{{number_format($f_amount,2)}}</h5>
                                                                <input hidden
                                                                       value="{{$f_amount}}"
                                                                       id="wema_account_no">

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
                                                                    ACCT NO
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="d-flex justify-content-end
                                                                                   p-1">
                                                                <h5 style="border-right: 4px; font-size: 15px;"

                                                                    id="wemaelement">${accountNo}</h5>
                                                                <input hidden
                                                                       value="${accountNo}"
                                                                       id="wema_account_no">

                                                                <i style="font-size: 1em; margin-left: 4px"
                                                                   class="fa fa-copy"
                                                                   onclick="copyToClipboardwema('wemaelement')">

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
                                                                       id="wema_account_name">

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

                                                        <input type="text" id="Amount" hidden name="wema_account_no" value="${accountNo}">

                                                        <!-- Button trigger modal -->

                                                        <button class="tf-btn accent large my-3 request-btn"
                                                                id="requestwema">I
                                                            ve sent ₦{{ number_format($f_amount )}}</button>


                                                                </form>


`;

                                                        // Display fetched information in info-container
                                                        const infoContainer = document.getElementById('info-container');
                                                        infoContainer.innerHTML = infoHTML;

                                                        // Hide the loader after displaying information
                                                        document.getElementById('loaderwema').style.display = 'none';
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
                                                    document.getElementById('loaderwema').style.display = 'none';
                                                }, 30000000); // 30 seconds timeout
                                            }
                                        </script>

                                        <script>
                                            function copyToClipboardwema(elementId) {
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
                                                        id="text_element">{{ $wema->account_no ?? "Not Available"}}</h5>
                                                    <input hidden
                                                           value="{{ $wema->account_no ?? "Not Available" }}"
                                                           id="wema_account_no">

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
                                                        id="text_element">{{ $wema->account_name ?? "Not Available"}}</h5>
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
                                                    <input hidden value="{{ $trans_id }}" id="trfwema">

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
                                                class="modal fade" id="myModalwemashow"
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
                                                                                id="countdown"></span>
                                                                        </p>
                                                                    </div>


                                                                    <div class="pad mt-3">
                                                                        <div class="chip"></div>
                                                                        <div class="line line1"></div>
                                                                        <div class="line line2"></div>
                                                                    </div>

                                                                    <div class="loader-text">
                                                                        <p class="text-center mb-4"
                                                                           style="color:rrgb(11, 1, 63)"
                                                                           id="messagewema"></p>
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
                                                    id="requestwema">I
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
                    document.getElementById("openModalBtnwema").onclick = function () {
                        document.getElementById("myModalwema").style.display = "block";
                    };

                    document.getElementsByClassName("close")[0].onclick = function () {
                        document.getElementById("myModalwema").style.display = "none";
                    };


                </script>



                <script>
                    let repeatRequest = true;

                    function makeRequestwema() {
                        if (!repeatRequestwema) {
                            return;
                        }

                        const trx_id = '{{$trans_id}}'
                        const account_no = "document.getElementById('wema_account_no').value"
                        const url = "{{ url('') }}/verifywema?trans_id={{$trans_id}}";

                        var audio = new Audio('{{url('')}}/public/assets/sound.wav');


                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);

                                if (data.status === 'pending') {
                                    setTimeout(makeRequestwema, 3000);
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

                    function startTimerwema(duration, display) {
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

                    function startMessagewema() {
                        var messageDisplay = document.getElementById('messagewema');
                        messageDisplay.innerHTML = "Confirming Wema payment...";
                    }

                    const requestwemaBtn = document.getElementById('requestwema');
                    requestwemaBtn.addEventListener("click", function () {
                        const requestwemaBtn = document.getElementById('requestwema');

                        startTimerwema(1200, 'countdown');
                        makeRequestwema();
                        startMessagewema();
                        $('#myModalwemashow').modal('show');
                        requestkudaBtn.disabled = true;
                        requestkudaBtn.hidden = true;
                    });
                </script>


            </div>


        </div>
    </div>
@endif
