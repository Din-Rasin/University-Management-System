<?php
ob_start ();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->get_faculty_session()){
	header('Location: class_att_fc.php');
	exit();
}
?>

<?php 
$pageTitle = "Faculty login";
include "header.php";
?>
	<div class="loginform-container">
		<div class="loginform fix" id="loginForm">
			<div class="msg"><h3><i class="fa fa-user" aria-hidden="true"></i> Faculty login</h3></div>
			<div class="access">
				<?php
				//php for faculty login
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$username = $_POST['user'];
					$psw  = $_POST['psw'];

					if(empty($username) or empty($psw)){
						echo "<p style='color:red;text-align:center;'>Field must not be empty.</p>";
					}else{
						$psw = md5($psw);
						$login = $user->fct_login($username, $psw);
						if($login){
							header('Location: class_att_fc.php');
						}else{
							echo "<p style='color:red;text-align:center'>Incorrect Username or password</p>";
						}
					}
				}
				?>
				
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="user" placeholder="Username" required />
						<span class="focus-border"></span>
					</div>
					<div class="input-group">
						<input type="password" name="psw" placeholder="Password" required />
						<span class="focus-border"></span>
					</div>
					<button type="submit" class="glow-on-hover">Login</button>
				</form>
			</div>
			<p class="register-link">Not Registered? <a href="fct_reg.php">Create an account</a></p>
		</div>
	</div>

<style>
/* Base styles */
.loginform-container {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 80vh;
	perspective: 1000px;
	background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.loginform {
	background: rgba(255, 255, 255, 0.9);
	padding: 30px;
	border-radius: 15px;
	box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
	width: 350px;
	transform-style: preserve-3d;
	transition: all 0.5s ease;
	position: relative;
	overflow: hidden;
}

.loginform::before {
	content: '';
	position: absolute;
	top: -2px;
	left: -2px;
	right: -2px;
	bottom: -2px;
	background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
	background-size: 400%;
	border-radius: 15px;
	z-index: -1;
	filter: blur(5px);
	opacity: 0;
	transition: 0.5s;
	animation: glowing 20s linear infinite;
}

.loginform:hover::before {
	opacity: 1;
}

@keyframes glowing {
	0% { background-position: 0 0; }
	50% { background-position: 400% 0; }
	100% { background-position: 0 0; }
}

.msg h3 {
	text-align: center;
	color: #333;
	margin-bottom: 25px;
	font-size: 24px;
	position: relative;
}

.msg h3::after {
	content: '';
	position: absolute;
	bottom: -10px;
	left: 50%;
	transform: translateX(-50%);
	width: 50px;
	height: 3px;
	background: linear-gradient(to right, #3498db, #2ecc71);
	border-radius: 3px;
}

.input-group {
	position: relative;
	margin-bottom: 25px;
}

.input-group input {
	width: 100%;
	padding: 12px 15px;
	border: 1px solid #ddd;
	border-radius: 8px;
	font-size: 16px;
	transition: all 0.3s;
	background: rgba(255, 255, 255, 0.8);
}

.input-group input:focus {
	outline: none;
	border-color: transparent;
	box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
}

.focus-border {
	position: absolute;
	bottom: 0;
	left: 0;
	width: 0;
	height: 2px;
	background: linear-gradient(to right, #3498db, #2ecc71);
	transition: 0.4s;
}

.input-group input:focus ~ .focus-border {
	width: 100%;
	transition: 0.4s;
}

.glow-on-hover {
	width: 100%;
	padding: 12px;
	border: none;
	outline: none;
	color: #fff;
	background: linear-gradient(to right, #3498db, #2ecc71);
	cursor: pointer;
	position: relative;
	z-index: 0;
	border-radius: 8px;
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 1px;
	transition: all 0.3s;
	overflow: hidden;
}

.glow-on-hover:before {
	content: '';
	background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
	position: absolute;
	top: -2px;
	left: -2px;
	background-size: 400%;
	z-index: -1;
	filter: blur(5px);
	width: calc(100% + 4px);
	height: calc(100% + 4px);
	animation: glowing 20s linear infinite;
	opacity: 0;
	transition: opacity .3s ease-in-out;
	border-radius: 8px;
}

.glow-on-hover:hover:before {
	opacity: 1;
}

.glow-on-hover:after {
	z-index: -1;
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	background: linear-gradient(to right, #3498db, #2ecc71);
	left: 0;
	top: 0;
	border-radius: 8px;
}

.register-link {
	text-align: center;
	margin-top: 20px;
	color: #666;
}

.register-link a {
	color: #3498db;
	text-decoration: none;
	transition: all 0.3s;
}

.register-link a:hover {
	color: #2ecc71;
	text-decoration: underline;
}

/* 3D Animation */
@keyframes float {
	0% { transform: translateY(0px) rotateY(0deg); }
	50% { transform: translateY(-10px) rotateY(5deg); }
	100% { transform: translateY(0px) rotateY(0deg); }
}

.loginform {
	animation: float 6s ease-in-out infinite;
}

/* Responsive */
@media (max-width: 480px) {
	.loginform {
		width: 90%;
		padding: 20px;
	}
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
	const loginForm = document.getElementById('loginForm');
	const inputs = document.querySelectorAll('input');
	
	// Add floating label effect
	inputs.forEach(input => {
		input.addEventListener('focus', function() {
			this.parentNode.querySelector('.focus-border').style.width = '100%';
		});
		
		input.addEventListener('blur', function() {
			if (!this.value) {
				this.parentNode.querySelector('.focus-border').style.width = '0';
			}
		});
	});
	
	// Add 3D tilt effect
	loginForm.addEventListener('mousemove', (e) => {
		const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
		const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
		loginForm.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
	});
	
	// Reset position when mouse leaves
	loginForm.addEventListener('mouseleave', () => {
		loginForm.style.transform = 'rotateY(0deg) rotateX(0deg)';
	});
	
	// Button click effect
	const button = document.querySelector('.glow-on-hover');
	if (button) {
		button.addEventListener('click', function(e) {
			e.preventDefault();
			this.classList.add('active');
			setTimeout(() => {
				this.classList.remove('active');
				this.form.submit();
			}, 1000);
		});
	}
});
</script>

<?php
 include "footer.php"; 
 ob_end_flush(); 
?>