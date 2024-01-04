<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/assets/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php include 'views/includes/header.php' ?>

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
                        <span class="text-base md:text-lg">
                            <?= $_SESSION['firstname'], " ", $_SESSION['lastname'] ?>
                        </span>
                        <span class="text-gray-400">Eastern European Time (EET), Cairo UTC +3</span>
                    </div>
                </div>
                <form method="post" action="http://staduimstream.test/user/deleteaction/<?php echo $user['user_ID'] ?>">
                    <div class="flex space-x-2 md:space-x-4 mt-4 md:mt-0">
                        <button
                            class="w-1/2 md:w-[124px] px-2 md:px-4 bg-red-600 h-10 text-white rounded-md text-center leading-10"
                            type="submit">Delete</button>
                    </div>
                </form>
            </div>
        </section>
        <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
        <div class="bg-white rounded p-4">
            <form method="post" action="http://staduimstream.test/user/updateaction/<?php echo $user['user_ID'] ?>">
                <div class="mb-4">
                    <input
                        class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="id" id="id" type="hidden" placeholder="eg. Alaa" value="<?php echo $user['user_ID'] ?>">
                </div>
                <div class="flex justify-around">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">First Name</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="firstname" id="firstName" type="text" placeholder="eg. Alaa"
                            value="<?php echo $user['firstname'] ?>">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">Last Name</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="lastname" id="lastName" type="text" placeholder="eg. Mohamed"
                            value="<?php echo $user['lastname'] ?>">
                    </div>
                </div>
                <div class="flex justify-around">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cin">CIN/passportID</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="cin" id="cin" type="text" placeholder="cin / password"
                            value="<?php echo $user['cin'] ?>">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">User E-mail</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" placeholder="eg. example@gmail.com" name="email"
                            value="<?php echo $user['email'] ?>">
                    </div>
                </div>
                <div class="flex justify-around">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cin">CIN/passportID</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="phone" id="phone" type="text" placeholder="phone"
                            value="<?php echo $user['phone'] ?>">
                    </div>

                </div>
                <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
                <div class="flex justify-around pt-2">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="password" id="password" type="password" placeholder="•••••••••••••••"
                            value="teststestset">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmpassword">Confirm
                            Password</label>
                        <input
                            class="shadow appearance-none border rounded w-[25rem] py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="confirmpassword" type="password" placeholder="•••••••••••••••" value="teststest">
                    </div>
                </div>

                <div class="flex items-center justify-center ">
                    <a href="/profile/show"
                        class="bg-orange-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-2">Cancel</a>
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