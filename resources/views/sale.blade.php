<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Agreement Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
            font-family: 'Georgia', serif;
            font-weight: bold;
            border-bottom: 2px solid #2c3e50; /* Improved header styling */
            padding-bottom: 10px; /* Spacing below the header */
        }
        h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #34495e;
        }
        .section-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 25px;
            color: #34495e;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            color: #555;
        }
        .dottedUnderline {
            border-bottom: 2px dotted #2c3e50;
            padding: 8px;
            margin-bottom: 20px;
            display: inline-block; /* Ensures it only takes up necessary width */
            width: 100%; /* Makes sure the underline spans the full width */
        }
        .terms-section {
            margin-top: 40px;
        }
        .terms-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: #34495e;
        }
        .signature-block {
            margin-top: 40px;
            text-align: center;
        }
        .signature-line {
            margin-top: 20px;
            border-top: 1px solid #333;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        .signature-label {
            margin-top: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: #7f8c8d;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
        .disclaimer {
            font-size: 0.85rem;
            margin-top: 30px;
            color: #9b9b9b;
            text-align: center;
        }
        .witness-section {
            margin-top: 40px;
        }
        .witness-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: #34495e;
        }
        .witness-line {
            border-top: 1px solid #333;
            width: 250px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1, h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sale Agreement</h1>
    <h2>THIS AGREEMENT is made on this <span class="dottedUnderline">
        <?php
            // Replace with your actual date fetching logic
            echo date('d') . ' day of ' . date('F') . ', ' . date('Y');
        ?>
    </span></h2>

    <p>
        <strong>BETWEEN:</strong><br>
        <strong>Seller:</strong> <span class="dottedUnderline">John Michael Doe</span> <br>
        <strong>Address:</strong> <span class="dottedUnderline">123 Main Street, Springfield</span> <br>
        <strong>Contact:</strong> <span class="dottedUnderline">(123) 456-7890</span>
    </p>
    <p>
        <strong>AND:</strong><br>
        <strong>Buyer:</strong> <span class="dottedUnderline">Jane Smith</span> <br>
        <strong>Address:</strong> <span class="dottedUnderline">456 Oak Avenue, Springfield</span> <br>
        <strong>Contact:</strong> <span class="dottedUnderline">(987) 654-3210</span>
    </p>

    <div class="section-title">1. Description of Goods</div>
    <div class="form-group">
        <label for="goodsDescription">Goods Description:</label>
        <div class="dottedUnderline">
            <span>Used Toyota Corolla, 2015 model, VIN# XYZ123456789</span>
        </div>
    </div>
    <div class="form-group">
        <label for="goodsCondition">Condition of Goods:</label>
        <div class="dottedUnderline">
            <span>Good, minor wear and tear</span>
        </div>
    </div>

    <div class="section-title">2. Sale Price</div>
    <div class="form-group">
        <label for="salePrice">Total Sale Price:</label>
        <div class="dottedUnderline">
            <span>$10,000</span>
        </div>
    </div>

    <div class="section-title">3. Payment Terms</div>
    <div class="form-group">
        <label for="paymentTerms">Payment Terms:</label>
        <div class="dottedUnderline">
            <span>50% ($5,000) upfront, remaining balance ($5,000) due within 30 days</span>
        </div>
    </div>

    <div class="section-title">4. Delivery and Transfer of Goods</div>
    <div class="form-group">
        <label for="deliveryDate">Date of Delivery:</label>
        <div class="dottedUnderline">
            <span>October 25, 2024</span>
        </div>
    </div>
    <div class="form-group">
        <label for="transferTerms">Transfer of Ownership:</label>
        <div class="dottedUnderline">
            <span>Ownership transferred upon full payment</span>
        </div>
    </div>

    <div class="terms-section">
        <div class="terms-title">5. Terms and Conditions</div>
        <p>
            This Sale Agreement constitutes the entire agreement between the parties. The Buyer acknowledges that the goods are sold "as is" and without any warranties, unless explicitly stated in writing by the Seller. The Buyer has inspected the goods and accepts them in their current condition.
        </p>
        <p>
            Any disputes arising from this Agreement will be resolved in accordance with the laws of the State of <span class="dottedUnderline">[State]</span>.
        </p>
    </div>

    <!-- Witness Section -->
    <div class="witness-section">
        <div class="witness-title">Witnesses</div>
        <div class="form-group">
            <label for="witness1">Witness 1:</label>
            <div class="dottedUnderline">
                <span>Name: John Doe</span>
            </div>
            <div class="dottedUnderline">
                <span>Contact: (111) 222-3333</span>
            </div>
            <div class="signature-line"></div>
            <div class="signature-label">Signature</div>
        </div>
        <div class="form-group">
            <label for="witness2">Witness 2:</label>
            <div class="dottedUnderline">
                <span>Name: Jane Smith</span>
            </div>
            <div class="dottedUnderline">
                <span>Contact: (444) 555-6666</span>
            </div>
            <div class="signature-line"></div>
            <div class="signature-label">Signature</div>
        </div>
    </div>

    <div class="signature-block">
        <div class="signature-label">Seller's Signature:</div>
        <div class="signature-line"></div>
        <div class="signature-label">Buyer's Signature:</div>
        <div class="signature-line"></div>
        <div class="signature-label">Date: <span class="dottedUnderline">
            <?php
                // Replace this with your actual date fetching logic for signature date
                echo date('d') . ' day of ' . date('F') . ', ' . date('Y');
            ?>
        </span></div>
    </div>

    <div class="disclaimer">
        This is a sample agreement. Please consult with a legal professional for proper contract drafting.
    </div>
</div>

</body>
</html>
