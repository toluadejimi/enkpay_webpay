<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Deetails</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css"/>
    <link rel="manifest" href="{{url('')}}/public/assets/assets/_manifest.json"
          data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body style="background: white">
<!-- preloade -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->
<div class="header is-fixed">



    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="38_card-detail.html#" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Card info</h3>
        </div>
    </div>
</div>
<div id="app-wrap">


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





    <div class="tf-container my-3">
        <h3 class="fw_6">Transaction Details | ID - {{$ticket->id}}</h3>
        <div class="tf-spacing-12"></div>
        <ul class="list-card-info">


            <form action="edit-now" method="post">
                @csrf

                <label class="my-1">Email</label>
                <input class="form-control" type="email" value="{{$ticket->email}}" name="email">

                <label class="my-1">Deposit Amount</label>
                <input class="form-control" type="number" value="{{$ticket->d_amount}}" name="d_amount">


                <label class="my-1">Receipt Amount</label>
                <input class="form-control" type="number" value="{{$ticket->r_amount}}" name="r_amount">
                <input hidden  value="{{$ticket->id}}" name="id">



                <label class="my-1">Status</label>
                <select class="form-control" name="status">
                    <option value="{{$ticket->status}}">Select or leave</option>
                    <option value="0">Pending</option>
                    <option value="5">Hold</option>

                </select>

                <button type="submit" class="btn btn-success w-100 my-3">
                    Submit
                </button>


            </form>







        </ul>
    </div>

        @if($ticket->status == 0 || $ticket->status == 5 )
            <div class="box-card-advanced mt-5">
                <div class="tf-container">
                    <h3 class="fw_6">Action</h3>
                    <div class="tf-spacing-12"></div>

                    <div class="row d-flex justify-content-center mt-3 mb-4">
                        <div class="col-6 ">
                            <a href="deposit-approve?id={{$ticket->id}}" class="btn btn-success w-100">Approve</a>  </li>
                        </div>
                        <div class="col-6">
                            <a href="deposit-funded?id={{$ticket->id}}" class="btn btn-secondary w-100">Funded</a>
                        </div>
                    </div>


                    <div class="row mb-5 d-flex justify-content-center mt-3 mb-4">

                        <div class="col mb-5 d-flex justify-content-center">
                            <a href="hold-ticket?id={{$ticket->id}}" class="btn btn-primary w-100">Hold</a>
                        </div>

                        <div class="col mb-5">
                            <a href="deposit-delete?id={{$ticket->id}}" class="btn btn-danger w-100">Delete</a>
                        </div>
                    </div>

                    <hr class="mb-5">


                    <div class="row mb-5">



                        <div class="bottom-navigation-bar">
                            <div class="tf-container">
                                <a href="/all-issues" id="btn-popup-up" class="btn btn-success w-100">Back to all issues</a>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        @else
        @endif
</div>









<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/count-down.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
