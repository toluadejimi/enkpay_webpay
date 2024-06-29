<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Deetails</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png" />
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png" />
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css" />
    <link rel="manifest" href="{{url('')}}/public/assets/assets/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">
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


    <div class="tf-container">
        <div class="tf-statusbar d-flex justify-content-center align-items-center">
            <a href="38_card-detail.html#" class="back-btn"> <i class="icon-left"></i> </a>
            <h3>Card info</h3>
        </div>
    </div>
</div>
<div id="app-wrap">



        <div class="tf-container my-3">
            <h3 class="fw_6">Transaction Details</h3>
            <div class="tf-spacing-12"></div>
            <ul class="list-card-info">
                <li>Username <span>{{$ticket->username}}</span> </li>
                <li>Email <span>{{$ticket->email}}</span> </li>
                <li>User Contact <span><a href="tel:{{$ticket->r_phone}}">{{$ticket->r_phone}}</a></span> </li>
                <li>Deposit Amount <span>NGN {{number_format($ticket->d_amount, 2)}}</span> </li>
                <li>Receipt Amount <span>NGN {{number_format($ticket->r_amount, 2)}}</span> </li>
                <li>Refrence <span>{{$ticket->ref}}</span> </li>
                <li>Session ID <span>{{$ticket->session}}</span> </li>
                <li>Nigerian Time <span>{{$ticket->n_time}}</span> </li>
                <li>Receipt Image <span></span><a href="{{$ticket->recepit}}">View</a></li>


                @if($ticket->status == 0)
                    <li>Status<span><a href="#" class="btn btn-warning">Pending</a></span> </li>
                @elseif($ticket->status == 3)
                    <li>Status<span><a href="#" class="btn btn-danger">Rejected</a></span> </li>
                @elseif($ticket->status ==4)
                    <li>Status<span><a href="#" class="btn btn-success">Already Funded</a></span> </li>
                @else
                    <li>Status<span><a href="#" class="btn btn-success">Completed</a></span> </li>

                @endif

            </ul>
        </div>
    </div>

@if($ticket->status == 0)
    <div class="box-card-advanced mt-5">
        <div class="tf-container">
            <h3 class="fw_6">Action</h3>
            <div class="tf-spacing-12"></div>

                <div class="row my-3">
                    <div class="col">
                        <a href="deposit-approve?id={{$ticket->id}}" class="btn btn-success">Approve</a>  </li>
                    </div>
                    <div class="col">
                        <a href="deposit-decline?id={{$ticket->id}}" class="btn btn-danger">Decline</a>
                    </div>
                </div>




            <div class="row mb-5">
                <div class="col">
                    <a href="deposit-funded?id={{$ticket->id}}" class="btn btn-secondary">Funded</a>
                </div>
                <div class="col">
                    <a href="deposit-delete?id={{$ticket->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>

        </div>
    </div>
@else
@endif







<div class="tf-panel up">
    <div class="panel_overlay"></div>
    <div class="panel-box panel-up wrap-panel-clear">
        <div class="heading">
            <p>Are you sure you want to delete this card?</p>
            <a href="38_card-detail.html#" class="critical_color">Delete</a>
        </div>
        <div class="bottom">
            <a class="clear-panel" href="38_card-detail.html#">Cancel</a>
        </div>
    </div>
</div>




<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/count-down.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
