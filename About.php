<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/About.css">
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
            <div class="aboutContainer">
            <div id="imageContainer">
                <img src="Images/About/namitaSon.jpeg" alt="namitaSon">
                <img src="Images/About/namitaChili.jpg" alt="namitaChili">
                <img src="Images/About/namitaMarket.jpg" alt="namitaMarket">
            </div>

            <h1 class="aboutUsHeader">About Us</h1>

            <div id="whyUsContainer">
                <img src="Images/About/whyUsimg.jpg" alt="whyUs">
                
                <div class="whyUs">
                    <h2 class="whyHeader">Why Us</h2>
                    <p class="whyMissionHeader Mission">Our Mission:</p>
                    <p class="whyMission Mission">To fill bellies with tasty, homemade and nutrious food</p>
                    <p class="whyUsDescription">Filling bellies is a real brand commitment. Our goal is to not only to fill you, your family and loved ones’ bellies with wholesome and flavorful food but to really make a difference to the hungry bellies out there that we can fill with nourishing and wholesome food!</p>
                </div>
            </div>

            <div id="storyContainer">
                
                <div class="story">
                    <h2 class="storyHeader">Story</h2>
                    <p class="storyDescription storyDescriptionTop">People don’t think of Indian food as something you can easily make at home . . . the general impression is that Indian cooking is too complicated and time-consuming. Indian food also has the unfortunate reputation of being unhealthy, heavy, and overly spicy.</p>
                    <p class="storyDescription">Namita wanted to change these preconceptions when she started the Indian Spicebox page on Facebook in February 2010. The page gained speed and started a global conversation about homemade Indian food, favorite dishes and recipes, the benefits of spices, and the deep connection between food and the Indian culture. Since its inception, the Indian Spicebox community has grown to well over 50,000 fans and is the inspiration for the cookbook and spicebox product! You no longer need to be intimidated by Indian food and spices! Spices are your friends!</p>
                </div>
                <img src="Images/About/namitaHerbs.jpg" alt="namitaHerbs">
            </div>

            <div id="namitaContainer">
                <img src="Images/About/namitaFamily.jpg" alt="namitaFamily">

                <div class="aboutNamita">
                    <h2 class="NamitaHeader">About Namita Moolani Mehra</h2><br>
                    <p>Namita Moolani Mehra is food and family obsessed. She spends her time cooking, teaching, writing and growing her own company while chasing her two little kids around the apartment.</p><br>
                    <p>Namita has been a creative marketing strategist through her career, from working on Madison Avenue as a Planner to spending 5 years at Facebook in both Manhattan and Singapore. A lifelong foodie and third culture kid, Namita quit a successful corporate career to launch Indian Spicebox, inspired by a vision to fill bellies with nutritious and delicious Indian food, while giving back to children in need. She has published a cookbook and two children’s books. Her recent one, Superfoods For Superheroes is published by Harper Collins and filled with gorgeous illustrations of fun food stories for children. The Magic Spicebox, also a children’s cookbook and storybook, is published and distributed by Scholastic in India, Asia and recently released in the UK. Namita also writes for Sassy Mama (Singapore), Michelin Guide (Singapore, lifestyle), the Finder (Singapore), and the Huffington Post. She is an advocate for healthy, homemade cooking and the benefits of spices.</p><br>
                    <p>Indian Spicebox is focused on making Indian cooking more accessible to busy families looking for new and healthy meal ideas. In just a few years, the company has sold thousands of Spicebox Kits around the world and each kit contributes to hot meals in India via a charity partnership. The company has provided over 250,000 plates of food for underprivileged children in India.</p><br>
                    <p>Namita was born in a remote village in Nigeria, grew up in the UK and India, studied in Chicago, and worked in New York for over a decade. She currently lives in Singapore with her husband and two children. She holds an MS in integrated marketing communications from the Medill School of Journalism at Northwestern.</p>
                    <a href="products.php" class="shop">Shop Online</a>
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