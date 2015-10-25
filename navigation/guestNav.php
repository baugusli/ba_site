  <nav class="navbar navbar-default navbar-static-top navBarMain">
      <div class="container">
        <div class="navbar-header logoMain">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Captain's Hub</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		
		<?php
		//For guest*****************************************************************8
		if(!isset($_SESSION['userType']) && !isset($_SESSION['captId'])){
		?>
          <form class="navbar-form navbar-right" action="login.php" method="POST">
            <div class="form-group">
              <input type="text" name="loginUsername" id="loginUsername" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="loginPassword" id="loginPassword" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
			<button id="btn_signup" class="btn btn-info">Sign Up</button>
          </form>
		<?php
		}
		elseif(isset($_SESSION['userType']) && isset($_SESSION['userId']) && !empty($_SESSION['userType']) && !empty($_SESSION['userId'])){
			include_once "class/Captain.class.php";
			$userType = $_SESSION['userType'];
			$userId = $_SESSION['userId'];
			
			//Navigation bar for Captain *******************************************
			if($userType == "Captain"){
				
				$captain = new Captain();
				$captDetail = array();
				$captDetail = $captain->retrieveCaptainFromId($userId);
				$captName = $captDetail[0]->getFirstName() . " " . $captDetail[0]->getLastName();
		?>
		   <form class="navbar-form navbar-right" action="logout.php" method="POST">
		    <label for="welcomeUserName" id="welcomeUserName">Welcome <?php echo $captName;?></label>
            <button type="submit" class="btn btn-success">Logout</button>
          </form>	
				
		<?php
			}
			
			//Navigation bar for Customer **********************************************
			elseif($userType == "Customer"){
				
		 ?>
		   <form class="navbar-form navbar-right" action="logout.php" method="POST">
            <button type="submit" class="btn btn-success">Logout</button>
          </form>	
				
		<?php
		
				
			}
		}
		
		?>  
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

  