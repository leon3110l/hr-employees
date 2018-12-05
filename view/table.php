<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>table</title>
    <style>
        table {
            border-collapse: collapse;
        }
        thead tr th {
            background: blue;
            color: white;
            padding: 1em 0;
            text-transform: uppercase;
        }

        tbody tr th {
            background: rgba(0, 0, 255, 0.5);
            text-align: left;
        }

        tbody tr td:nth-child(even) {
            background: rgba(0, 0, 255, 0.2);
        }

        tbody tr td {
            border: 1px solid grey;
            min-width: 10em;
        }

        tbody tr td:nth-child(4) {
            text-align: right;
        }

        tbody tr td, tbody tr th {
            padding: 0.5em 0;
        }

        .th {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="4">werelddelen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($output as $continent => $landen): ?>
                <tr>
                    <td class="th"><?= $continent ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php foreach($landen as $land => $steden): ?>
                    <tr>
                        <th></th>
                        <th><?= $land ?></th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php foreach($steden as $stad): ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <?php foreach($stad as $key => $value): ?>
                                <td><?= $value ?></td>
                            <?php endforeach; ?>
                        </tr>

                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>