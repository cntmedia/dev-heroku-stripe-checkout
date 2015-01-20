<?php
define('STRIPE_PRIVATE_KEY', 'sk_test_udw56z4V1NbZNOdNWDrDNfdK');
define('STRIPE_PUBLIC_KEY', 'pk_test_WJ5z2yZl5ELiyNlhJ1swpxoT');

// Uses sessions to test for duplicate submissions:
session_start();
?>
<!doctype html>
<html lang="en">
<head></head>
<body>
<p>dev.heroku.stripe.checkout</p>
<b>
	<?php
		echo(STRIPE_PRIVATE_KEY);
	?>
</b>
</body>
</html>