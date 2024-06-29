<!DOCTYPE html >
<html lang="en" style="background: white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="30">

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


        <div class="row">




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


                @if(Auth::user()->email == "toluadejimi@gmail.com")



                @endif


            <div class="col-12 my-3">
                <h3 class="my-3">Transactions</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="dataTable" class="display" style="width:100%">

                                <thead>
                                <tr>
                                    <th>ORDER ID</th>
                                    <th>BANK</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($transactions as $data)
                                    <tr>
                                        <td> {{$data->ref}} </td>
                                        <td> {{$data->bank}} </td>
                                        <td> {{number_format($data->amount, 2)}} </td>
                                        <td> {{\Carbon\Carbon::parse($data->created_at)->format('h:i A')}} </td>
                                        @if($data->status == 0)
                                            <td class="text-warning">Pending</td>
                                        @elseif($data->status == 2)
                                            <td class="text-success">Completed</td>
                                        @endif



                                        @if($data->status == 0)
                                            <td>
                                                <a onclick="hideButton(this)"
                                                   href="complete-transaction?id={{$data->ref_trans_id}}"
                                                   class="my-3 me-2 btn btn-sm btn-success">Paid</a>
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


                <script>
                    function hideButton(link) {
                        // Hide the clicked link
                        link.style.display = 'none';

                        setTimeout(function () {
                            link.style.display = 'inline'; // or 'block' depending on your layout
                        }, 5000); // 5 seconds
                    }
                </script>


                <script>
                    function searchTable() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("searchInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("dataTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0]; // Change index to the column you want to search
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>


            </div>


            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search...">


            <div class="col-6">

                <div class="card">

                    <div class="card-body">

                        <div class="card-header">
                            <h3>Hi, {{Auth::user()->first_name}}</h3>

                            @if(Auth::user()->email == "toluadejimi@gmail.com")

                                <a href="pend" class="btn btn-warning w-100 btn-sm">
                                    Pending
                                </a>

                                @if($status->pay_by_crypto == 1)
                                    <a href="offcrypto" class="btn btn-danger btn-sm">
                                        Off Card
                                    </a>
                                @elseif($status->pay_by_crypto == 0)
                                    <a href="offcrypto" class="btn btn-success btn-sm">
                                        ON Card
                                    </a>
                                @endif


                                @if($status->pay_by_card == 1)
                                    <a href="offcard" class="btn btn-danger btn-sm">
                                        Off Card
                                    </a>
                                @elseif($status->pay_by_card == 0)
                                    <a href="oncard" class="btn btn-success btn-sm">
                                        ON Card
                                    </a>
                                @endif

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

                                @if($status->pay_with_providus == 1)
                                    <a href="offpro" class="btn btn-danger btn-sm my-2">
                                        Off PRO
                                    </a>
                                @elseif($status->pay_with_providus == 0)
                                    <a href="onpro" class="btn btn-success btn-sm my-2">
                                        ON PRO
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

            <div class="col-12 my-2">

                <div class="card">

                    <div class="card-body">


                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Support Channel</h5>

                                    </div>
                                    <div class="modal-body border-0">


                                        <div class="card border-0">

                                            <div class="card-body">

                                                <form action="change-support" method="POST">
                                                    @csrf


                                                    <select class="form-control" name="support">
                                                        <option value="">Select Support</option>
                                                        <option
                                                            value="https://api.whatsapp.com/send?phone=2349138653644&text=Hi%2C%20Please%20i%20need%20your%20support%20">
                                                            Divine
                                                        </option>
                                                        <option
                                                            value="https://api.whatsapp.com/send?phone=2347042653595&text=Hi%2C%20Please%20i%20need%20your%20support%20">
                                                            Vera
                                                        </option>

                                                    </select>

                                                </form>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>


                </div>


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
