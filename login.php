<?php
require('/vendor/autoload.php');
session_start();

use Gregwar\Captcha\PhraseBuilder;
use Gregwar\CaptchaBundle\GregwarCaptchaBuilder;
$builder = new GregwarCaptchaBuilder;
$builder->build();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (
		isset($_SESSION['phrase']) &&
		PhraseBuilder::comparePhrases($_SESSION['phrase'], $_POST['captcha'])
	) {
		// Xu ly dang nhap
		exit("<h1>Xin chao, {$_POST['username']}</h1>");
	} else {
		echo "<h1>Captcha khong dung!</h1>";
	}
}

$_SESSION['phrase'] = $builder->getPhrase();
?>
<h2>Đăng nhập</h2>
<form method="POST">
	Username: <input type="text" name="username">
	<br>
	Password: <input type="password" name="password">
	<br>
	<img src="<?= $builder->inline() ?>" alt="Captcha">
	<br>
	Captcha: <input type="text" name="captcha">
	<br>
	<input type="submit" name="submit" value="Login">
</form>