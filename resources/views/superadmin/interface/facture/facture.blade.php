<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture Quincaillerie Kaoural</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --invoice-blue: #0056b3; 
        }
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .invoice-container {
            width: 210mm;
            min-height: 297mm;
            padding: 20px;
            margin: 20px auto;
            background: white;
            border: 2px solid var(--invoice-blue);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header-box {
            border: 3px solid var(--invoice-blue);
            padding: 10px;
            text-align: center;
            color: var(--invoice-blue);
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .header-icons img {
            height: 50px;
            width: auto;
            margin: 0 12px;
            object-fit: contain;
        }
        .invoice-title {
            font-weight: 900;
            font-size: 24px;
            margin: 10px 0 0 0;
            text-transform: uppercase;
        }
        .info-row {
            color: var(--invoice-blue);
            font-weight: bold;
            margin-bottom: 10px;
        }
        .invoice-table {
            border: 2px solid var(--invoice-blue);
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th {
            color: var(--invoice-blue);
            border: 2px solid var(--invoice-blue);
            text-align: center;
            font-size: 1.1rem;
            padding: 5px;
        }
        .invoice-table td {
            border-left: 2px solid var(--invoice-blue);
            border-right: 2px solid var(--invoice-blue);
            border-bottom: 1px solid #dee2e6;
            height: 32px; 
        }
        .invoice-table .total-row td {
            border-top: 2px solid var(--invoice-blue);
            border-bottom: 2px solid var(--invoice-blue);
            font-weight: bold;
            font-size: 1.4rem;
            color: var(--invoice-blue);
            padding: 5px;
        }
        .dotted-line {
            border-bottom: 2px dotted var(--invoice-blue);
            display: inline-block;
            min-width: 200px;
        }
        .footer-section {
            margin-top: 20px;
            color: var(--invoice-blue);
        }
        .signature-box {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            font-weight: bold;
        }
        @media print {
            .no-print { display: none; }
            body { background: white; }
            .invoice-container { box-shadow: none; margin: 0; border: none; }
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="header-box">
        <div class="header-icons mb-2">
            <img src="{{ asset('facture/brouette.jpg') }}" alt="Brouette">
            <img src="{{ asset('facture/pinceau.jpg') }}" alt="Pinceau">
            <img src="{{ asset('facture/robinet.jpg') }}" alt="Robinet">
            <img src="{{ asset('facture/wc.jpg') }}" alt="Wc">
            <img src="{{ asset('facture/peinture.jpg') }}" alt="Peinture">
        </div>
        <h1 class="invoice-title">QUINCAILLERIE KAOURAL & DIVERS</h1>
        <p class="mb-0 small">CHEZ N'DIAYE ET FRERE</p>
        <p class="mb-0 small">TOUT POUR CARREAUX, PLOMBERIE, ELECTRICITÉ, PORTE ET MAÇONNERIE</p>
        <p class="mb-0 fw-bold">TEL: +223 76 36 96 79 / 66 77 74 74</p>
    </div>

    <div class="row info-row">
        <div class="col-6">
            FACTURE N°: <span class="dotted-line" style="min-width: 150px;"></span>
        </div>
        <div class="col-6 text-end">
            Bamako le ....../....../20......
        </div>
    </div>

    <div class="info-row mb-3">
        Doit: <span class="dotted-line" style="width: 80%;"></span>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th style="width: 15%;">Quantité</th>
                <th style="width: 45%;">Désignation</th>
                <th style="width: 20%;">P. Unitaire</th>
                <th style="width: 20%;">Montant</th>
            </tr>
        </thead>
        <tbody>
            <script>
                for (let i = 1; i <= 22; i++) {
                    document.write(`
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    `);
                }
            </script>
            
            <tr class="total-row">
                <td colspan="2" class="text-center">TOTAL</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>

    <div class="footer-section">
        <p>Arrêtée le présent Reçu à la somme de: <span class="dotted-line" style="width: 60%;"></span></p>
        
        <div class="signature-box">
            <div class="text-center">
                <p>Pour Acquit</p>
            </div>
            <div class="text-center">
                <p>Le Fournisseur</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>