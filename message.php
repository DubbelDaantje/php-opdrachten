<?php


try{
    $db = new PDO("mysql:host=localhost;dbname=comment","root","");
  if( isset ( $_POST[ 'verzenden'])) {
    $chrip = filter_input (INPUT_POST, "chirp",
    FILTER_SANITIZE_STRING);

    $query = $db->prepare("INSERT INTO chirps (chirp) VALUES (:chirp)");

    $query->bindParam("chirp", $chrip);
    if($query->execute()) {
        echo "";
    } else{
        echo"Er is een fout opgetreden";
    }
    echo"<br>";
  }


} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}
echo"<br>";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Chirpify - Homepage</title>
    <link rel="stylesheet" href="bericht.css" />
  </head>
  <body>
    <div class="header-wrapper">
      <div class="header-container">
        <header class="header">
          <nav class="navbar">
            <a class="icon" href="index.html"
              ><img class="icons" src="icons/home-svgrepo-com.svg"
            /></a>
            <a class="icon" href="#"
              ><img class="icons" src="icons/camera-svgrepo-com.svg"
            /></a>
            <a class="icon" href="#"
              ><img
                class="icons"
                src="icons/message-round-svgrepo-com.svg"
            /></a>
            <a class="icon" href="#"
              ><img
                class="icons"
                src="icons/user-square-svgrepo-com.svg"
            /></a>
          </nav>
        </header>
      </div>
    </div>
    <div class="logo-chirp">
      <a class="logo-bird" href="message.php"
        ><img class="bird" src="icons/twitter.svg"
      /></a>

      <h1 class="welkomTekst">Welkom op Chirpify 🐦</h1>
    </div>
    <form class="upload" method="post" action="">
      <br />
      <label class="msg1">Jouw Chirp..</label>
      <input class="chirpField" type="text" name="chirp" /><br />
      <img src="" alt="" />
      <br />
      <input
        class="chirpButton"
        type="submit"
        name="verzenden"
        value="Chirpen"
      />
    </form>
    <br />

    <button class="like__btn">
      <span id="icon"><i class="far fa-thumbs-up"></i></span>
      <span id="count">0</span> Like
    </button>

    <button class="delete__btn">
      <span id="icon"><i class="far fa-thumbs-up"></i></span>
      <span id="count"></span> Delete🗑️
    </button>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
      const likeBtn = document.querySelector('.like__btn');
      let likeIcon = document.querySelector('#icon'),
        count = document.querySelector('#count');

      let clicked = false;

      likeBtn.addEventListener('click', () => {
        if (!clicked) {
          clicked = true;
          likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i>`;
          count.textContent++;
        } else {
          clicked = false;
          likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i>`;
          count.textContent--;
        }
      });
    </script>
  </body>
</html>


<?php
echo"$chrip";


?>