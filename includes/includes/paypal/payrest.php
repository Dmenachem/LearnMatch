
<!DOCTYPE html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<body>
    <div id="paypal-button"></div>

    <script>
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '$', currency: 'ILS' },
                                 description: 'The payment transaction description.',
                                    custom: 'EBAY_EMS_90048630024435',
                                    invoice_number: '48787589673',
                                    payerID: data.payerID,
                                    
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.request.post('complete-order.php', {
                 paymentID: data.paymentID,
                 payerID: data.payerID
                 }).then(function(res) {
                 if (res == 'error') {
                 // Show an alter if there was an error 
                 window.alert('Error');
                 } else {
                 // Redirect to a success page if everything completed okay
                 window.location = 'success.php'; 
                 }
                 });
                 });
                 },
                 onCancel: function(data, actions) {
                 // Show an alert if user cancels
                 window.alert('Canceled by user');
                 },
                 onError: function(err) {
                 // Show an alert with error
                 window.alert('Error: '+err); 
                 }
                
                 }, '#paypal-button-container');

    </script>
</body>