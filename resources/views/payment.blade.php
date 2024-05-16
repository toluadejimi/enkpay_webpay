<!DOCTYPE html >
<html lang="en" style="background: white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="20">

    <!-- Mobile Specific Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Login</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
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
<div class="mt-7 login-section">
    <div class="container">

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


        <div class="row">

            <div class="col-6">

                <div class="card">

                    <div class="card-body">

                        <div class="card-header">
                            <h3>Hi, {{Auth::user()->first_name}}</h3>

                            @if(Auth::user()->email == "toluadejimi@gmail.com")

                                @if($status->palmpay_trx == 1)
                                    <a href="offpalmpay" class="btn btn-danger btn-sm">
                                        Off PalmPay
                                    </a>
                                @elseif($status->palmpay_trx == 0)
                                    <a href="onpalmpay" class="btn btn-success btn-sm">
                                        ON PalmPay
                                    </a>
                                @endif

                                @if($status->opay_trx == 1)
                                    <a href="offopay" class="btn btn-danger btn-sm">
                                        Off OPAY
                                    </a>
                                @elseif($status->opay_trx == 0)
                                    <a href="onopay" class="btn btn-success btn-sm">
                                        ON OPAY
                                    </a>

                                @endif
                                @if($status->kuda_trx == 1)
                                    <a href="offkuda" class="btn btn-danger btn-sm">
                                        Off KUDA
                                    </a>
                                @elseif($status->kuda_trx == 0)
                                    <a href="onkuda" class="btn btn-success btn-sm">
                                        ON KUDA
                                    </a>
                                @endif

                            @elseif(Auth::user()->email == "palmpay@login.com")

                                @if($status->palmpay_trx == 1)
                                    <a href="offpalmpay" class="btn btn-danger btn-sm">
                                        Off PalmPay
                                    </a>
                                @elseif($status->palmpay_trx == 0)
                                    <a href="onpalmpay" class="btn btn-success btn-sm">
                                        ON PalmPay
                                    </a>
                                @endif

                            @else
                                @if($status->opay_trx == 1)
                                    <a href="offopay" class="btn btn-danger btn-sm">
                                        Off OPAY
                                    </a>
                                @elseif($status->opay_trx == 0)
                                    <a href="onopay" class="btn btn-success btn-sm">
                                        ON OPAY
                                    </a>

                                @endif

                            @endif

                        </div>

                    </div>


                </div>


            </div>

            <div class="col-6">

                <div class="card">

                    <div class="card-body">

                        @if(Auth::user()->email == "toluadejimi@gmail.com")
                            @if($status->opay_trx == 1)
                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #44b461; background: #44b461"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">OPAY ACTIVE</label>
                                </fieldset>
                            @else

                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #f1060d; background: #f1060d"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">OPAY INACTIVE</label>
                                </fieldset>

                            @endif

                            @if($status->palmpay_trx == 1)
                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #44b461; background: #44b461"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">PalmPay ACTIVE</label>
                                </fieldset>
                            @else

                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #f1060d; background: #f1060d"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">Palmpay INACTIVE</label>
                                </fieldset>

                            @endif

                            @if($status->kuda_trx == 1)
                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #44b461; background: #44b461"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">Kuda ACTIVE</label>
                                </fieldset>
                            @else

                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #f1060d; background: #f1060d"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">Kuda INACTIVE</label>
                                </fieldset>

                            @endif

                        @elseif(Auth::user()->email == "palmpay@login.com")

                            @if($status->palmpay_trx == 1)
                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #44b461; background: #44b461"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">PalmPay ACTIVE</label>
                                </fieldset>
                            @else

                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #f1060d; background: #f1060d"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">Palmpay INACTIVE</label>
                                </fieldset>

                            @endif

                        @elseif(Auth::user()->email == "opay@login.com")


                            @if($status->opay_trx == 1)
                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #44b461; background: #44b461"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">OPAY ACTIVE</label>
                                </fieldset>
                            @else

                                <fieldset class="fieldset-radio">
                                    <input type="radio" style="background-color: #f1060d; background: #f1060d"
                                           class="tf-radio style-2" name="radioStyle2" id="radioStyle1" checked>
                                    <label for="radioStyle1">OPAY INACTIVE</label>
                                </fieldset>

                            @endif

                        @endif


                    </div>


                </div>


            </div>

            <div class="col-12 my-3">


                <h3 class="my-3">Transactions</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example" class="display" style="width:100%">

                                <thead>
                                <tr>
                                    <th>ORDER ID</th>
                                    <th>BANK</th>
                                    <th>TRS REF</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($transactions as $data)
                                    <tr>
                                        <td> {{\Carbon\Carbon::parse($data->created_at)->format('h:i A')}} </td>
                                        <td> {{$data->bank}} </td>
                                        <td> {{$data->ref}} </td>
                                        <td> {{number_format($data->amount, 2)}} </td>
                                        @if($data->status == 0)
                                            <td class="text-warning">Pending</td>
                                        @elseif($data->status == 2)
                                            <td class="text-success">Completed</td>
                                        @endif

                                        @if($data->status == 0)
                                            <td>
                                                <a href="complete-transaction?id={{$data->ref_trans_id}}"
                                                   class="my-3 btn btn-sm btn-success">Paid</a>
                                            </td>
                                            <td>
                                                <a href="delete-transaction?id={{$data->ref_trans_id}}"
                                                   class="my-3 btn btn-sm btn-danger">Remove Transaction</a>
                                            </td>
                                        @endif


                                    </tr>

                                @empty
                                    No Transaction Found
                                @endforelse


                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Include DataTables JS -->
                <script type="text/javascript" charset="utf8"
                        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

                <script>
                    // Initialize DataTable
                    $(document).ready(function () {
                        $('#example').DataTable();
                    });
                </script>


            </div>

        </div>


    </div>
</div>

<script>
    // Function to update current time and time in seconds
    function updateTime() {
        const currentTime = new Date();
        const timeInSeconds = Math.floor(currentTime.getTime() / 1000); // Convert milliseconds to seconds

        document.getElementById('current-time').textContent = currentTime.toLocaleString(); // Display current time
        document.getElementById('time-in-seconds').textContent = timeInSeconds; // Display time in seconds
    }

    // Update time initially
    updateTime();

    // Update time every second
    setInterval(updateTime, 1000);
</script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/password-addon.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/init.js"></script>


</body>

</html>
