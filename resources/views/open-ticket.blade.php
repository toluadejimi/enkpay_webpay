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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="tf-container my-3">
        <h3 class="fw_6">Transaction Details</h3>
        <div class="tf-spacing-12"></div>
        <ul class="list-card-info">
            <li>Ticket ID <span>{{$ticket->id}}</span></li>
            <li>Username <span>{{$ticket->username}}</span></li>
            <li>Email <span>{{$ticket->email}}</span></li>
            <li>User Contact <span><a href="tel:{{$ticket->r_phone}}">{{$ticket->r_phone}}</a></span></li>
            <li>Deposit Amount <span>NGN {{number_format($ticket->d_amount, 2)}}</span></li>
            <li>Receipt Amount <span>NGN {{number_format($ticket->r_amount, 2)}}</span></li>
            <li>Refrence <span>{{$ticket->ref}}</span></li>
            <li>Session ID <span>{{$ticket->session}}</span></li>
            <li>Nigerian Time <span>{{$ticket->n_time}}</span></li>
            <li>Receipt Image <span></span><a href="{{$ticket->recepit}}">View</a></li>


            @if($ticket->status == 0)
                <li>Status<span><a href="#" class="btn btn-warning">Pending</a></span></li>
            @elseif($ticket->status == 3)
                <li>Status<span><a href="#" class="btn btn-danger">Rejected</a></span></li>
            @elseif($ticket->status ==4)
                <li>Status<span><a href="#" class="btn btn-success">Already Funded</a></span></li>
            @elseif($ticket->status ==5)
                <li>Status<span><a href="#" class="btn btn-warning">Ticket on Hold</a></span></li>
            @else
                <li>Status<span><a href="#" class="btn btn-success">Completed</a></span></li>

            @endif

        </ul>
    </div>
</div>


<div class="tf-balance-box">
    @foreach($similar as $data)

        <div class="tf-card-block d-flex align-items-center justify-content-between my-3">
            <div class="inner d-flex align-items-center">

                <div class="content">
                    <p>{{$data->id}}</p>
                    <p>{{$data->email}}</p>
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
            @elseif($data->status == 5)
                <a href="#" class="btn btn-warning">Ticket on Hold</a>
            @else
                <a href="#" class="btn btn-success">Completed</a>

            @endif


        </div>

    @endforeach

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
                            <a href="edit-ticket?id={{$ticket->id}}" id="btn-popup-up"
                               class="tf-btn warning large">Edit</a>
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
