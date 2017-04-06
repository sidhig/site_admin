<header>
<? include('header.php'); ?>  
</header>
<div class="container-fluid">
	 <div class="register-form"> 
      
  
    
      <hr>
      <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           <button class="btn btn-default regbutton" onclick="unapproved();">Unapproved Site Induction Forms</button>
           
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           <button class="btn btn-default logbutton" onclick="resubmitted()">Resubmitted Site Inductions Forms</button>           
          </div>          
      </div>    
 
    <script>
      function unapproved()
      {
       
        window.location.href = "unapproved_forms.php";

      }
      function resubmitted()
      {
       
        window.location.href = "resubmitted_forms.php";

      }

    </script>
  </div>
</div>
 
<style>
  
  .register-form{
    font-size: 16px;
     left: 30vw;
    top: 50%;
    position: absolute;
    /*-webkit-transform: translate3d(-50%, -50%, 0);
    -moz-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);*/
    
}

.regbutton{    
    height: 50px;
  
    background-color:tomato;
    border-radius: 0px;
    font-size: 18px;
    color:white;
    border: none !important;
    margin-bottom: 5px;
}
.regbutton:hover{    
    color: white;
    background-color:#aa422f;
}
.regbutton:active{    
    color: white;
    background-color:#aa422f;
}
.logbutton{    
    height: 50px;

    background-color:yellowgreen;
    border-radius: 0px;
    font-size: 18px;
    color:white;
    border: none !important;
    margin-bottom: 5px;
}
.logbutton:hover{    
    color: white;
    background-color:darkolivegreen;
}
.logbutton:active{    
    color: white;
    background-color:darkolivegreen;
}


.register-form label{
    color: aliceblue;
    
}
.register-form input{
    margin-bottom: 5px;
    width: 430px;
    height: 40px;
    border-radius: 0px;
}

</style>