<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <style>
        /* Forcer un format carré dans le PDF */
        @page {
            size: 595px 595px;
            /* Format carré */
            margin: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .header,
        .footer {
            text-align: center;
            font-weight: bold;
        }

        .header {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer {
            font-size: 12px;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="header">
        Bon de Commande #<?= $commande['id'] ?><br>
        Date: <?= $commande['date_commande'] ?>
    </div>

    <div>
        <strong>Client:</strong> <?= htmlspecialchars($client['nom']) ?><br>
        <strong>Email:</strong> <?= htmlspecialchars($client['email']) ?><br>
        <strong>Téléphone:</strong> <?= htmlspecialchars($client['telephone']) ?><br>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details as $detail): ?>
                <tr>
                    <td><?= htmlspecialchars($detail['produit_nom']) ?></td>
                    <td><?= $detail['quantite'] ?></td>
                    <td><?= number_format($detail['prix_unitaire'], 2) ?> €</td>
                    <td><?= number_format($detail['quantite'] * $detail['prix_unitaire'], 2) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">
    <strong>Total à payer:</strong> <?= $totalAmount ?> €
</div>


    <div class="footer">
        Merci pour votre commande !
    </div>

</body>

</html>