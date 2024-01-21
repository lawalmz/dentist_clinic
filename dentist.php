<!DOCTYPE html>
<html>
<body>

<script type="text/javascript" src="https://js.squareupsandbox.com/v2/paymentform"></script>

<div id="payment-form"></div>

<script type="text/javascript">
  var paymentForm = new SqPaymentForm({
    applicationId: 'sandbox-sq0idb-qkWufUNYCT9CPsJw41lCew',
    inputClass: 'sq-input',
    inputStyles: [{
      fontSize: '16px',
      padding: '16px',
      backgroundColor: '#F8F8F8'
    }],
    cardNumber: {
      elementId: 'sq-card-number',
      placeholder: 'Card Number'
    },
    // Add more configuration options as needed
  });

  paymentForm.build();
  
  
</script>
<!-- Your HTML code for the button or link -->
<a href="payment_form.php" class="btn btn-primary">Pay Now</a>

</body>
</html>
