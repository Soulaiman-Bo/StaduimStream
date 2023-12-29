<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/assets/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class=" h-28 flex justify-between items-center mx-auto max-w-[90%]">
            <div>
                <img src="../../public/images/logo.svg" alt="StadiumStream" />
            </div>

            <div>
                <ul class="flex gap-10">
                    <li class="font-bold text-lg text-gray-600">
                        <a href="/" class="cursor-pointer">About</a>
                    </li>
                    <li class="font-normal text-lg text-gray-600">
                        <a href="/" class="cursor-pointer">Tickets</a>
                    </li>
                    <li class="font-normal text-lg text-gray-600">
                        <a href="/" class="cursor-pointer">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="flex gap-6">
                <a href="/" class="flex gap-4 items-center cursor-pointer">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.0417 7.74996C14.0417 11.3168 11.1502 14.2083 7.58333 14.2083C4.01649 14.2083 1.125 11.3168 1.125 7.74996C1.125 4.18312 4.01649 1.29163 7.58333 1.29163C11.1502 1.29163 14.0417 4.18312 14.0417 7.74996Z"
                            stroke="#6D8493" stroke-width="1.25" />
                        <path d="M13 12.7499L15.5 15.2499" stroke="#6D8493" stroke-width="1.25"
                            stroke-linecap="round" />
                    </svg>

                    <span class="text-lg">Login</span>
                </a>

                <a href="/" class="cursor-pointer">
                    <span
                        class="h-10 w-24 flex items-center justify-center rounded-3xl text-gray-100 text-lg bg-green-900">Sign
                        up</span>
                </a>
            </div>
        </nav>

        <!--  ====================================== -->
        <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    </header>
    <div class="container mx-auto">
        <section class="container mx-auto p-4 md:p-8 lg:pt-12 grid grid-rows-2">
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-green-900">User Profile</h1>
            <div class="flex flex-col md:flex-row items-center justify-around">
                <div class="flex pt-4 md:pt-0 md:pl-4">
                    <div>
                        <div class="mb-4 md:mb-0"><img class="w-12 md:w-16 lg:w-20"
                                src="../../public/images/ghofrane.svg" alt="user">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center px-4">
                        <span class="text-base md:text-lg">Bilal Chbanat</span>
                        <span class="text-gray-400">Eastern European Time (EET), Cairo UTC +3</span>
                    </div>
                </div>
                <div class="flex space-x-2 md:space-x-4 mt-4 md:mt-0">
                    <a class="w-1/2 md:w-[124px] px-2 md:px-4 bg-red-600 h-10 text-white rounded-md text-center leading-10"
                        href="#">Delete</a>
                </div>
            </div>
        </section>
        <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
        <div class="bg-white rounded p-4">
            <form>
                <div class="flex justify-around">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">First Name</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="firstName" type="text" placeholder="eg. Alaa">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">Last Name</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="lastName" type="text" placeholder="eg. Mohamed">
                    </div>
                </div>
                <div class="flex justify-around">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cin">CIN/passportID</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="cin" type="text" placeholder="cin / password">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">User E-mail</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" placeholder="eg. example@gmail.com">
                    </div>
                </div>
                <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
                <div class="flex justify-around pt-2">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="•••••••••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmpassword">Confirm
                            Password</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="confirmpassword" type="password" placeholder="•••••••••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-center ">
                    <button
                        class="bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-2"
                        type="submit">Cancel</button>
                    <button
                        class="bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-2"
                        type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>

    <?php require_once('views/includes/footer.php') ?>
</body>

</html>