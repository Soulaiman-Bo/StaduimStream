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
    <section class="container mx-auto p-4 md:p-8 lg:pt-12 grid grid-rows-2">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-green-900">User Profile</h1>
        <div class="flex flex-col md:flex-row items-center justify-around">
            <div class="flex pt-4 md:pt-0 md:pl-4">
                <div>
                    <div class="mb-4 md:mb-0"><img class="w-12 md:w-16 lg:w-20" src="../../public/images/ghofrane.svg"
                            alt="user">
                    </div>
                </div>
                <div class="flex flex-col justify-center px-4">
                    <span class="text-base md:text-lg">Bilal Chbanat</span>
                    <span class="text-gray-400">Eastern European Time (EET), Cairo UTC +3</span>
                </div>
            </div>
            <div class="flex space-x-2 md:space-x-4 mt-4 md:mt-0">
                <a class="w-1/2 md:w-[124px] px-2 md:px-4 bg-green-600 h-10 text-white rounded-md text-center leading-10"
                    href="./editProfile.html">Update</a>
                <a class="w-1/2 md:w-[124px] px-2 md:px-4 bg-red-600 h-10 text-white rounded-md text-center leading-10"
                    href="#">Delete</a>
            </div>
        </div>
    </section>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    <section>
        <div class="w-full py-5">
            <div class="w-11/12 mx-auto py-5">
                <div class="flex justify-evenly">
                    <div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">First Name</span>
                            <span class="text-gray-400 pl-2">Bilal</span>
                        </div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">CIN / PassportID</span>
                            <span class="text-gray-400 pl-2">GE10893545</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">Last Name</span>
                            <span class="text-gray-400 pl-2">Chbanat</span>
                        </div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">User Email</span>
                            <span class="text-gray-400 pl-2">Bilal.chbanat2003@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>

    <section>
        <div class="w-full py-5">
            <div class="w-11/12 mx-auto py-5 mr-[105px]">
                <div class="flex justify-evenly">
                    <div>
                        <div class="flex flex-col">
                            <span class="font-semibold mb-1">Password</span>
                            <span class="text-gray-400 pl-2">••••••••••••</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col">
                            <span class="font-semibold mb-1">Phone Number</span>
                            <span class="text-gray-400 pl-2">+212 62563891</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    <?php require_once('views/includes/footer.php') ?>
</body>

</html>