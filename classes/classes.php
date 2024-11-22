<?php
// Naam class
class Naam {
    public string $voornaam;
    public string $achternaam;

    public function __construct(string $voornaam, string $achternaam) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
    }

    public function __toString(): string {
        return "{$this->voornaam} {$this->achternaam}";
    }
}

// Persoon class
class Persoon {
    protected Naam $naam;

    public function __construct(Naam $naam) {
        $this->naam = $naam;
    }

    public function getNaam(): Naam {
        return $this->naam;
    }
}

// Student class
class Student extends Persoon {
    private string $studentnummer;

    public function __construct(Naam $naam, string $studentnummer) {
        parent::__construct($naam);
        $this->studentnummer = $studentnummer;
    }

    public function getStudentnummer(): string {
        return $this->studentnummer;
    }
}

// Docent class
class Docent extends Persoon {
    private string $klasNaam;
    private array $studenten = [];

    public function __construct(Naam $naam, string $klasNaam) {
        parent::__construct($naam);
        $this->klasNaam = $klasNaam;
    }

    public function voegStudentToe(Student $student): void {
        $this->studenten[] = $student;
    }

    public function getKlasNaam(): string {
        return $this->klasNaam;
    }

    public function getStudenten(): array {
        return $this->studenten;
    }
}
