<?php
echo "Welcome to Employee Wage Computation Problem\n";
// Class to Compute Employee Wage Problem
class Employee_Wage
{
    /**
     * Function to Check Employee is Present or Absent
     * Non-Parameterized function
     * Using rand() to generate the random of 0 or 1
     */
    function attendance()
    {
        $empCheck = rand(0, 1);
        if ($empCheck == 1) {
            echo "Employee is Present";
        } else {
            echo "Employee is Absent";
        }
    }
}
$obj = new Employee_Wage();
$obj->attendance();
