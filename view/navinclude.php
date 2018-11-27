<!-- Start of Bootstrap Nav Menu-->
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">                  
                    <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                            <li><a href="../controller/controller.php?action=Home">Home</a></li>                      
                         </ul>
                      <ul class="nav navbar-nav navbar-right">                      
                                <?php if (!loggedIn()){ ?>                         
                    <li><a href="../security/index.php?action=SecurityLogin"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
                                <?php } if (loggedIn()){                                            
									echo "<a href=\"../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI']) . "\">Log In</a>";
                                 } ?>                                                                   
                      </ul>
                      
                    </div>
            </div>
    </nav>