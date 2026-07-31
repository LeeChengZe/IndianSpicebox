# Spicebox 🌶️

A dynamic, PHP-based e-commerce web application developed for the EG204 Web Design and Development (WDD) module. 

## 📖 Project Overview
Spicebox is an online storefront dedicated to selling authentic spices, custom blends, and recipe kits. The project demonstrates full-stack web development fundamentals, featuring user authentication, product cataloging, secure shopping cart management, and user profiles.

## ✨ Key Features
*   **User Authentication:** Secure login, registration, and password recovery (`login.php`, `checklogin.php`, `forgetpass.php`).
*   **User Dashboard:** Personalized user area to view and edit profile details (`dashboard.php`, `editprof.php`).
*   **Shopping Cart:** Dynamic cart management allowing users to add, review, and remove items (`insertcart.php`, `deletecart.php`).
*   **Checkout & Order Processing:** Streamlined checkout flow for finalizing purchases (`checkout.php`, `cclOrder.php`).
*   **Product Showcase:** Visual catalog of spices, herbs, and recipe inspirations.

## 🛠️ Technologies Used
*   **Backend:** PHP
*   **Frontend:** HTML5, CSS3, JavaScript
*   **Database:** MySQL (Assumed for cart and user data management)
*   **Environment:** Configured for local testing (includes `.vscode/launch.json`)

## 📂 Project Structure
```text
IndianSpicebox
│
├── index.php                 # Main landing page
├── About.php                 # About us page
├── Contact.php               # Contact information and form
├── dashboard.php             # User account dashboard
├── editprof.php              # Edit user profile details
│
├── login.php                 # Login interface
├── checklogin.php            # Login authentication logic
├── forgetpass.php            # Password recovery
│
├── insertcart.php            # Add items to shopping cart
├── deletecart.php            # Remove items from shopping cart
├── checkout.php              # Checkout interface
├── cclOrder.php              # Order processing logic
│
├── header.php                # Global site header
├── Footer.php                # Global site footer
├── acknowledgement.html      # Project acknowledgements
│
├── Fonts/                    # Custom web fonts (e.g., Calibri, Myriad Pro)
├── Images/                   # Image assets
│   ├── About/                # Images for the About page
│   ├── Arrows/               # UI navigation assets
│   ├── Banners/              # Site banners and promotional images
│   ├── Icons/                # UI icons (Cart, Social Media, etc.)
│   ├── Products/             # Product photography (Spices, Blends)
│   ├── Recipe/               # Recipe imagery
│   └── Testimonial/          # User testimonial avatars
│
└── Login_Register/           # Additional auth assets (includes SpiceboxVideo.mp4)
