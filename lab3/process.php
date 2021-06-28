<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>
    <?php
    $name1 = $_POST["name1"];
    $day1 = $_POST["day1"];
    $month1 = $_POST["month1"];
    $year1 = $_POST["year1"];
    $checkValidDate = checkdate($month1, $day1, $year1);
    if (!$checkValidDate) echo "Người dùng thứ nhất nhập ngày sinh không hợp lệ !";
    else {
        echo "Ngày sinh của $name1 là ngày $day1, tháng $month1, năm $year1";
    }
    ?>
</p>
<p>
    <?php
    $name2 = $_POST["name2"];
    $day2 = $_POST["day2"];
    $month2 = $_POST["month2"];
    $year2 = $_POST["year2"];
    $checkValidDate = checkdate($month2, $day2, $year2);
    if (!$checkValidDate) echo "Người dùng thứ nhất nhập ngày sinh không hợp lệ !";
    else {
        echo "Ngày sinh của $name2 là ngày $day2, tháng $month2, năm $year2";
    }
    ?>
</p>
<p>
    <?php
    // funcition to caculate difference in days
    function dateDiffInDays($dateOfPerson1, $dateOfPerson2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($dateOfPerson2) - strtotime($dateOfPerson1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }

    ;
    $name1 = $_POST["name1"];
    $day1 = $_POST["day1"];
    $month1 = $_POST["month1"];
    $year1 = $_POST["year1"];

    $name2 = $_POST["name2"];
    $day2 = $_POST["day2"];
    $month2 = $_POST["month2"];
    $year2 = $_POST["year2"];
    if (!checkdate($month1, $day1, $year1)) echo "Người thứ nhất nhập ngày sinh không hợp lệ !";
    if (!checkdate($month2, $day2, $year2)) echo "Người thứ hai nhập ngày sinh không hợp lệ !";
    if (checkdate($month1, $day1, $year1) && checkdate($month2, $day2, $year2)) {

        // date of person1
        $dateOfPerson1 = "$day1-$month1-$year1";

        // date of person2
        $dateofPerson2 = "$day2-$month2-$year2";

        // Function call to find date difference
        $dateDiff = dateDiffInDays($dateOfPerson1, $dateofPerson2);

        // Display the result
        printf("Difference between two dates: "
            . $dateDiff . " Days ");
    }
    ?>
</p>


<p>
    <?php
    // function to getAge
    function getAge($year, $month, $day)
    {
        $date = "$year-$month-$day";
        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            $dob = new DateTime($date);
            $now = new DateTime();
            return $now->diff($dob)->y;
        }
        $difference = time() - strtotime($date);
        return floor($difference / 31556926);
    }


    $name1 = $_POST["name1"];
    $day1 = $_POST["day1"];
    $month1 = $_POST["month1"];
    $year1 = $_POST["year1"];

    $name2 = $_POST["name2"];
    $day2 = $_POST["day2"];
    $month2 = $_POST["month2"];
    $year2 = $_POST["year2"];

    // check validate birthday
    if (!checkdate($month1, $day1, $year1)) echo "Người thứ nhất nhập ngày sinh không hợp lệ !";
    if (!checkdate($month2, $day2, $year2)) echo "Người thứ hai nhập ngày sinh không hợp lệ !";
    if (checkdate($month1, $day1, $year1) && checkdate($month2, $day2, $year2)) {
        echo "Tuổi của $name1 là : ";
        echo getAge($year1, $month1, $day1);
        echo " Tuổi của $name2 là : ";
        echo getAge($year2, $month2, $day2);
        echo " Chênh lệch tuổi giữa hai người là : ";
        echo abs(getAge($year1, $month1, $day1) - getAge($year2, $month2, $day2));
    }
    ?>
</p>
</body>
</html>