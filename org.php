<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="sr-SP">

<head>
<title>Novosadski Volonterski Servis </title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="description" content=" Novosadski volonterski Servis" />
<meta name="keywords" content="nvs, volontiranje, organizacije"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link rel="stylesheet" title="" type="text/css" href="styles/dropmenu.css" media="all" />  
<link rel="stylesheet" title="" type="text/css" href="styles/header.css" media="all" /> 
<link rel="stylesheet" title="" type="text/css" href="styles/footer.css" media="all" />

<link href="styles/bootstrap.min.css" rel="stylesheet">
<link href="styles/style.css" rel="stylesheet">

<link rel="stylesheet" title="" type="text/css" href="styles/footer.css" media="all" />
    
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</head>


<body>


<?php include("nav.php");?>


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

    <div class="col-md-9" ><!-- col-md-9 Starts --->


        <div class="row" id="Products" ><!-- row Starts -->

            <?php getOrgs(); ?>

        </div><!-- row Ends -->

        <center><!-- center Starts -->

            <ul class="pagination" ><!-- pagination Starts -->


                <?php getPaginatorOrgs(); ?>

            </ul><!-- pagination Ends -->

        </center><!-- center Ends -->


    </div><!-- col-md-9 Ends --->

    <div class="col-md-3"><!-- col-md-3 Starts -->

        <?php include("includes/sidebar-org.php"); ?>

    </div><!-- col-md-3 Ends -->

    <div id="wait" style="position:absolute;top:40%;left:45%;padding:100px;padding-top:200px;"><!--- wait Starts -->

    </div><!--- wait Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>


<script>

$(document).ready(function(){

    /// Hide And Show Code Starts ///

    $('.nav-toggle').click(function(){

        $(".panel-collapse,.collapse-data").slideToggle(700,function(){

            if($(this).css('display')=='none'){

                $(".hide-show").html('Prikaži');

            }
            else{

                $(".hide-show").html('Sakrij');

            }

        });

    });

    /// Hide And Show Code Ends ///

    /// Search Filters code Starts /// 

    $(function(){

        $.fn.extend({

            filterTable: function(){

                return this.each(function(){

                    $(this).on('keyup', function(){

                        var $this = $(this), 

                        search = $this.val().toLowerCase(), 

                        target = $this.attr('data-filters'), 

                        handle = $(target), 

                        rows = handle.find('li a');

                        if(search == '') {

                            rows.show(); 

                        } else {

                            rows.each(function(){

                                var $this = $(this);

                                $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                            });

                        }

                    });

                });

            }

        });

        $('[data-action="filter"][id="dev-table-filter"]').filterTable();

    });

    /// Search Filters code Ends /// 

});

 

</script>


<script>


$(document).ready(function(){
 
  // getProducts Function Code Starts 

  function getProducts(){
      
      var sPath = '';
   
    // Products Categories Code Starts 

    var aInputs = Array();

    var aInputs = $('li').find('.get_m_org');

    var aKeys = Array();

    var aValues = Array();

    iKey = 0;

    $.each(aInputs,function(key,oInput){

        if(oInput.checked){

            aKeys[iKey] =  oInput.value

        };

        iKey++;

    });

    if(aKeys.length>0){

        for(var i = 0; i < aKeys.length; i++){

            sPath = sPath + 'm_org[]=' + aKeys[i]+'&';

        }

    }

    // Products Categories Code ENDS 

       

       // Loader Code Starts 

    $('#wait').html('<img src="images/load.gif">'); 

    // Loader Code ENDS

    // ajax Code Starts 

    $.ajax({

        url:"load-org.php", 

        method:"POST",

        data: sPath+'sAction=getOrgs', 

        success:function(data){

         $('#Products').html('');  

         $('#Products').html(data);

         $("#wait").empty(); 

        }  

    });  

        $.ajax({
    url:"load-org.php",  
    method:"POST",  
    data: sPath+'sAction=getPaginatorOrgs',  
    success:function(data){
        $('.pagination').html('');  
        $('.pagination').html(data);
        }  

    });

    // ajax Code Ends 

       }

       // getProducts Function Code Ends    

  
      $('.get_m_org').click(function(){ 

    getProducts();

    }); 

    

 
 }); 

</script>

</body>

</html>