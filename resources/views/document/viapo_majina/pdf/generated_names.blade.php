<!-- resources/views/pdf_templates/certificate_template.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 0;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Certificate of Achievement</h1>
        <div class="info">
            <p><strong>Name:</strong> {{ $fullName }}</p>
            <p><strong>Address:</strong> {{ $address }}</p>
            <p><strong>Occupation:</strong> {{ $occupation }}</p>
        </div>
        @if (!empty($nameEdits))
            <div class="info">
                <h2>Name Edits</h2>
                <ul>
                    @foreach ($nameEdits as $edit)
                        <li>{{ $edit }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (!empty($nameWrongs))
            <div class="info">
                <h2>Name Wrongs</h2>
                <ul>
                    @foreach ($nameWrongs as $wrong)
                        <li>{{ $wrong }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
