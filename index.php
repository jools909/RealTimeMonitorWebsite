<?php include 'layout.php';?>
<?php include 'header.php';?>
	
		<div class="main">
			<div class="main-content">
				
				<div class="signIn_Box">
                    <div>
                        <form class="signInForm" action="userSign.php" method="post" name="userLoginForm">
                        <div class="signIn_row">
                            <input type="text" name="username" placeholder="Username" value="">
                        </div>
                        <div class="signIn_row">
                            <input type="password" name="password" placeholder="Password" value="">
                        </div>
                        <div>
                            <input class="signInBtn" type="submit" value="Sign In">
                        </div>
                        </form>
                    </div>
                </div>

					
			</div><!-- end main-content -->
		</div><!-- end main wrap -->
	</div><!-- end page wrap -->





<?php include "footer.php"; ?>