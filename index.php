<?php
require 'vendor/autoload.php'; // For Dompdf
require 'classes/classes.php'; // Include class definitions

// Generate data
$docentNaam = new Naam("Mevrouw", "De Vries");
$docent = new Docent($docentNaam, "Informatica");

$student1 = new Student(new Naam("Jan", "Jansen"), "12345");
$student2 = new Student(new Naam("Piet", "Pietersen"), "67890");
$student3 = new Student(new Naam("Klaas", "de Boer"), "54321");

$docent->voegStudentToe($student1);
$docent->voegStudentToe($student2);
$docent->voegStudentToe($student3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent en Studenten</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="main-header">
            <h1>Docent en Studenten</h1>
        </header>
        <section class="docent-info">
            <h2>Docent</h2>
            <p><strong>Naam:</strong> <?= $docent->getNaam(); ?></p>
            <p><strong>Klas:</strong> <?= $docent->getKlasNaam(); ?></p>
        </section>
        <section class="student-list">
            <h2>Studentenlijst</h2>
            <ul>
                <?php foreach ($docent->getStudenten() as $student): ?>
                    <li>
                        <div class="student-card">
                            <span class="student-name"><?= $student->getNaam(); ?></span>
                            <span class="student-number">Studentnummer: <?= $student->getStudentnummer(); ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <footer class="main-footer">
            <form action="generate_pdf.php" method="post">
                <button type="submit" class="pdf-button">Exporteer naar PDF</button>
            </form>
        </footer>
    </div>
</body>
</html>
