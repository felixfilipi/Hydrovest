<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Admin Starter Template : Tailwind Toolbox</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- tailwind css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css" integrity="sha512-yXagpXH0ulYCN8G/Wl7GK+XIpdnkh5fGHM5rOzG8Kb9Is5Ua8nZWRx5/RaKypcbSHc56mQe0GBG0HQIGTmd8bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <!-- mqtt.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.9/mqtt.min.js"></script>
    <!-- chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- gauge.svg -->
    <script src=dist/gauge.min.js></script>
    
    <!-- js functions -->
    <script src=scripts/functions.js></script>

    <link rel="stylesheet" href="styles/gauge.css">
</head>


<body class="bg-black font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
    <nav class="bg-black pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white mt-3">
                <a href="#">
                    <img src="assets/image/hydroponic.png" width=40px height=40px class="pl-2 mr-6 ml-6"/>
                    <p class="pl-2 mr-2 ml-2 text-xs">HYDROVEST</p>
                </a>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                </span>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <span id="connectionStatus" class="object-bottom float-left px-4 py-2 text-xs font-bold text-green-100 bg-red-600 rounded">No Connection</span>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <div class="flex flex-col md:flex-row">

        <div class="bg-black shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-24">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-5 ml-4 flex-1">
                        <a href="header.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline border-gray-800">
                            <img src="assets/image/chart.png" width=50px height=50px class="pr-0 md:pr-3"/>
                        </a>
                    </li>
                    <li class="mr-5 ml-4 flex-1">
                        <a href="leafspot.php" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline border-gray-800">
                            <img src="assets/image/plants.png" width=50px height=50px class="pr-0 md:pr-3"/>
                        </a>
                    </li>
                    <li class="mr-5 ml-4 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline border-gray-800">
                            <img src="assets/image/logout.png" width=50px height=50px class="pr-0 md:pr-3"/>
                        </a>
                    </li>
                </ul>
            </div>


        </div>

        <div class="main-content bg-gray-900 flex-1 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-black pt-3">
                <div class="rounded-tl-3xl bg-blue-900 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Sensor & Graphics</h3>
                </div>
            </div>

            <div class="flex justify-center p-5">
                <div class="w-5/6 text-center" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Danger
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>Something not ideal might be happening.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">

                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="p-8 bg-gray-800 rounded shadow-xl">
                        <center>
                        <h2 class="text-2xl font-bold text-white">Total Dissolved Solids (TDS)</h2>
                        <div id="gauge_tds" class="gauge-container two w-1/3"></div>
                        <canvas id="chart_tds" class="w-full" height="200"></canvas>
                        <div class="flow-root place-content-end">
                            <span id="tds_status" class="object-bottom float-left px-4 py-2 text-xs mt-5 font-bold text-indigo-100 bg-gray-600 rounded">Status: Waiting</span>
                            <button class="float-right bg-blue-500 hover:bg-blue-400 mt-3 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" id="tds-button-open">
                                Check
                            </button>
                        </div>
                        </center>
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="p-8 bg-gray-800 rounded shadow-xl">
                        <center>
                        <h2 class="text-2xl font-bold text-white">Turbidity</h2>
                        <div id="gauge_turbidity" class="gauge-container two w-1/3"></div>
                        <canvas id="chart_turbidity" class="w-full" height="200"></canvas>
                        <div class="flow-root place-content-end">
                            <span id="turbidity_status" class="object-bottom float-left px-4 py-2 text-xs mt-5 font-bold text-indigo-100 bg-gray-600 rounded">Status: Waiting</span>
                            <button class="float-right bg-blue-500 hover:bg-blue-400 mt-3 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" id="turbidity-button-open">
                                Check
                            </button>
                        </div>
                        </center>
                    </div>
                </div>

                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="p-8 bg-gray-800 rounded shadow-xl">
                        <center>
                        <h2 class="text-2xl font-bold text-white">Temperature</h2>
                        <div id="gauge_temperature" class="gauge-container two w-1/3"></div>
                        <canvas id="chart_temperature" class="w-full" height="200"></canvas>
                        <div class="flow-root place-content-end">
                            <span id="temperature_status" class="object-bottom float-left px-4 py-2 text-xs mt-5 font-bold text-indigo-100 bg-gray-600 rounded">Status: Waiting</span>
                            <button class="float-right bg-blue-500 hover:bg-blue-400 mt-3 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" id="temperature-button-open">
                                Check
                            </button>
                        </div>
                        </center>
                    </div>
                </div>

                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="p-8 bg-gray-800 rounded shadow-xl">
                        <center>
                        <h2 class="text-2xl font-bold text-white">Humidity</h2>
                        <div id="gauge_humidity" class="gauge-container two w-1/3"></div>
                        <canvas id="chart_humidity" class="w-full" height="200"></canvas>
                        <div class="flow-root place-content-end">
                            <span id="humidity_status" class="object-bottom float-left px-4 py-2 text-xs mt-5 font-bold text-indigo-100 bg-gray-600 rounded">Status: Waiting</span>
                            <button class="float-right bg-blue-500 hover:bg-blue-400 mt-3 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded" id="humidity-button-open">
                                Check
                            </button>
                        </div>
                        </center>
                    </div>
                </div>
            </div>

            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="tds-modal">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-red-900">Tindakan Rekomendasi</h3>
                        <div class="mt-2 px-7 py-3">
                            <p id="tds-modal-content" class="text-sm text-gray-500">Suhu di bawah normal</p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="tds-button-close" class="px-4 py-2 bg-blue-400 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="turbidity-modal">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-red-900">Tindakan Rekomendasi</h3>
                        <div class="mt-2 px-7 py-3">
                            <p id="turbidity-modal-content" class="text-sm text-gray-500">Suhu di bawah normal</p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="turbidity-button-close" class="px-4 py-2 bg-blue-400 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="temperature-modal">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-red-900">Tindakan Rekomendasi</h3>
                        <div class="mt-2 px-7 py-3">
                            <p id="temperature-modal-content" class="text-sm text-gray-500">Suhu di bawah normal</p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="temperature-button-close" class="px-4 py-2 bg-blue-400 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="humidity-modal">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-red-900">Tindakan Rekomendasi</h3>
                        <div class="mt-2 px-7 py-3">
                            <p id="humidity-modal-content" class="text-sm text-gray-500">Suhu di bawah normal</p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="humidity-button-close" class="px-4 py-2 bg-blue-400 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }

        // modal_tds

        let tds_modal = document.getElementById("tds-modal");

        let tds_modal_open = document.getElementById("tds-button-open");

        let tds_modal_close = document.getElementById("tds-button-close");

        tds_modal_open.onclick = function() {
            tds_modal.style.display = "block";
        }

        tds_modal_close.onclick = function() {
            tds_modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == tds_modal) {
                tds_modal.style.display = "none";
            }
        }

        // modal_turbidity

        let turbidity_modal = document.getElementById("turbidity-modal");

        let turbidity_modal_open = document.getElementById("turbidity-button-open");

        let turbidity_modal_close = document.getElementById("turbidity-button-close");

        turbidity_modal_open.onclick = function() {
            turbidity_modal.style.display = "block";
        }

        turbidity_modal_close.onclick = function() {
            turbidity_modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == turbidity_modal) {
                turbidity_modal.style.display = "none";
            }
        }

        // modal_temperature

        let temperature_modal = document.getElementById("temperature-modal");

        let temperature_modal_open = document.getElementById("temperature-button-open");

        let temperature_modal_close = document.getElementById("temperature-button-close");

        temperature_modal_open.onclick = function() {
            temperature_modal.style.display = "block";
        }

        temperature_modal_close.onclick = function() {
            temperature_modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == temperature_modal) {
                temperature_modal.style.display = "none";
            }
        }

        // modal_humidity


        let humidity_modal = document.getElementById("humidity-modal");

        let humidity_modal_open = document.getElementById("humidity-button-open");

        let humidity_modal_close = document.getElementById("humidity-button-close");

        humidity_modal_open.onclick = function() {
            humidity_modal.style.display = "block";
        }

        humidity_modal_close.onclick = function() {
            humidity_modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == humidity_modal) {
                humidity_modal.style.display = "none";
            }
        }

    </script>
    <script src="scripts/charts.js"></script>
    <script src="scripts/mqtt_connect.js"></script>

</body>

</html>
