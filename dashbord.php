<?php
session_start();
include "header.php";
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
 <!-- ======= Services Section ======= -->
<section id="exam" class="hero d-flex">
    <div class="container" data-aos="fade-up">
    <header class="section-header">
    <h2</h2>
    <p></p>
  </header>
    
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
              <br>
          
                        <div class="" data-aos="fade-up" data-aos-delay="200">
                            <br>
                                <div class="col-lg-2 col-lg-push-10">
                                  <div id="current_que" style="float: left">0</div>
                                  <div style="float: left">/</div>
                                  <div id="total_que" style="float: left">0</div>
                                </div>
                                
                                <div class="row" style="margin-top: 30px">
                                <div class="row">
                                <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white" id="load_questions">
                                </div>
                                </div>
                                </div>

                                <div class="row" style="margin-top: 10px">
                                <div class="col-lg-6 col-lg-push-3" style="min-height: 50px">
                                <div class="col-lg-12 text center">
                        
                                <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp;
                                <input type="button" class="btn btn-success" value="Next" onclick="load_next();">
                                </div>
                                </div>
                                </div>
                        </div>
                
            </div>
          <div id="countdowntimer" style="margin: auto; color: hsla(180,95%,15%,1); font-family: 'Noto-serif',serif; font-size: 4em; overflow: hidden; width: auto;">
          
          </div>
  </div>

</div>

</section><!-- End Services Section -->

<!-----script>
var seconds =xmlhttp.responseText;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Time Over";
        window.location="results.php";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script---->

<script type="text/javascript">
setInterval(function(){
  timer();
},1000);
function timer()
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState== 4 && xmlhttp.status ==200){
       
        if(xmlhttp.responseText=="00:00:01")
        {
        window.location="result.php";
        
      
      }
      document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","forajax/load_timer.php",true);
    xmlhttp.send(null);
  }

  function load_total_que()
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
       
        document.getElementById("total_que").innerHTML=xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET","forajax/load_total_que.php",true);
    xmlhttp.send(null);
  }

  var questionno="1";
  load_questions(questionno);
  function load_questions(questionno)
  { 
    document.getElementById("current_que").innerHTML=questionno;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
       
        if(xmlhttp.responseText=="over")
        {
            window.location="result.php";
        }
        else{
                document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                load_total_que();
        }
      }
    };
    xmlhttp.open("GET","forajax/load_questions.php?questionno="+questionno,true);
    xmlhttp.send(null);
  }

  function radioclick(radiovalue,questionno)
  {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
       
      }
    };
    xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+ questionno +"&value1="+radiovalue,true);
    xmlhttp.send(null);
  }

  function load_previous(){
        if(questionno=="1")
        {
          load_questions(questionno);
        }
        else{
          questionno=eval(questionno)-1;
          load_questions(questionno);
        }
  }
  function load_next(){
    questionno=eval(questionno)+1;
    load_questions(questionno);
  }
</script>


<?php
include "footer.php";
?>