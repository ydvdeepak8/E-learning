<?php
session_start();

if (!isset($_SESSION['user_name'])) {
  // Redirect to login page or show an error if the user is not logged in
  header("Location:success_page.php");
  exit();
}

$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="\Users\divya\AppData\Local\Temp\Rar$DIa14488.3102\bootstrap.min.css">
  <!-- 
    - primary meta tags
  -->
  <title>SAGE</title>
  <meta name="title" content="BookHaven - Unlock Worlds,One Page at a Time">
  <meta name="description" content=Unlock Worlds,One Page at a Time The Result Of Perfection. - Lorem ipsum dolor sit,
    amet consectetur adipisicing elit. Ad harum quibusdam, assumenda quia explicabo.">
  <script src="https://kit.fontawesome.com/5e4704218b.js" crossorigin="anonymous"></script>
  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet">

  <!-- 
    - preload image
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
  <link rel="stylesheet" href="perm.css">

  <style>
    <style>

    /* Carousel section */
    .hero-carousel {
      margin: 0 auto;
      /* Center the carousel within its container */
      position: relative;
      margin-left: -100px;
      width: 1100px;
      height: 100vh;
      /* Make the section full height of the viewport */
      background: url('./assets/images/hero-banner.png') no-repeat center center/cover;
      /* Background image */
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .carousel-container {
      padding: 25px;
      width: 100vw;
      /* Full viewport width */
      position: relative;
      margin-left: -130px;
      background-color: rgba(255, 255, 255, 0.8);
      /* Smoky white background */

    }



    .carousel {

      display: flex;
      transition: transform 0.5s ease-in-out;
      width: 100%;
      /* Make sure carousel uses the full width of the container */
      align-items: center;
      /* Center items vertically */
    }

    .carousel-item {
      flex: 0 0 100%;
      /* Full width of the viewport */
      box-sizing: border-box;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      /* Slightly transparent background */
      border: 1px solid #ddd;
      text-align: center;
      font-size: 1.2rem;
      border-radius: 8px;
      height: 500px;
      position: relative;
      /* Make the item a positioning context for the overlay */
      display: flex;
      /* Use flex to center content within each item */
      align-items: center;
      /* Center content vertically */
      justify-content: center;
      /* Center content horizontally */
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Ensure images cover the card without distortion */
      border-radius: 8px;
    }

    .carousel-content {
      position: absolute;
      top: 50%;
      left: 30%;
      /* Center horizontally */
      transform: translate(-50%, -50%);
      /* Center vertically and horizontally */
      color: #fff;
      /* White text color */
      text-align: center;
      /* Center text within the content */
      z-index: 2;
      /* Ensure content is above the image */
      background: rgba(0, 0, 0, 0.5);
      /* Semi-transparent background for better readability */
      padding: 20px;
      border-radius: 8px;

      width: 350px;
      /* Set a fixed width or adjust as needed */
    }

    .carousel-content h2 {
      font-size: 2rem;
      /* Increased font size */
      margin: 0;
    }

    .carousel-content p {
      font-size: 1.2rem;
      /* Increased font size */
      margin: 10px 0;
    }

    .carousel-content a {
      display: block;
      /* Makes button take full width of container */
      margin: 20px auto 0;
      /* Centers button horizontally and adds top margin */
      padding: 10px 20px;
      background-color: #007bff;
      /* Button color */
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      text-align: center;
      /* Center text within button */
    }

    /* Carousel Controls */
    .carousel-control {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      font-size: 2rem;
      cursor: pointer;
      padding: 0.5rem;
      z-index: 1000;
    }

    .carousel-control.left-control {
      left: 20px;
      /* Position the left button 20px from the left edge */
    }

    .carousel-control.right-control {
      right: 20px;
      /* Position the right button 20px from the right edge */
    }

    .icon-link {
      position: relative;
      /* Make the icon link a positioning context */
      display: inline-block;
      /* Ensure the popup is correctly positioned */
    }

    .user-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      cursor: pointer;
      /* Change cursor to pointer for better UX */
    }

    .email-popup {
      display: none;
      /* Hidden by default */
      position: absolute;
      /* Positioned relative to the .icon-link */
      top: 100%;
      /* Position below the icon */
      left: 1000px;
      /* Align with the left edge of the icon */
      background-color: white;
      /* Background color for the popup */
      border: 1px solid #ddd;
      /* Border around the popup */
      padding: 10px;
      /* Padding inside the popup */
      width: 200px;
      /* Fixed width for the popup */
      z-index: 1000;
      /* Ensure the popup is on top */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* Subtle shadow */
      border-radius: 4px;
      /* Rounded corners */
    }

    .email-popup p {
      margin: 0;
      padding: 5px 0;
    }

    .logout-link {
      display: block;
      /* Makes logout link take full width */
      margin-top: 10px;
      /* Space above the logout link */
      color: #ff4c4c;
      /* Color for the logout link */
      text-decoration: none;
      /* Remove underline */
      font-weight: bold;
      /* Bold text for logout */
    }

    .logout-link:hover {
      text-decoration: underline;
      /* Underline on hover for better UX */
    }
  </style>

  </style>
</head>
<script src="https://kit.fontawesome.com/5e4704218b.js" crossorigin="anonymous"></script>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">



      <nav class="navbar" data-navbar>
        <a href="#" class="logo">
          <img src="SAGE_-removebg-preview-removebg-preview.png" alt="SAGE Logo" class="logo-img">
          <!-- Replace with actual logo image path -->
          <span class="logo-name">SAGE</span>
        </a>

        <form class="search-form" onsubmit="openCoursePage(event)">
          <input type="text" class="search-input" name="query" placeholder="Search for a course" required>
          <button type="submit" class="search-button">Search</button>
        </form>

        <script>
          function openCoursePage(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the search query
            const searchInput = document.querySelector('.search-input').value.trim();

            if (searchInput) {
              // Encode the query for URL safety and open in a new tab
              const encodedQuery = encodeURIComponent(searchInput);
              window.open(`course-details.php?course=${encodedQuery}`, '_blank');
            }
          }
        </script>


        <ul class="navbar-list">
          <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>
          <li class="navbar-item">
            <a href="recom.php" class="navbar-link" data-nav-link>Contribution</a>
          </li>
          <li class="navbar-item">
            <a href="#achievement" class="navbar-link" data-nav-link>My learning</a>
          </li>
        </ul>

        <div class="navbar-icons">
          <a href="#" class="icon-link" aria-label="Add to Cart">
            <i class="fas fa-shopping-cart"></i>
          </a>

          <a href="#" class="icon-link" aria-label="Notifications">
            <i class="fas fa-bell"></i>
          </a>


          <a href="#" class="icon-link" aria-label="User Profile" id="userProfileLink">
            <img src="user-removebg-preview.png" alt="User Profile" class="user-icon">
            <div id="userEmail" class="email-popup">
              <p>Welcome, <?php echo $user_name; ?>!</p>
              <a href="logout.php" class="logout-link">Logout</a>
            </div>
          </a>
          <script>
            document.getElementById('userProfileLink').addEventListener('click', function (event) {
              event.preventDefault(); // Prevent the default action of the link

              const userEmailPopup = document.getElementById('userEmail');
              if (userEmailPopup.style.display === 'none' || userEmailPopup.style.display === '') {
                userEmailPopup.style.display = 'block'; // Show the popup
              } else {
                userEmailPopup.style.display = 'none'; // Hide the popup
              }
            });
          </script>


        </div>


        <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
          <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>
          <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
        </button>
      </nav>



      <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>

        <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
      </button>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="home">
        <div class="container">
          <!-- Carousel section -->
          <section class="hero-carousel">
            <div class="carousel-container">
              <div class="carousel">
                <!-- Carousel Item 1 -->
                <div class="carousel-item">
                  <img src="542775ce-985d-4103-8f86-1bfc28afb29d.jpg" alt="Card 1">
                  <div class="carousel-content">
                    <h2>Welcome to SAGE</h2>
                    <p>Explore a world of knowledge and new learning.</p>
                    <a href="#achievement">Learn More</a>
                  </div>
                </div>

                <!-- Carousel Item 2 -->
                <div class="carousel-item">
                  <img src="card2.jpg" alt="Card 2">
                  <div class="carousel-content">
                    <h2></h2>
                    <p>Contribute by sharing your notes with us!</p>
                    <a href="recom.php">Learn More</a>
                  </div>
                </div>

                <!-- Carousel Item 3 -->
                <div class="carousel-item">
                  <img src="Screenshot 2024-09-06 124803.jpg" alt="Card 3">
                  <div class="carousel-content">
                    <h2></h2>
                    <p>Earn a certificate upon completing the courses.</p>
                    <a href="new.html">Learn More</a>
                  </div>
                </div>
              </div>

              <!-- Left Control Button -->
              <button class="carousel-control left-control">&#9664;</button>

              <!-- Right Control Button -->
              <button class="carousel-control right-control">&#9654;</button>

            </div>
          </section>
          <script>
            const carousel = document.querySelector('.carousel');
            const leftControl = document.querySelector('.left-control');
            const rightControl = document.querySelector('.right-control');

            let currentIndex = 0;
            const totalItems = carousel.children.length;

            // Function to update the carousel position
            function updateCarousel() {
              const translateXValue = -currentIndex * 100; // Move by 100% for each slide
              carousel.style.transform = `translateX(${translateXValue}%)`;
            }

            // Click event for the right control button
            rightControl.addEventListener('click', () => {
              moveToNextSlide();
            });

            // Click event for the left control button
            leftControl.addEventListener('click', () => {
              moveToPreviousSlide();
            });

            // Move to the next slide
            function moveToNextSlide() {
              if (currentIndex < totalItems - 1) {
                currentIndex++;
              } else {
                currentIndex = 0; // Go back to the first slide after the last slide
              }
              updateCarousel();
            }

            // Move to the previous slide
            function moveToPreviousSlide() {
              if (currentIndex > 0) {
                currentIndex--;
              } else {
                currentIndex = totalItems - 1; // Go to the last slide if we're at the first one
              }
              updateCarousel();
            }

            // Auto-play functionality (carousel slides every 5 seconds)
            const autoPlayInterval = 3000; // 5000 milliseconds = 5 seconds
            setInterval(() => {
              moveToNextSlide(); // Automatically move to the next slide
            }, autoPlayInterval);

          </script>

        </div>
      </section>









      <!-- 
        - #BENEFITS
      -->

      <section class="section benefits" id="benefits" aria-label="benefits">
        <div class="container">

          <div class="grid-list">

            <li class="benefits-content">
              <h2 class="h2 section-title">What you'll achieve by this platform</h2>

              <p class="section-text">You will gain a deep understanding of various learning aspects within your field.
              </p>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="/E-BOOK/benefits-1.svg" width="40" height="40" loading="lazy" alt="Experience">
                </div>

                <h3 class="h3 card-title">Experience</h3>

                <p class="card-text">
                  E-learning offers a flexible and personalized learning experience, allowing learners to access
                  materials anytime, anywhere.
                </p>

                <a href="#" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="/E-BOOK/benefits-2.svg" width="40" height="40" loading="lazy" alt="Motivation">
                </div>

                <h3 class="h3 card-title">Motivation</h3>

                <p class="card-text">
                  E-learning fosters motivation by offering flexibility and personalized learning experiences. Learners
                  can tailor their studies to fit their schedules and preferences
                </p>

                <a href="#" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="/E-BOOK/benefits-3.svg" width="40" height="40" loading="lazy" alt="Goals">
                </div>

                <h3 class="h3 card-title">Goals</h3>

                <p class="card-text">
                  E-learning supports goal achievement by providing flexible, self-paced learning opportunities.
                  Learners can set personal objectives .
                </p>

                <a href="#" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="/E-BOOK/benefits-4.svg" width="40" height="40" loading="lazy" alt="Vision">
                </div>

                <h3 class="h3 card-title">Vision</h3>

                <p class="card-text">
                  E-learning aligns with a forward-thinking vision by embracing technology to create accessible and
                  innovative learning environments
                </p>

                <a href="#" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="/E-BOOK/benefits-5.svg" width="40" height="40" loading="lazy" alt="Mission">
                </div>

                <h3 class="h3 card-title">Mission</h3>

                <p class="card-text">
                  E-learning advances the mission of making education accessible and effective for everyone. It provides
                  a flexible, inclusive platform that reaches learners
                </p>

                <a href="#" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="/E-BOOK/benefits-6.svg" width="40" height="40" loading="lazy" alt="Strategy">
                </div>

                <h3 class="h3 card-title">Strategy</h3>

                <p class="card-text">
                  E-learning supports strategic educational goals by leveraging technology to deliver targeted, scalable
                  learning solutions
                </p>

                <a href="#" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

          </div>

        </div>
      </section>





      <!-- 
        - #CHAPTERS
      -->







      <!-- 
        - #PREVIEW
      -->







      <!-- 
        - #PRICING
      -->







      <!-- 
        - #AUTHOR
      -->




      <!-- 
  - #ACHIEVEMENT
-->

      <section class="section achievement" id="achievement" aria-label="achievement">
        <div class="bgmi">
          <div class="container">
            <p class="section-subtitle" style="font-size: 24px; padding: 20px;">Get Started with Free Programming
              Courses</p>

            <div class="sr">
              <section class="course-categories-container"
                style="display: flex; align-items: center; overflow: hidden;">
                <div class="course-categories"
                  style="display: flex; gap: 20px; overflow-x: auto; white-space: nowrap; padding: 10px; scroll-behavior: smooth;">
                  <div class="category" data-category="software-engineering" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Software Engineering</div>
                  </div>

                  <div class="category" data-category="data-science" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Data Science</div>
                  </div>

                  <div class="category" data-category="cloud-computing" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Cloud Computing</div>
                  </div>

                  <div class="category" data-category="designs" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Designs</div>
                  </div>

                  <div class="category" data-category="marketing" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Marketing</div>
                  </div>

                  <div class="category" data-category="videography" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Videography</div>
                  </div>

                  <div class="category" data-category="development" tabindex="0" role="button"
                    style="display: inline-flex; flex-direction: column; align-items: center; cursor: pointer; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9; transition: background-color 0.3s, box-shadow 0.3s; min-width: 200px; outline: none;">
                    <svg class="icon" fill="currentColor" width="24" height="24" viewBox="0 0 32 32"
                      style="margin-right: 1rem; width: 32px; height: 32px;">
                      <!-- SVG content -->
                    </svg>
                    <div class="name" style="font-size: 18px; font-weight: 500;">Development</div>
                  </div>
                </div>
              </section>

              <!-- Placeholder for carousel -->
              <div id="course-carousel-container" style="display: none; padding: 20px;">
                <!-- Course carousel will be injected here -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        const categories = document.querySelectorAll('.category');
        const carouselContainer = document.getElementById('course-carousel-container');

        // Dummy card data for each category, with images and prices
        const categoryCourses = {
          'software-engineering': [
            { title: 'Intro to Software Engineering', image: '20945227.jpg', wishlist: false },
            { title: 'Advanced Algorithms', image: '7090544.jpg', wishlist: false },
            { title: 'Object-Oriented Programming', image: '369033-PBDN85-563.jpg', wishlist: false },
            { title: 'Data Structures & Algo.', image: '1033.jpg', wishlist: false },
            { title: 'Software Design Patterns', image: '3699.jpg', wishlist: false }
          ],
          'data-science': [
            { title: 'Data Science 101', image: 'data.jpg' },
            { title: 'Machine Learning', image: 'https://via.placeholder.com/150' },
            { title: 'Deep Learning', image: 'https://via.placeholder.com/150' },
            { title: 'Big Data', image: 'big_data.jpg' },
            { title: 'Data Visualization', image: 'https://via.placeholder.com/150', }
          ],
          'cloud-computing': [
            { title: 'Cloud Computing Basics', image: 'https://via.placeholder.com/150' },
            { title: 'AWS for Beginners', image: 'https://via.placeholder.com/150' },
            { title: 'Deep Learning', image: 'https://via.placeholder.com/150' },
            { title: 'Google Cloud Platform', image: 'https://via.placeholder.com/150' },
            { title: 'Azure Essentials', image: 'https://via.placeholder.com/150', }
          ],
          'designs': [
            { title: 'Graphic Design', image: 'https://via.placeholder.com/150' },
            { title: 'UI/UX Fundamentals', image: 'https://via.placeholder.com/150' },
            { title: 'Product Design', image: 'https://via.placeholder.com/150' },
            { title: 'Web Design', image: 'https://via.placeholder.com/150' },
            { title: 'Mobile App Design', image: 'https://via.placeholder.com/150', }
          ],
          'marketing': [
            { title: 'Marketing Strategies', image: 'https://via.placeholder.com/150' },
            { title: 'Social Media Marketing', image: 'https://via.placeholder.com/150' },
            { title: 'Product Design', image: 'https://via.placeholder.com/150' },
            { title: 'Content Marketing', image: 'https://via.placeholder.com/150' },
            { title: 'Email Marketing', image: 'https://via.placeholder.com/150', }
          ],
          'videography': [
            { title: 'Video Production Basics', image: 'https://via.placeholder.com/150' },
            { title: 'Filmmaking', image: 'https://via.placeholder.com/150' },
            { title: 'Video Editing', image: 'https://via.placeholder.com/150' },
            { title: 'Color Grading', image: 'https://via.placeholder.com/150' },
            { title: 'Sound Design', image: 'https://via.placeholder.com/150' }
          ],
          'development': [
            { title: 'Full Stack Development', image: 'https://via.placeholder.com/150' },
            { title: 'Frontend Development', image: 'https://via.placeholder.com/150' },
            { title: 'Backend Development', image: 'https://via.placeholder.com/150' },
            { title: 'Web Development', image: 'https://via.placeholder.com/150' },
            { title: 'Mobile App Development', image: 'https://via.placeholder.com/150' }
          ],
          // Add other categories similarly...
        };

        // Function to render the carousel for a selected category

        // Function to render the carousel for a selected category
        function renderCarousel(category) {
          const courseList = categoryCourses[category];
          let carouselHTML = '<div style="display: flex; gap: 20px; overflow-x: auto; padding: 10px;">';

          courseList.forEach(course => {
            carouselHTML += `
        <div class="course-card" style="border: 1px solid #333; background-color: #fff; padding: 15px; width: 250px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.1);">
          <img src="${course.image}" alt="${course.title}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
          <h3 style="font-size: 1.2em; margin: 10px 0;">${course.title}</h3>
          <p style="color: #777; font-size: 0.9em;">Learn more about ${course.title}</p>
         
        <div style="display: flex; justify-content: center; align-items: center;"> 
  <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">
    Enroll Now
  </button>
</div>

        </div>
      `;
          });

          carouselHTML += '</div>';
          carouselContainer.innerHTML = carouselHTML;
          carouselContainer.style.display = 'block'; // Show the carousel
        }


        // Add click event listeners to categories
        categories.forEach(categoryElement => {
          categoryElement.addEventListener('click', () => {
            const category = categoryElement.getAttribute('data-category');
            renderCarousel(category);
          });
        });
        function renderCarousel(category) {
          const courseList = categoryCourses[category];
          let carouselHTML = '<div style="display: flex; gap: 20px; overflow-x: auto; padding: 10px;">';

          courseList.forEach(course => {
            carouselHTML += `
            <div class="course-card" style="border: 1px solid #333; background-color: #fff; padding: 15px; width: 250px; text-align: center; box-shadow: 0px 4px 8px rgba(0,0,0,0.1);">
                <img src="${course.image}" alt="${course.title}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
                <h3 style="font-size: 1.2em; margin: 10px 0;">${course.title}</h3>
                <p style="color: #777; font-size: 0.9em;">Learn more about ${course.title}</p>
               
                <div style="display: flex; justify-content: center; align-items: center;"> 
                    <button onclick="window.open('course-details.php?course=${encodeURIComponent(course.title)}', '_blank');" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">
                        Enroll Now
                    </button>
                </div>
            </div>
        `;
          });

          carouselHTML += '</div>';
          carouselContainer.innerHTML = carouselHTML;
          carouselContainer.style.display = 'block'; // Show the carousel
        }



      </script>






      <!-- 
        - #CONTACT
      -->











      <!-- 
    - custom js link
  -->
      <script src="./assets/js/script.js" defer></script>

      <!-- 
    - ionicon link
  -->
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>