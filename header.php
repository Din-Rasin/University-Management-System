<!Doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content="University Management system">
		<meta name="author" content="Md Abul Kalam">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/stylesheet.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		 <style>

       .header_area {
        background: rgb(69, 67, 190);
        padding: 15px 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
        transform-style: preserve-3d;
        transition: all 0.5s ease;
        z-index: 1000;
        border-radius: 8px;
        margin: 15px;
        /* New 3D perspective */
        perspective: 500px;
    }

    /* Animated 3D Border Effect */
    .header_area::after {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        border: 3px solid transparent;
        border-radius: 10px;
        background: linear-gradient(45deg, 
            rgba(255, 255, 255, 0.8), 
            rgba(100, 200, 255, 0.5), 
            rgba(255, 255, 255, 0.8));
        background-size: 200% 200%;
        z-index: -1;
        animation: 
            borderRotate 8s linear infinite,
            borderGradient 6s ease infinite,
            borderPulse 4s ease infinite;
        transform: translateZ(-20px);
        filter: blur(1px);
    }

    @keyframes borderRotate {
        0% { transform: rotateY(0deg) rotateX(0deg); }
        25% { transform: rotateY(10deg) rotateX(5deg); }
        50% { transform: rotateY(0deg) rotateX(10deg); }
        75% { transform: rotateY(-10deg) rotateX(5deg); }
        100% { transform: rotateY(0deg) rotateX(0deg); }
    }

    @keyframes borderGradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes borderPulse {
        0% { opacity: 0.7; }
        50% { opacity: 1; }
        100% { opacity: 0.7; }
    }

    /* Enhanced Top Border Animation */
    .header_area::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, 
            #00d2ff, 
            #3a7bd5, 
            #ff00ff, 
            #3a7bd5, 
            #00d2ff);
        background-size: 400% 400%;
        animation: gradient 3s linear infinite;
        z-index: 2;
        box-shadow: 0 0 10px rgba(0, 210, 255, 0.7);
        transform: translateZ(10px);
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        100% { background-position: 400% 50%; }
    }

    /* 3D Hover Effect */
    .header_area:hover {
        transform: translateZ(10px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
    }

    .header_area:hover::after {
        animation-speed: 2s;
        filter: blur(2px);
    }

            
            /* Sidebar Animation */
            .sidebar {
                background: rgba(86, 147, 151, 0.95);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar ul li span.spcl {
                display: block;
                padding: 10px 15px;
                background: linear-gradient(to right, #4a6bff, #00c8d7);
                color: white;
                margin: 5px 0;
                border-radius: 4px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }
            
            .sidebar ul li span.spcl:hover {
                transform: translateX(5px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            }
            
            .sidebar ul li a {
                display: block;	
                padding: 8px 15px 8px 30px;
                color: #333;
                text-decoration: none;
                transition: all 0.3s ease;
                border-left: 3px solid transparent;
            }
            
            .sidebar ul li a:hover {
                background: rgba(74, 107, 255, 0.1);
                border-left: 3px solid #4a6bff;
                color: #4a6bff;
                transform: translateX(3px);
            }
            
            .sidebar ul li a i {
                margin-right: 8px;
                width: 20px;
                text-align: center;
            }
            
            /* Date Show Animation */
            .dateshow p {
                background: rgba(202, 18, 18, 0.9);
                padding: 5px 15px;
                border-radius: 20px;
                display: inline-block;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                animation: pulse 2s infinite;
            }
            
            @keyframes pulse {
                0% { box-shadow: 0 0 0 0 rgba(74, 107, 255, 0.4); }
                70% { box-shadow: 0 0 0 10px rgba(74, 107, 255, 0); }
                100% { box-shadow: 0 0 0 0 rgba(74, 107, 255, 0); }
            }
            
        </style>
    </head>
    <body>
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('.header_area');
        
        // 3D Parallax Effect on Mouse Move
        if (header) {
            header.addEventListener('mousemove', (e) => {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
                const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
                header.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg) translateZ(10px)`;
            });
            
            header.addEventListener('mouseleave', () => {
                header.style.transform = 'rotateY(0deg) rotateX(0deg) translateZ(0)';
            });
        }
    });
</script>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header class="container header_area fix" >
			<div id="sticker">
				<div class="head">
					<a href="#"><div class="logo fix">
						<img src="img/logo.png" alt="" />
					</div></a>
					<div class="uniname fix">
						<h2>University Management System</h2>
					</div>
				</div>
				<div class="menu fix">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
				<!--	<ul>
						<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						
						<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> User</a></li>
					</ul>
				-->
				</div>
			</div>
		</header>
		<div class="maincontent container fix">
			<div id="stickerside">
				<div class="sidebar fix" >
						<ul>
							<li><span class="spcl"><i class="fa fa-server" aria-hidden="true"></i> Administrator</span></li>
								<ul>
									<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
								</ul>
							
							<li><span class="spcl"><i class="fa fa-male" aria-hidden="true"></i> Faculty Area</span></li>
								<ul>
									<li><a href="facultylogin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="fct_single_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
									<li><a href="class_att.php"><i class="fa fa-database" aria-hidden="true"></i> Class Attendance</a></li>
								</ul>
							
							<li><span class="spcl"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Area</span></li>
								<ul>
									<li><a href="st_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
									<li><a href="st_reg.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
									<li><a href="st_profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
									<li><a href="#"><i class="fa fa-outdent" aria-hidden="true"></i> Result</a></li>
								</ul>
							
						
						</ul>
					
					</div>
				</div>
				<div class="content fix">