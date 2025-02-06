{{--<!-- resources/views/pdf_templates/certificate_template.blade.php -->--}}

{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Certificate</title>--}}
{{--    <style>--}}
{{--        /* Add your CSS styles here */--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            margin: 0;--}}
{{--            padding: 20px;--}}
{{--            background-color: #f8f8f8;--}}
{{--        }--}}
{{--        .container {--}}
{{--            background-color: #ffffff;--}}
{{--            padding: 20px;--}}
{{--            border-radius: 8px;--}}
{{--            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}
{{--        h1 {--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        .info {--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}
{{--        .info p {--}}
{{--            margin: 0;--}}
{{--            font-size: 18px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div class="container">--}}
{{--        <h1>Certificate of Achievement</h1>--}}
{{--        <div class="info">--}}
{{--            <p><strong>Name:</strong> {{ $fullName }}</p>--}}
{{--            <p><strong>Address:</strong> {{ $address }}</p>--}}
{{--            <p><strong>Occupation:</strong> {{ $occupation }}</p>--}}
{{--        </div>--}}
{{--        @if (!empty($nameEdits))--}}
{{--            <div class="info">--}}
{{--                <h2>Name Edits</h2>--}}
{{--                <ul>--}}
{{--                    @foreach ($nameEdits as $edit)--}}
{{--                        <li>{{ $edit }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if (!empty($nameWrongs))--}}
{{--            <div class="info">--}}
{{--                <h2>Name Wrongs</h2>--}}
{{--                <ul>--}}
{{--                    @foreach ($nameWrongs as $wrong)--}}
{{--                        <li>{{ $wrong }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}





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
            margin-top: 40px;
        }
        .field {
            margin-bottom: 10px;
        }
        .input-line {
            border-bottom: 1px solid #000;
            width: 300px;
            display: inline-block;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<h1>THE UNITED REPUBLIC OF TANZANIA</h1>
<h2>AFFIDAVIT OF NAMES</h2>

<div class="section">
    <p>
        I, <strong>{{ $fullName }}</strong>,an adult,<strong>{{ $religion }}</strong>
        and Resident of <strong>{{ $address }}</strong> within Dar es salaam Region.
        DO HEREBY take an oath and state as follows:
    </p>
    <ol>
        <li>That, I am declaring, <strong>{{ $fullName }}</strong> is my name.</li>
        @foreach ($nameEdits as $edit)
            <li>I am further declaring that known <strong>{{ $edit }}</strong> is also my name.</li>
        @endforeach
        <li>That, I am using these two names because all of them are in my official documents, Identity card, and certificates,
            including: National Identity Card, Birth Certificate, Tax Payer Identification Number, and Marriage certificate.
        </li>
        <li>That, I am further declaring that, <strong>{{ $fullName }}</strong> and known <strong>{{$edit[0]}}</strong> are all my names
            and the same to be used interchangeably in all deeds, deal transactions, contracts, Identity cards, and any other official
            activities in private and public institutions.
        </li>
    </ol>
</div>

<div class="section">
    <h2>VERIFICATION</h2>
    <p>
        I, <strong>{{ $fullName }}</strong>, verify that all what is stated herein above in paragraph 1, 2,3 and 4 is true to the best of my knowledge
        and I conscientiously believe the same to be true in accordance with Oaths and Statutory Declarations Act [Cap 34 RE 2019].
    </p>
    <p>Verified at Dar es Salaam this <span class="input-line"></span> Day of <span class="input-line"></span> 2024.</p>
</div>

<div class="signature-section">
    <div class="flex-container">
        <div>
            <p>……………………………….</p>
            <p>DEPONENT</p>
        </div>
        <div>
            <p>SWORN at <span class="input-line"></span> by the said <span class="input-line"></span>, who is identified to me/ is known to me personally this <span class="input-line"></span> day of <span class="input-line"></span> 2024.</p>
        </div>
    </div>
</div>

<div class="section">
    <p><strong>BEFORE ME:</strong></p>
    <p>Name: <span class="input-line"></span></p>
    <p>Signature: <span class="input-line"></span></p>
    <p>Postal Address: <span class="input-line"></span></p>
    <p>Qualification: COMMISSIONER FOR OATHS</p>
</div>
</body>
</html>






