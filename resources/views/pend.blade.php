<!DOCTYPE html >
<html lang="en" style="background: white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

                        </div>

                    </div>


                </div>


            </div>


            <div class="col-12 my-3">

                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search...">

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
                                                <a href="complete-transaction?id={{$data->ref_trans_id}}"
                                                   class="my-3 me-2 btn btn-sm btn-success">Paid</a>
                                            </td>

                                            <td>
                                                <a href="delete-transaction?id={{$data->ref_trans_id}}"
                                                   class="my-3 me-2 btn btn-sm btn-danger">Remove</a>
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
