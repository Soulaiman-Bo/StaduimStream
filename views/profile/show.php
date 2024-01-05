<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/assets/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php include 'views/includes/header.php';
    ?>
    <?php foreach ($rows as $row): ?>

        <section class="container mx-auto p-4 md:p-8 lg:pt-12 grid grid-rows-2">
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-green-900">User Profile
            </h1>

            <div class="flex flex-col md:flex-row items-center justify-around">
                <div class="flex pt-4 md:pt-0 md:pl-4">
                    <div>
                        <div class="mb-4 md:mb-0"><img class="w-12 md:w-16 lg:w-20" src="../../public/images/ghofrane.svg"
                                alt="user">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center px-4">
                        <span class="text-base md:text-lg">
                            <?= $row['firstname'], " ", $row['lastname'] ?>

                        </span>
                        <span class="text-gray-400">Eastern European Time (EET), Cairo UTC +3</span>
                    </div>
                </div>
                <div class="flex space-x-2 md:space-x-4 mt-4 md:mt-0">
                    <a class="w-1/2 md:w-[124px] px-2 md:px-4 bg-green-600 h-10 text-white rounded-md text-center leading-10"
                        href="../user/update/<?= $row['user_ID'] ?>">Update</a>
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
                                <span class="text-gray-400 pl-2">
                                    <?= $row['firstname'] ?>
                                </span>
                            </div>
                            <div class="flex flex-col p-2">
                                <span class="font-semibold mb-1">CIN / PassportID</span>
                                <span class="text-gray-400 pl-2">
                                    <?= $row['cin'] ?>
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col p-2">
                                <span class="font-semibold mb-1">Last Name</span>
                                <span class="text-gray-400 pl-2">
                                    <?= $row['lastname'] ?>
                                </span>
                            </div>
                            <div class="flex flex-col p-2">
                                <span class="font-semibold mb-1">User Email</span>
                                <span class="text-gray-400 pl-2">
                                    <?= $row['email'] ?>
                                </span>
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
                                <span class="text-gray-400 pl-2">
                                    <?= $row['phone'] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    <?php require_once('views/includes/footer.php') ?>
</body>

</html>