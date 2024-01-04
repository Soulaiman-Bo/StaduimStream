<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../../public/assets/dist/output.css" rel="stylesheet" />
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

  <section class="heroBackrround h-[20vh] bg-green-800"></section>



  <?php require_once "./views/includes/filter.php" ?>


  <section id="matchesContainer" class="mt-20 mb-20">

    <?php foreach ($matcherows as $row) : ?>

      <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px" class="w-full md:w-2/3 mx-auto flex items-center justify-between p-5 px-14 rounded-lg hover:bg-gray-200 bg-white mt-12">
        <div class="flex items-center gap-8">
          <div class="flex items-center gap-8">
            <p class="font-bold text-2xl text-gray-600"><?= $row['team_1'] ?></p>
            <img class="h-20" src="http://staduimstream.test/public/images/ivorycost.png" />
          </div>
          <span class="font-bold text-3xl text-gray-600">VS</span>
          <div class="flex items-center gap-8">
            <img class="h-20" src="http://staduimstream.test/public/images/guineabissau.png" />
            <p class="font-bold text-2xl text-gray-600"><?= $row['team_2'] ?></p>
          </div>
        </div>
        <a href="/" class="cursor-pointer">
          <span class="h-14 w-36 flex items-center justify-center rounded-full text-gray-100 text-lg hover:bg-orange-600 bg-orange-500">Buy Ticket</span>
        </a>
      </div>

    <?php endforeach; ?>

  </section>

  <?php require_once "./views/includes/footer.php" ?>

  <script>
    let searchInput = document.getElementById("search");
    let matchesContainer = document.getElementById("matchesContainer");

    matchesContainer

    function debounce(func, delay) {
      let timeoutId;
      return function() {
        const context = this;
        const args = arguments;

        clearTimeout(timeoutId);

        timeoutId = setTimeout(() => {
          func.apply(context, args);
        }, delay);
      };
    }



    const debouncedInputHandler = debounce((value) => {

      fetch(`http://staduimstream.test/search/search/${value}`)
        .then(response => {

          if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
          }

          return response.json();

        })
        .then(data => {
          console.log(data);

          let match = "";

          data.forEach((elm) => {

            matchdiv = `<div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px" class="w-full md:w-2/3 mx-auto flex items-center justify-between p-5 px-14 rounded-lg hover:bg-gray-200 bg-white mt-12">
                <div class="flex items-center gap-8">
                  <div class="flex items-center gap-8">
                    <p class="font-bold text-2xl text-gray-600">${elm.team_1}</p>
                    <img class="h-20" src="http://staduimstream.test/public/images/ivorycost.png" />
                  </div>
                  <span class="font-bold text-3xl text-gray-600">VS</span>
                  <div class="flex items-center gap-8">
                    <img class="h-20" src="http://staduimstream.test/public/images/guineabissau.png" />
                    <p class="font-bold text-2xl text-gray-600">Guinea Bissau</p>
                  </div>
                </div>
              <a href="/" class="cursor-pointer">
                <span class="h-14 w-36 flex items-center justify-center rounded-full text-gray-100 text-lg hover:bg-orange-600 bg-orange-500">Buy Ticket</span>
              </a>
            </div>`;

            match += matchdiv;

          });

          matchesContainer.innerHTML = match;



          // responseDiv.textContent = JSON.stringify(data, null, 2);

        })
        .catch(error => {
          console.log(error);
          // responseDiv.textContent = 'An error occurred while fetching data.';
        });


    }, 400);


    //debouncedInputHandler("");

    searchInput.addEventListener('input', (e) => {
      debouncedInputHandler(e.target.value);
    })
  </script>
</body>

</html>