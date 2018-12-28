<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Websaito forma';
		$to = 'info@statmatavimai.lt';
		$subject = 'Žinutė iš websaito RU';
        $headers = "Content-Type: text/html; charset=UTF-8";

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Введите свое имя';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Введите свой email';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Напишите текст сообщения';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Результат неверный';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $headers)) {
		$result='<div class="alert alert-success">Спасибо! Мы свяжимся с Вами</div>';
	} else {
		$result='<div class="alert alert-danger">Ошибка отправления. Попробуйте позже..</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stamata - свяжитесь</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/flags.min.css">
  <link rel="shortcut icon" href="../favicon.ico" />

</head>
<body>
  <div class="full-width corners">

        <div class="container">
            <p>
</p>
            <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Stamata</a>
    </div>
    <ul class="nav navbar-nav">

			<li><a href="index-ru.html">О нас</a></li>
			<li><a href="inventarizacija-kadastrovye-izmerenia.html">Инвентаризация - кадастровые измерения</a></li>
			<li><a href="deklaracii-o-stroitelstve.html">Декларации о строительстве</a></li>
			<li><a href="proekty-slabyx-tokov.html">Проекты слабых токов</a></li>
			<li class="active"><a href="#">Свяжитесь</a></li>
			<li><a href="../index.html"><img src="../css/blank.gif" class="flag flag-lt" alt="lietuviškai" /></a></li>
    </ul>
  </div>
</nav>


  <script src="http://code.jquery.com/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

 <div class="wrap">
        </p>
<h3>Контакты</h3>
<p>
		STAMATA, MB</br>
		Руководитель: Vladas Stabingis</br>
		Код предприятияs:  304690726</br>
		Тел.: +370-601-52996</br>
		эл. почтa: info@statmatavimai.lt</br>
	</p>
	<p>Свяжитесь с нами, чтобы узнать цену интересующей Вас услуги или другую информацию.</p>
	<p><strong>Напишите нам:</strong></p>

				<form class="form-horizontal" role="form" method="post" action="sviazhitesj.php" accept-charset="UTF-8">
					<div class="form-group">
						<label for="name">Имя</label>
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
						<label for="message">Сообщение</label>
						<div class="col-sm-4">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human">2 + 3 = ?</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="human" name="human" placeholder="Ответ">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<input id="submit" name="submit" type="submit" value="Выслать" class="btn btn-primary">
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
