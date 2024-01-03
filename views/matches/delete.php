<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'>

    <title>Document</title>
</head>

<body>
    <h1>delete Match</h1>
    <br>
    <p>you want to delete Match with the </p>
    <br>
    <p>ID: <?php echo $row['id'] ?></p>


    <form id="deletMatchForm" action="http://staduimstream.test/matches/deleteaction/<?php echo $row['id'] ?>" method="post">
        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
        <button type="submit">Delete</button>
    </form>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>

    <script>
        let deletTeamForm = document.getElementById('deletMatchForm');

        deletTeamForm.addEventListener("submit", async (e) => {
            e.preventDefault();

            const form = e.currentTarget;
            const url = new URL(form.action);

            const formData = new FormData(deletTeamForm);


            try {
                const response = await fetch(url, {
                    method: "POST",
                    body: formData,
                });

                if (response.ok) {
                    const responseData = await response.json();

                    if (responseData.message != "Match deleted successfully!") {
                        throw new Error(`Error: ${response.status} - ${response.message}`);
                    }

                    swal("Delete Match", responseData.message, "success")
                    console.log(responseData.message);
                }

                if (!response.ok) {
                    throw new Error(`Error: ${response.status} - ${response.message}`);
                }

            } catch (error) {
                swal("Delete Match", "Failed to delete", "error")
                console.error(error);
            }


        })
    </script>
</body>

</html>