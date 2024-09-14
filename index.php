<?php

include_once('connection.php');


function display_data(){
    global $conn;
    $query = "(SELECT * from login_details limit 16) ";
    $result = mysqli_query($conn, $query);
    return $result;
}
$result = display_data();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/form_style.css">
         <title>
            Welcome
         </title>
    </head>
    <body>
        <div class="full-page">
            <div class="navbar">
                <div>
                    <a href="#">Micro Irrigation</a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home_pg_new.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><button class='loginbtn' 
                        onclick="document.getElementById('login-form').style.display='block'" 
                        style="width:auto;">Login</button></li>
                    </ul>
                </nav> 
            </div>
            <div id="login-form" class="login-page">
                <div class="form-box">
                    <div class="button-box">
                        <button type="button" onclick="login()"
                        class="toggle-btn">Log In</button>
                        <button type="button" onclick="register()"
                        class="toggle-btn">Register</button>  
                    </div>
                    
                    <form id="login" class="input-group-login" action="insert.php" method="post">
                        <input type="email" class="input-field"
                        placeholder="Email Id" required>
                        <input type="password" class="input-field"
                        placeholder="Enter Password" required>
                        <input type="checkbox" class="check-box">
                        <span style="font-size: 17px;">Remember Password</span>
                        <button type="submit" class="submit-btn" onclick="validateAndSubmit()">Log in</button>
                    </form>
                    <form id="register" class="input-group-register">
                        <input type="text" class="input-field" placeholder="First Name" required>
                        <input type="text" class="input-field" placeholder="Last Name" required>
                        <input type="email" class="input-field" placeholder="Email Id" required>
                        <input type="password" class="input-field" placeholder="Enter Password" required id="p1">
                        <input type="password" class="input-field" placeholder="Confirm Password" required id="p2">
                        <input type="checkbox" class="check-box" required>
                        <span style="font-size: 17px;">I am not a robot</span>
                        <button type="submit" class="submit-btn" onclick="validateAndSubmit()">Register</button> 
                    </form>                        
                </div>
            </div>
        </div>

        <?php 

                  while($row = mysqli_fetch_assoc($result))
                  {
                ?>
                    <td><?php echo $row['St_no'];?></td>
                    <td><?php echo $row['Location'];?></td>
                    <td><?php echo $row['State'];?></td>
                    <td><?php echo $row['Temperature_Min'];?></td>
                    <td><?php echo $row['Temperature_Max'];?></td>
                    <td><?php echo $row['pH_Min'];?></td> 
                </tr>
                <?php    
                  }
                
  ?>
         
        <!--login or registration to move correctly-->
        <script>
            var x=document.getElementById('login');
            var y=document.getElementById('register');
            var z=document.getElementById('btn');
            function register(){
                x.style.left='-400px';
                y.style.left='50px';
                z.style.left='110px';
            }
            function login(){
                x.style.left='50px';
                y.style.left='450px';
                z.style.left='0px';
            }
        </script>
        <!--click login or registration form box disaapears-->
        <script>
            var model=document.getElementById('login-form');
            window.onclick= function(event){
                if(event.target==modal){
                    modal.style.display="none";
                }
            }

            
        </script>

       
     <script>
        function confirmEmail(p1, p2) {
            if (p1.value != p2.value || p1.value == '' || p2.value == '') {
                p2.setCustomValidity('Passwords Do Not Match');
            } 
            else {
                p2.setCustomValidity('');
            }
        }
        function validateAndSubmit() {
            if (confirmEmail(p1,p2) == false) {
                return false;
            }
        }
   
     </script>
    </body>
</html>