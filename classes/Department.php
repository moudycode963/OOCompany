<?php

class Department
{
    // Statische Zähler für automatische ID-Vergabe
    private static int $counter = 0;

    // Liste aller erstellten Abteilungen
    private static array $departments = [];

    // Liste aller Mitarbeiter (wird aus Employee übernommen)
    private array $Employees = [];

    // Eigenschaften einer einzelnen Abteilung
    private ?int $id;
    private ?string $name;



    /**
     * Konstruktor
     */
    public function __construct(?string $name = null)
    {
        if (isset($name)) {
            self::$counter++;
            $this->id = self::$counter;
            $this->name = $name;

            // Diese Abteilung zur globalen Liste hinzufügen
            self::$departments[] = $this;
        }
    }


    /**
     * Erstellt Standardabteilungen
     */
    public static function setDepartments(): void
    {
        new Department('HR');
        new Department('Verkauf');
        new Department('Produktion');
    }


    /**
     * Gibt alle existierenden Abteilungen zurück
     * @return Department[]
     */
    public static function getDepartments(): array
    {
        return self::$departments;
    }


    /**
     * Gibt eine Abteilung nach Namen zurück
     */
    public static function getByName(string $name): ?Department
    {
        foreach (self::$departments as $department) {
            if ($department->getName() === $name) {
                return $department;
            }
        }
        return null;
    }


    /**
     * Gibt die ID dieser Abteilung zurück
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * Gibt den Namen dieser Abteilung zurück
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * Setzt einen neuen Namen
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * Fügt einen Mitarbeiter hinzu (wird von Employee aufgerufen)
     */
    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }


    /**
     * Gibt alle Mitarbeiter dieser Abteilung zurück
     * @return Employee[]
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }


    /**
     * Gibt alle Mitarbeiter aller Abteilungen zurück
     * @return Employee[]
     */
    public static function getAllEmployees(): array
    {
        return self::$Employees;
    }
}
