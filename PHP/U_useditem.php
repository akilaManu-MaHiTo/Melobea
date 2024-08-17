<html lang="en">
    <head>
        <!--Fonts-->
            <!--Icon font-->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                
            <!--google fonts 1-->
                <link rel="preconnect" href="https://fonts.googleapis.com">      
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
            <!--google fonts 2-->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
            <!--google fonts 3-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Phudu:wght@300&family=Poppins&display=swap" rel="stylesheet">
            <!--Google font 4-->

        <!-- end Fonts-->

        <!--Style Sheet-->
            <link rel="stylesheet" href="Style/U_useditem.css">
        <!-- End Style Sheet-->

        <!--
            <script type="text/javascript" src="Java/melstorejs.js"></script>
        -->

        <title>
            Molobea Store
        </title>
        <link rel="icon" href="Source/melobea logo.png">
    </head>

    <body>
    <a href="U_store.php"><img src="Source/melobea logo.png"></a>

        <!--search bar-->
        <div>
            <form>
                <input type="text" placeholder="Search..." class="search">
                <button class="search1"><img src="Source/search.png" alt="" class="seimg"></button>
            </form>
        </div> 

        <!--cart-->
        <div class="iconcart">
            <a href="cart.php" class="cartpos">
                <i class="fa fa-shopping-cart"></a></i>
                <div>Cart</div>
            </a>
        </div>

        <!--favourite-->
        <div class="iconheart">
            <a href="" class="heartpos">
                <i class="fa fa-heart"></a></i>
                <div>Favourite</div>
            </a>
        </div>

        <!--login & signin-->
        <div class="logpos">
            <div class="namepos">
                <?php
                    session_start();
                    if (isset($_SESSION["userID"])) {
                        echo "Hello, " . $_SESSION["userID"];
                    } 
                ?>
            </div>
            <button id="dec1"><a href="U_account.php"><i class="fas fa-user"></i></a></button>
        </div>

        <!--Navigation bar-->
        <div class="navi">
            <ul>
                <li><a href="U_store.php">Brand New Items</a></li>
                <li><a href="#">Used Items</a></li>
                <li><a id="categoryToggle">Categories</a></li>
                <li><a href="U_seller.php">Looking For Selling</a></li>
                <li><a href="U_help.php">Help</a></li>
            </ul>
        </div>
        <div class="cat" id="categoryListWrapper">
        <div class="category-container">
            <div>
                <ul id="categoryList">
                    <li><a href="" class="catdec1">Strings</a></li><br>
                    <li><a href="U_guitar.php" class="catdec">Guitar</a></li><br>  
                    <li><a href="U_violin.php" class="catdec">Violin</a></li><br>  
                    <li><a href="U_sitar.php" class="catdec">Sitar</a></li><br>
                    <li><a href="U_mandoline.php" class="catdec">Mandoline</a></li><br>

                </ul>
            </div>
            <div>
                <ul id="categoryList">
                    <li><a href="" class="catdec1">Drums</a></li><br>
                    <li><a href="U_Fulldrumset.php" class="catdec">Full Drum Set</a></li><br>
                    <li><a href="U_cymbols.php" class="catdec">Cymbals</a></li><br>         
               </ul>
            </div>
            <div>
                <ul id="categoryList">
                <li><a href="" class="catdec1">WoodWind</a></li><br>
                <li><a href="U_flute.php" class="catdec">Flute</a></li><br>  
                <li><a href="U_trumpet.php" class="catdec">Trumpet</a></li><br>  
                </ul>
            </div>
            <div>
                <ul id="categoryList">
                <li><a href="" class="catdec1">KeyBoard</a></li><br>
                <li><a href="U_orgon.php" class="catdec">Orgon</a></li><br>  
                <li><a href="U_melodica.php" class="catdec">Melodica</a></li><br> 
                <li><a href="U_piano.php" class="catdec">Piano</a></li><br> 
                </ul>
            </div>
            <div>
                <ul id="categoryList">
                <li><a href="" class="catdec1">Electronic</a></li><br>
                <li><a href="U_microphone.php" class="catdec">Microphone</a></li><br>  
                <li><a href="U_minidj.php" class="catdec">Mini DJ</a></li><br> 
                </ul>
            </div>
            <div>
                <ul id="categoryList">
                <li><a href="" class="catdec1">Accessories</a></li><br>
                <li><a href="U_pick.php" class="catdec">Pick</a></li><br>  
                <li><a href="U_stands.php" class="catdec">Stands</a></li><br> 
                </ul>
            </div>
        </div>
        
    </div>

        <!--ad poster-->
        <div class="add">
            <div class="image-container">
                <div class="text-overlay">
                    <p class="typing1">Explore Our Melobea Items to Make your own Beat</p>
                    <p class="typing2">Discover Your Ideal Equipment</p>
                </div>
            </div>
            <div class="pick">
                <img src="Source/background 2.png" alt="">
            </div>
        </div>

        <?php
            include('database.php');

            //query to retrieve used items data 

            $sql="SELECT u.userID, s.ubrand, s.utype, s.udep, s.uprice, s.udate, s.ucountry, u.Fname, u.Lname, u.Email ,u.Address, u.ContatctNo 
            FROM sellitem s
            JOIN user u ON u.userID = s.userID";
            

            $result=$mysqli->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
           
                    $userid=$row['userID'];
                    $userbrand=$row['ubrand'];
                    $usertype=$row['utype'];
                    $userdep=$row['udep'];
                    $useprice=$row['uprice'];
                    $userdate=$row['udate'];
                    $usecounty=$row['ucountry'];
                    $userFname=$row['Fname'];
                    $userLname=$row['Lname'];
                    $useremail=$row['Email'];
                    $useradr=$row['Address'];
                    $usercontact=$row['ContatctNo'];
       
                    echo '<div class="used-items">'; 
                    echo '<div class="used-store">';
                        echo '<div class="imgbox">';
                            echo'<img src="Source/music1.png" alt="" class="storeimg">';
                        echo '</div>';
                         echo '<div class="infobox">';       
                            echo '<div class="info1">'.$userbrand.'</div>';
                            echo '<div class="info2">'.$usertype.'</div>';
                            echo '<div class="info3">'.$usecounty.'</div>';
                            echo '<div class="info4">'.$useprice.'</div>';
                    echo '</div>';

                    echo '<div class="ushowbox">';
                        echo '<div class="ushowbox1">'.$userFname. ' '.$userLname. '</div>';         
                        echo '<div class="ushowbox1">👥 '. $useremail . '</div>';
                        echo '<div class="ushowbox1">📍 '. $useradr.'</div>';
                        echo '<div class="ushowbox1">☏  '.$usercontact.'</div>';
                    echo '</div>';
                           
                echo '</div>';
                echo '</div>';
                }
            }

    
                $mysqli->close();
            ?>
        <!--footer-->
        <footer class="footer">
            <div class="foot">
                <div class="row">
            <!--website--> 
                    <div class="footpos1">                 
                        <div class="colomn">
                            <h4 class="fh4">Website</h4>
                                <ul>
                                    <li><a href="U_aboutus.php">About us</a></li>
                                    <li><a href="U_service.php">Our Service</a></li>
                                    <li><a href="U_privacy.php">Privacy Policy</a></li>
                                </ul>
                        </div>
                    </div>

            <!--get help-->
                    <div class="footpos2">
                        <div class="colomn">
                            <h4 class="fh4">Get Help</h4>
                            <ul>
                                <li><a href="U_faq.php">FAQ</a></li>
                                <li><a href="">Shipping</a></li>
                                <li><a href="U_returnform.php">Returns</a></li>
                                <li><a href="paymentsuccess.php">Orders</a></li>
                            </ul>
                        </div>
                    </div>
            
            <!--contact us-->        
                    <div class="footpos3">                   
                        <div class="colomn">
                            <h4 class="fh4">Contact Us</h4>
                            <ul>
                                <li><a href="#">www.melobea.com</a></li>
                                <li><a href="#">+94 7122220</a></li>
                                <li><a href="#">081 3258562</a></li>
                            </ul>
                        </div>
                    </div>

            <!--social media-->        
                    <div class="colomn">
                        <h4 class="fh41">Social Media</h4>
                        <div class="social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-arrow-down"></i></a>

                        
                        </div>
                    </div>

                </div>

            </div>

        </footer>         
        <!--Login Popup-->
        <div class="overlay">
            <div class="popup">
                <div class="close-btn">&times;</div>
                <div class="form">
                    <h2>Log In</h2>
                    <div class="form-Element">
                        <label for="email">Username</label>
                        <input type="text" id="email" placeholder="Enter Username">
                    </div>
                    <div class="form-Element">
                        <label for="Password">Password</label>
                        <input type="password" id="password" placeholder="Enter Password">
                    </div>
                    <div class="form-Element">
                       <input type="checkbox" id="Remember">
                       <label for="Remember">Remember Me</label>
                    </div>
                    <div class="form-Element">
                        <button>Log In</button>
                    </div>
                    <div class="form-Element">
                        <a href="#">Forgot Password</a>
                    </div>                                                                     
                </div>
            </div>
        </div>
        <form method="POST" onsubmit="return checkpassword()">
            <div class="overlay1">
                <div class="popup1">
                    <div class="close-btn">&times;</div>

                    <div class="form">
                        <h2>Sign In</h2>
                        <div class="form-Element1">
                            <div>
                                <label>Enter Your First Name</label><br>
			                    <input type="text" required  class="Fname">
                            </div>
                            <div>
                                <label>Enter Your Last Name</label><br>
                                <input type="text" required  class="Lname">
                            </div>


                        </div>
                        <div class="form-Element">
                            <label>E-mail Address</label>
                            <input type="text" id="email" required>
                        </div>
                        <div class="form-Element">
                            <label>Address</label>
                            <textarea rows="5" cols="65" required></textarea>
                        </div>
                        
                        <div class="form-Element">
                            <label>Enter your Password</label>
			                <input type="password" id="pwd" required>
                        </div>
                        <div class="form-Element">
                            <label>Re enter your Password</label>
			                <input type="password" id="repwd" required>
                        </div>

                        <input type="checkbox" name="check" id="check" onclick="enablebtn()" required>
                        <label class="check">By continuing, you agree to MELOBEA's Terms of service, privacy policy.</label>
                        <br><br>
                        <input type = "Submit" value="Sign In" id="submit" disabled>                                                                    
                    </div>
                </div>
            </div>

        </form>

        <div id="password-message"></div>

        <script src="Js/store1.js"></script>
    </body>
</html>
