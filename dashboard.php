<?php
  
//updates page title in header.html, useful for more than one page site.
  $page_title = 'Welcome to Lucky Lex!'; 


//includes nav bar.
include ('HTML_includes/header.html');


//starts session
ob_start();


?>
<!-- Header -->
<a id="home"></a>
    
      <!-- heading -->
      <section class="jumbotron heading">
        
        <h1 class="text-center intro1 heading">Lucky Lex</h1>
          <hr class="small"/>
          <div class="text-center" id="userLogin">A small, fun project created by Gareth Greenaway.</div>
        </section>
      
      <br />
        
        <!-- About -->
        <a id="about"></a><section class="about" id="about">
      
      <h1 class="text-right aboutTitle">About Lucky Lex</h1>
      
      <p class="text-left lead aboutLead"><strong>Lucky Lex</strong> is a great time killer. It was created by final year Interacitve Multimedia Design student, Gareth Greenaway for his major project. The game focuses around the player character, Lucky Lex, who is on a hunt to find as much treasure as he can!
      <br />Join them on their adventure to find and take as much loot as your pockets will hold, but be wary of enemies and the dangers of the world you find yourself in.</p>
      
      <br />
      
      <!-- Image Carousel -->
      <div id="LLCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#LLCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#LLCarousel" data-slide-to="1"></li>
      <li data-target="#LLCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/screenshot2.png" alt="lucky Lex" width="1130" max-height="300">
      </div>

      <div class="item">
       <img src="img/screenshot1.png" alt="gameplay" width="1130" max-height="300">
      </div>
    
      <div class="item">
       <img src="img/screenshot3.png" alt="gameplay" width="1130" max-height="300">
      </div>

    </div>

   
        
        </div>
      <br />
      </section>
        
        
        <!-- Scores -->
      <a id="score"></a>
        
          <section class="highScores text-center" id="score">
        
        <h1 class="scoresTitle text-right">High-Scores</h1>
        
            <p class="highScoresLead lead text-center">The following scores are from the first level of the game only, due to development purposes.</p>
            
            <br />
            
            <!-- High score table goes here -->
            
            <?php include ('highscoreTable.php'); ?>
            <br />
        
        </section>
      
      <br />
        
        
        <!-- Download -->
        <a id="download"></a><section class="download text-center">
          
          <h1 class="downloadTitle text-right">Download</h1>
        
            <p class="downloadLead lead text-center">Download free for iPhone, Android and your computer!
              <br /> Please let me know what you think, by emailing me at: <a href="mailto:ggreenaway053@hotmail.com?Subject=Lucky Lex!" target="_top">ggreenaway053@hotmail.com</a></p>
            
            <a href="proto.zip" download="proto.zip" class="btn btn-info btn-lg hvr-grow">Download Free!</a>
      
          <br /><br />
  
        </section>
  <br />
  
          <!-- Play -->
  
  <a id="play"></a><section class="play">
  
  <h1 class="playTitle text-right">Play</h1>
        
            <p class="playLead lead text-center">If you don't want to download the game, feel free to play it, down below! <br />
              <small>Please note, high scores cannot be submitted through this.</small></p>

            <!-- web version of game goes here. -->
            <p>PLAY GAME HERE</p><br />
  
  </section>
      
      
     
      
    </div>
    <!-- /.container -->
<br />
  

<!-- to top button section -->
  <a href="#" class="toTop">
  <i class="fa fa-arrow-up fa-2x"></i>
  </a>

<!-- END OF HTML CONTENT -->

<?php 
     
     include ('HTML_includes/footer.html');
ob_end_flush();
     ?>