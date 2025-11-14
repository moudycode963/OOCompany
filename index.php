<?php

include './classes/Department.php';
include './classes/Gender.php';
include './classes/Employee.php';

spl_autoload_register(function ($class) {
    include './classes/' . $class . '.php';
});
Department::setDepartments();

$departments = Department::getDepartments();
[$hr, $verkauf, $produktion] = $departments;

new Employee("Petra", "Pan", Gender::W, $hr);
new Employee("Tom", "Toll", Gender::M, $verkauf);
new Employee("Daisy", "Drama", Gender::D, $produktion);
new Employee("Carla", "Gross", Gender::D, $hr);
new Employee("Fips", "Froh", Gender::D, $hr);

echo '<pre>';
foreach($departments as $department)
{
    echo $department->getName() . ':<br>';
    foreach($department->getEmployees() as $employee) {
        echo $employee->getFullName() . '<br>';
    }
    echo '<br>';
}
echo '</pre>';