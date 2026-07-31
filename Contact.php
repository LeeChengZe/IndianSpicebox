<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/contactUs.css">
</head>
<body>
    <div class="Container">
        <div class="topRectange"></div>

        <form action="process.php" method="post">
            <input type="search" id="searchBar" placeholder="Search">
        </form>

        <div id="memberCart">
            <div class="memberContainer iconContainer">
                <a href="dashboard.php"><img class="icons" src="Images/Icons/Member.png" alt="memberIcon"></a>
                <a href="dashboard.php">Membership</a>
            </div>
            <div class="cartContainer iconContainer">
                <a href="showcart.php"><img class="icons" src="Images/Icons/Cart.png" alt="cartIcon"></a>
                <a href="showcart.php">Cart</a>
            </div>
        </div>
        
        <header>
            <?php require("header.php") ?>
        </header>

        <section>
            <div id="contactContainer">
                <h1 class="Header">Contact Us</h1>
                <div class="topContainer">
                <div class="emailAdress">
                    <div class="emailContainer">
                        <h3 class="emailHeader title">Email: </h3>
                        <p class="email">Info@indian-spicebox.com</p>
                    </div>
<hr>
                    <div class="addressContainer">
                        <h3 class="addressHeader title">Address: </h3>
                        <ul class="location">
                            <li>1 St Andrew's Rd, Singapore 178957</li>
                            <li>Block 9 Dempsey Rd, #01-12, Singapore 247697</li>
                            <li>250 Orchard Rd, Singapore 238905</li>
                            <li>501 Bukit Timah Rd, #01-05B, Singapore 259764</li>
                        </ul>
                    </div>
                </div>
                
                    <div class="sendMessage">
                        
                        <form action="savecontact.php" class="messageForm" method="post">
                            <h1 class="messageHeader title">Send Message</h1>
                            <p><label for="name">Name: </label></p>
                            <input type="text" name="uname" class="uname text" placeholder="Please enter your name" required><br>

                            <p><label for="email">Email: </label></p>
                            <input type="email" name="uemail" class="uemail text" placeholder="Please enter your email" required><br>

                            <p><label for="message">Message: </label></p>
                            <textarea name="message" class="message text" cols="30" rows="5" placeholder="Please enter your message" required></textarea><br>
                            
                            <input type="submit" value="Send" class="send">

                            <?php
                            $status = isset($_GET['status'])?$_GET['status']:"NA";

                            if ($status == "1")
                            {
                                echo "Message Submited";
                            }
                            else if ($status == "2")
                            {
                                echo "Failed to submit message";
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
            <div class="mapContainer">
                <h1 class="Header">Maps</h1>
            

            <div class="mapWrap">
            
                <div class="NationGallery map">
                    <h2 class="located">1 St Andrew's Rd, Singapore 178957</h2>
                    <iframe class="googleMaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8067683952236!2d103.849328014754!3d1.2902216990589594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19a747de0c15%3A0xe5639e25fabece80!2sNational%20Gallery%20Singapore!5e0!3m2!1sen!2ssg!4v1628588217560!5m2!1sen!2ssg" style="border:0;" loading="lazy"></iframe>
                </div>
            
                <div class="DemspseyProject map">
                    <h2 class="located">Block 9 Dempsey Rd, #01-12, Singapore 247697</h2>
                    <iframe class="googleMaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.785607110932!2d103.80763781475396!3d1.3036478990491767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1b965382b3b9%3A0x8e3e3b4af7b492c4!2sThe%20Dempsey%20Project!5e0!3m2!1sen!2ssg!4v1628588639270!5m2!1sen!2ssg" style="border:0;" loading="lazy"></iframe>
                </div>
        
                <div class="Orchard map">
                    <h2 class="located">250 Orchard Rd, Singapore 238905</h2>
                    <iframe class="googleMaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.788198783577!2d103.83569761475394!3d1.3020109990503692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1991407459dd%3A0xf37792a225453d44!2sDesign%20Orchard!5e0!3m2!1sen!2ssg!4v1628597872008!5m2!1sen!2ssg" style="border:0;" loading="lazy"></iframe>
                </div>
            
                <div class="Fishwives map">
                    <h2 class="located">501 Bukit Timah Rd, #01-05B, Singapore 259764</h2>
                    <iframe class="googleMaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.755078236601!2d103.81196461475399!3d1.3227774990352357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1a0696b9c1cd%3A0xacde67a3b467bcb!2sThe%20Fishwives!5e0!3m2!1sen!2ssg!4v1628598143456!5m2!1sen!2ssg" style="border:0;" loading="lazy"></iframe>
                </div>
            </div>
            </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
</body>
</html>