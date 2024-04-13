@extends('layout.main')
@section('content')


    <div class="wrap-success">


        <div class="success_box">
            <div class="icon-1 ani3">
                <span class="circle-box lg bg-circle check-icon"></span>
            </div>
            <div class="icon-2 ani5">
                <span class="circle-box md bg-circle"></span>
            </div>
            <div class="icon-3 ani8">
                <span class="circle-box md bg-circle"></span>
            </div>
            <div class="icon-4 ani2">
                <span class="circle-box sm bg-circle"></span>
            </div>


            <div class="content">
                <div class="top">
                    <h2>Payment Successful!</h2>
                    <p class="fw_4">Transaction completed</p>
                </div>
                <div class="tf-spacing-16"></div>
                <div class="inner">
                    <p class="on_surface_color fw_6">Transaction ID</p>
                    <h1>{{ $trans_id ?? "Refrence No" }}</h1>
                </div>

                <div class="tf-spacing-16"></div>

                @if($wc != 'custpay' )
                <div class="bottom">
                    <p>You should be automatically redirected back to merchant in <span id="seconds">7</span>
                        seconds.</p>
                </div>
                    <a class="tf-btn accent large my-4" href="{{ $marchant_url }}?amount={{ $amount }}&trans_id={{ $trans_id }}&status=success&wc_order={{ $wc_order }}&client_id={{ $client_id }}">Back to merchant</a>
                @else
                    <a href="{{ $recepit }}" class="tf-btn accent large my-4">View / Print Receipt</a>
                @endif


            </div>

        </div>

        <span class="line-through through-1"></span>
        <span class="line-through through-2"></span>
        <span class="line-through through-3"></span>
        <span class="line-through through-4"></span>
        <span class="line-through through-5"></span>
        <span class="line-through through-6"></span>

    </div>


@endsection





    <script>
        var seconds = 4; // seconds for HTML
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
