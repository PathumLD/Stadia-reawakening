<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Stadia </title>
    <link rel="stylesheet" href="css/index.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <!-- Move to up button -->
  <div class="scroll-button">
    <a href="#home"><i class="fas fa-arrow-up"></i></a>
  </div>

  <!-- navgaition menu -->
  <nav>
    <div class="navbar">
      <div class="logo"><a href="#"><img src="images/logo2.png" alt="logo"></a></div>
      <ul class="menu">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="adminlogin.php">Admin</a></li>
          <div class="cancel-btn">
            <i class="fas fa-times"></i>
          </div>
      </ul>
      <div class="media-icons">
        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="menu-btn">
      <i class="fas fa-bars"></i>
    </div>
  </nav>

<!-- Home Section Start -->
 <section class="home" id="home">
   <div class="home-content">
     <div class="text">
       <div class="text-two">STADIA</div>
       <div class="text-three">PLAY LIKE A CHAMPION</div>
     </div>
     <div class="button">
       <button onclick="location.href='login.php'"> Login Here!</button>
     </div>
   </div>
 </section>

<!-- About Section Start -->
<section class="about" id="about">
  <div class="content">
    <div class="title"><span>About US</span></div>
  <div class="about-details">
    <div class="left">
      <img src="images/about.jpeg" alt="about image">
    </div>
    <div class="right">
      <!-- <div class="topic">Designing Is My Passion</div> -->
      <p>Stadia is an online stadium booking system that comprises two badminton courts, a volleyball court, a basketball court, a tennis court, and a swimming pool. The clients can easily reserve a time slot with or without coaches and pay on-site using the system's built-in payment gateway by following a few easy steps to check whether the courts, swimming pool, and other facilities they need—such as renting sports equipment and refreshments are available according to their preferences.
        Coaches can arrange classes to suit their schedules and easily manage student information. Additionally, they can rent out equipment based on their needs through our stadia system.</p>
      <div class="button">
        <button onclick="location.href='login.php'">Register With Us!</button>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- My Skill Section Start -->
<!-- Section Tag and Other Div will same where we need to put same CSS -->
<section class="gallery" id="gallery">
 <div class="content">
   <div class="title"><span>Gallery</span></div>

  <div class="boxes">
    <table>
      <tr>
        <td><img src="images/about.jpeg" alt="about image"></td>
        <td><img src="images/about.jpeg" alt="about image"></td>
        <td><img src="images/about.jpeg" alt="about image"></td>
        <td><img src="images/about.jpeg" alt="about image"></td>
        <td><img src="images/about.jpeg" alt="about image"></td>
      </tr>
    </table>

  </div>

   <!-- <div class="skills-details">
     <div class="text">
       <div class="topic">Skills Reflects Our Knowledge</div>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus natus tenetur tempora? Quasi, rem quas omnis. Porro rem aspernatur reiciendis ut praesentium minima ad, quos, officia! Illo libero, et, distinctio repellat sed nesciunt est modi quaerat placeat. Quod molestiae, alias?</p>
       <div class="experience">
         <div class="num">10</div>
         <div class="exp">Years Of <br> Experience</div>
       </div>
     </div>
     <div class="boxes">
       <div class="box">
         <div class="topic">HTML</div>
         <div class="per">90%</div>
       </div>
       <div class="box">
         <div class="topic">CSS</div>
         <div class="per">80%</div>
       </div>
       <div class="box">
         <div class="topic">JavScript</div>
         <div class="per">70%</div>
       </div>
       <div class="box">
         <div class="topic">PHP</div>
         <div class="per">60%</div>
       </div>
     </div>
   </div> -->
 </div>
</section>

<!-- My Services Section Start -->
 <section class="services" id="services">
   <div class="content">
     <div class="title"><span>Our Services</span></div>
     <div class="boxes">
       <div class="box">
         <div class="icon">
           <i class="fas fa-swimming-pool"></i>
       </div>
       <div class="topic">Court / Pool Booking</div>
       <p>We provide an efficient system for booking courts and swimming pools in accordance with your needs.</p>
     </div>
       <div class="box">
         <div class="icon">
           <i class="fas fa-user-secret"></i>
       </div>
       <div class="topic">Find Coaches</div>
       <p>Clients can find and book coaches if they prefer to do practices in a professional manner</p>
     </div>
       <div class="box">
         <div class="icon">
           <i class="fas fa-shopping-cart"></i>
       </div>
       <div class="topic">Rent Equipment</div>
       <p>Clients can borrow and rent out equipment they need for an affordable rate on an hourly or daily basis.</p>
     </div>
       <div class="box">
         <div class="icon">
          <i class="fas fa-coffee"></i>
       </div>
       <div class="topic">Order Refreshments</div>
       <p>Clients can place retail or bulk orders for refreshments such as snacks and drinks based on their preferences.</p>
     </div>
       <div class="box">
         <div class="icon">
           <i class="fas fa-users"></i>
       </div>
       <div class="topic">Find Students</div>
       <p>Consists of a student information management system where records of students are kept and student information can be viewed.</p>
     </div>
       <div class="box">
         <div class="icon">
           <i class="fas fa-boxes"></i>
       </div>
       <div class="topic">Flexible Package Plans</div>
       <p>Clients can select a flexible package based on their age and level of experience.</p>
     </div>
   </div>
   </div>
 </section>

<!-- Contact Me section Start -->
<section class="contact" id="contact">
  <div class="content">
    <div class="title"><span>Contact Us</span></div>
    <div class="text">
      <!-- <div class="topic">Have Any Project?</div> -->
      <ul>
        <li> <i class="fas fa-map-marker"></i> 35/A , Stadia , Park Street , Col-07</li>
        <li> <i class="fas fa-phone"></i> 011 - 2606888</li>
        <li> <i class="fas fa-mobile"></i> 071 123 4567</li>
        <li> <i class="fas fa-building"></i> 6.00AM - 11.00PM  Monday - Sunday</li>
      </ul>
      <!-- <div class="button">
        <button>Let's Chat</button>
      </div> -->
    </div>
  </div>
</section>

<!-- Footer Section Start -->
<footer>
  <div class="text">
    <span>Created By <a href="#">Stadia.</a> | &#169; 2023 All Rights Reserved</span>
  </div>
</footer>

  <script src="js/script.js"></script>
</body>
</html>