<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sinhala Learning</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        .mar-tp {
            margin-top: 30px;
        }

        .mar-tp150 {
            margin-top: 150px;
        }

        .paybox input[type=text] {
            border: 1px solid #000;
        }

        .paybdy {
            border: 5px solid #369f1b;
            padding: 24px;
            background: #fff;
        }

        body {
            background: #eee;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="pull-left">
                <br><br>
                <a href="{{route('findCourse')}}">
                    <button class="btn btn-sm btn-info">Back</button>
                </a>
            </div>
            <div class="card card-outline-secondary mar-tp150">
                <div class="card-body paybdy">
                    <h3 class="text-center">Credit Card Payment</h3>
                    <hr>
                    <div class="alert alert-info p-2 pb-3">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#"><span class="badge pull-right">LKR {{$amount}}</span> Payment
                                    Amount</a>
                            </li>
                        </ul>
                    </div>


                    <form action="{{route('payments_save')}}" method="post" id="payment-form">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$amount}}" name="amount">
                        <input type="hidden" name="course_id" value="{{$bill_id}}">
                        <input type="hidden" name="child_id" value="{{$child_id}}">
                        <input type="hidden" name="req_id" value="{{$req_id}}">


                        <input type="text" class="form-control" name="card_name" placeholder="Name in card">
                        <div class="form-row mar-tp paybox">

                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display Element errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <br>
                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        <button class=" btn btn-success btn-lg btn-block">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_444G5C0mg55M6IXXN6v45Udy00DVIe9Aba');
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: "#32325d",
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the customer that there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });


    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

</script>
</html>