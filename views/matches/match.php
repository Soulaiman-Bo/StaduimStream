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


  <?php require_once "views/includes/header.php"; ?>


  <section class="heroBackrround h-[481px] bg-green-800">


    <div class="flex justify-around p-5" style="color: white; width: 100%; height: 481px">
      <div class="flex items-center gap-3 text-2xl">
        <span><?= $rows['team_1'] ?></span>

        <img class="h-24" src="http://staduimstream.test/public/images/teams/<?= $rows['team_1_logo'] ?>" alt="Ivory cost" />
      </div>


      <div class="flex flex-col items-center justify-center gap-1">
        <span id="forjs" class=" hidden text-xl"><?= $rows['date'] ?> <?= $rows['hour'] ?></span>
        <span class="text-xl"><?= $rows['date'] ?></span>
        <span class="border-4 p-5 text-5xl mb-10"><?= $rows['hour'] ?></span>
        <span class="text-xl">African Cup Of Nations</span>
        <span class="text-xl">Group A</span>
      </div>


      <div class="flex items-center gap-3 text-2xl">
        <img class="h-24" src="http://staduimstream.test/public/images/teams/<?= $rows['team_2_logo'] ?>" alt=" Guinea-Bissau" />
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
      <div id="timeToMatch" style="
            text-align: center;
            vertical-align: middle;
            line-height: 90px;
            color: var(--green, #004930);
            font-size: 44px;
            font-weight: 700;
            letter-spacing: -0.44px;
          " class="m-2">

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
    let timeToMatch = document.getElementById("timeToMatch");
    let forjs = document.getElementById("forjs");


    function updateDateDifference(inputDateTime, callback) {
      function displayUpdatedDifference() {

        const inputDate = new Date(inputDateTime);
        const currentDate = new Date();
        const timeDifference = inputDate.getTime() - currentDate.getTime();

        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        const formattedResult = `${days} : ${hours} : ${minutes} : ${seconds}`;

        callback(formattedResult);
      }
      displayUpdatedDifference();
      setInterval(displayUpdatedDifference, 1000);
    }

    const inputDateTime = forjs.innerHTML;

    function handleResult(result) {
      timeToMatch.innerHTML = result;
    }

    updateDateDifference(inputDateTime, handleResult);


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