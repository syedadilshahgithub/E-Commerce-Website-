<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Amazon</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo border">
                <div class="logo"></div>
            </div>
            <div class="nav-address border">
                <p class="add-first">Deliver to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-plane"></i>
                    <p class="add-sec">Pakistan</p>
                </div>
            </div>

            <div class="nav-search">
                <select class="search-select border">
                    <option>ALL</option>
                    <option>New</option>
                    <option>Old</option>
                    <option>Leter</option>
                    <option>Sale</option>
                </select>
                <input placeholder="Search Amazon Pakistan" class="search-input">
                <div class="search-icon border">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="nav-signin border">
                <p><span><a href = "login.php">Hello, sign in</a></span></p>
                <p class="nav-second"><a href="login.html">Account & Lists</a></p>
            </div>
            <div class="nav-return border">
                <p><span>Returns</span></p>
                <p class="nav-second">& Orders</p>
            </div>
            <div class="nav-cart border">
                <i class="fa-solid fa-cart-shopping"></i>
                Cart
            </div>
        </div>
        <div class="panel">
            <div class="panel-all ">
                <i class="fa-solid fa-bars">
                    <select class="all-option border" style="color: white;">
                        <option>ALL</option>
                        <option>Cloths</option>
                        <option>Phones</option>        
                        <option>Cosmetics</option>   
                        <option>Sports</option>    
                        <option>Electronic</option>
                    </select>
                </i>
            </div>
            <div class="panel-option">
                <p>Today's Deal</p>
                <p>Customer Service</p>
                <p>Gift Card</p>
                <p>Control Panel</p>
                <p>Registry</p>
            </div>
            <div class="panel-deals border">
                Shop Deals in Electronics
            </div>
        </div>
    </header>
    <div class="hero-section">
        <div class="hero-msg">
            <p>You are on amazon clone. You canot buy anyitem from this becuase it is only Frontend project made by Syed Adil Shah.<a href="https://www.amazon.com/">  Click here to go amazon.in</a> </p>
        </div>
    </div>
    <div class="shop-section">
        <div class= "box">
            <div class="box-content">
                <h3>Cloths</h3>
                <div class="box-img" style="background-image: url('box1_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=Dresses&_encoding=UTF8&content-id=amzn1.sym.0033b16a-ef9c-4f2b-9d5e-ec6e0a462018&crid=1PW0S93CC85GY&pd_rd_r=1ef125f3-0bee-46f6-9e99-736f3a959378&pd_rd_w=4fOfF&pd_rd_wg=5y4ip&pf_rd_p=0033b16a-ef9c-4f2b-9d5e-ec6e0a462018&pf_rd_r=P113EE7S9ZBNQP3R51MR&sprefix=dresses%2Caps%2C146&ref=pd_gw_unk" >See more</a></p>
            </div>
        </div>
        <div class= "box">
            <div class="box-content">
                <h3>Health & Personal Care</h3>
                <div class="box-img" style="background-image: url('box2_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Dhpc-intl-ship&field-keywords=&crid=50NSJDVSQPID&sprefix=%2Chpc-intl-ship%2C429">See more</a></p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Furniture</h3>
                <div class="box-img" style="background-image: url('box3_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=furniture&crid=2O1GSQ6GZSV6T&sprefix=furniture%2Caps%2C586&ref=nb_sb_ss_ts-doa-p_1_9">See more</a></p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Electronics</h3>
                <div class="box-img" style="background-image: url('box4_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=electronics&_encoding=UTF8&content-id=amzn1.sym.034c9197-7ee7-454e-a68b-d44ea79bb647&pd_rd_r=1ef125f3-0bee-46f6-9e99-736f3a959378&pd_rd_w=MNnPz&pd_rd_wg=5y4ip&pf_rd_p=034c9197-7ee7-454e-a68b-d44ea79bb647&pf_rd_r=P113EE7S9ZBNQP3R51MR&ref=pd_gw_unk" >See more</a></p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Beauty Picks</h3>
                <div class="box-img" style="background-image: url('box5_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=beauty+products&i=beauty-intl-ship&crid=W9VHXW929NG9&sprefix=be%2Cbeauty-intl-ship%2C445&ref=nb_sb_ss_ts-doa-p_3_2">See more</a></p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Pet's Food</h3>
                <div class="box-img" style="background-image: url('box6_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=pet+food&crid=1DGVMBS5ECVK7&sprefix=pet+foo%2Caps%2C488&ref=nb_sb_noss_2">See more</a></p>
            </div>
        </div>
        <div class= "box">
            <div class="box-content">
                <h3>New Arrival in Toy</h3>
                <div class="box-img" style="background-image: url('box7_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=toys&crid=2RW9IT4812K9X&sprefix=toys%2Caps%2C366&ref=nb_sb_noss_1">See more</a></p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h3>Fation Tree</h3>
                <div class="box-img" style="background-image: url('box8_image.jpg');"></div>
                <p><a href = "https://www.amazon.com/s?k=fashion+mens&crid=4G66T8K7B85N&sprefix=fashion+men%2Caps%2C297&ref=nb_sb_noss_1">See more</a></p>
            </div>
         </div>
    </div>
    <footer>
        <div class="foot-panel1">
            Back to Top
        </div>
        <div class="foot-panel2">
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Make Money with Us</p>
                <a>Sell products on Amazon</a>
                <a>Sell on Amazon Business</a>
                <a>Sell apps on Amazon</a>
                <a>Become an Affiliate</a>
                <a>Advertise Your Products</a>
                <a>Self-Publish with Us</a>
            </ul>
            <ul>
                <p>Amazon Payment Products</p>
                <a>Amazon Business Card</a>
                <a>Shop with Points</a>
                <a>Reload Your Balance</a>
                <a>Amazon Currency Converter</a>
            </ul>
            <ul>
                <p>Let Us Help You</p>
                <a>Amazon and COVID-19</a>
                <a>Your Account</a>
                <a>Your Orders</a>
                <a>Shipping Rates & Policies</a>
                <a>Returns & Replacements</a>
                <a>Manage Your Content and Devices</a>
                <a>Amazon Assistant</a>
                <a>Help</a>
            </ul>
        </div>
        <div class="foot-panel3">
            <div class="logo"></div>
        </div>
        <div class="foot-panel4">
            <div class="page">
                <a>Conditions of Use</a>
                <a>Privacy Notice</a>
                <a>Your Ads Privacy Choices</a>
            </div>
            <div class="copywrite">
                © 1996-2024, Amazon.com, Inc. or its affiliates
            </div>
        </div>
    </footer>
</body>
</html>







