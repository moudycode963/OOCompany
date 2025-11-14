<?php

class Employee
{
    // Statische Variablen
    private static array $employees = [];
    private static int $count = 0;

    // Eigenschaften jedes Mitarbeiters
    private int $id;
    private Gender $gender;
    private string $firstName;
    private string $lastName;
    private int $departmentId;

    /**
     * Konstruktor
     */
    public function __construct(Gender $gender, string $firstName, string $lastName, Department $department)
    {
        // Mitarbeiterdaten zuweisen
        $this->gender = $gender;
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        // Automatische ID
        self::$count++;
        $this->id = self::$count;

        // Abteilung zuweisen
        $this->departmentId = $department->getId();

        // Mitarbeiter in die globale und abteilungsbezogene Liste aufnehmen
        self::$employees[] = $this;
        $department->addEmployee($this);
    }

    // --- Getter-Methoden ---

    public function getId(): int
    {
        return $this->id;
    }

    public function getGender(): string
    {
        return $this->gender->value;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    // --- Statische Methoden ---

    /**
     * Gibt alle Mitarbeiter zurück
     * @return Employee[]
     */
    public static function getEmployees(): array
    {
        return self::$employees;
    }

    /**
     * Sucht nach einem Mitarbeiter anhand Vor- und Nachname
     * @return Employee|null
     */
    public static function getByName(string $firstName, string $lastName): ?Employee
    {
        return array_find(self::$employees, fn($employee) => $employee->getFirstName() === $firstName &&
            $employee->getLastName() === $lastName);
    }

    /**
     * Gibt alle Mitarbeiter einer bestimmten Abteilung zurück
     * @return Employee[]
     */
    public static function getByDepartment(Department $department): array
    {
        $result = [];
        foreach (self::$employees as $employee) {
            if ($employee->getDepartmentId() === $department->getId()) {
                $result[] = $employee;
            }
        }
        return $result;
    }
}
