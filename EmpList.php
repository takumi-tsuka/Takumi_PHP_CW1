<?php
    if(file_exists('./EmpData/EmpData.txt')){
        $fileData = fopen('./EmpData/EmpData.txt','r');
        $stringData = fread($fileData,filesize('./EmpData/EmpData.txt'));
        fclose($fileData);
        $dataArray = json_decode($stringData,true);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border= "1">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Base Salary</th>
                <th>Marriage Status</th>
                <th>Final Salary</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sum = 0;
                foreach($dataArray as $datas){
                    echo "<tr>";
                    foreach($datas as $data){
                        echo "<td>$data</td>";
                    }
                    $sum += $datas['FSalary'];
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php
        echo "<h1>Average of Final Salary:".$sum/count($dataArray)."</h1>";

        foreach($dataArray as $datas){
            if($datas['FSalary'] > $sum/count($dataArray)){
                echo "<h2>Higher salary than average:".$datas['name']."</h2>";
            }
        }
    ?>
    
</body>
</html>