<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
    header('Location: st_profile.php');
    exit();
}
?>
<?php 
$pageTitle = "Student Login";
include "header.php";
?>
<div class="login-container">
    <div class="loginform">
        <div class="msg">
            <h3><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Login</h3>
        </div>
        <div class="access">
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $st_id = $_POST['st_id'];
                $st_pass = $_POST['st_pass'];

                if(empty($st_id) or empty($st_pass)){
                    echo "<p class='error-msg'>Field must not be empty.</p>";
                }else{
                    $st_pass = md5($st_pass);
                    $login = $user->st_userlogin($st_id, $st_pass);
                    if($login){
                        header('Location: st_profile.php');
                    }else{
                        echo "<p class='error-msg'>Incorrect Student ID or password</p>";
                    }
                }
            }
            ?>
            <style>
                /* Container styles */
                /* .login-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    background: linear-gradient(135deg, #6e8efb, #a777e3);
                    padding: 20px;
                } */

                .loginform {
                    width: 100%;
                    max-width: 450px;
                    background: rgba(213, 214, 231, 0.95);
                    border-radius: 20px;
                    padding: 40px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                    position: relative;
                    overflow: hidden;
                    animation: fadeIn 1s ease-out forwards;
                }

                /* Fade in animation */
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: scale(0.8);
                    }
                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                /* Header styles */
                .msg h3 {
                    text-align: center;
                    color: #2c3e50;
                    font-size: 28px;
                    margin-bottom: 30px;
                    position: relative;
                }

                .msg h3 i {
                    color: #007bff;
                    margin-right: 10px;
                }

                /* Input fields */
                .access input[type="text"],
                .access input[type="password"] {
                    width: 100%;
                    padding: 15px;
                    margin: 12px 0;
                    border: none;
                    border-bottom: 2px solid #ddd;
                    background: transparent;
                    transition: all 0.3s ease;
                    font-size: 16px;
                    color: #333;
                }

                .access input:focus {
                    border-bottom: 2px solid #007bff;
                    outline: none;
                    transform: translateY(-2px);
                }

                /* Input hover effect */
                .access input:hover {
                    background: rgba(0, 123, 255, 0.05);
                }

                /* Submit button */
                .access input[type="submit"] {
                    width: 100%;
                    padding: 15px;
                    background: linear-gradient(45deg, #007bff, #00c4ff);
                    color: white;
                    font-weight: bold;
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;
                    font-size: 16px;
                    transition: all 0.4s ease;
                    position: relative;
                    overflow: hidden;
                }

                .access input[type="submit"]:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
                }

                /* Button ripple effect */
                .access input[type="submit"]::after {
                    content: '';
                    position: absolute;
                    width: 0;
                    height: 0;
                    background: rgba(209, 105, 105, 0.3);
                    border-radius: 50%;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    transition: width 0.6s ease, height 0.6s ease;
                }

                .access input[type="submit"]:active::after {
                    width: 200px;
                    height: 200px;
                }

                /* Error message */
                .error-msg {
                    color: #e74c3c;
                    text-align: center;
                    margin: 10px 0;
                    padding: 10px;
                    background: rgba(231, 76, 60, 0.1);
                    border-radius: 5px;
                    animation: shake 0.3s ease;
                }

                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    25% { transform: translateX(-5px); }
                    75% { transform: translateX(5px); }
                }

                /* Register link */
                .loginform p {
                    text-align: center;
                    margin-top: 25px;
                    font-size: 15px;
                    color: #666;
                }

                .loginform a {
                    color: #007bff;
                    text-decoration: none;
                    font-weight: 500;
                    transition: color 0.3s ease;
                }

                .loginform a:hover {
                    color: #0056b3;
                    text-decoration: underline;
                }

                /* Floating labels */
                .input-group {
                    position: relative;
                    margin-bottom: 20px;
                }

                .input-group label {
                    position: absolute;
                    top: 15px;
                    left: 0;
                    color: #666;
                    transition: all 0.3s ease;
                    pointer-events: none;
                    font-size: 16px;
                }

                .input-group input:focus + label,
                .input-group input:not(:placeholder-shown) + label {
                    top: -10px;
                    font-size: 12px;
                    color: #007bff;
                }
            </style>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const loginForm = document.querySelector(".loginform");
                    const inputs = document.querySelectorAll(".access input");

                    // Initial animation
                    loginForm.style.opacity = "1";

                    // Input focus animation
                    inputs.forEach(input => {
                        input.addEventListener("focus", function() {
                            this.parentElement.classList.add("active");
                        });
                        input.addEventListener("blur", function() {
                            if (!this.value) {
                                this.parentElement.classList.remove("active");
                            }
                        });
                    });

                    // Form shake on error
                    const errorMsg = document.querySelector(".error-msg");
                    if (errorMsg) {
                        loginForm.style.animation = "shake 0.3s ease";
                        setTimeout(() => {
                            loginForm.style.animation = "";
                        }, 300);
                    }
                });
            </script>

            <form action="" method="post">
                <div class="input-group">
                    <input type="text" name="st_id" id="st_id" placeholder=" " required>
                    <label for="st_id">Student ID</label>
                </div>
                <div class="input-group">
                    <input type="password" name="st_pass" id="st_pass" placeholder=" " required>
                    <label for="st_pass">Password</label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
        <p>Not Registered? <a href="st_reg.php">Create an account</a></p>
    </div>
</div>

<?php include "footer.php"; ?>
<?php ob_end_flush(); ?>