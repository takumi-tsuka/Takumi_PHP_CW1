<?php
$FSalary = 0;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $MStatus = $_POST['MStatus'];

    if($MStatus == 'married'){
        $FSalary = $salary + $salary * 0.1;
    }else{
        $FSalary = $salary;
    }

    $new = ['name'=>$name,'position'=>$position,'department' =>$department,'salary'=>$salary,'MStatus'=>$MStatus,'FSalary' =>$FSalary];
    if(file_exists('./EmpData/EmpData.txt')){
        $dataFile = fopen('./EmpData/EmpData.txt','r');
        $stringData = fread($dataFile,filesize('./EmpData/EmpData.txt'));
        fclose($dataFile);
        $mainArray = json_decode($stringData,true);
        array_push($mainArray,$new);
        $dataFile = fopen('./EmpData/EmpData.txt','w');
        fwrite($dataFile,json_encode($mainArray));
        fclose($dataFile);
    }else{
        $mainArray = [];
        array_push($mainArray,$new);
        $dataFile = fopen('./EmpData/EmpData.txt','w');
        fwrite($dataFile,json_encode($mainArray));
        fclose($dataFile);
    }
}

?>