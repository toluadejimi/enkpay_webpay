<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>top up</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css"/>
    <link rel="manifest" href="{{url('')}}/public/assets/assets/__manifest.json"
          data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">
</head>

<body>
<!-- preloade -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->
<div class="app-header st1">
    <div class="tf-container">
        <div class="tf-topbar d-flex justify-content-center align-items-center">
            <a href="29_topup.html#" class="back-btn"><i class="icon-left white_color"></i></a>
            <h3 class="white_color">Resolve Transaction</h3>
        </div>
    </div>
</div>


<div class="card-secton topup-content">
    <div class="tf-container">
        <div class="tf-balance-box">


            <form action="submit-resolve" enctype="multipart/form-data" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger my-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger mt-2">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <label>Reasons</label>
                <select class="form-control" name="subject" required>
                    <option value=""> Select Reasons</option>
                    <option value="1"> I Didn't Add Refrence</option>
                    <option value="2"> I entered wrong amount</option>
                    <option value="3"> I added valid Refrence but not processed</option>

                </select>

                <hr>


                <label>Select Bank Paid to</label>
                <select class="form-control" name="pay_type" required>
                    <option value=""> Select Bank </option>
                    <option value="opay"> OPAY</option>
                    <option value="palmpay">Palmpay</option>
                    <option value="psb">9PSB</option>
                    <option value="wema">9PSB</option>
                </select>


                <hr>

                <label>Enter Email used on the site</label>
                <input type="email" id="email" class="form-control" name="email" required>

                <div class="text-danger my-2" id="result">verifying email</div>

                <input type="text" name="username" id="usernameResult" class="form-control" readonly
                       style="display: none;">


                <script>
                    document.getElementById('email').addEventListener('input', function () {
                        document.getElementById('result').textContent = ''; // Clear previous result
                        toggleVerifyButton(false); // Disable verify button on input change
                    });

                    document.getElementById('email').addEventListener('blur', function () {
                        var email = this.value.trim();
                        if (email !== '') {
                            verifyEmail(email);
                        }
                    });

                    function toggleVerifyButton(enabled) {
                        document.getElementById('verifyButton').disabled = !enabled;
                    }

                    function verifyEmail(email) {
                        fetch('{{$check_url}}', {
                            method: 'POST',
                            body: new URLSearchParams({
                                email: email
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.error) {
                                    document.getElementById('result').textContent = 'Account not found or not a customer email. Please try again.';
                                    toggleVerifyButton(false); // Keep button disabled on error
                                    document.getElementById('usernameResult').style.display = 'none'; // Hide username result field on error
                                } else {
                                    console.log(data);
                                    document.getElementById('result').textContent = 'Your Username is: ' + data.username;
                                    document.getElementById('usernameResult').value = data.username; // Set username in input field
                                    document.getElementById('usernameResult').style.display = 'block'; // Show username result field
                                    toggleVerifyButton(true); // Enable button on successful verification
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                document.getElementById('result').textContent = 'Error verifying email. Please try again later.';
                                toggleVerifyButton(false); // Keep button disabled on error
                                document.getElementById('usernameResult').style.display = 'none'; // Hide username result field on error
                            });
                    }

                    // Disable submit button initially
                    toggleVerifyButton(false);
                </script>


                <hr>

                <label>Enter Refrence from payment page (optional)</label>
                <input name="ref" type="text" class="form-control" placeholder="24557758BS">

                <hr>

                <label>Enter Deposit Amount</label>
                <input name="d_amount" type="number" class="form-control" placeholder="1000" required>

                <hr>

                <label>Enter Receipt Amount</label>
                <input name="r_amount" type="number" class="form-control" placeholder="1000" required>
                <input name="user_id" value="{{$user_id ?? "no id"}}" hidden>

                <hr>
                <label>Upload Bank Receipt</label>
                <input name="receipt" type="file" accept=".png, .jpeg, .jpg, .pdf" class="form-control" placeholder="add recepit" required>


                <hr>
                <label>Enter receipt session ID</label>
                <input name="t_session" type="text" class="form-control" placeholder="8858885884747474744">


                <hr>
                <label>Enter Transaction Date/time (If you use VPN to send convert to Nigerian Time)</label>
                <input name="n_time" type="datetime-local" class="form-control" placeholder="00:00">


                <hr>
                <label>Enter phone number to reach out to you</label>
                <input name="r_phone" type="number" class="form-control" placeholder="12356788">


                <button type="submit" id="verifyButton" class="tf-btn accent large my-3">Resolve now</button>

            </form>

            <hr>
            <a href="track-request" class="d-flex justify-content-center tf-btn accent large my-3"> Track Previous
                Request</a>


        </div>

    </div>

</div>


<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
