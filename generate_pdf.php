<?php
require 'vendor/autoload.php'; // For Dompdf
require 'classes/classes.php'; // Include class definitions

use Dompdf\Dompdf;

// Generate data
$docentNaam = new Naam("Mevrouw", "De Vries");
$docent = new Docent($docentNaam, "Informatica");

$student1 = new Student(new Naam("Jan", "Jansen"), "12345");
$student2 = new Student(new Naam("Piet", "Pietersen"), "67890");
$student3 = new Student(new Naam("Klaas", "de Boer"), "54321");

$docent->voegStudentToe($student1);
$docent->voegStudentToe($student2);
$docent->voegStudentToe($student3);

// Generate HTML for the PDF
$html = "
    <h1>Docent en Studenten</h1>
    <p><strong>Docent:</strong> {$docent->getNaam()}</p>
    <p><strong>Klas:</strong> {$docent->getKlasNaam()}</p>
    <h2>Studentenlijst</h2>
    <ul>
";
foreach ($docent->getStudenten() as $student) {
    $html .= "<li><strong>{$student->getNaam()}</strong> (Studentnummer: {$student->getStudentnummer()})</li>";
}
$html .= "</ul>";

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("studentenlijst.pdf", ["Attachment" => false]);
