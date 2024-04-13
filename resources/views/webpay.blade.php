@extends('layout.main')
@section('content')

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
                    <h4 class="secondary_color fw_4 mb-3">Make sure you send exact amount</h4>

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

        @if($card == 1)
            <div class="tf-container">
                <div class="tf-card-block d-flex align-items-center justify-content-between">
                    <div class="inner d-flex align-items-center">
                        <i class="logo icon-credit-card2"></i>
                        <div class="content">
                            <h4><a href="{{ $pre_link }}" class="fw_6">Pay With Debit Card</a></h4>
                            <i>Transaction may attract extra charge</i>
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
                                           aria-expanded="false" aria-controls="collapseTwo" class="fw_6">Pay With Bank
                                            Transfer</a></h4>
                                    <p>Transfer to a bank account</p>
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


                                                <button class="tf-btn accent large my-3" id="requestButtonp">I
                                                    ve sent ₦{{
                                        number_format($payable_amount )}}

                                                </button>


                                            </form>

                                        </div>


                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>

                @endif
            </div>

    </div>


    {{--                @endif--}}


    <div class="bottom-navigation-bar">
        <div class="tf-container">
            <a href="decline?trans_id={{ $trans_id }}&key={{ $key }}" class="tf-btn danger large">Cancel
                Transaction</a>
        </div>
    </div>

@endsection

