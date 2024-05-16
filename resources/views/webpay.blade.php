<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Pay</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <link rel="apple-touch-icon-precomposed" href="{{url('')}}/public/assets/assets/images/logo.png"/>
    <!-- Font -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/fonts.css"/>
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/fonts/icons-alipay.css">
    <link rel="stylesheet" href="{{url('')}}/public/assets/assets/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/public/assets/assets/styles/styles.css"/>
    <link rel="manifest" href="{{url('')}}/public/assets/assets/manifest.json"
          data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="{{url('')}}/public/assets/assets/app/icons/icon-192x192.png">

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>



</head>

<body class="bg_surface_color">

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
            <a href="25_payment-source.html%3F.html#" class="back-btn"><i class="icon-left white_color"></i></a>
            <h3 class="white_color">Amount to Pay</h3>
        </div>
    </div>
</div>


<div class="card-secton transfer-section">
    <div class="tf-container">
        <div class="tf-balance-box transfer-amount">
            <div class="top mt-1">
                <p class="text-small text-danger my-2">Do not refresh payment page</p>

                <svg class="my-2" width="38" height="38" viewBox="0 0 49 53" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0 5.53874C0 2.38739 2.436 0 5.25 0H43.75C46.564 0 49 2.38739 49 5.53874V26.9297C49 30.0811 46.564 32.4685 43.75 32.4685H5.25C2.436 32.4685 0 30.0811 0 26.9297V5.53874ZM31.5 16.2342C31.5 18.2604 30.7625 20.2036 29.4497 21.6363C28.137 23.069 26.3565 23.8739 24.5 23.8739C22.6435 23.8739 20.863 23.069 19.5503 21.6363C18.2375 20.2036 17.5 18.2604 17.5 16.2342C17.5 14.2081 18.2375 12.2649 19.5503 10.8322C20.863 9.39948 22.6435 8.59459 24.5 8.59459C26.3565 8.59459 28.137 9.39948 29.4497 10.8322C30.7625 12.2649 31.5 14.2081 31.5 16.2342ZM12.25 17.1892C12.25 16.813 12.1821 16.4404 12.0502 16.0929C11.9183 15.7453 11.7249 15.4295 11.4812 15.1634C11.2374 14.8974 10.948 14.6864 10.6295 14.5424C10.3111 14.3984 9.96972 14.3243 9.625 14.3243C9.28028 14.3243 8.93894 14.3984 8.62046 14.5424C8.30198 14.6864 8.0126 14.8974 7.76884 15.1634C7.52509 15.4295 7.33173 15.7453 7.19982 16.0929C7.0679 16.4404 7 16.813 7 17.1892C7 17.949 7.27656 18.6777 7.76884 19.215C8.26113 19.7522 8.92881 20.0541 9.625 20.0541C10.3212 20.0541 10.9889 19.7522 11.4812 19.215C11.9734 18.6777 12.25 17.949 12.25 17.1892ZM39.375 14.3243C40.0712 14.3243 40.7389 14.6262 41.2312 15.1634C41.7234 15.7007 42 16.4294 42 17.1892C42 17.949 41.7234 18.6777 41.2312 19.215C40.7389 19.7522 40.0712 20.0541 39.375 20.0541C38.6788 20.0541 38.0111 19.7522 37.5188 19.215C37.0266 18.6777 36.75 17.949 36.75 17.1892C36.75 16.4294 37.0266 15.7007 37.5188 15.1634C38.0111 14.6262 38.6788 14.3243 39.375 14.3243ZM17.9375 40.1081C17.9375 39.4749 17.707 38.8677 17.2968 38.42C16.8866 37.9722 16.3302 37.7207 15.75 37.7207C15.1698 37.7207 14.6134 37.9722 14.2032 38.42C13.793 38.8677 13.5625 39.4749 13.5625 40.1081V47.7477C13.5625 48.3809 13.793 48.9882 14.2032 49.4359C14.6134 49.8836 15.1698 50.1351 15.75 50.1351C16.3302 50.1351 16.8866 49.8836 17.2968 49.4359C17.707 48.9882 17.9375 48.3809 17.9375 47.7477V40.1081ZM33.25 37.7207C34.4575 37.7207 35.4375 38.7903 35.4375 40.1081V47.7477C35.4375 48.0613 35.3809 48.3717 35.271 48.6614C35.1611 48.951 34.9999 49.2142 34.7968 49.4359C34.5937 49.6576 34.3525 49.8334 34.0871 49.9534C33.8217 50.0734 33.5373 50.1351 33.25 50.1351C32.9627 50.1351 32.6783 50.0734 32.4129 49.9534C32.1475 49.8334 31.9063 49.6576 31.7032 49.4359C31.5001 49.2142 31.3389 48.951 31.229 48.6614C31.1191 48.3717 31.0625 48.0613 31.0625 47.7477V40.1081C31.0625 38.7903 32.0425 37.7207 33.25 37.7207ZM24.5 40.5856C25.7075 40.5856 26.6875 41.6551 26.6875 42.973V50.6126C26.6875 51.2458 26.457 51.853 26.0468 52.3008C25.6366 52.7485 25.0802 53 24.5 53C23.9198 53 23.3634 52.7485 22.9532 52.3008C22.543 51.853 22.3125 51.2458 22.3125 50.6126V42.973C22.3125 41.6551 23.2925 40.5856 24.5 40.5856Z"
                          fill="#092374"/>
                </svg>


                <h1>₦{{ number_format($payable_amount, 2) }}</h1>
                <h4 class="secondary_color fw_4 mb-3">Make sure you send exact amount</h4>

            </div>
            <div class="bottom d-flex justify-content-between align-items-center">
                <p class="text-small text-warning">Payment Expires in</p>
                <h4>
                    <div class="" id="timers">15:00</div>
                </h4>
            </div>

        </div>

    </div>
</div>


<div class="my-4 d-flex justify-content-center">
    <h4>Choose your preferred payment method
    </h4>
</div>


<div class="transfer-card">


    <div class="tf-container">

        @if($opay_transfer == 1)

            <div id=""
                 class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                <div class="accordion-item border-0">
                    <div class="inner d-flex align-items-center">
                        <svg width="140" height="51" viewBox="0 0 155 61" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="155" height="61" fill="url(#pattern0_2019_28)"/>
                            <defs>
                                <pattern id="pattern0_2019_28" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_2019_28" transform="matrix(0.00645161 0 0 0.0163934 -0.225806 -1.36066)"/>
                                </pattern>
                                <image id="image0_2019_28" width="225" height="225" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                        <div class="content">
                            <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#opay"
                                   aria-expanded="false" aria-controls="opay" class="fw_6">Pay To OPAY
                                    </a>
                            </h4>
                            <p>40 seconds confirmation (recommended)</p>
                        </div>
                    </div>



                    <div id="opay" class="accordion-collapse collapse"
                         data-bs-parent="#accordionExample">

                        <p class="text-danger my-3 text-center">Please don't forget to add payment reference in your narration/remarks</p>
                        <div class="tf-container my-2">
                            <a id="openModalBtnopay" class="tf-btn success large">Pay To Opay</a>
                        </div>

                        <div id="myModalopay" class="modal">
                            <div class="modal-content">


                                <span class="close my-2">&times;</span>


                                <div class="card">
                                    <div class="card-body d-flex justify-content-center">
                                        <div class="row">

                                            <div class="text-center">
                                                <svg width="140" height="51" viewBox="0 0 155 61" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect width="155" height="61" fill="url(#pattern0_2019_28)"/>
                                                    <defs>
                                                        <pattern id="pattern0_2019_28" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                            <use xlink:href="#image0_2019_28" transform="matrix(0.00645161 0 0 0.0163934 -0.225806 -1.36066)"/>
                                                        </pattern>
                                                        <image id="image0_2019_28" width="225" height="225" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAIAAACx0UUtAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAA4aADAAQAAAABAAAA4QAAAAAYn8bHAAAV/ElEQVR4Ae2dC3RURZrHb16dhE5Ih7dAggkuyApnBUTAlSPuqgziqAhKRhgZZ5CdnZ1FWFBX8CzDiHEUVkFlVIyKrDhBENAZEMbj0ZlRERh0VkDBkUQSGB4CSSAvOq/9d642t+vevul0qrqLPf8+fQ731q367nf/9Uvdqq+qmoSWlhaDHyqgsQKJGvtG16hAQAEySg50V4CM6l5D9I+MkgHdFSCjutcQ/SOjZEB3Bcio7jVE/8goGdBdATKqew3RPzJKBnRXgIzqXkP0j4ySAd0VIKO61xD9I6NkQHcFyKjuNUT/yCgZ0F0BMqp7DdE/MkoGdFeAjOpeQ/SPjJIB3RUgo7rXEP0jo2RAdwXIqO41RP/IKBnQXQEyqnsN0T8ySgZ0V4CM6l5D9I+MkgHdFSCjutcQ/SOjZEB3Bcio7jVE/8goGdBdATKqew3RPzJKBnRXgIzqXkP0j4ySAd0VIKO61xD9I6NkQHcFyKjuNUT/yCgZ0F0BMqp7DdE/MkoGdFeAjOpeQ/SPjJIB3RUgo7rXEP0jo2RAdwXIqO41RP/IKBnQXQEyqnsN0T8ySgZ0V4CM6l5D9I+MkgHdFSCjutcQ/SOjZEB3Bcio7jVE/8goGdBdATKqew3RPzJKBnRXgIzqXkP0j4ySAd0VIKO61xD9I6NkQHcFyKjuNUT/yCgZ0F0BMqp7DdE/MkoGdFeAjOpeQ/SPjJIB3RUgo7rXEP0jo2RAdwXIqO41RP/IKBnQXQEyqnsN0T8ySgZ0V4CM6l5D9I+MkgHdFSCjutcQ/SOjZEB3Bcio7jVE/8goGdBdATKqew3RPzJKBnRXgIzqXkP0j4ySAd0VIKO61xD9I6NkQHcFyKjuNUT/ki8sCb7x15xqqK1qPGe6nZWc2jWlU3eP98J6CnrbLgUuAEb9LU3vnDr41umSlWePGM2NRmKoz60pMzP73Nwl//qu/T0JSe16fmbWX4GElpYWbb1Eq7n88K5HTh0Al1kJiZ0TwvZMzrQ0V7U0g+B7s/Nn9xlxcbqv4w/V4G+0G6mr+7YJx6X09NQUT+gfjL0AUzqsgL6MPlTyvklnjtBwuj5zANYmP0h9vP8/RdGmJiSMM4xOrncQLnpuueGSGyYMG3/T6Lz83sI1nkpRQEdG99d8M2j/W+4Np/vDl6MDYBhv97vme90ucc8pXE1ImJznyxQS3U/rKhsrjcZ6o67g1qGF/30PSXWXK4qrYd+eUdiSUmTt8b2DPt/QEUDhBppefMeXvrusfIcUr1yMpPuSL/Kl5fmy39/0VX7/n/1iQZFLZl6KQgG92tGX/vbpT47szElOi+JJHIugQb03K3fZJdc7XrUnRtGOCkaOVtaPGN7z3Y+WsqsqKBP1qUaMogUtKPvQHdBvx0bfPS6aWxy6jKVwFZguyO6/OH8sjtv8dJxR3AJv/+45nXZ/tYKYtil4JBl0YTTQB/18gwuggS5mcyMy3JXVLz8ty5uUgsc76q/5oPrYG9XHMPB3GVqVN9YX5/7jlJ6D21RECqO4S2Wlf+Q1fd9+/7E278gMbSqgC6MJu18M1wc1h+oLug6ccdHljkElBFBfPfrZT45+gqcNRyowPfEP09qM9jsyCuAqDAzCgkG65qCsaUZKN48npZNDt760smbF8ik/mzUpmJkH0SmgBaOBMFPFQUe80Hxe7cncMHBCm3jh+Wd/9c7yihLHxhigD0nx/mnIHe4y2RkFoPMLbxxyeX8UzM7OTE5OSk3zdOqUlpKSXFVV/fne0qWLN+7cdyLP5zDXVVpZUVW5pnOWwyV3N85U1Zw5U4M8nTt721scZVEQsVtrKLe9Rhxjw/HqusSfUQTqe/zvq45gtasrada6S6cWTenHAyaMzOrrwkdCwsQ8X0j8H83h7l2/HHbFpS6l1r72TsHUFRjaC3lMvuc9OFVIdzwFW29v/mjTuo+KN/2lNYM5YdZkGE1jhucX3DXm5olj+ub0EMp+8uf9E8f+amnRD28v+GdcAlue1LGG0T00W9P0KaNWFc8PTXQ+O1x+Iif3h7YgcdXWLYXjxo9yLqM4Nf6MhmtEowDU1MoF037J6e5NqSOjO7YvvHLUZe4VsfPjfSNHL7BjCsRbWl53LwssFj30ctHqD9MMr89IRjBLyN9Q21zjb6wwzs799xv+6+G7zUYRpR66r+iVtbsMI+WN1//1ttuvNUvdOm7Bjt+XCUZKK0+VlxXZERduhFPEzp4qfM/n8wQvNTUEOjmHqlcFU2J84NCRirEHmEyyv+XNV3yEg3HBYYyNMM8EC0I6Tj+or8DgzJ7e8RRAvKTwdjScdlPA154YTFm2tDgnd8bvVu/N83VFnFVgy8yG/i6gQYaXnt6e5ZuOZnvpo2tycmduW/tFa6ufELSGg/mL7jxmnJ+wNS9lG5lFz71lzeZ4jGZ4UeFWK6DIdqLm3OMrI3oVONrseGKcGd1RdRhveTRvwhfUog8a9eMhIGqGpQQLWUmeradLhERZp/fOnVLhAEfKn3fuD3eL8WMfmHPfRsDniKa9VCupmT+a+lLh/C1osx1L4a8FnWOz8QtaQMFFhZsde5nBPDjYsP49wxAX5WAK7bbJ3zbS1swxOxZfKzG7sXkj9A7Lhk5XcdPn+4woOLzD3kI/cXL/7JyRKu6IIcWMu0agRbSik2okfrr7K8fbjRz887/uq8jztWt5QMASmltHg8HER1fcWTC1SLCcZqQBwSl3Xh/MZj945D/X53rTrel4M8yddV28RkumJ3FuR61yyD2e2GNQYCFf6AfRfoycEKsKTZZ2dt24YZi7t5pL9iQe2HfUmmIe/2DiIgAqvFWt2dAH9decD3JZL7V53Aqi+Iw9vKkP/ttrLmXRJ9lTfiopJaTnUGHU3n3PjS6lYnApbu3otrc/XrVyW2pqIBQvfM75G0ZeNXD2vAIhvV2nWPQ0M6vf2uqj4ixUYnJJ7elLvcLIt122w2ZGQKreCAErMSWhtrpBKIAOZfGmPY6LV9ButXYYEscM7+3NSH3/D2X1RkO2kepCs2DcPF1SOBH9AWspwFdaeRYghhv/PfnY+l5GSCOKP5Ixw/tdNjjf8RYxS4wbowf/egT1JIhiPvYxw9+nb9eOSzAyoyeWRYuMGsbXdVWKGG1qak4zQl5NzQ0tSckhLRM6hQVTfy1EuPCwmEE9ZlQvKZw8acq11sVTpSV/e+XFLYsKf5fr9QmNnCkR7oj7CnIVTLv+vvnrfMb54TkyQG2A+JuNDjEKRAmKN30qxCWONNQ/9cAtguXYn4YIGuPbY5IGXTf7N9tINkKqNUq/enucV9lVNdVHabGtYvv2lKaHMtrob84fENJmr3hqPbqGgiUAmntZVlXlqwimWgFFNpz+4pEZe/c8UVZTJ4yEBCPWU4SZsFYQZq2JkBogAkdronmMUX+24bWltwRDWrZLsUuIG6N+v/gGlP7Q2SkiCuYtappU3RqRxUxvSO/lnNE8cFAf66M9eN+b6BpaU9D17DOw8469z7jMBuGFW172dFlNlbWg+/GcByYfM+qEPADRHoRqDTlttnYMUAq9jiWF8W9E4UncGMUstyCf9TQjwxkva56oj831KFEXD1cQPewKo0F4HWOif/TV59eyYFoI/Ushz2F/1aZ3FoYzG0xH0/jG67MwKRBMcT9Av3NITleh6QWI9iAUxvv2pr3CqEGHwf0WsbkaN0bxeBheoAmxf+tChx1RC/F1faVj2awk+X8AmMn8wY1P53rtgaS60VcNCbrx8Uf70MMJnuIAr+MZd42OZAYImfHmtcc+rdaE4wW/mowegpBoBqGsiffPXCM07fCqYOLQCL2ymlJxHDdGu/fw9TI82T3ThG+XXmkDcjv7sjM6/rTbzx51jORfnJ7VceNWCxjWXD3kPxAKFRpI1DQmyq1vcMRKMdtpLYsB4uSCa6wp7sfzFt2EiR8hT3OzOGYyM7TG3sWpLyEIhZF+WU2t4Dk6CXPunyzcJV6nIXrF0gmsgTCXQai76fKqMnsMH0HT/E5d2nNT5+Eb+nDHj5/et7dkffEfilZv7+vJsobuTfsYp8+ad5v1XoiVJqUI7ULTgIG51jzux1dceWm9IcY+wxVB7H3h/AnC/DtwtAahChe+1ssI6R+je9DX4w0Xogp3L3XpcWNU3SOZlreedJjdwQo9TL22a78oZmtGjv6lYaA1ajEC4QZMFQIyc9SF4yS8DYSQjelAayM6QlgwdfhgVZJHhB5R1cjV6N4Dq6ucW01HIzN+ejPiVvYgFNDctO0RvAHe/P0+wX+006vW/NjRWlwS26GOCv+wwuPJI7vTE8U54rrmpsUXj4lkzWg4r2aWf2h/0WMP/s99eeGKhEtvnVS0dzTDZQ+koynC6/Kp5+8VMmV29lSeEt/UWIcaec+vtrZ9gTNYRhAK+wGtzTyOgSb60Ii82kNOcZ+gF0SLM6N47a6sOoSlHoJbgOnzA5vd19EJRayn2A6KdU+OL/ppPR0i2JayaCwlfMpqTu/ds8zaEzWN5l3azbZwLunAF4cin8tBZvuyD3ePEYQq3rQwzwiJFvcyMufOeuaN1Z/ZQ05xn6AXHkfoGwlXlZ/itYt1dCASs0HWL/D6wH8WS0uj8ABv+TnH/mIH1HzRK5phCvqJMAWW3+/Y/qgjdpdfkYeIaTAzDtBVWPebP1pT3I/XvfZHFHHPI1xtXQmVKQSh0JRi+YsAKArqMEEv+B9nRuHNgtyr7Is/kA7IsLS0vRvkN5/8EtvqHVf14y/h2ZzRwvPLPcXGZaz1LC9bGW7AgVhp69ao87cFK8UbP0W/8HxS+CMM0bBK3/rWDp835ApWQtmjAXY7mkzQh7gexxh+0A90OrGfDo1cMCV4ANTmnNj7L19ujXClEtrdm0rfcwQUNrEvakK3AUHjsg7QPmF4VFpZi+bz0SW3lFS87NK5bI2Viv3RPilZ0+94vE1/EEn4/piHc73RBM4QhKpHPLqtDyboFzxc0FauWF+PfzuKJ16cPxaNnDOmiclYF5L6ySo0qNj55CgPCMb+EN8nLz9TWRoOUCzJeyH/WsfibSaidUSwprSy0ulbgfZp3JRBxWtm+M+tb3OtFnqoiNiDaetNPd7Evbu/uWe620ZnjG+uHjYbBYVAptWOy7EZhHLcJhBaqiVem5ZC3Qg5i/9+JtMdLMgf9eXmcIQhT2DvB/aIpmVP8vW7yOPNSPJUN/mt++vDbX02yz7ZY3AkS5sTEm4VAjEAdM3rM/HuxhbNEOVaT6L46Ty81vP7/xRr7wVrAGjw8O7Prppl78huWPfepDueQzfU/naGEXiIUJH74mVkw1ISbC8Rns7qAxzADtgIdwhaC6o+jvO4Pvh4WJD/Yp8rXX5IJzAGSkw+1FiHt3+wlBldciEbOQE3fp00EkCDZq0HCJhfnHeRy+vbmjmSY6xjWjj/5scK3xWW02P4UvJZxeAh9w8f2POmSUN79MzGspt9ew4Vrd6NuCyWx0fXggZdcgxCBa/iQJ8JeqtXONaFUbjy495DzzT5A0Ny1997sg/YhUeyngLQSZ26PT/ge9bEuB9jrd2G/9n1TXmt0C7ipY8I0fHSaswMYdEClvlhftVx5350j+AYhDJNoReBMKrEP8XoPHQspUV/NOgZWju0pug7BlM6cgA7+EGy9YM6usAMP/rQETccy36w5wns3kSgyn7V3AWKVhYtqwCxPXO7UhyDUKYFOAOC22UtZpn1YhSPjdYUv9SA9i/QAY32g+EXAMVvPEX+i3nR3irKchg8lZc9g13zwvgpSnMRF3MMQrVO0KeHi5dFbFtVRu0YxYOib3pu2I/QiQRnjoN9FzFMOq9L74Jfd4rkR8hcTH13yaGp++5Sh/7Fi/X4uVdG3pCLoIEQYA9nF9kizBnOAnrD9iUpCE0sfXlauCJxT9eRUYiC+Sd0Ir/4+9tAG0hts00NoImmt7Ee+dEM4/3ekbn+mNUKQkJY2LF1yzx/TRMWL7u0qRh0A+Xufb34dgTTXy97U1jlhIfFBP34CVfF7KnbeyONxkx21zFvCdoQFv3tyS+3VJUFfsMRH+Hn8Vu7BJMyet2Ylfv9bgM6jOaZ0kpoYv3TPWt3TG4KQpJHW0YFNsq+sA1zTq0D2eAiG6wfCDTkc2eNxR5ihKUQRi06sCt0yr7u1MkzkbiE8NMra3cK4SfQjwl6+9KCSAzGJo8u8dEIn/brusrj/uqTDbXIn2QkYsdST0+G4w8+RmhQyIbJRqScqw+sC25sDCzTrKg4i8mhWFYhfABMNdWB9fPejHSsLrXuwsNuk69LQzbsI0+EHtp/ywm3wMREycEV1lsgUavPBcaoVtpdWM5gKtWTeruwZxq9i8uv6a35b/laX2oXlub0tn0KvPDcm/aNdQg5zX5gYvsMxTw329GYSx6nG3ZJmIp91dbJKoy9ztY0nG5ZEyePIr0t29FIlbqg8znuq0bIafHykO1Wej4jGdWzXiR79eyy3zqGnKZN12uW2PGxyaijLP+vEhElwO4lYVoVoyWsEoxlvCJqTbWOj0b9VCxoVeCtjX9CkNX2AydVCxffbc2m7THHTNpWjTTH0I6eOH7aDPeaRvG/o1zydzkXRCMKh8moNBRoSJEC7I8qEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpgAZlSYlDSlSgIwqEpZmpSlARqVJSUOKFCCjioSlWWkKkFFpUtKQIgXIqCJhaVaaAmRUmpQ0pEgBMqpIWJqVpsD/AV6Tsyzdcl0rAAAAAElFTkSuQmCC"/>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="text-muted text-center my-2">BANK</h4>
                                            </div>
                                            <div class="col-12">


                                                <h6 class="text-center my-1">OPAY DIGITAL BANK</h6>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="text-muted text-center my-2">ACCOUNT NO</h4>
                                            </div>
                                            <div class="col-12">
                                                <h6 class="text-center my-1">{{$opay_acct->account_no ?? "Not Available"  }}</h6>
                                            </div>
                                            <input hidden value="{{ $opay_acct->account_no }}" id="opayaccountno">


                                            <div class="col-12">
                                                <h4 class="text-muted text-center my-2">ACCOUNT NAME</h4>
                                            </div>
                                            <div class="col-12">
                                                <h6 class="text-center my-1">{{ $opay_acct->account_name ?? "Not Available"}}</h6>

                                            </div>


                                            <div class="col-12">
                                                <h4 class="text-muted text-center my-2">REFERENCE</h4>
                                            </div>
                                            <div class="col-12">
                                                <h6 style="font-size: 25px" class="text-center my-1 text-danger">{{ $transref ?? "Not Available"}}</h6>
                                                <input hidden value="{{ $transref }}" id="trfopay">

                                            </div>

                                            <small style="font-size: 10px" class="text-danger text-center my-2">Please add Reference to your transaction narration to avoide delay in confirmation</small>


                                            <form onsubmit="event.preventDefault()">

                                                <input type="text" id="trx" hidden value="{{ $trans_id }}">

                                                <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                <!-- Button trigger modal -->


                                                <!-- Modal -->
                                                <div
                                                    style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                    class="modal fade" id="myModal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <div class="modal-dialog "
                                                         style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                        <div class="modal-content border-0"
                                                             style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                            <div class="modal-body p-5 my-4">
                                                                <div class="tf-container p-5">

                                                                    <div class="payment-loader mb-4">

                                                                        <div class="text-center">
                                                                            <p style="color:rgb(232, 3, 106);"
                                                                               id="timer"><span
                                                                                    id="countdown"></span></p>
                                                                        </div>


                                                                        <div class="pad mt-3">
                                                                            <div class="chip"></div>
                                                                            <div class="line line1"></div>
                                                                            <div class="line line2"></div>
                                                                        </div>

                                                                        <div class="loader-text">
                                                                            <p class="text-center mb-4"
                                                                               style="color:rrgb(11, 1, 63)"
                                                                               id="message"></p>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="tf-container my-5">
                                                                <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                   class="tf-btn danger large mt-5">Cancel
                                                                    Transaction</a>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>


                                                <button class="tf-btn accent large my-3" id="requestopay">I
                                                    ve sent ₦{{
                                        number_format($payable_amount )}}

                                                </button>


                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <script>
                        document.getElementById("openModalBtnopay").onclick = function() {
                            document.getElementById("myModalopay").style.display = "block";
                        };

                        document.getElementsByClassName("close")[0].onclick = function() {
                            document.getElementById("myModalopay").style.display = "none";
                        };


                    </script>

                        <script>
                            let repeatRequest = true;
                            function makeRequest() {
                                if (!repeatRequest) {
                                    return;
                                }

                                const trx_id = document.getElementById('trx').value;
                                const trx = document.getElementById('trfopay').value;
                                const opay_account_no = document.getElementById('opayaccountno').value;
                                const url = "{{ url('') }}/verifyopay?trans_id=" + trx_id + "&account_no=" + opay_account_no + "&trx=" + trx;

                                fetch(url)
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log(data);

                                        if (data.status === 'pending') {
                                            setTimeout(makeRequest, 3000);


                                        } else if (data.status === 'success') {

                                            const webhook = document.getElementById('webHook').value;
                                            const amount = document.getElementById('Amount').value;

                                            window.location.href = "{{ url('') }}/success?trans_id=" + trx;

                                            repeatRequestopay = false;
                                        }
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            }

                            function startTimer(duration, display) {
                                let timer = duration;
                                const countdownElement = document.getElementById(display);

                                const intervalId = setInterval(function () {
                                    const minutes = Math.floor(timer / 60);
                                    const seconds = timer % 60;

                                    countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;


                                    if (timer === 0) {
                                        clearInterval(intervalId);
                                        countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to marchant website to resolve or report transaction";

                                    }

                                    timer--;
                                }, 1000);
                            }

                            function startMessage() {

                                var messageDisplay = document.getElementById('message');
                                messageDisplay.innerHTML = "Confirming Opay payment...";

                            }


                            const requestopayBtn = document.getElementById('requestopay');
                            requestopayBtn.addEventListener("click", function () {
                                const requestopayBtn = document.getElementById('requestopay');


                                startTimer(1200, 'countdown');
                                makeRequest();
                                startMessage();
                                $('#myModal').modal('show');
                                requestopayBtn.disabled = true;
                                requestopayBtn.hidden = true;

                            })


                        </script>

                    </div>



                </div>
            </div>

        @endif
        @if($palmpay_transfer == 1)

                <div id=""
                     class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                    <div class="accordion-item border-0">
                        <div class="inner d-flex align-items-center">
                            <svg width="140" height="51" viewBox="0 0 188 53" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="188" height="53" fill="url(#pattern0_2023_14)"/>
                                <defs>
                                    <pattern id="pattern0_2023_14" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_2023_14" transform="matrix(0.00243902 0 0 0.00865163 0 -0.0320755)"/>
                                    </pattern>
                                    <image id="image0_2023_14" width="410" height="123" xlink:href="data:image/png;base64,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"/>
                                </defs>
                            </svg>

                            <div class="content">
                                <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#palmpay"
                                       aria-expanded="false" aria-controls="opay" class="fw_6">Pay To Palmpay
                                        </a></h4>
                                <p>40 seconds confirmation (recommended)</p>
                            </div>
                        </div>



                        <div id="palmpay" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">


                            <p class="text-danger my-3 text-center">Please don't forget to add payment reference in your narration/remarks</p>
                            <div class="tf-container my-2">
                                <a id="openModalBtnpalmpay" class="tf-btn success large">Pay to Palmpay</a>
                            </div>

                            <div id="myModalpalmpay" class="modal">
                                <div class="modal-content">


                                    <span class="close my-2">&times;</span>


                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center">
                                            <div class="row">

                                                <div class="text-center">
                                                    <svg width="140" height="51" viewBox="0 0 188 53" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect width="188" height="53" fill="url(#pattern0_2023_14)"/>
                                                        <defs>
                                                            <pattern id="pattern0_2023_14" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                                <use xlink:href="#image0_2023_14" transform="matrix(0.00243902 0 0 0.00865163 0 -0.0320755)"/>
                                                            </pattern>
                                                            <image id="image0_2023_14" width="410" height="123" xlink:href="data:image/png;base64,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"/>
                                                        </defs>
                                                    </svg>

                                                </div>
                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">BANK</h4>
                                                </div>
                                                <div class="col-12">


                                                    <h6 class="text-center my-1">PALMPAY</h6>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">ACCOUNT NO</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="text-center my-1">{{$palmpay_acct->account_no ?? "Not Available"  }}</h6>
                                                </div>
                                                <input hidden value="{{ $palmpay_acct->account_no }}" id="palmpay_account_no">

                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">ACCOUNT NAME</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="text-center my-1">{{ $palmpay_acct->account_name ?? "Not Available"}}</h6>
                                                </div>


                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">REFERENCE</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 style="font-size: 32px" class="text-center my-1 text-danger">{{ $transref ?? "Not Available"}}</h6>
                                                    <input hidden value="{{ $trans_id }}" id="trfpalmpay">

                                                </div>

                                                <small style="font-size: 10px" class="text-danger text-center my-2">Please add Reference to your transaction narration to avoide delay in confirmation</small>


                                                <form onsubmit="event.preventDefault()">

                                                    <input type="text" id="trx_id" hidden value="{{ $trans_id }}">

                                                    <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                    <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div
                                                        style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                        class="modal fade" id="myModalpalmpayshow" data-backdrop="static"
                                                        data-keyboard="false">
                                                        <div class="modal-dialog "
                                                             style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                            <div class="modal-content border-0"
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                <div class="modal-body p-5 my-4">
                                                                    <div class="tf-container p-5">

                                                                        <div class="payment-loader mb-4">

                                                                            <div class="text-center">
                                                                                <p style="color:rgb(232, 3, 106);"
                                                                                   id="timer"><span
                                                                                        id="countdown"></span></p>
                                                                            </div>


                                                                            <div class="pad mt-3">
                                                                                <div class="chip"></div>
                                                                                <div class="line line1"></div>
                                                                                <div class="line line2"></div>
                                                                            </div>

                                                                            <div class="loader-text">
                                                                                <p class="text-center mb-4"
                                                                                   style="color:rrgb(11, 1, 63)"
                                                                                   id="messagep"></p>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="tf-container my-5">
                                                                    <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                       class="tf-btn danger large mt-5">Cancel
                                                                        Transaction</a>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="tf-btn accent large my-3 request-btn" id="requestpalmpay">I
                                                        ve sent ₦{{
                                        number_format($payable_amount )}}

                                                    </button>


                                                </form>

                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </div>

                            <script>
                                document.getElementById("openModalBtnpalmpay").onclick = function() {
                                    document.getElementById("myModalpalmpay").style.display = "block";
                                };

                                document.getElementsByClassName("close")[0].onclick = function() {
                                    document.getElementById("myModalpalmpay").style.display = "none";
                                };


                            </script>


                            <script>
                                document.getElementById('openModalBtnpalmpay').addEventListener('click', function () {
                                    const url = '{{ url('') }}/api/palmpay-transfer-transaction';
                                    const data = {
                                        ref: '{{ $transref }}'
                                    };

                                    fetch(url, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(data),
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log('Response:', data);
                                        })
                                        .catch(error => {

                                            console.error('Error:', error);
                                        });
                                });
                            </script>


                            <script>
                                let repeatRequestp = true;
                                function makeRequestp() {
                                    if (!repeatRequestp) {
                                        return;
                                    }

                                    const trx_id = document.getElementById('trx_id').value;
                                    const trx = document.getElementById('trfpalmpay').value;
                                    const palmpay_account_no = document.getElementById('palmpay_account_no').value;
                                    const url = "{{ url('') }}/verify?trans_id=" + trx_id + "&account_no=" + palmpay_account_no + "&trx=" + trx;

                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);

                                            if (data.status === 'pending') {
                                                setTimeout(makeRequestp, 3000);


                                            } else if (data.status === 'success') {

                                                const webhook = document.getElementById('webHook').value;
                                                const amount = document.getElementById('Amount').value;

                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx;

                                                repeatRequestopay = false;
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                }

                                function startTimer(duration, display) {
                                    let timer = duration;
                                    const countdownElement = document.getElementById(display);

                                    const intervalId = setInterval(function () {
                                        const minutes = Math.floor(timer / 60);
                                        const seconds = timer % 60;

                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;


                                        if (timer === 0) {
                                            clearInterval(intervalId);
                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to marchant website to resolve or report transaction";

                                        }

                                        timer--;
                                    }, 1000);
                                }

                                function startMessagep() {

                                    var messageDisplayp = document.getElementById('messagep');
                                    messageDisplayp.innerHTML = "Confirming Palmpay payment...";

                                }


                                const requestpalmpayBtn = document.getElementById('requestpalmpay');
                                requestpalmpayBtn.addEventListener("click", function () {
                                    //const requestpalmpayBtn = document.getElementById('requestpalmpay');


                                    startTimer(1200, 'countdown');
                                    makeRequestp();
                                    startMessagep();
                                    $('#myModalpalmpayshow').modal('show');
                                    requestpalmpayBtn.disabled = true;
                                    requestpalmpayBtn.hidden = true;

                                })


                            </script>

{{--                            <script>--}}
{{--                                let repeatRequestpalmpay = true;--}}

{{--                                function makeRequest(trx_id, palmpay_account_no) {--}}
{{--                                    if (!repeatRequestpalmpay) {--}}
{{--                                        return;--}}
{{--                                    }--}}
{{--                                    const url = "{{ url('') }}/verifypalmpay?trans_id=" + trx_id + "&account_no=" + palmpay_account_no;--}}

{{--                                    fetch(url)--}}
{{--                                        .then(response => response.json())--}}
{{--                                        .then(data => {--}}
{{--                                            console.log(data);--}}

{{--                                            if (data.status === 'pending') {--}}
{{--                                                setTimeout(makeRequest, 3000, trx_id, palmpay_account_no);--}}
{{--                                            } else if (data.status === 'success') {--}}
{{--                                                const webhook = document.getElementById('webHook').value;--}}
{{--                                                const amount = document.getElementById('Amount').value;--}}

{{--                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;--}}

{{--                                                repeatRequestpalmpay = false; // Adjusted variable name here--}}
{{--                                            }--}}
{{--                                        })--}}
{{--                                        .catch(error => {--}}
{{--                                            console.error(error);--}}
{{--                                        });--}}
{{--                                }--}}

{{--                                function startTimer(duration, display) {--}}
{{--                                    let timer = duration;--}}
{{--                                    const countdownElement = document.getElementById(display);--}}

{{--                                    const intervalId = setInterval(function () {--}}
{{--                                        const minutes = Math.floor(timer / 60);--}}
{{--                                        const seconds = timer % 60;--}}

{{--                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;--}}

{{--                                        if (timer === 0) {--}}
{{--                                            clearInterval(intervalId);--}}
{{--                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to marchant website to resolve or report transaction";--}}
{{--                                        }--}}

{{--                                        timer--;--}}
{{--                                    }, 1000);--}}
{{--                                }--}}



{{--                                function startMessage() {--}}

{{--                                    var messageDisplay = document.getElementById('message');--}}
{{--                                    messageDisplay.innerHTML = "Confirming palmpay payment...";--}}

{{--                                }--}}


{{--                                const requestpalmpayBtn = document.getElementById('requestpalmpay');--}}
{{--                                requestpalmpayBtn.addEventListener("click", function () {--}}
{{--                                    const requestpalmpayBtn = document.getElementById('requestpalmpay');--}}


{{--                                    startTimer(1200, 'countdown');--}}
{{--                                    makeRequest();--}}
{{--                                    startMessage();--}}
{{--                                    $('#myModalpalmpayshow').modal('show');--}}
{{--                                    requestpalmpayBtn.disabled = true;--}}
{{--                                    requestpalmpayBtn.hidden = true;--}}

{{--                                })--}}


{{--                            </script>--}}





                        </div>



                    </div>
                </div>

        @endif


        @if($kuda_transfer == 1)

                <div id=""
                     class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                    <div class="accordion-item border-0">
                        <div class="inner d-flex align-items-center">
                            <svg width="140" height="51" viewBox="0 0 234 44" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <rect width="234" height="44" fill="url(#pattern0_2024_16)"/>
                                <defs>
                                    <pattern id="pattern0_2024_16" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image0_2024_16" transform="matrix(0.00166604 0 0 0.00869565 0.0615196 -0.00355884)"/>
                                    </pattern>
                                    <image id="image0_2024_16" width="512" height="115" xlink:href="data:image/png;base64,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"/>
                                </defs>
                            </svg>


                            <div class="content">
                                <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#kuda"
                                       aria-expanded="false" aria-controls="kuda" class="fw_6">Pay To Kuda</a></h4>
                                <p>40 seconds confirmation (recommended)</p>
                            </div>
                        </div>



                        <div id="kuda" class="accordion-collapse collapse"
                             data-bs-parent="#accordionExample">


                            <div class="tf-container my-2">
                                <a id="openModalBtnkuda" class="tf-btn success large">Pay To Kuda Bank</a>
                            </div>

                            <div id="myModalkuda" class="modal">
                                <div class="modal-content">


                                    <span class="close my-2">&times;</span>


                                    <div class="card">
                                        <div class="card-body d-flex justify-content-center">
                                            <div class="row">

                                                <div class="text-center">
                                                    <svg width="140" height="51" viewBox="0 0 234 44" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <rect width="234" height="44" fill="url(#pattern0_2024_16)"/>
                                                        <defs>
                                                            <pattern id="pattern0_2024_16" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                                <use xlink:href="#image0_2024_16" transform="matrix(0.00166604 0 0 0.00869565 0.0615196 -0.00355884)"/>
                                                            </pattern>
                                                            <image id="image0_2024_16" width="512" height="115" xlink:href="data:image/png;base64,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"/>
                                                        </defs>
                                                    </svg>

                                                </div>
                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">BANK</h4>
                                                </div>
                                                <div class="col-12">


                                                    <h6 class="text-center my-1">KUDA MFB</h6>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">ACCOUNT NO</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="text-center my-1">{{$kuda_acct->account_no ?? "Not Available"  }}</h6>
                                                </div>

                                                <input hidden  value="{{ $kuda_acct->account_no }}"  id="kuda_account_no">

                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">ACCOUNT NAME</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="text-center my-1">{{ $kuda_acct->account_name ?? "Not Available"}}</h6>
                                                </div>


                                                <div class="col-12">
                                                    <h4 class="text-muted text-center my-2">REFERENCE</h4>
                                                </div>
                                                <div class="col-12">
                                                    <h6 class="text-center my-1 text-danger">{{ $transref ?? "Not Available"}}</h6>
                                                    <input style="font-size: 25px" hidden value="{{ $transref }}" id="trfkuda">

                                                </div>

                                                <small style="font-size: 10px" class="text-danger text-center my-2">Please add Reference to your transaction narration to avoide delay in confirmation</small>


                                                <form onsubmit="event.preventDefault()">

                                                    <input type="text" id="trx_id" hidden value="{{ $trans_id }}">

                                                    <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                                    <input type="text" id="Amount" hidden value="{{ $amount }}">

                                                    <!-- Button trigger modal -->


                                                    <!-- Modal -->
                                                    <div
                                                        style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                                        class="modal fade" id="myModalkudashow" data-backdrop="static"
                                                        data-keyboard="false">
                                                        <div class="modal-dialog "
                                                             style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                            <div class="modal-content border-0"
                                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                                <div class="modal-body p-5 my-4">
                                                                    <div class="tf-container p-5">

                                                                        <div class="payment-loader mb-4">

                                                                            <div class="text-center">
                                                                                <p style="color:rgb(232, 3, 106);"
                                                                                   id="timer"><span
                                                                                        id="countdown"></span></p>
                                                                            </div>


                                                                            <div class="pad mt-3">
                                                                                <div class="chip"></div>
                                                                                <div class="line line1"></div>
                                                                                <div class="line line2"></div>
                                                                            </div>

                                                                            <div class="loader-text-kuda">
                                                                                <p class="text-center mb-4"
                                                                                   style="color:rrgb(11, 1, 63)"
                                                                                   id="messagekuda"></p>
                                                                            </div>

                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <div class="tf-container my-5">
                                                                    <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                                       class="tf-btn danger large mt-5">Cancel
                                                                        Transaction</a>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="tf-btn accent large my-3" id="requestkuda">I
                                                        ve sent ₦{{
                                        number_format($payable_amount )}}

                                                    </button>


                                                </form>

                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </div>

                            <script>
                                document.getElementById("openModalBtnkuda").onclick = function() {
                                    document.getElementById("myModalkuda").style.display = "block";
                                };

                                document.getElementsByClassName("close")[0].onclick = function() {
                                    document.getElementById("myModalkuda").style.display = "none";
                                };


                            </script>


                            <script>
                                document.getElementById('openModalBtnkuda').addEventListener('click', function () {
                                    const url = '{{ url('') }}/api/kuda-transfer-transaction';
                                    const data = {
                                        ref: '{{ $transref }}'
                                    };

                                    fetch(url, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(data),
                                    })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log('Response:', data);
                                        })
                                        .catch(error => {

                                            console.error('Error:', error);
                                        });
                                });
                            </script>


                            <script>
                                let repeatRequestkuda = true;

                                function makeRequest() {
                                    if (!repeatRequestkuda) {
                                        return;
                                    }

                                    const trx_id = document.getElementById('trfkuda').value;
                                    const account_no = document.getElementById('kuda_account_no').value;
                                    const url = "{{ url('') }}/verifykuda?trans_id=" + trx_id + "&account_no=" + account_no;

                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log(data);

                                            if (data.status === 'pending') {
                                                setTimeout(makeRequest, 3000);
                                            } else if (data.status === 'success') {
                                                const webhook = document.getElementById('webHook').value;
                                                const amount = document.getElementById('Amount').value;

                                                window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                                                repeatRequestkuda = false; // Adjusted variable name here
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                }

                                function startTimer(duration, display) {
                                    let timer = duration;
                                    const countdownElement = document.getElementById(display);

                                    const intervalId = setInterval(function () {
                                        const minutes = Math.floor(timer / 60);
                                        const seconds = timer % 60;

                                        countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;

                                        if (timer === 0) {
                                            clearInterval(intervalId);
                                            countdownElement.textContent = "Have you been debited and payment still not confirmed, Return to merchant website to resolve or report transaction";
                                        }

                                        timer--;
                                    }, 1000);
                                }

                                function startMessage() {
                                    var messageDisplay = document.getElementById('messagekuda');
                                    messageDisplay.innerHTML = "Confirming kuda payment...";
                                }

                                const requestkudaBtn = document.getElementById('requestkuda');
                                requestkudaBtn.addEventListener("click", function () {
                                    const requestkudaBtn = document.getElementById('requestkuda');


                                    startTimer(1200, 'countdown');
                                    makeRequest();
                                    startMessage();

                                    $('#myModalkudashow').modal('show');
                                    requestkudaBtn.disabled = true;
                                    requestkudaBtn.hidden = true;
                                });
                            </script>



                        </div>



                    </div>
                </div>

        @endif


        @if($transfer == 1 && $bank == 1)

            <div id=""
                 class="accordion border-0 tf-card-block d-flex align-items-center justify-content-between">
                <div class="accordion-item border-0">
                    <div class="inner d-flex align-items-center">
                        <i class="logo icon-bank2"></i>
                        <div class="content">
                            <h4><a href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo" class="fw_6">Pay To Providus Bank</a></h4>
                            <p>Transfer to providus bank account</p>
                        </div>
                    </div>


                    <div id="collapseTwo" class="accordion-collapse collapse"
                         data-bs-parent="#accordionExample">


                        <div class="card border-0">
                            <div class="card-body d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="text-muted text-center my-2">BANK</h4>
                                    </div>
                                    <div class="col-12">
                                        <h6 class="text-center my-1">PROVIDUS BANK</h6>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="text-muted text-center my-2">ACCOUNT NO</h4>
                                    </div>
                                    <div class="col-12">
                                        <h6 class="text-center my-1">{{$p_account_no ?? "Not Available"  }}</h6>
                                    </div>
                                    <input hidden value="{{ $p_account_no }}" id="p_account_no">

                                    <div class="col-12">
                                        <h4 class="text-muted text-center my-2">ACCOUNT NAME</h4>
                                    </div>
                                    <div class="col-12">
                                        <h6 class="text-center my-1">{{$p_account_name ?? "Not Available"}}</h6>
                                    </div>


                                    <form onsubmit="event.preventDefault()">

                                        <input type="text" id="trx_id" hidden value="{{ $trans_id }}">

                                        <input type="text" id="webHook" hidden value="{{ $webhook}}">

                                        <input type="text" id="Amount" hidden value="{{ $amount }}">

                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div
                                            style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);"
                                            class="modal fade" id="myModalprovidus" data-backdrop="static"
                                            data-keyboard="false">
                                            <div class="modal-dialog "
                                                 style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109);">
                                                <div class="modal-content border-0"
                                                     style="background-image: linear-gradient(to right top, #051937, #001c2d, #001a1c, #02160f, #0e1109); background-color: black;">

                                                    <div class="modal-body p-5 my-4">
                                                        <div class="tf-container p-5">

                                                            <div class="payment-loader mb-4">

                                                                <div class="text-center">
                                                                    <p style="color:rgb(232, 3, 106);"
                                                                       id="timer"><span
                                                                            id="countdown"></span></p>
                                                                </div>


                                                                <div class="pad mt-3">
                                                                    <div class="chip"></div>
                                                                    <div class="line line1"></div>
                                                                    <div class="line line2"></div>
                                                                </div>

                                                                <div class="loader-text">
                                                                    <p class="text-center mb-4"
                                                                       style="color:rrgb(11, 1, 63)"
                                                                       id="messageprovidus"></p>
                                                                </div>

                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="tf-container my-5">
                                                        <a href="decline?trans_id={{ $trans_id  }}&key={{ $key  }}"
                                                           class="tf-btn danger large mt-5">Cancel
                                                            Transaction</a>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>


                                        <button class="tf-btn accent large my-3" id="requestButtonp">I
                                            ve sent ₦{{
                                        number_format($payable_amount )}}

                                        </button>


                                    </form>

                                    <script>
                                        let repeatRequestprovidus = true;

                                        function makeRequest() {
                                            if (!repeatRequestprovidus) {
                                                return;
                                            }

                                            const trx_id = document.getElementById('trx_id').value;
                                            const p_account_no = document.getElementById('p_account_no').value;
                                            const url = "{{ url('') }}/verify?trans_id=" + trx_id + "&account_no=" + p_account_no;

                                            fetch(url)
                                                .then(response => response.json())
                                                .then(data => {
                                                    console.log(data);

                                                    if (data.status === 'pending') {
                                                        setTimeout(makeRequest, 3000);


                                                    } else if (data.status === 'success') {

                                                        const webhook = document.getElementById('webHook').value;
                                                        const amount = document.getElementById('Amount').value;

                                                        window.location.href = "{{ url('') }}/success?trans_id=" + trx_id;

                                                        repeatRequestprovidus = false;
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        }

                                        function startTimer(duration, display) {
                                            let timer = duration;
                                            const countdownElement = document.getElementById(display);

                                            const intervalId = setInterval(function () {
                                                const minutes = Math.floor(timer / 60);
                                                const seconds = timer % 60;

                                                countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;


                                                if (timer === 0) {
                                                    clearInterval(intervalId);
                                                    countdownElement.textContent = "Have you been debited and payment still not confimed, Return to marchant website to resolve or report transaction";

                                                }

                                                timer--;
                                            }, 1000);
                                        }

                                        function startMessage() {

                                            var messageDisplay = document.getElementById('message');
                                            messageDisplay.innerHTML = "Confirming payment...";

                                        }


                                        const pbtn = document.getElementById('requestButtonp');
                                        pbtn.addEventListener("click", function () {
                                           const pbtn = document.getElementById('requestButtonp');

                                            startTimer(1200, 'countdown');
                                            makeRequest();
                                            startMessage();
                                            $('#myModalprovidus').modal('show');
                                            pbtn.disabled = true;
                                            pbtn.hidden = true;

                                        })


                                    </script>

                                </div>





                            </div>


                        </div>
                    </div>


                </div>
            </div>




        @endif




        @if($card == 1)
            <div class="tf-card-block d-flex align-items-center justify-content-between">
                <div class="inner d-flex align-items-center">
                    <i class="logo icon-credit-card2"></i>
                    <div class="content">
                        <h4><a href="{{ $pre_link }}" class="fw_6">Pay with Debit Card</a></h4>
                        <i>Transaction may attract extra charge</i>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>


<div class="tf-container my-5">
    <a href="decline?trans_id={{ $trans_id }}&key={{ $key }}" class="tf-btn danger large">Cancel
        Transaction</a>
</div>


<script src="{{ url('') }}/public/assets/dist/js/bootstrap.bundle.min.js"></script>






<script>
    document.getElementById('CardPost').addEventListener('click', function () {
        const url = '{{ url('') }}/api/card-transaction';
        const data = {
            ref: '{{ $ref }}'
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {

                console.log('Response:', data);
            })
            .catch(error => {

                console.error('Error:', error);
            });
    });
</script>

<script>
    document.getElementById('openModalBtnopay').addEventListener('click', function () {
        const url = '{{ url('') }}/api/opay-transfer-transaction';
        const data = {
            ref: '{{ $transref }}'
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
            })
            .catch(error => {

                console.error('Error:', error);
            });
    });
</script>


<script>
    document.getElementById('openModalBtnkuda').addEventListener('click', function () {
        const url = '{{ url('') }}/api/kuda-transfer-transaction';
        const data = {
            ref: '{{ $transref }}'
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
            })
            .catch(error => {

                console.error('Error:', error);
            });
    });
</script>


<script>
    var customTimerLimitInSeconds = 2400;

    function startCustomTimer() {
        var countdown = customTimerLimitInSeconds;
        var timerDisplay = document.getElementById('timers');

        function updateTimer() {
            var minutes = Math.floor(countdown / 60);
            var seconds = countdown % 60;

            timerDisplay.innerHTML = formatTime(minutes) + ':' + formatTime(seconds);

            if (countdown === 0) {
                window.location.href = '{{ url('') }}/decline?trans_id={{ $trans_id }}&key={{ $key}}';
            } else {
                countdown--;
                setTimeout(updateTimer, 1000);
            }
        }

        function formatTime(time) {
            return time < 10 ? '0' + time : time;
        }

        updateTimer();

        const p_account_no = document.getElementById('p_account_no').value;
        const url = "{{ url('') }}/change-state?account_no=" + p_account_no;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    }


    window.onload = startCustomTimer;
</script>


<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/jquery.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('')}}/public/assets/assets/javascript/main.js"></script>

</body>

</html>

