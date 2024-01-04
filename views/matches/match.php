<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="http://staduimstream.test/public/assets/dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="http://staduimstream.test/main.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
  <nav class="h-28 flex justify-between items-center mx-auto max-w-[90%]">
    <div>
      <img src="http://staduimstream.test/public/images/logo.png" />
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
          <path d="M14.0417 7.74996C14.0417 11.3168 11.1502 14.2083 7.58333 14.2083C4.01649 14.2083 1.125 11.3168 1.125 7.74996C1.125 4.18312 4.01649 1.29163 7.58333 1.29163C11.1502 1.29163 14.0417 4.18312 14.0417 7.74996Z" stroke="#6D8493" stroke-width="1.25" />
          <path d="M13 12.7499L15.5 15.2499" stroke="#6D8493" stroke-width="1.25" stroke-linecap="round" />
        </svg>

        <span class="text-lg">Login</span>
      </a>

      <a href="/" class="cursor-pointer">
        <span class="h-10 w-24 flex items-center justify-center rounded-3xl text-gray-100 text-lg bg-green-900">Sign up</span>
      </a>
    </div>
  </nav>

  <section class="heroBackrround h-[481px] bg-green-800">


    <div class="flex justify-around p-5" style="color: white; width: 100%; height: 481px">
      <div class="flex items-center gap-3 text-2xl">
        <span><?= $rows['team_1'] ?></span>
        <img class="h-24" src="http://staduimstream.test/public/images/Mali.png" alt="Ivory cost" />
      </div>


      <div class="flex flex-col items-center justify-center gap-1">
        <span class="text-xl"><?= $rows['date'] ?></span>
        <span class="border-4 p-5 text-5xl mb-10"><?= $rows['hour'] ?></span>
        <span class="text-xl">African Cup Of Nations</span>
        <span class="text-xl">Group A</span>
      </div>


      <div class="flex items-center gap-3 text-2xl">
        <img class="h-24" src="http://staduimstream.test/public/images/Guinée-Bissau.png " alt=" Guinea-Bissau" />
        <span><?= $rows['team_2'] ?></span>
      </div>
    </div>

    <div style="
          position: relative;
          bottom: 10%;
          background-color: #000;
          width: 50%;
          height: 89px;
          margin: auto;
          border-radius: 80px;
          background: #fff;
          box-shadow: 0px 4px 19px 0px rgba(0, 0, 0, 0.14);
        ">
      <div style="
            text-align: center;
            vertical-align: middle;
            line-height: 90px;
            color: var(--green, #004930);
            font-size: 44px;
            font-weight: 700;
            letter-spacing: -0.44px;
          " class="m-2">
        19 : 08 : 58 : 42
      </div>
      <div class="flex justify-center gap-8" style="
            position: relative;
            bottom: 30%;
            text-align: center;
            vertical-align: middle;
            line-height: 1px;
          ">
        <span>Days</span>
        <span> Hours</span>
        <span> Minutes</span>
        <span>Seconds</span>
      </div>
    </div>


  </section>


  <section class="" style="padding-top: 10rem; padding-left: 5rem;">
    <div class="flex justify-around">
      <div class="flex flex-col">
        <span class="border-6 border-b-4 border-amber-500">Staduim</span>
        <span>Olympic Stadium of Ebimpé </span>
      </div>
      <div class="flex flex-col">
        <span class="border-6 border-b-4 border-amber-500">Tickets</span>
        <span>Available</span>
      </div>
    </div>
  </section>


  <section class="my-8">

    <form method="post" action="http://staduimstream.test/ticket/addaction" id="buyTicketForm">

      <input type="hidden" name="match_id" value="25">
      <input type="hidden" name="user_id" value="1">

      <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px" class="w-full  md:w-2/3 mx-auto flex items-center justify-between p-5 px-14 rounded-lg hover:bg-gray-200 bg-white mt-12">
        <div class="flex items-center gap-8">
          <div class="flex items-center gap-8">
            <p class="font-bold text-2xl text-gray-600">Basic Ticket</p>
          </div>

          <div class="flex items-center gap-8">
            <p class="font-regular text-2xl text-gray-600">$30</p>
          </div>
        </div>


        <div class="relative flex items-center">
          <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
            </svg>
          </button>

          <input type="text" id="counter-input" name="3" data-input-counter class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[4rem] text-center" placeholder="" value="1" required>

          <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
            </svg>
          </button>
        </div>

      </div>

      <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px" class="w-full  md:w-2/3 mx-auto flex items-center justify-between p-5 px-14 rounded-lg hover:bg-gray-200 bg-white mt-12">
        <div class="flex items-center gap-8">
          <div class="flex items-center gap-8">
            <p class="font-bold text-2xl text-gray-600">Premium Ticket</p>
          </div>

          <div class="flex items-center gap-8">
            <p class="font-regular text-2xl text-gray-600">$90</p>
          </div>
        </div>


        <div class="relative flex items-center">
          <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
            </svg>
          </button>

          <input type="text" id="counter-input" name="2" data-input-counter class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[4rem] text-center" placeholder="" value="1" required>

          <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
            </svg>
          </button>
        </div>

      </div>

      <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px" class="w-full  md:w-2/3 mx-auto flex items-center justify-between p-5 px-14 rounded-lg hover:bg-gray-200 bg-white mt-12">
        <div class="flex items-center gap-8">
          <div class="flex items-center gap-8">
            <p class="font-bold text-2xl text-gray-600">VIP Ticket</p>
          </div>

          <div class="flex items-center gap-8">
            <p class="font-regular text-2xl text-gray-600">$300</p>
          </div>
        </div>

        <div class="relative flex items-center">
          <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
            </svg>
          </button>

          <input type="text" id="counter-input" name="1" data-input-counter class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[4rem] text-center" placeholder="" value="1" required>

          <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-8 w-8 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
            </svg>
          </button>
        </div>

      </div>

      <div class="w-full  md:w-2/3 mx-auto flex items-end justify-end p-5 px-14 rounded-lg  bg-white mt-12">
        <button type="submit" class="cursor-pointer">
          <span class="h-14 w-36 flex items-center justify-center rounded-full text-gray-100 text-lg hover:bg-orange-600 bg-orange-500">Buy Ticket</span>
        </button>
      </div>

    </form>


  </section>


  <?php require_once "views/includes/footer.php" ?>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script>
    let buyTicketForm = document.getElementById("buyTicketForm");

    buyTicketForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const form = e.currentTarget;
      const url = new URL(form.action);
      const formData = new FormData(buyTicketForm);


      try {
        const response = await fetch(url, {
          method: "POST",
          body: formData,
        });


        if (response.ok) {
          const responseData = await response.json();

          if (responseData.message != 'Ticket inserted successfully!') {
            throw new Error(`Error: ${response.status} - ${response.message}`);
          }

          swal("Ticket Reserved", responseData.message, "success")

        }

        if (!response.ok) {
          throw new Error(`Error: ${response.status} - ${response.message}`);
        }

      } catch (error) {
        console.error(error);
        swal("Reservation", error, "error")
      }




    })

  
  </script>

</body>

</html>