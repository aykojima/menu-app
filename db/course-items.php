<?php 
require_once('database.php');

//$param_term = i;

$courses = array();

//Class GetItems{
function getCourseItems($i)
{
        global $db;
        //global $conn;
        //$i_esc = $ $conn->escape_string($i);
        $sql = "SELECT CourseKey, Course, CoursePrice, AdditionalOne, AdditionalOnePrice, AdditionalTwo, AdditionalTwoPrice,
        AppetizerFirst, AppetizerSecond, AppetizerThird,
        EntreeFirst, EntreeFirstDescription, EntreeFirstPrice,
        EntreeSecond, EntreeSecondDescription, EntreeSecondPrice,
        EntreeThird, EntreeThirdDescription, EntreeThirdPrice, EntreeFourth,
        DessertFirst, DessertSecond, DessertThird
        FROM Courses WHERE CourseKey = '$i'";

        $results = $db->query($sql);
        //$results = mysql_query($sql);
        $row_cnt = $db->num_rows($results);
        $course = $db->fetch_assoc($results);
        //mysqli_close($conn);
        return $course;
       // echo mysql_result($results, 0);
}

$two_courses = getCourseItems(1);
$three_courses = getCourseItems(2);
$five_courses = getCourseItems(3);
$six_courses = getCourseItems(4);
$omakase = getCourseItems(5);


        //echo $row_cnt;
        //for($i = 0; $i < $row_cnt; $i++){
        //$course = $results->fetch_assoc();
        //while($course = $results->fetch_assoc()){
        //if($i = 0){$two_courses = $course;}
        //else if($i = 1){$three_courses = $course;}
        //else if($i = 2){$five_courses = $course;}
        //else if($i = 3){$six_courses = $course;}
        //else if($i = 4){$omakase = $course;}
        //echo '<pre>' . var_dump($course) . '</pre>';
        //array_push($courses, $course);
        //}
       // }#end of function
//}#end of class

//$getItems = new GetItems;
//$getItems->getCourseItems(1);
//$x = 1;s
//getCourseItems($x);

        //echo $courses;
        
        //foreach($courses as $row => $course){
                //foreach($course as $course1){
                //echo $details['AdditionalOne'];
                //echo array_column($course1, 'Course');
                //echo $course[0]['Course'];
                //echo $course['Course'];
                //echo $course1['EntreeFirstDescription'];
                //echo $course1['EntreeFirstPrice'];
                //echo $course1['Course'];
                //}
        //}
        
        //echo '<pre>' . var_dump($courses) . '</pre>';
        //echo $two_courses, $three_courses, $five_courses, $six_courses, $omakase;
        

        //printf("Result set has %d rows.\n", $row_cnt);


        


?>