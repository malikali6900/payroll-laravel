<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salary Slip</title>
    <!-- Include any necessary CSS styles -->
    <style>
        /* CSS styles for the PDF */
        /* Define styles for the company name, header, and table */
        h1, h2{
            font-family: Arial, Helvetica, sans-serif
        }
        table{
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif
        }
        table th,table tr, table td{
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="head">
        <h1>Giga Creatives</h1>
    </div>
    <h2>Salary Slip</h2>
    @if(isset($user, $salary, $allowances, $bonuses, $deductions, $totalSalary))
        <table class="table border-collapse text-dark" id="individual-salary">
            <thead>
                <tr>
                    <th class="text-custom">Description</th>
                    <th class="text-custom">Value (in Rs)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-custom">Name</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="text-custom">Basic Salary</td>
                    <td>{{ $salary->salary_amount ?? 0 }}</td>
                </tr>
                <tr>
                    <td class="text-custom">Allowances</td>
                    <td>{{ $allowances ?? 0 }}</td>
                </tr>
                <tr>
                    <td class="text-custom">Bonuses</td>
                    <td>{{ $bonuses ?? 0 }}</td>
                </tr>
                <tr>
                    <td class="text-custom">Deductions</td>
                    <td>{{ $deductions ?? 0 }}</td>
                </tr>
                <tr>
                    <td class="text-custom">Total Salary</td>
                    <td>{{ $totalSalary ?? 0 }}</td>
                </tr>
            </tbody>
        </table>

    @endif
</body>
</html>