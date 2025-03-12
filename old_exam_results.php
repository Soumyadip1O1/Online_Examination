<?php
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION["username"]))
{
  ?>
  <script type="text/javascript">
  window.location="login.php";
  </script>
  <?php
}
?>
<main id="main">
<section id="" class="hero d-flex align-items-top">
    <div class="container" data-aos="fade-up">
    <header class="section-header">
      <p style="font-family: verdana;"><h1>Old Exam Results</p>
    </header>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
      
        <div class="col-lg-12 d-flex justify-content-center">
            
               <?php
               $count=0;
               $res=mysqli_query($link,"select * from exam_results where username='$_SESSION[username]' order by id desc");
               $count=mysqli_num_rows($res);

               if($count==0)
               {
                   ?>
                    <center><h1>No Results Found</h1></center>
                   <?php
               }
               else{
                   echo "<table class='table table-bordered' style='color: DarkBlue;'>";
                    echo "<tr>";
                    echo "<th>"; echo "Username"; echo "</th>";
                    echo "<th>"; echo "Exam type"; echo "</th>";
                    echo "<th>"; echo "Total question"; echo "</th>";
                    echo "<th>"; echo "Correct answer"; echo "</th>";
                    echo "<th>"; echo "Wrong answer"; echo "</th>";
                    echo "<th>"; echo "Exam time"; echo "</th>";
                    echo "</tr>";

                    while($row=mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        echo "<td>"; echo $row["username"]; echo "</td>";
                        echo "<td>"; echo $row["exam_type"]; echo "</td>";
                        echo "<td>"; echo $row["total_question"]; echo "</td>";
                        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                        echo "<td>"; echo $row["exam_time"]; echo "</td>";
                        echo "</tr>";
     
                    }
                   echo "</table>";
               }
               ?> 

        </div>
      </div>
    </div>

 </section><!-- End Hero -->

<?php
include "footer.php";
?>