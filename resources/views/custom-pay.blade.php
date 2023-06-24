<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>ENKPAY | PAY</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>
        ::-webkit-scrollbar {
            width: 8px;
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

        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif
        }

        body {
            background-color: #000000;
        }

        .container {
            margin: 20px auto;
            width: 800px;
            padding: 30px
        }

        .card.box1 {
            width: 350px;
            height: 390px;
            background-color: #0a178e;
            color: #ffffff;
            border-radius: 0
        }

        .card.box2 {
            width: 450px;
            height: 470px;
            background-color: #ffffff;
            border-radius: 0
        }

        .text {
            font-size: 13px
        }

        .box2 .btn.btn-primary.bar {
            width: 20px;
            background-color: transparent;
            border: none;
            color: #ffffff
        }

        .box2 .btn.btn-primary.bar:hover {
            color: #120371
        }

        .box1 .btn.btn-primary {
            background-color: #9999fb;
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ddd
        }

        .box1 .btn.btn-primary:hover {
            background-color: #f6f8f7;
            color: #57c97d
        }

        .btn.btn-success {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none
        }

        .nav.nav-tabs {
            border: none;
            border-bottom: 2px solid #ddd
        }

        .nav.nav-tabs .nav-item .nav-link {
            border: none;
            color: black;
            border-bottom: 2px solid transparent;
            font-size: 14px
        }

        .nav.nav-tabs .nav-item .nav-link:hover {
            border-bottom: 2px solid #3ecc6d;
            color: #05cf48
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            border-bottom: 2px solid #3ecc6d
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
            height: 20px;
            font-weight: 600;
            font-size: 14px;
            padding: 15px 0px;
            letter-spacing: 1.5px;
            border-radius: 0
        }

        .inputWithIcon {
            position: relative
        }

        img {
            width: 50px;
            height: 20px;
            object-fit: cover
        }

        .inputWithIcon span {
            position: absolute;
            right: 0px;
            bottom: 9px;
            color: #010564;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 1px solid #ddd
        }

        .btn-outline-primary {
            color: black;
            background-color: #ddd;
            border: 1px solid #ddd
        }

        .btn-outline-primary:hover {
            background-color: #05cf48;
            border: 1px solid #ddd
        }

        .btn-check:active+.btn-outline-primary,
        .btn-check:checked+.btn-outline-primary,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show,
        .btn-outline-primary:active {
            color: #baf0c3;
            background-color: #3ecc6d;
            box-shadow: none;
            border: 1px solid #ddd
        }

        .btn-group>.btn-group:not(:last-child)>.btn,
        .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
        .btn-group>.btn-group:not(:first-child)>.btn,
        .btn-group>.btn:nth-child(n+3),
        .btn-group>:not(.btn-check)+.btn {
            border-radius: 50px;
            margin-right: 20px
        }

        form {
            font-size: 14px
        }

        form .btn.btn-primary {
            width: 100%;
            height: 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #00006e;
            border: 1px solid #ddd
        }

        form .btn.btn-primary:hover {
            background-color: #000000
        }

        @media (max-width:750px) {
            .container {
                padding: 10px;
                width: 100%
            }

            .text-green {
                font-size: 14px
            }

            .card.box1,
            .card.box2 {
                width: 100%
            }

            .nav.nav-tabs .nav-item .nav-link {
                font-size: 12px
            }
        }

        /* Pre-loader CSS */
.page-loader{
    width: 100%;
    height: 100vh;
    position: absolute;
    background: #272727;
    z-index: 1000;
    .txt{
        color: #666;
        text-align: center;
        top: 40%;
        position: relative;
        text-transform: uppercase;
        letter-spacing: 0.3rem;
        font-weight: bold;
        line-height: 1.5;
    }
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
  0% { -webkit-transform: scale(0) }
  100% {
    -webkit-transform: scale(1.0);
    opacity: 0;
  }
}

@keyframes sk-scaleout {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
  } 100% {
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





<div class="page-loader">
    <div class="spinner"></div>
    <div class="txt">ENKPAY</div>
</div>




<body className='snippet-body'>

    <body onload="hideLoader()">

    <div class="container bg-light d-md-flex align-items-center">
        <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
            <div class="fw-bolder mb-4"></span><span class="ps-1">{{ $business_name ?? "Wrong or Invalid Webkey" }}</span></div>
            <div class="d-flex flex-column">

                <div class="border-bottom mb-4"></div>
                <div class="d-flex flex-column mb-4"> <span class="far fa-file-alt text"><span class="ps-2">Invoice
                            ID:</span></span> <span class="ps-3">{{ $trans_id }}</span> </div>





                <div class="d-flex flex-column mb-5"> <span class="far fa-envelope text"><span class="ps-2">Customer
                Email:</span></span> <span class="ps-3">{{ $customer_email }}</span> </div>
                <div class="d-flex align-items-center justify-content-between text mt-5">





                    <div class="d-flex flex-column text"> <span>Powered By:</span> <span>ENKPAY</span>
                    </div>
                    <div class="btn btn-primary rounded-circle"><span class="fas fa-comment-alt"></span></div>
                </div>
            </div>
        </div>
        <div class="card box2 shadow-sm">
            <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span
                    class="h5 fw-bold m-0">Payment Details</span>


            </div>







            <form action="custom-pay-now" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Enter amount to pay (NGN)</span>
                            <div class="inputWithIcon"> <input name="amount" class="form-control" type="number"placeholder="100"
                                autofocus required <span class=""> </span> </div>
                        </div>
                    </div>



                    <input name="key" value="{{ $key }}" hidden >
                    <input name="trans_id" value="{{ $trans_id }}" hidden >
                    <input name="customer_email" value="{{ $customer_email }}" hidden >


                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Description</span>
                            <div class="inputWithIcon"> <input name="desp" class="form-control" type="text"placeholder="Ex. Nike Shoe"
                                autofocus  <span class=""> </span> </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Other Information</span>
                            <div class="inputWithIcon"> <input name="other" class="form-control text-uppercase" type="text"
                                    placeholder="Ex. Customer Name"> <span class="far fa-user"></span> </div>
                        </div>
                    </div>
                    <div class="col-12 px-md-5 px-4 mt-3">
                        <button type="submit" class="btn btn-primary w-100">Pay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'>
    </script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>
        #
    </script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });
    </script>

</body>

</html>
