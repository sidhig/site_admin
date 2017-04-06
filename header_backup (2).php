<?php
error_reporting(0);
session_start();
print_r($_SESSION);
include_once('connect.php');

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}

$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();
?>

<!DOCTYPE html>
<html>
<header>
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>

  <script src="js/jquery.min.1.12.0.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <!--    <script type="text/javascript" src="js/upload.js" ></script> -->
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" />

</header>
<body>
<title> Landing Page </title>
<!-- <div class="logo"><img src="image/logo.png" style=" overflow: hidden; height: 50px; width: 50px;
    padding: 0;
    position: fixed;" /></div> -->
   

   <div>
      <div class ="Name" style="width: 100% ; float: left; background-color: #333; color:#A9A9A9;object-position: 2; "> 
     <div  style="width: 100% ; float: left; background-color: #333; color:#A9A9A9;object-position: 2;margin-top:20px;position: relative; top:2px"> 
         <a href="header.php" style="text-decoration: none; color: #A9A9A9;"> Home Page - <? echo $project_name_query->name ?> </a> <!-- - <select style="background-color: grey; color: white">
         <option >Newcold-Truganina</option>
          <option>Other Project 1</option>
           <option>Other Project 2</option>


         </select> 
     -->
    
      
<div class="logout" style="float: right;   background-color: #333; color: white ;margin-left: 50px;"> <a href="logout.php" data-hover="Logout"> Logout 
</a>  </div>
 </div>
      </div> 
      
      
   </div>
<div class="nav_wrap" style="margin-top:-10px; background-color:#333">
<nav id="primary_nav_wrap" >
<div class="nav_container" style="">
  <div id="mbmcpebul_wrapper">
  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient38" style="width: 99px;"><div class="arrow"><a class="button_1" style="color:#A9A9A9">Safety</a></div></div>
    <ul class="gradient_menu gradient108">
    <li class="first_item"><a target="_blank" class="with_arrow" title="">Site Safety Management Plans</a>
      <ul class="gradient_menu gradient252">
      <li class="first_item"><a class="with_arrow" title="">Site Safety Management Plan</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="site_induction_form.php">Blank Safety Management Plan</a></li>
        <li><a title="" href="approved_forms.php">Approved Safety Management Plan</a></li>
        <li><a title="" href="resubmitted_forms.php">Safety Management Plan Register</a></li>
        </ul></li>

      </li>
      <li class="sub-sub_menu"><a title="">Preliminary Risk Assessment</a></li>
     <!--  <li class="last_item"><a class="with_arrow" title="">Site Induction Form</a>
        <ul class="gradient_menu gradient72">
        <li class="first_item"><a title="" href="unapproved_forms.php">Unapproved Forms</a></li>
        <li class="last_item"><a title="" href="approved_forms.php">Approved Forms</a></li>
        <li class="last_item"><a title="" href="resubmitted_forms.php">Resubmitted Forms</a></li>
        <li class="last_item"><a title="" href="site_induction_form.php">New Site Induction Form</a></li>
        </ul></li> -->
      <li class="sub-sub_menu"><a title="">Emergency Risk Assessment</a></li>
      <li class="sub-sub_menu"><a title="">Traffic Management Risk Assessment</a></li>
      <li><a title="">Project Establishment Checklist</a></li>
    <!--   <li class="last_item"><a class="with_arrow" title="">Site Induction Register</a>
        <ul class="gradient_menu gradient72">
        <li class="first_item"><a title="" href="category.php">Site Admin</a></li>
        <li class="last_item"><a title="">Induction Register</a></li>

        </ul></li> -->
         <li><a title="" href="email_settings.php">Project First Aid Risk Assessment</a></li>
      </ul></li>

    <li><a class="with_arrow" title="">Unapproved Forms</a>
      <ul class="gradient_menu gradient288">
      <li class="first_item"><a title="" href="approved_vs_resubmitted_form.php">Unapproved & Resubmitted Site Inductions Forms</a></li>
      <!-- <li><a title="">Permit To Excavate</a></li>
      <li><a title="">Permit To Hotwork</a></li>
      <li><a title="">Permit To Enter Confined Space</a></li>
      <li><a title="">Permit To Enter Cold Room/Freezer</a></li>
      <li><a title="">Permit To Isolate Services</a></li>
      <li><a title="">Permit To Penetrate Surface</a></li> -->
       <!-- <li><a title="" href="resubmitted_forms.php">Resubmitted Site Induction Form</a></li>  -->
      <li class="last_item"><a title="">Unapproved & Resubmitted Permits to Work </a></li>
      </ul></li>
    <li class="last_item"><a class="with_arrow" title="">Site Inductions</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Site Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="site_induction_form_new.php">Blank Site Induction Form</a></li>
        <li><a title="" href="approved_forms.php">Approved Site Induction Form</a></li>
        <li><a title="" href="site_induction_email_request.php">Site Induction Email Request</a></li>
        <li class="last_item"><a title="">Site Induction Video</a></li>
        </ul></li>
      <li><a class="with_arrow" title="">Ceiling Induction</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Blank Ceiling Induction Form</a></li>
        <li><a title="">Approved Ceiling Induction Form</a></li>
        <!-- <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li> -->
        <li><a title="">Ceiling Induction Video</a></li>
   
        </ul></li>
      <li class="first_item"><a class="with_arrow" title="">Visitor Induction</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="visitor_induction_blank.php">Blank Visitor Induction Form</a></li>
        <li><a title="" href="visitor_induction.php">Approved Visitor Induction Form</a></li>
        <li><a title="" href="visitor_induction_out.php">Sign Out Visitor Induction Form</a></li>
        <li class="last_item"><a title="">Visitor Induction Video</a></li>
        </ul></li>
      </ul></li>
      <li class="last_item"><a class="with_arrow" title="">Site Induction Registers</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a title="" href="category.php">Access Authority</a></li>

      <li><a title="" href="employer.php">Employer / Business Register</a></li>
      <li><a title="" href="employee.php">Site Induction Register</a></li>
      <li><a title="" href="site_location.php">Site Locations</a></li>
      <li class="last_item"><a class="with_arrow" title="">Email Settings</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title=""  href="email_settings.php">Email Setting</a></li>
        <li class="last_item"><a title="">Email Message</a></li>
        </ul></li>
      </li>
      </ul></li>
     <!--  <li class="last_item"><a class="with_arrow" title="">Site Daily Diary</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Site Daily Diary</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Site Daily Diary</a></li>
        <li><a title="">Approved Daily Site Diary</a></li>
        <li class="last_item"><a title="">Site Daily Diary Register</a></li>
        </ul></li>
      <li><a class="with_arrow" title="">Permit To Work Register</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Permit to work Authorisation Register</a></li>
        <li><a title="">Permit To Excavate Register</a></li>
        <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li>
        <li><a title="">Permit To Energise Service Register</a></li>
   
        </ul></li>
      <!-- <li class="last_item"><a title="">Other Register (Still to come)</a></li> -->
      <!-- </ul></li> --> -->
      <li class="last_item"><a class="with_arrow" title="">Site Attendance</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Site Attendance</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="" href="site_attendance_blank.php">Blank Site Attendance Form</a></li>
        <li><a title="" href="site_attendance_approved.php">Approved Site Attendance Form</a></li>
        <li class="last_item"><a title="" href="site_attendance_week.php">Site Attendance Register</a></li>
        </ul></li>
<!--       <li><a class="with_arrow" title="">Permit To Work Register</a>
        <ul class="gradient_menu gradient252">
        <li class="first_item"><a title="">Permit to work Authorisation Register</a></li>
        <li><a title="">Permit To Excavate Register</a></li>
        <li><a title="">Permit To Hotwork Register</a></li>
        <li><a title="">Permit To Enter Confined Space Register</a></li>
        <li><a title="">Permit To Enter Cold Room / Freezer Register</a></li>
        <li><a title="">Permit To penetrate Surface Register</a></li>
        <li><a title="">Permit To Access Ceiling Register</a></li>
        <li><a title="">Permit To Isolate  Services Register</a></li>
        <li><a title="">Permit To Energise Electrical Register</a></li>
        <li><a title="">Permit To Energise Service Register</a></li>
   
        </ul></li>
      <li class="last_item"><a title="">Other Register (Still to come)</a></li> -->
      </ul></li>
       <li class="last_item"><a class="with_arrow" title="">Safety Meetings</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Safety Committee meeting</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a class="with_arrow" title="">OH&S Committee Constitution</a>
         <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank OH&S Committee Constitution </a></li>
        <li class="first_item"><a title="">Approved OH&S Committee Constitution </a></li>
        <li class="first_item"><a title="">OH&S Committee Constitution Register </a></li>
          </ul>
        </li>
        <li class="first_item"><a class="with_arrow" title="">OH&S Safety Committee</a>
         <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank OH&S Safety Committee Minutes & Site OH&S Inspection Form</a></li>
        <li class="first_item"><a title="">Approved OH&S Safety Committee Minutes & Site OH&S Inspection Form</a></li>
        <li class="first_item"><a title="">OH&S Safety Committee Minutes Register</a></li>
          </ul>
        </li>
       
        
        </ul>
        </li>
  
      
      </ul></li>
      <li class="last_item"><a class="with_arrow" title="">Permit to Work</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Permit to Work Authorisation</a>
        <ul class="gradient_menu gradient108">
        <li><a class="first_item" title="" >Blank Permit to Work Authorisation</a></li>
        <li><a title="">Approved Permit to Work Authorisation</a></li>
        <li class="last_item"><a title="">Permit to Work Authorisation Register</a></li>
        </ul></li>
         <li class="first_item"><a class="with_arrow" title="">Permit to Excavate</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item" ><a title="">Blank Permit to Excavate</a></li>
        <li><a title="">Approved Permit to Excavate</a></li>
        <li class="last_item"><a title="">Permit to Excavate Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Hot Work</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Hot Work</a></li>
        <li><a title="">Approved Permit to Hot Work</a></li>
        <li class="last_item"><a title="">Permit to Hot Work Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Enter Confined Space</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Enter Confined Space</a></li>
        <li><a title="">Approved Permit to Enter Confined Space</a></li>
        <li class="last_item"><a title="">Permit to Enter Confined Space Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Enter Cold Room / Freezer</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Enter Cold Room / Freezer</a></li>
        <li><a title="">Approved Permit to Enter Cold Room / Freezer</a></li>
        <li class="last_item"><a title="">Permit to Enter Cold Room / Freezer</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Penetrate Surface</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Penetrate Surface</a></li>
        <li><a title="">Approved Permit to Penetrate Surface</a></li>
        <li class="last_item"><a title="">Permit to Penetrate Surface Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Access Ceiling</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Access Ceiling</a></li>
        <li><a title="">Approved Permit to Access Ceiling</a></li>
        <li class="last_item"><a title="">Permit to Access Ceiling Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Permit to Isolate Services</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Access Ceiling</a></li>
        <li><a title="">Approved Permit to Access Ceiling</a></li>
        <li class="last_item"><a title="">Permit to Access Ceiling Register</a></li>
        </ul></li>
          <li class="first_item"><a class="with_arrow" title="">Permit to Energise Electrical</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Energise Electrical</a></li>
        <li><a title="">Approved Permit to Energise Electrical</a></li>
        <li class="last_item"><a title="">Permit to Energise Electrical Register</a></li>
        </ul></li>
          <li class="first_item"><a class="with_arrow" title="">Permit to Energise Services</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Permit to Energise Services</a></li>
        <li><a title="">Approved Permit to Energise Services</a></li>
        <li class="last_item"><a title="">Permit to Energise Services Register</a></li>
        </ul></li>
      </ul></li>
      <li class="last_item"><a class="with_arrow" title="">Safety Checklist</a>
      <ul class="gradient_menu gradient108">
      <li class="first_item"><a class="with_arrow" title="">Evacuation Test Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Evacuation Test Checklist </a></li>
        <li><a title="">Approved Evacuation Test Checklist</a></li>
        <li class="last_item"><a title="">Evacuation Test Register</a></li>
        </ul></li>

      <li class="first_item"><a class="with_arrow" title="">Nurse Call Inspection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Nurse Call Inspection Checklist</a></li>
        <li><a title="">Approved  Nurse Call Inspection Checklist </a></li>
        <li class="last_item"><a title="">Nurse Call Inspection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Air Conditioning Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Air Conditioning Checklist</a></li>
        <li><a title="">Approved Air Conditioning Checklist </a></li>
        <li class="last_item"><a title="">Air Conditioning Checklist Register </a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Fire Protection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Fire Protection Checklist</a></li>
        <li><a title="">Approved Fire Protection Checklist</a></li>
        <li class="last_item"><a title="">Fire Protection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Spill Kit General Purpose Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Spill Kit General Purpose Checklist</a></li>
        <li><a title="">Approved Spill Kit General Purpose Checklist</a></li>
        <li class="last_item"><a title="">Spill Kit General Purpose Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Site Security Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Site Security Checklist</a></li>
        <li><a title="">Approved Site Security Checklist</a></li>
        <li class="last_item"><a title="">Site Security Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">First Aid Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank First Aid Checklist</a></li>
        <li><a title="">Approved First Aid Checklist</a></li>
        <li class="last_item"><a title="">First Aid Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Scaffold Inspection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Scaffold Inspection Checklist</a></li>
        <li><a title="">Approved Scaffold Inspection Checklist</a></li>
        <li class="last_item"><a title="">Scaffold Inspection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Hoist Inspection Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Hoist Inspection Checklist</a></li>
        <li><a title="">Approved Hoist Inspection Checklist</a></li>
        <li class="last_item"><a title="">Hoist Inspection Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Roof Access Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Roof Access Checklist</a></li>
        <li><a title="">Approved Roof Access Checklist</a></li>
        <li class="last_item"><a title="">Roof Access Checklist Register</a></li>
        </ul></li>
         <li class="first_item"><a class="with_arrow" title="">Noise Hazard Identification Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Noise Hazard Identification Checklist</a></li>
        <li><a title="">Approved Noise Hazard Identification Checklist</a></li>
        <li class="last_item"><a title="">Noise Hazard Identification Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Roof Sign Off Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Roof Sign Off Checklist</a></li>
        <li><a title="">Roof Sign Off Checklist Register</a></li>
        <li class="last_item"><a title="">Roof Sign Off Checklist Register</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Structural Steel Erection Signoff Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Approved Structural Steel Erection Signoff Checklist</a></li>
        <li><a title="">Structural Steel Erection Signoff Checklist register</a></li>
        <li class="last_item"><a title="">Structural Steel Erection Signoff Checklist</a></li>
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Crane Lift Plan Checklist</a>
        <ul class="gradient_menu gradient108">
        <li class="first_item"><a title="">Blank Crane Lift Plan Checklist</a></li>
        <li><a title="">Approved Crane Lift Plan Checklist</a></li>
        <li><a title="">Crane Lift Plan Checklist Register</a></li>
        
        </ul></li>
        <li class="first_item"><a class="with_arrow" title="">Precast Panel Erection Sign off Checklist</a>
        <ul class="gradient_menu gradient108">
        <li><a title="">Blank Precast Panel Erection Sign off Checklist</a></li>
        <li class="last_item"><a title="">Approved Precast Panel Erection Sign off Checklist</a></li>
        <li class="last_item"><a title="">Precast Panel Erection Sign off Checklist Register</a></li>
        </ul></li>
      </ul></li>
    </ul></li>


  <li><div class="buttonbg gradient_button gradient38" id="buttonbg" style="width: 109px;"><a style="color:#A9A9A9">Quality</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 115px;"><a style="color:#A9A9A9">Environment</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 100px;"><a style="color:#A9A9A9">Design</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 200px;"><a style="color:#A9A9A9">Future Sub-headings</a></div></li>
  <li><div class="buttonbg gradient_button gradient38" style="width: 200px;"><a style="color:#A9A9A9">Future Sub-headings</a></div></li>
   <li><div  style="width: 200px;"></div></li>



  </ul>
  </ul>
  </ul>
</div>
  
</div>
</nav>





 <form class="navbar-form" role="search" style="background-color:#333;">
         <div class="input-group" id= "search_site" style="margin-top: -5vh">
            <input type="text" class="form-control" placeholder="Search" name="q" style="margin-left: 20vw;">
            <div class="input-group-btn">
                <button class="btn btn-default" id="submit_search_site" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
</form>

</div>



  <? include('footer.php') ?>

</body>

<style>
  
  body {
    background-color: white;
    height: 0vh;
    margin: 0px;
    overflow-x: hidden;

}


html *
{
  
   font-family: Arial;
   /*zoom: 0%;*/
}



.nav_container
{
     
    margin-top: 1vh;
    margin-left: 3.5vw;
    float: left;
    margin-bottom: 1vh;
    font-size: 1.4vw;
   }

.nav_wrap
{
  
  
  
  float: left;
  width: 100%;
  height: 11vh;
  background-color: #333;
  margin-top: -2px;


}

.logout a
{
     display: block;
    text-decoration: none;
    font-size: 13px;
    line-height: 32px;
    padding: 4px 25px;
    color: white;
    text-shadow:1px 1px 1px rgba(128,125,122,1);
    font-weight:bold;color:white;
    letter-spacing:1pt;
    word-spacing:-10pt;
    text-align:left;
    font-family:Arial;
  
}

.logout a:hover
{
-webkit-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
transition: 0.3s ease;

}

.effect_item:hover
{
box-shadow: 0 0 0 2px white;
transition: 0.4s ease;
}



.welcome
{   
  text-shadow:1px 1px 1px rgba(222,222,222,1);font-weight:normal;color:#255915;background-color:#EBFCA4;letter-spacing:2pt;word-spacing:6pt;font-size:15px;text-align:center;font-family:impact, sans-serif;line-height:1;
}

.logo
{
border: 1px solid black;
float: left;
height: 100%;
right: 0;
top: 0;
}

.sub-sub_menu
{
  background-color: white;
}

.Name
{
 padding-top: 1vw;
padding-left: 3.5vw;


  
  text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#F5F5F5;letter-spacing:1pt;word-spacing:2pt;font-size:27px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;
}

#search_site
{
/*  left: 3%;*/
  margin-top: 28px;
  float: right;
}
#submit_search_site
{
    margin-left: 20px;
    height: 34px;
    float: right;
  }
  

</style>
</html>