<?php
$allFileInUploadsPath = glob("./uploads/*.*");
$arrayFile = [];
foreach ($allFileInUploadsPath as $fileName) {
    $itemFile = [
        "pathInfo"=>pathinfo($fileName),
        "updatedAt"=>filectime($fileName),
        "fileSize" => filesize($fileName)
    ];
    $arrayFile[] = $itemFile;
}

if (isset($_GET["sortName"])) {
    $sortName = $_GET["sortName"];
    function sortName1($a,$b)
    {
        if ($a["pathInfo"]["filename"]==$b["pathInfo"]["filename"]) return 0;
        return ($a["pathInfo"]["filename"]<$b["pathInfo"]["filename"])?-1:1;
    }
    function sortName2($a,$b)
    {
        if ($a["pathInfo"]["filename"]==$b["pathInfo"]["filename"]) return 0;
        return ($a["pathInfo"]["filename"]>$b["pathInfo"]["filename"])?-1:1;
    }
    if ($sortName == 1) {
        usort($arrayFile,"sortName1");
    } else {
        usort($arrayFile,"sortName2");
    }
}

if (isset($_GET["sortDate"])) {
    $sortDate = $_GET["sortDate"];
    function sortDate1($a,$b)
    {
        if ($a["updatedAt"]==$b["updatedAt"]) return 0;
        return $a["updatedAt"]>$b["updatedAt"]?-1:1;
    }
    function sortDate2($a,$b)
    {
        if ($a["updatedAt"]==$b["updatedAt"]) return 0;
        return $a["updatedAt"]<$b["updatedAt"]?-1:1;
    }
    if ($sortDate == 1) {
        usort($arrayFile,"sortDate1");
    } else {
        usort($arrayFile,"sortDate2");
    }
}

if (isset($_GET["sortSize"])) {
    $sortSize = $_GET["sortSize"];
    function sortSize1($a,$b)
    {
        if ($a["fileSize"]==$b["fileSize"]) return 0;
        return $a["fileSize"]<$b["fileSize"]?-1:1;
    }
    function sortSize2($a,$b)
    {
        if ($a["fileSize"]==$b["fileSize"]) return 0;
        return $a["fileSize"]>$b["fileSize"]?-1:1;
    }
    if ($sortSize == 1) {
        usort($arrayFile,"sortSize1");
    } else {
        usort($arrayFile,"sortSize2");
    }
}


echo json_encode($arrayFile);