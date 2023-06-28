<?php include '../db_connect.php' ?>

<?php
    $course_id = $_GET['course'];
    $course_sql = "SELECT * FROM course WHERE course_id = $course_id";
    $course = mysqli_fetch_assoc(mysqli_query($connect,$course_sql));

    $course_section_sql = "SELECT * FROM course_section where course_id = $course_id";
    $course_section = mysqli_query($connect,$course_section_sql); 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Course</title>
    <link rel="stylesheet" type="text/css" href="../css/registerCourse.css">
    <link rel="stylesheet" type="text/css" href = "../css/courseBanner.css">
</head>

<body>
    <div class="banner">
        <div class="left-panel">
            <div class="image-container">
                <img src="
                    <?php
                        echo $course["course_image_path"];
                    ?>
                    " alt="Course img"
                />
            </div>

            <div class="left-right-panel">
                <h1>
                    <?php
                        echo $course["course_title"];
                    ?>
                </h1>
                <p>
                    <?php
                        echo $course["start_date"]." - ".$course["end_date"];
                    ?>
                </p>
            </div>
        </div>

        <div class="right-panel">
            <form action="enrollCourse.php" method="post" >
                <button type='submit' name = "Enroll" value="<?php echo $course_id?>">Enroll</button>
            </form>
        </div>
    </div>

    <div class='container'>
        <h2>Course Introduction</h2>
        <p>
            <?php
                echo $course["course_description"];
            ?>
        </p>
    </div>


    <div class= "instructor-list">
    <h2>Course Instructor</h2>
        <?php
            while($section = mysqli_fetch_assoc($course_section)){
        ?>
            <div class = "instructor">
                <img src="
                    <?php 
                    $instructor_image_sql = "SELECT * FROM user WHERE username='".$section['username']."'";
                    $instructor_image = mysqli_fetch_assoc(mysqli_query($connect,$instructor_image_sql));
                    echo $instructor_image['profile_image_path'];
                    ?>
                    " alt = "
                    <?php
                        $instructor_profile_sql = "SELECT first_name, last_name FROM instructor WHERE username = '". $section['username']."'";
                        $instructor_profile = mysqli_fetch_assoc(mysqli_query($connect,$instructor_profile_sql));
                        echo $instructor_profile["first_name"]." ".$instructor_profile["last_name"];
                    ?>
                    ">
                    <p>
                        <?php
                            echo $instructor_profile["first_name"]." ".$instructor_profile["last_name"];
                        ?>
                    </p>
            </div>
        <?php
            }
        ?>
    </div>
        
</body>

</html>