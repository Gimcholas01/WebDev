<?php 
  
  include '../phpFunction/function.php';
  
  function viewFeedback() {
    global $connect;
    $sql= "SELECT * FROM course_feedback JOIN course on course_feedback.course_id = course.course_id WHERE course.provider_username ='". $_SESSION['username'] ."';";
    $result = mysqli_query($connect,$sql);
    ?>
    <div class="course-feedback">
    <table>
      <legend>Course Feedback</legend>
      <tr>
        <th>Username</th>
        <th>Feedback</th>
        <th>Course</th>
        <th>Rating</th>
        <th>Date</th>
      </tr>
      <?php 
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["feedback"]."</td>";
        echo "<td>".$row["course_title"]."</td>";
        echo "<td>".$row["rating"];
        for($i=0; $i<$row["rating"]; $i++)
            echo "<img src='../files/yellow-star.png' alt='star' width='15'>";
        for($i=0; $i<(5-$row["rating"]); $i++)
            echo "<img src='../files/blank-star.png' alt='star' width='15'>";
        echo "</td>";
        echo "<td>".date("j/n/Y",strtotime($row["date"]))."</td>";
        echo "</tr>";
      } ?>
    </table>
    </div>

    <?php
    $sql= "SELECT * FROM instructor_feedback JOIN instructor on instructor_feedback.instructor_username = instructor.username WHERE instructor.provider_username ='". $_SESSION['username'] ."';";
    $result = mysqli_query($connect,$sql);
    ?>
    <div class="instructor-feedback">
    <table>
      <legend>Instructor Feedback</legend>
      <tr>
        <th>Username</th>
        <th>Feedback</th>
        <th>Instructor</th>
        <th>Rating</th>
        <th>Date</th>
      </tr>
      <?php 
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["feedback"]."</td>";
        echo "<td>".$row["instructor_username"]."</td>";
        echo "<td>".$row["rating"];
        for($i=0; $i<$row["rating"]; $i++)
            echo "<img src='../files/yellow-star.png' alt='star' width='15'>";
        for($i=0; $i<(5-$row["rating"]); $i++)
            echo "<img src='../files/blank-star.png' alt='star' width='15'>";
        echo "</td>";
        echo "<td>".date("j/n/Y",strtotime($row["date"]))."</td>";
        echo "</tr>";
      }
      ?>
    </table>
    </div>
    <?php
  }

  generatePage("Feedback",'viewFeedback','<link rel="stylesheet" type="text/css" href="../css/yourcss.css">','<script src ="../js/yourjs.js"></script>');
?>