<script src="https://js.stripe.com/v1/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    Stripe.setPublishableKey('pk_test_WJ5z2yZl5ELiyNlhJ1swpxoT');
/* This is not my real key. I mashed the keyboard. */

    $(document).ready(function() {
        $("#payment-form").submit(function(event) {
            // disable the submit button to prevent repeated clicks
            $('.submit-button').attr("disabled", "disabled");

            // createToken returns immediately - the supplied callback submits the form if there are no errors
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
            return false; // submit from callback
        });
    });

    function stripeResponseHandler(status, response) {
        console.log("Stripe Token Created");
        console.log(response);
        if (response.error) {
            // re-enable the submit button
            $('.submit-button').removeAttr("disabled");
            // show the errors on the form
            $(".payment-result").html(response.error.message);
        } else {
            console.log('Sending GET Request...');
            $.get(
                'https://dev-heroku-stripe-checkout.herokuapp.com/',
                {
                    stripeToken : response.id
                },
                function(data) {
                    console.log('...GET Success. Response:');
                    console.log(data);
                    if (data.success != null) {
                        $('.payment-result').html(data.success)
                    } else{
                        $('.payment-result').html(data.error)
                    }
                },
                'json'
            );  
        }
    }
</script>