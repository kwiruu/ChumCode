<?php    
    include 'connect.php';
    //include 'readrecords.php';   
    require_once 'includes/header.php'; 
?>
  <body>
    <div class="about-us-first-page">
        <div style="display:flex; justify-content:space-between;padding:5%; ">
            <div style="height:min-content">
                <h1 class="open-sans-bold" style="font-size:50px; margin-bottom: 9%">About ChumCode_</h1>
                <p style="margin-bottom: 9%">Come help us build the education the world deserves</p>
                <button class="button-open" style="width:40%;">Open Positions</button>
            </div>
            <div style="background-color:white; height:220px; width: 50%;">
                
            </div>
        </div>
        <div style="padding:5%; display:flex; justify-content: space-between;background-color:#10162f; color:white">
            <div style="width:48%">
                <h3 class="open-sans-bold" style="margin-bottom: 3%"> Our History</h3>
                <p style="font-size:17px">When we started ChumCode, our goal was to give anyone in the world the ability to learn the skills they’d need to succeed in the 21st century. We set out to create a new, interactive way of learning — making it engaging, flexible, and accessible for as many people as possible. Since then, we have helped millions of people worldwide unlock modern technical skills and reach their full potential through code. ✨</p>
            </div>
            <div style="width:48%">
                <h3 class="open-sans-bold" style="margin-bottom: 3%"> Our Mission</h3>
                <p style="font-size:17px">We want to create a world where anyone can build something meaningful with technology, and everyone has the learning tools, resources, and opportunities to do so. Code contains a world of possibilities — all that’s required is the curiosity and drive to learn. At ChumCode, we are committed to empowering all people, regardless of where they are in their coding journeys, to continue to learn, grow, and make an impact on the world around them.</p>
            </div>
        </div>

        <div style="padding:5%;">
                <h1 style="margin:auto;width:max-content">Our Team</h1>
                <div>
                    <div style="margin-top:4%; border:1px solid black; border-radius:20px">
                    <div class="yellow-top" style="margin-bottom:0px ; height:40px;"></div>
                    
                    <div style="display:flex; justify-content: space-between; background-color:white; padding:5%; border-radius:0px 00px 20px 20px">
                
                        <p style="width:60%; text-align:justify">Hi, I'm Mars, a sophomore Computer Science student at CIT-U with ambitions to become a full stack developer. I'm currently developing a website called ChumCode, which is a collaborative platform specifically designed for coders and programmers, inspired by the functionality of Microsoft Teams. ChumCode offers real-time collaboration features such as live code sharing, integrated version control, syntax highlighting, and debugging tools across multiple programming languages. Additionally, it includes project management features like task creation, assignment, and progress tracking through a Kanban board. With seamless integration with GitHub and strong security protocols, ChumCode is designed to be an all-in-one solution for both educational and professional coding projects, aiming to create a vibrant community where programmers can collaborate, learn, and innovate together.</p>
                        <img src="images/mars_profile.jpg" alt="mars_profile img" class="profile_img" style=" margin-top: 1%;">
                        <div style="width:12%;margin-top:5%">
                        <p class="space-mono-thin">BSCS - 2</p>
                        <h2 class="open-sans-bold">Mars Benitez</h2>
                    </div>
                    </div>
                    </div>

                    <div style="margin-top:4%; border:1px solid black; border-radius:20px">
                    <div class="yellow-top" style="margin-bottom:0px ; height:40px;"></div>
                    
                    <div style="display:flex; justify-content: space-between; background-color:white; padding:5%; border-radius:0px 00px 20px 20px">
                    <div style="width:12%;margin-top:5%">
                        <p class="space-mono-thin">BSCS - 2</p>
                        <h2 class="open-sans-bold">Keiru Cabili</h2>
                    </div>
                    <img src="images/keiru_profile.jpg" alt="mars_profile img" class="profile_img" style=" margin-top: 1%;">
                        <p style="width:60%; text-align:justify">Hi, I'm Keiru, a also sophomore Computer Science student at CIT-U, aspiring to be a full stack developer. I've been working on a website called ChumCode, a platform designed to facilitate collaborative coding and programming, similar to Microsoft Teams. ChumCode supports real-time collaboration with features like integrated version control, syntax highlighting, code linting, and debugging tools for various programming languages. It includes project management capabilities, allowing users to create tasks, assign them, and track progress via a Kanban board. With seamless GitHub integration and robust security measures, ChumCode aims to be a comprehensive tool for both learning and professional development, fostering a community where programmers can share, learn, and grow together.</p>
                        
                        
                    </div>
                    </div>
                    
                </div>
        </div>
    </div>
</body>

<?php
    require_once 'includes/footer1.php'; 
?>