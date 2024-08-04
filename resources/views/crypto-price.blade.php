<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ENK CRYPTO</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&amp;display=swap'>
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/cryptocoins-icons@2.9.0/webfont/cryptocoins.css'>
    <link rel="stylesheet" href="{{ url('') }}/public/assets/stylec.css">

</head>

<body>
    <!-- partials:index.partials.html -->
    <div class="min-w-screen min-h-screen bg-gray-50 flex items-center justify-center px-3 py-5">
        <div class="w-full bg-white text-gray-800 overflow-hidden border-4 border-white rounded-4xl shadow-lg relative"
            style="max-width:414px;">
            <div class="phone-top">
                <div class="phone-top-inner"></div>
            </div>



            <div class="w-full bg-gradient-to-br from-yellow-500 to-pink-600 pt-12 pb-12 px-4 text-white text-center">

                <div class="">
                    <img src="{{ $image }}" class=""
                        style="max-height: 60px; margin: 0px 125px 0px;" width="60" alt=""><br>
                </div>

                <h6 class="font-bold mt-4">{{ $name }}</h6>



            </div>


            <div class="bg-gray-50 px-2" id="results">

                <ul class="relative -top-10">
                    <li
                        class="text-center mb-5 crypto-item mb-2 bg-white p-3 shadow-lg rounded cursor-pointer transition-colors border-b-2 border-transparent hover:border-pink-500">
                        <div class="row mx-0 pt-5 d-flex justify-content-center">
                            <div class="col-xs-4 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                                <div class="card shadow-lg">

                                    <div class="card-header card-body card-header-divider text-center">
                                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin%3A1DonateWffyhwAjskoEwXt83pHZxhLTr8H%3Famount%3D0.15050000"
                                            style="max-width: 190px; margin: 0px 60px;" alt="">
                                    </div>
                                    <div class="card-body px-0">
                                        <p class="text-center">
                                            <small><strong>1DonateWffyhwAjskoEwXt83pHZxhLTr8H</strong></small>
                                        </p>
                                        <hr>
                                        <p class="text-muted text-center">Scan QR code and top-up your<br>
                                            Bitcoin balance for any amount.<br>
                                            Payment will be credited after 1 confirmation.<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>



            </div>


            <script>
                // JavaScript to filter items based on the search input
                document.getElementById('searchInput').addEventListener('input', function () {
                    var searchQuery = this.value.toLowerCase();
                    var items = document.querySelectorAll('.crypto-item');

                    items.forEach(function (item) {
                        var itemName = item.textContent.toLowerCase();
                        item.style.display = itemName.includes(searchQuery) ? 'block' : 'none';
                    });
                });
            </script>






            <div class="px-5 bg-white pb-2">
                <div class="flex">
                    <div class="flex-1 group">
                        <a href="#"
                            class="flex items-end justify-center text-center mx-auto px-4 w-full text-gray-400 group-hover:text-pink-500 border-b-2 border-transparent group-hover:border-pink-500">
                            <span class="block px-1">
                                <i class="far fa-home text-xl pt-1 mb-1 block"></i>
                                <span class="block text-xs pb-1">Home</span>
                            </span>
                        </a>
                    </div>
                    <div class="flex-1 group">
                        <a href="#"
                            class="flex items-end justify-center text-center mx-auto px-4 w-full text-gray-400 group-hover:text-pink-500 border-b-2 border-transparent group-hover:border-pink-500">
                            <span class="block px-1">
                                <i class="far fa-compass text-xl pt-1 mb-1 block"></i>
                                <span class="block text-xs pb-1">Explore</span>
                            </span>
                        </a>
                    </div>
                    <div class="flex-1 group">
                        <a href="#"
                            class="flex items-end justify-center text-center mx-auto px-4 w-full text-gray-400 group-hover:text-pink-500 border-b-2 border-transparent group-hover:border-pink-500">
                            <span class="block px-1">
                                <i class="far fa-search text-xl pt-1 mb-1 block"></i>
                                <span class="block text-xs pb-1">Search</span>
                            </span>
                        </a>
                    </div>
                    <div class="flex-1 group">
                        <a href="#"
                            class="flex items-end justify-center text-center mx-auto px-4 w-full text-gray-400 group-hover:text-pink-500 border-b-2 border-transparent group-hover:border-pink-500">
                            <span class="block px-1">
                                <i class="far fa-cog text-xl pt-1 mb-1 block"></i>
                                <span class="block text-xs pb-1">Settings</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partials -->




</body>

</html>
