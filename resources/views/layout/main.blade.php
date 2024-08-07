


<script src="{{ url('') }}/public/assets/dist/js/bootstrap.bundle.min.js"></script>


<script>
    let repeatRequest = true;
    function makeRequest() {
        if (!repeatRequest) {
            return;
        }

        const trx_id = document.getElementById('trx_id').value;
        const p_account_no = document.getElementById('p_account_no').value;
        const url = "{{ url('') }}/verify?trans_id=" + trx_id+"&account_no="+p_account_no;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);

                if (data.status === 'pending') {
                    setTimeout(makeRequest, 3000);



                } else if (data.status === 'success') {

                    const webhook = document.getElementById('webHook').value;
                    const amount = document.getElementById('Amount').value;

                    window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                    repeatRequest = false;
                }
            })
            .catch(error => {
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
        messageDisplay.innerHTML = "Confirming payment...";

    }


    const btn =    document.getElementById('requestButtonp');
    btn.addEventListener("click", function(){
        const btn = document.getElementById('requestButtonp');

        startTimer(1200, 'countdown');
        makeRequest();
        startMessage();
        $('#myModal').modal('show');
        btn.disabled = true;
        btn.hidden = true;

    })


</script>



<script>
    let repeatRequest = true;


    function makeRequest() {
        if (!repeatRequest) {
            return;
        }


        document.getElementById("cancle").style.visibility = "none";


        const trx_id = document.getElementById('trx_id').value;
        const p_account_no = document.getElementById('p_account_no').value;
        const url = "{{ url('') }}/verify?trans_id=" + trx_id+"&account_no="+p_account_no;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);

                if (data.status === 'pending') {
                    setTimeout(makeRequest, 3000);



                } else if (data.status === 'success') {

                    const webhook = document.getElementById('webHook').value;
                    const amount = document.getElementById('Amount').value;

                    window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                    repeatRequest = false;
                }
            })
            .catch(error => {
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
    document.getElementById('CardPost').addEventListener('click', function() {
        const url = '{{ url('') }}/api/card-transaction';
        const data = {
            ref:'{{ $ref }}'
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
        const url = "{{ url('') }}/change-state?account_no=" + p_account_no;
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


