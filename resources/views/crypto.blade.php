<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ENK - CRYPTO</title>
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
                <div class="mb-5">


                    @if ($errors->any())
                    <div class="alert alert-danger">
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
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif

                    <input type="text" id="searchInput"
                        class="w-full text-white bg-white bg-opacity-20 rounded-full border-2 border-transparent focus:border-white focus:border-opacity-50 focus:outline-none px-3 py-1 leading-none text-sm transition-colors placeholder-white placeholder-opacity-50"
                        placeholder="Search...">


                </div>
                <h1 class="text-3xl font-light mb-3">Pay ${{ number_format($amount_in_usd, 2) }}</h1>
                <h6 class="font-light mb-3">Choose Crypto</h6>

            </div>


            <div class="bg-gray-50 px-2" id="results">

                <ul class="relative -top-10">


                    @forelse ($curr as $data)
                    <a
                        href="crypto-price?curr={{ $data->code }}&name={{ strtoupper($data->name) }}&amount={{$amount_in_usd}}&image={{$data->logo_url}}&webhook={{ $webhook}}&key={{ $key }}&order_id={{ $order_id }}">
                        <li
                            class="crypto-item mb-2 bg-white p-3 shadow-lg rounded cursor-pointer transition-colors border-b-2 border-transparent hover:border-pink-500">
                            <div class="flex items-center">
                                <div class="w-16 text-3xl leading-none mr-4">
                                    <img src="https://nowpayments.io/{{ $data->logo_url }}" height="50" width="50"
                                        alt="">
                                </div>

                                <div class="w-full">{{ strtoupper($data->name) }}<span
                                        class="ml-3 text-gray-400"></span>
                                </div>
                                <div class="text-green-500">${{ number_format($amount_in_usd, 2) }}</div>
                            </div>
                        </li>
                    </a>
                    @empty
                    <li
                        class="crypto-item mb-2 bg-white p-3 shadow-lg rounded cursor-pointer transition-colors border-b-2 border-transparent hover:border-pink-500">
                        <div class="flex items-center">
                            <div class="w-16 text-3xl leading-none">
                            </div>
                            <div class="w-full">NO CRYPTO AVAILABE<span class="ml-3 text-gray-400"></span></div>
                        </div>
                    </li>
                    @endforelse
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
                        <a href="/"
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
