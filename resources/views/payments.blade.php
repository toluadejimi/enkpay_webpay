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
                    <a href="/payments" class="btn btn-success">Payments</a>


                </div>


                <div class="col-sm-12 text-center my-3">


                        <input id="searchInput"  class="form-control" name="email" placeholder="Enter Email">


                </div>

            </div>

        </div>
    </div>
</div>


<div class="card-secton topup-content">
    <div class="tf-container">
        <div class="tableContainer">
            <div class="tf-balance-box" id="tableContainer">
                @include('partials.table', ['data' => $data])
            </div>
        </div>


    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableContainer = document.getElementById('tableContainer');

            console.log('Table Container:', tableContainer); // Check if this logs null

            function fetchResults(query = '', page = 1) {
                fetch(`{{ url('/payment-search') }}?query=${query}&page=${page}`)
                    .then(response => response.text())
                    .then(html => {
                        console.log('HTML Response:', html); // Check if this contains the expected content
                        if (tableContainer) {
                            tableContainer.innerHTML = html;
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const query = searchInput.value;
                    fetchResults(query);
                });
            }

            document.addEventListener('click', function(event) {
                if (event.target.matches('.pagination a')) {
                    event.preventDefault();
                    const url = new URL(event.target.href);
                    const query = searchInput.value;
                    const page = url.searchParams.get('page');
                    fetchResults(query, page);
                }
            });
        });
    </script>



    {{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--            const searchInput = document.getElementById('searchInput');--}}
{{--            const tableBody = document.getElementById('tableBody');--}}

{{--            searchInput.addEventListener('input', function() {--}}
{{--                const query = searchInput.value.toLowerCase();--}}

{{--                Array.from(tableBody.getElementsByTagName('tr')).forEach(row => {--}}
{{--                    const email = row.cells[0].textContent.toLowerCase();--}}
{{--                    if (email.includes(query)) {--}}
{{--                        row.style.display = '';--}}
{{--                    } else {--}}
{{--                        row.style.display = 'none';--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}






    <script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>
