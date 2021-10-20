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
</head>


<body class="bg-black font-sans leading-normal tracking-normal mt-12">

    <!--Nav-->
    <nav class="bg-black pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white mt-3">
                <a href="sensor.html">
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
                        <span class="object-bottom float-left px-4 py-2 text-xs font-bold text-green-100 bg-green-700 rounded">Connected</span>
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

        <div class="main-content flex-1 bg-gray-900 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-black pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h3 class="font-bold pl-2">Leaf Spot Prediction</h3>
                </div>
            </div>

            <div class="flex flex-wrap justify-center sm:justify-center md:justify-center mt-5">
                <div class="w-full md:w-1/2 xl:w-1/2 p-3">
                    <div class="p-8 bg-blue-800 rounded shadow-xl">
                        <center>
                        <h2 class="text-2xl font-bold text-white">Leaf Spot</h2>
                        <div class="w-1/4 mt-2"></div>
                        <img src="assets/image/leafspot.jfif" class="w-full" height="200"></canvas>
                        <div class="flow-root place-content-end w-full">
                            <p class="object-bottom float-left px-4 py-2 text-lg mt-5 font-bold text-indigo-100 rounded">Kondisi: Penyakit Leaf Spot</p>
                            <p class="object-bottom float-left px-4 py-2 text-lg font-bold text-indigo-100 rounded">Keterangan: Penyakit tanaman ....</p>
                        </div>
                        </center>
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

        let modal = document.getElementById("my-modal");

        let btn = document.getElementById("open-btn");

        let button = document.getElementById("ok-btn");

        btn.onclick = function() {
            modal.style.display = "block";
        }

        button.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="scripts/charts.js"></script>
    <script src="scripts/mqtt_connect.js"></script>

</body>

</html>
