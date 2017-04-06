<?
session_start();
error_reporting(0);
include_once('connect.php');


if (isset($_POST['submit_login'])) {
{
// Define $username and $password
$username=$_POST['project_name'];

// Selecting Database

// SQL query to fetch information of registerd users and finds user match.
$query = $conn->query("select * FROM tbl_project where project_name= '".$username."'");
$pin_entered =$_POST['pin_enter'];
$pin_db_get= $_POST['pin_db'];
$rows = $query->num_rows;
if ($rows == 1 && ($pin_entered == $pin_db_get)) {
$_SESSION['login_user_induction']=$username; // Initializing Session
header("location:site_induction_form_new.php"); // Redirecting To Other Page
} else {
$error = "Invalid Login Credentials";
}
}
}
 $get_query_induction_id=$conn->query("select * 
FROM tbl_induction_register
LEFT JOIN tbl_employee ON tbl_induction_register.id = tbl_employee.id
WHERE inducted_by IS NOT NULL AND inducted_by != '' order by tbl_induction_register.id desc");
?>
<header>
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>

  <script src="js/jquery.min.1.12.0.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/upload.js" ></script>
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" /> 
</header>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title" style="text-align: center;">Sign in to continue</h1>
            <div class="account-wall">
                <img class="profile-img" src="image/faculty.png"
                    alt="">
                <form class="form-signin" method="POST">
                <label>Project Name</label>
                <input type="text" class="form-control" name="project_name" placeholder="Project Name" required autofocus>
                <br>
               

             <label>Induction Number</label>
                <select class="form-control"  onchange="select_induction()" id="induction">
                <option value=" " >Please Select Induction Number</option>
                <? while($row= $get_query_induction_id->fetch_object()) { ?>
                  <option value="<? echo $row->id?>"> <? $value= str_pad($row->id, 4, '0', STR_PAD_LEFT); echo $value; ?></option>
                   <? } ?>
                </select>
                 <script>
     function select_induction() {
                   
                    
                   var e = document.getElementById("induction");
                   var strUser2 = e.options[e.selectedIndex].value;
                  // alert(strUser2);
                  $.ajax({
                      type: "POST",
                      url: "ajax_site_induction_login_pin.php",
            
                      data: {
                          value_ajax: strUser2
                      },

                      success: function(data) {
                         var val_b = data.split(",");
                        // document.write(data);
                       // alert (data);
                        var pin_db= val_b[6];
                        $('#pin_db').val(pin_db);

                      

                        
                     }     
                  });


                 }
            </script>
                <br>
                <label>Pin</label>
                <input type="password" class="form-control" name="pin_enter" placeholder="Pin"  required >
                <input type="text" name="pin_db" id="pin_db" hidden>
               
                <input type="submit" name="submit_login" value="Sign in" class="btn_login" >
                <br><br>
                    <span style="color: red; font-weight: bold;"><?php echo $error; ?></span>
                
                
                </form>
            </div>
            
        </div>
    </div>
</div>

<style>
    .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;

}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: 10px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
.btn_login {
  background: #2687cc;
  background-image: -webkit-linear-gradient(top, #2687cc, #003b57);
  background-image: -moz-linear-gradient(top, #2687cc, #003b57);
  background-image: -ms-linear-gradient(top, #2687cc, #003b57);
  background-image: -o-linear-gradient(top, #2687cc, #003b57);
  background-image: linear-gradient(to bottom, #2687cc, #003b57);
  -webkit-border-radius: 15;
  -moz-border-radius: 15;
  border-radius: 15px;
  font-family: Arial;
  color: #ffffff;
  font-size: 18px;
  padding: 11px 17px 9px 18px;
  text-decoration: none;
}

.btn_login:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>