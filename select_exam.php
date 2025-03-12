<?php
session_start();
if(!isset($_SESSION["username"]))
{
  ?>
  <script type="text/javascript">
  window.location="login.php";
  </script>
  <?php
}
?>
<?php
include "connection.php";
include "header.php";
?>

<main id="main">
    <section id="" class="hero d-flex align-items-center">
       
    <div class="container" data-aos="fade-up">  
    <header class="section-header">
    <h2>Select Exam</h2>
    <p>Select exam to start exam</p>
    </header>
        <div class="row" > 
          <div class="col-lg-12 d-flex flex-column justify-content-top" data-aos="fade-up" data-aos-delay="200" style="margin:450px; min-height: 500px; width: 500px">
              <table class="table" style="padding: auto;">
                            <thead class="thead-dark">
                                <tr>
                                    
                                    <th scope="col">Exam Name</th>
                                    <th scope="col">Exam Time</th>
                                </tr>
                            </thead>
                      <tbody>            
                <?php
                   
                    $res=mysqli_query($link,"select * from exam_category")or die(mysqli_error($link));
                    while ($row=mysqli_fetch_array($res))
                    {
                     
                      ?>
                                    <tr>
                                         
                                          <td><input type="button" class="btn btn-primary from-control" 
                                          value="<?php echo $row["category"];?>" 
                                          onclick="set_exam_type_session(this.value);"></td>
                                          <td><?php echo $row["exam_time_in_minutes"]; ?></td>                                
                                    </tr>
                      <?php
                    }
                ?>
          </div>
          <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/hero-img.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End Hero -->


<?php
include "footer.php";
?>

<script type="text/javascript">
  function set_exam_type_session(exam_category)
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
       
        window.location="dashbord.php";
      }
    };
    xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
    xmlhttp.send(null);
  }
</script>