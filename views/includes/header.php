<header>
    <nav class=" h-28 flex justify-between items-center mx-auto max-w-[90%]">
    <div>
      <img src="http://staduimstream.test/public/images/logo.png" />
    </div>

    <div>
      <ul class="flex gap-10">
        <li class="font-bold text-lg text-gray-600">
          <a href="/" class="cursor-pointer">Home</a>
        </li>
        <li class="font-normal text-lg text-gray-600">
          <a href="/search" class="cursor-pointer">Matchs</a>
        </li>
        <li class="font-normal text-lg text-gray-600">
          <a href="http://staduimstream.test/Contact/" class="cursor-pointer">Contact</a>
        </li>
      </ul>
    </div>


    <?php if(isset($_SESSION['firstname'])){ ?>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="http://staduimstream.test/public/images/meedY.jpg" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo $_SESSION['email'] ?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <!-- <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><?php ?>Dashboard</a>
          </li> -->
          <li>
            <a href="/profile/show" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">profile</a>
          </li>
          <li>
            <a href="/user/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
   <?php  }else{ ?>
    <div class="flex gap-6">
      <a href="../user/login" class="flex gap-4 items-center cursor-pointer">
        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M14.0417 7.74996C14.0417 11.3168 11.1502 14.2083 7.58333 14.2083C4.01649 14.2083 1.125 11.3168 1.125 7.74996C1.125 4.18312 4.01649 1.29163 7.58333 1.29163C11.1502 1.29163 14.0417 4.18312 14.0417 7.74996Z"
            stroke="#6D8493" stroke-width="1.25" />
          <path d="M13 12.7499L15.5 15.2499" stroke="#6D8493" stroke-width="1.25" stroke-linecap="round" />
        </svg>

        <span class="text-lg">Login</span>
      </a>

      <a href="../user/signup" class="cursor-pointer">
        <span class="h-10 w-24 flex items-center justify-center rounded-3xl text-gray-100 text-lg bg-green-900">Sign
          up</span>
      </a>
    </div>
    <?php }  ?>
  </nav>
</header>