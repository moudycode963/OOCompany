<?php
$fileName = 'employees.csv';
$fileHandle = fopen($fileName, 'w');

// Header schreiben (nur wenn die Datei neu erstellt wird)
if (file_exists($fileName)) {
    // Datei existiert bereits, kann also auch angehangen werden
    $fileHandle = fopen($fileName, 'a');
} else {
    // Datei existiert nicht, neue Datei erstellen und Header schreiben
    $fileHandle = fopen($fileName, 'w');
    $header = ['Produkt', 'Im Lager', 'Preis', 'Produkt-ID'];
    fputcsv($fileHandle, $header);
}

// Daten, die geschrieben werden sollen
$data = [
    ['Tastatur', true, '5,50', '90-120'],
    ['Lampe', false, '6,70', '91-120']
];

// Jede Zeile der Daten in die CSV-Datei schreiben
foreach ($data as $row) {
    fputcsv($fileHandle, $row);
}

// Datei schließen
fclose($fileHandle);

echo "CSV-Datei erfolgreich geschrieben!";
?>
