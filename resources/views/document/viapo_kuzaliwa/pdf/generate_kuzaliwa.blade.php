<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affidavit of Names</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        .signature-section {
            position: relative; /* Needed to position the brace correctly */
        }
        .sworn-text {
            font-size: 16px; /* Default font size */
            margin-right: 10px; /* Space between text and brace */
            display: inline-block; /* To keep the brace and text on the same line */
        }
        .large-brace {
            font-size: 100px; /* Large font size for the curly brace */
            font-weight: normal; /* Prevent boldness */
            font-family: "Courier New", Courier, monospace; /* Use a monospace font to ensure non-bold */
            position: absolute; /* Position the brace absolutely */
            left: 60%; /* Center it horizontally */
            top: -70px; /* Move the brace further up */
            transform: translateX(-60%); /* Fine-tune the centering */
        }
        .deponent {
            position: absolute; /* Position the text absolutely */
            left: 80%; /* Center it horizontally */
            top: -40px; /* Move the text further up */
            transform: translateX(-80%); /* Fine-tune the centering */
        }
    </style>
</head>
<body>

<h1>THE UNITED REPUBLIC OF TANZANIA</h1>
<h2>AFFIDAVIT OF BIRTH OF </h2>
<h2><u>{{ $fullName }}</u></h2>
<div class="section">
    <p>
        I, <strong>{{ $birthWitness }}</strong>, an adult, <strong>{{ $religion }}</strong>
        and Resident of <strong>{{ $hospital_address }}</strong>
        DO HEREBY take an oath and state as follows:
    </p>
    <ol>
        <li>That, the said <strong>{{ $fullName }}</strong> was born at <strong>{{ $address }}</strong> in Tanzania, on {{ $date }}</li>
        <li>That, I had personal knowledge/ was present at the birth of <strong>{{$fullName}}</strong></li>
        <li> I, <strong>{{ $fullName }}</strong>, verify that all what is stated herein above is true to the best of my knowledge
            and I conscientiously believe the same to be true in accordance with the Oaths and Statutory Declarations Act [Cap 34 RE 2019].</li>
    </ol>
</div>

<div class="section">
    <p>Verified at Dar es Salaam this <span class="input-line"></span> Day of <span class="input-line"></span> 2024.</p>
</div>

<div class="signature-section">
    <!-- The text with the inputs for the user to fill in -->
    <div class="sworn-text">
        SWORN at .........................................<span class="input-line"></span><br>
        by the said ...................................... <span class="input-line"></span>
        <br> who is identified to me by .................................<br>
        <span class="input-line"></span> this day of <span class="input-line"></span> 2024.<br>
    </div>
    <!-- The large brace, now centered and not bold -->
    <span class="large-brace">}</span><span class="deponent"><br> <img src="{{ asset($deponent->signature_path) }}" alt="Deponent Signature" />
<br>DEPONENT.</span>
</div>

</body>
</html>
