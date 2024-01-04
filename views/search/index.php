<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../../public/assets/dist/output.css" rel="stylesheet" />
</head>

<body>
  <?php include 'views/includes/header.php' ?>

  <section class="heroBackrround h-[20vh] bg-green-800"></section>

  <?php require_once "./views/includes/filter.php" ?>

  <section id="matchesContainer" class="mt-20 mb-20">

    <?php foreach ($matcherows as $row): ?>

      <div style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px"
        class="w-full md:w-2/3 mx-auto flex items-center justify-between p-5 px-14 rounded-lg hover:bg-gray-200 bg-white mt-12">
        <div class="flex items-center gap-8">
          <div class="flex items-center gap-8">
            <p class="font-bold text-2xl text-gray-600">
              <?= $row['team_1'] ?>
            </p>
            <img class="h-20" src="http://staduimstream.test/public/images/ivorycost.png" />
          </div>
          <span class="font-bold text-3xl text-gray-600">VS</span>
          <div class="flex items-center gap-8">
            <img class="h-20" src="http://staduimstream.test/public/images/guineabissau.png" />
            <p class="font-bold text-2xl text-gray-600">
              <?= $row['team_2'] ?>
            </p>
          </div>
        </div>
        <a href="http://staduimstream.test/matches/match/<?= $row['id'] ?>" class="cursor-pointer">
          <span
            class="h-14 w-36 flex items-center justify-center rounded-full text-gray-100 text-lg hover:bg-orange-600 bg-orange-500">Buy
            Ticket</span>
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
      return function () {
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
                            <p class="font-bold text-2xl text-gray-600">${elm.team_2}</p>
                          </div>
                        </div>
                      <a href="/matches/match/${elm.id}" class="cursor-pointer">
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