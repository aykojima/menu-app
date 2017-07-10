<?php 
//this line below identifies the current page
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
$pages = array("sushi", "ippin", "rolls", "edit_sushi", "edit_ippin", "edit_rolls", "add_sushi", "add_ippin", "add_rolls");
$titleNames = array("sushi", "ippin", "rolls", "edit", "add");
$upperTitleName = ucfirst($titleName);
$i = $key + 1;
$activeNav = ${'activeNav' . $i}; 
$activeP = ${'activeP' . $i}; 
/* below we can create 'case' statements to accommodate
 unique data items (title, a page id and an image) that will
reside in the 'header.php' file
*/

foreach($pages as $key => $page){ 
    //if(THIS_PAGE == "sushi.php")
    if($key >= 3){
        $split = explode("_", $pages[$key]);
        $myTitle = ucfirst($split[0]) . " " . ucfirst($split[1]) . " Item";
        echo ("<pre>");
            echo "myTitle = " . $myTitle;
            echo ("</pre>");
        $file = $page;
            echo ("<pre>");
                echo "file = " . $file;
                echo ("</pre>");    
        $length = count($pages) - 4;
        if($key >= 3 && $key <= 5){
            for($x=0; $x < $length; $x++){
                if($x == 3){
                    $i = 4;
                    $activeNav = "_active";
                        echo ("<pre>");
                        echo "activeNav" . $i . " = " . $activeNav;
                        echo ("</pre>");
                    $activeP= "nav_active";
                        echo ("<pre>");
                        echo "activeP" . $i . " = " . $activeP;
                        echo ("</pre>");
                }else{
                    $i = $x + 1;
                    $activeNav = "_no_active";
                        echo ("<pre>");
                        echo "activeNav" . $i . " = " . $activeNav;
                        echo ("</pre>");
                    $activeP= "nav";
                        echo ("<pre>");
                        echo "activeP" . $i . " = " . $activeP;
                        echo ("</pre>");
                }
            }
        }else if($key >=6 && $key <= 8){
            for($x=0; $x < $length; $x++){             
                if($x == 4){
                    $i = 5;
                    $activeNav = "_active";
                        echo ("<pre>");
                        echo "activeNav" . $i . " = " . $activeNav;
                        echo ("</pre>");
                    $activeP= "nav_active";
                        echo ("<pre>");
                        echo "activeP" . $i . " = " . $activeP;
                        echo ("</pre>");
                }else{
                    $i = $x + 1;
                    $activeNav = "_no_active";
                        echo ("<pre>");
                        echo "activeNav" . $i . " = " . $activeNav;
                        echo ("</pre>");
                    $activeP= "nav";
                        echo ("<pre>");
                        echo "activeP" . $i . " = " . $activeP;
                        echo ("</pre>");
                }
            }
        }
    }else{
        $myTitle = ucfirst($pages[$key]);
        echo ("<pre>");
            echo "myTitle = " . $myTitle;
            echo ("</pre>");
        $file = $page;
            echo ("<pre>");
                echo "file = " . $file;
                echo ("</pre>");    
        $length = count($pages) - 4;
        for($x=0; $x < $length; $x++){
            $i = $x + 1;
            if($x == $key){
                $activeNav = "_active";
                    echo ("<pre>");
                    echo "activeNav" . $i . " = " . $activeNav;
                    echo ("</pre>");
                $activeP= "nav_active";
                    echo ("<pre>");
                    echo "activeP" . $i . " = " . $activeP;
                    echo ("</pre>");
            }else{
                $activeNav = "_no_active";
                    echo ("<pre>");
                    echo "activeNav" . $i . " = " . $activeNav;
                    echo ("</pre>");
                $activeP= "nav";
                    echo ("<pre>");
                    echo "activeP" . $i . " = " . $activeP;
                    echo ("</pre>");
            }
        }   
    }//end of if
}//end of foreach
?>