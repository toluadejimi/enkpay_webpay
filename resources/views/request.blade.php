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
            <h3 class="white_color">{{$title}}</h3>
        </div>



        <div class="row my-3 p-2">

            <div class="row">
                <div class="col-sm-12 text-center">
                    <a href="/all-issues" class="btn btn-primary btn-md center-block">All Issues</a>
                    <a href="/no-ref" class="btn btn-primary btn-md center-block">No Refrence</a>
                    <a href="/ref-no-credit" class="btn btn-secondary">Ref but no credit</a>
                    <a href="/wrong-amount" class="btn btn-secondary">Wrong Amount</a>
                    <a href="/hold" class="btn btn-warning">Hold</a>
                    <a href="/approved" class="btn btn-success">Approved</a>
                    <a href="/payments" class="btn btn-danger">Payments</a>
                    <a href="/opayticket" class="btn btn-danger">Opay Ticket</a>
                    <a href="/palmpayticket" class="btn btn-danger">Palmpay Ticket</a>
                    <a href="/ninepsbticket" class="btn btn-danger">9PSB Ticket</a>






                </div>


                    <div class="col-sm-12 text-center my-3">

                        <form class="form-control" action="search" method="POST">
                            @csrf
                            <input class="form-control" name="email" placeholder="Enter Email">
                            <button class="btn btn-primary" type="submit">Search</button>

                        </form>
                    </div>

            </div>

        </div>
    </div>
</div>


<div class="card-secton topup-content">
    <div class="tf-container">

        <div class="tf-balance-box">
            @foreach($tickets as $data)

                <div class="tf-card-block d-flex align-items-center justify-content-between my-3">
                    <div class="inner d-flex align-items-center">

                        <div class="content">
                            <p>Resolve ID - {{$data->id}}</p>
                            <h4><a href="open-ticket?id={{$data->id}}"
                                   class="fw_6">NGN {{number_format($data->d_amount, 2)}}</a></h4>
                            @if($data->subject == 1)
                                <p> I didnt add refrence</p>
                            @elseif($data->subject == 2)
                                <p>I entered wrong amount</p>
                            @elseif($data->subject == 3)
                                <p>I entered valid refrence but transaction not processed</p>
                            @else

                            @endif

                            <p>{{$data->created_at}}</p>
                        </div>
                    </div>
                    @if($data->status == 0)
                        <a href="#" class="btn btn-warning">Pending</a>
                    @elseif($data->status == 3)
                        <a href="#" class="btn btn-danger">Rejected</a>
                    @elseif($data->status == 4)
                        <a href="#" class="btn btn-success">Already Funded</a>
                    @elseif($data->status == 5)
                        <a href="#" class="btn btn-danger">Ticket on Hold</a>
                    @else
                        <a href="#" class="btn btn-success">Completed</a>

                    @endif


                </div>

            @endforeach
        </div>

    </div>

</div>


<div class="card-secton topup-content my-5">


</div>


<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
