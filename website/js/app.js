$(document).ready(function () {   

  
  

          $("#indexBtn").click(function(){

            //adds active class when button is clicked
            $("#indexBtn").addClass("active");
            
            //removes active class when button is clicked
            $("#aboutBtn").removeClass("active");
            $("#scoreBtn").removeClass("active");
            $("#dwnloadBtn").removeClass("active");
            $("#playBtn").removeClass("active");

                                            });


          $("#aboutBtn").click(function(){

           
            // addes active class when button is clicked
            $("#aboutBtn").addClass("active");
            
            //removes active class when button is clicked
            $("#indexBtn").removeClass("active");
            $("#scoreBtn").removeClass("active");
            $("#dwnloadBtn").removeClass("active");
            $("#playBtn").removeClass("active");

                                        });



          $("#scoreBtn").click(function(){

            // adds active class when button is clicked
            $("#scoreBtn").addClass("active");
            
            //removes active class when button is clicked
            $("#indexBtn").removeClass("active");
            $("#aboutBtn").removeClass("active");
            $("dwnloadBtn").removeClass("active");
            $("#playBtn").removeClass("active");

                                          });
  
  

          $("#dwnloadBtn").click(function(){

           
            // adds active class when button is clicked
            $("#dwnloadBtn").addClass("active");
            
            //removes active class when button is clicked
            $("#indexBtn").removeClass("active");
            $("#scoreBtn").removeClass("active");
            $("#aboutBtn").removeClass("active");
            $("#playBtn").removeClass("active");

                                            });
  
  
  
          $("#playBtn").click(function(){

            
            // adds active class when button is clicked
            $("#playBtn").addClass("active");
            
            //removes active class when button is clicked
            $("#indexBtn").removeClass("active");
            $("#scoreBtn").removeClass("active");
            $("#aboutBtn").removeClass("active");
            $("#dwnloadBtn").removeClass("active");

                                        });
  
  
  
  
  
  
  // Checks window is at the top, if statement carries through if not
	$(window).scroll(function(){
      
		if ($(this).scrollTop() > 100)
        
            {
			$(".toTop").fadeIn();
		    } 
      
        else {
			$(".toTop").fadeOut();
		    }
	                           });
	
  
	//Click function to animate to top of page
	$(".toTop").click(function(){
      
      $("html, body").animate(
        {
          scrollTop  : 0
        } ,800);
      
        return false;
	                           });
  
  
  
});