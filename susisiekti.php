<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Websaito forma';
		$to = 'info@statmatavimai.lt';
		$subject = 'Žinutė iš websaito';
        $headers = "Content-Type: text/html; charset=UTF-8";

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Prašom įrašyti savo vardą';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Prašom įrašyt emailą';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Prašom parašyti į žinutės lauką';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Rezultatas neteisingas';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $headers)) {
		$result='<div class="alert alert-success">Ačiū! Susisieksime su Jumis</div>';
	} else {
		$result='<div class="alert alert-danger">Klaida siunčiant žinutę. Bandykite vėliau..</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stamata - kontaktai</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/flags.min.css">
  <link rel="shortcut icon" href="favicon.ico" />

</head>
<body>
  <div class="full-width corners">

        <div class="container">
            <p>
</p>
            <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Stamata</a>
    </div>
    <ul class="nav navbar-nav">

			<li><a href="index.html">﻿Apie mus</a></li>
      <li><a href="inventorizacija-kadastriniai-matavimai.html">Inventorizacija - kadastriniai matavimai</a></li>
      <li><a href="statybu-deklaracijos.html">Statybų deklaracijos</a></li>
      <li><a href="silpnuju-sroviu-projektavimas.html">Silpnųjų srovių projektavimas</a></li>
      <li class="active"><a href="#">Susisiekti</a></li>
      <li><a href="ru/index-ru.html"><img src="css/blank.gif" class="flag flag-ru" alt="rusiškai" /></a></li>
    </ul>
  </div>
</nav>


  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

 <div class="wrap">
<h3>Kontaktai</h3>
<p>
	STAMATA, MB</br>
	Vadovas: Vladas Stabingis</br>
	Įmonės kodas:  304690726</br>
	Tel.: +370-601-52996</br>
	El. p.: info@statmatavimai.lt</br>
</p>
<p>Susisiekite su mumis ir sužinokite Jus dominančių paslaugų kainą ar kitą informaciją.</p>
<p><strong>Parašykite mums:</strong></p>

				<form class="form-horizontal" role="form" method="post" action="susisiekti.php" accept-charset="UTF-8">
					<div class="form-group">
						<label for="name">Vardas</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="name" name="name" placeholder="Vardas" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<div class="col-sm-4">
							<input type="email" class="form-control" id="email" name="email" placeholder="@gmail.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" >Žinutė</label>
						<div class="col-sm-4">
							<textarea id="message" class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human">2 + 3 = ?</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="human" name="human" placeholder="Atsakymas">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<input id="submit" name="submit" type="submit" value="Siūsti" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<?php echo $result; ?>
						</div>
					</div>
				</form>
<!--			</div>-->
		</div>
	</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
