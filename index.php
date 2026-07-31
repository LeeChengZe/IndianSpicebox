<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/global.css">
    <link rel="stylesheet" href="Styles/Home.css">
    <?php
        session_start();

        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT prd.*, ctgr.categoryName FROM products as prd inner join category as ctgr on prd.categoryid=ctgr.id WHERE feature = 'Y'";

        //execute the SQL statement
        $product_list = mysqli_query ( $conn, $sql_);

        // close sql connection
        mysqli_close($conn);

        ?> 
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
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="slide1 mySlides1 fade">
                    <div class="textContainer">
                        <h1 class="text">Spicebox</h1>
                        <p class="Description">All the spices you need for our delicious recipes</p>
                        <a class="hero" href="productSpicebox.php">SHOP ONLINE</a>
                    </div>
                </div>
              
                <div class="slide2 mySlides1 fade">
                    <div class="textContainer">
                        <h1 class="text">Spices</h1>
                        <p class="Description">Individual refills in beautiful silver or gold finish</p>
                        <a class="hero" href="productSpice.php">SHOP ONLINE</a>
                    </div>
                </div>
              
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
              </div> 
        </section>
        <section>
            <div class="spiceboxContainer">
                <h1 id="spiceboxHeader" class="sectionHeader">Spicebox</h1>
                <div id="detailContainer">
                      <div class="spiceboxImage"></div>

                      <div class="spiceboxDetails">
                          <p id="spiceboxDetailHeader">Details</p>
                          <p id="SpiceboxText">
                              Our Spicebox provides clean storage of your favourite India spices. In the picture on your left, it shows 9 of the most common Indian spices, which includes: Peppercorn, Cinnamon, Mustard, Coriander, Cardamom, Turmeric, Cumin, Chili, and Garam Masala. With this 9 spices, you can make some of the most amazing dishes.
                          </p>
                          <a id="viewProduct" href="products.php">VIEW PRODUCTS</a>
                      </div>
                </div>
            </div>
        </section>
        <section>
            <div class="productWrap">
                <h1 id="spiceboxHeader" class="sectionHeader">Featured Products</h1>
                <p id="showNow"><a href="products.php">Shop Now</a></p>
                <div class="featuredProducts">

                    <div class="productContainer">

                    
                    <?php While ( $one_product = mysqli_fetch_assoc($product_list)  ) { ?> 
                    
                    <div>
                        <a href="productdetails.php?id=<?php echo $one_product['id']; ?>"><img class="image" src="Images/Products/<?php echo $one_product['productPicture']; ?>" alt="P1"></a>
                        
                        <h3 class="productName"><a href="productdetails.php?id=<?php echo $one_product['id']; ?>"><?php echo $one_product['productName']; ?></a></h3>
                        <h4 class="productDescription"><?php echo $one_product['categoryName']; ?></h4>
                        <h5 class="price">Price $<?php echo number_format($one_product['unitPrice'],2); ?></h5>
                        
                        
                        <form action="insertcart.php" method="post">
                            <div id="button"><button class="shop" type="submit">Add to Cart</button></div>
                            <input type="hidden" name="pid" value="<?php echo $one_product['id']; ?>">
                            <input type="hidden" name="puprice" value="<?php echo $one_product['unitPrice']; ?>">
                        </form>
                    </div>

                    <?php }  ?>
                

                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="TestimonialWrap">
                <div class="TestimonialContentWrap">
                    <h1 id="TestimonialHeader">Testimonial</h1>
                    <p class="viewMore"><a href="Testimonial.php">View More</a></p>

                        <div class="Tslideshow">
                            <div class="TestimonialContainer fade">
                                <p class="TestimonialText">I love Indian Spicebox Spices. They’re really fresh, look beatifully package and really bring out all the flavours.</p>
                                <div class="personDetails">
                                    <p class="name">Sally Harris</p>
                                    <div class="TestimonialPerson person1"></div> 
                                </div>
                            </div>

                            <div class="TestimonialContainer fade">
                                <p class="TestimonialText"> The Cooking with Indian Spicebox book has been very easy to follow to start cooking Indian food. And my favourite is butter chicken and chai from the recipe book. It's great!</p>
                                <div class="personDetails">
                                    <p class="name">Sylvia Shyu</p>
                                    <div class="TestimonialPerson person2"></div> 
                                </div>
                            </div>

                            <a class="prev Tprev" onclick="plusSlides(-1, 1)">&#10094;</a>
                            <a class="next Tnext" onclick="plusSlides(1, 1)">&#10095;</a>
                        </div>
                </div>
            </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
    <script src="Scripts/index.js"></script>
</body>
</html>