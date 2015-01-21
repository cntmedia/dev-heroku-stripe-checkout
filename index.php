<?php
define('STRIPE_PRIVATE_KEY', 'sk_test_udw56z4V1NbZNOdNWDrDNfdK');
define('STRIPE_PUBLIC_KEY', 'pk_test_WJ5z2yZl5ELiyNlhJ1swpxoT');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>dev.heroku.stripe.checkout</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body>
<form action="dev.stripe.checkout.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo(STRIPE_PUBLIC_KEY);?>"
    data-amount="2197"
    data-name="Demo Site"
    data-description="2 test products ($21.97)"
    data-image="/128x128.png">
  </script>
</form>
</body>
</html>