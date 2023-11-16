<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $employeeId = $row[0];
        $name = $row[1];
        $totalPresent = $row[2]; // Change this to the appropriate index in the $row array
        $totalAbsent = $row[3]; // Change this to the appropriate index in the $row array
        $totalDays = $row[4]; // Change this to the appropriate index in the $row array

        return new \App\Attendance([
            'employee_id' => $employeeId,
            'name' => $name,
            'total_present' => $totalPresent,
            'total_absent' => $totalAbsent,
            'total_days' => $totalDays,
        ]);
    }

}
