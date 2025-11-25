<?php
// Get current path for active link highlighting
$current_path = trim($_SERVER['REQUEST_URI'], '/');
$base_path = trim(BASE_PATH, '/');
$relative_path = str_replace($base_path, '', $current_path);
$relative_path = trim($relative_path, '/');

// Determine active page
$is_home = $relative_path === '' || $relative_path === 'index.php';
$is_products = strpos($relative_path, 'products') === 0 || strpos($relative_path, 'product/') === 0;
$is_about = $relative_path === 'about';
$is_services = $relative_path === 'services';
$is_contact = $relative_path === 'contact';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo defined('PAGE_TITLE') ? PAGE_TITLE . ' - ' : ''; ?><?= COMPANY_NAME ?></title>
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
    
    <style>
    /* Modern Minimalist Header */
    :root {
        --primary: #2a4b2c;
        --primary-light: #3a6b3c;
        --accent: #d4af37;
        --neutral: #f5f1e8;
        --text: #2c2c2c;
        --text-light: #5a5a5a;
        --white: #ffffff;
        --shadow: rgba(0, 0, 0, 0.08);
    }

    .header {
        background: var(--white);
        border-bottom: 1px solid rgba(42, 75, 44, 0.1);
        backdrop-filter: blur(10px);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .header.scrolled {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 4px 20px var(--shadow);
    }

    .header .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .logo:hover {
        transform: translateY(-1px);
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.2rem;
        box-shadow: 0 4px 12px rgba(42, 75, 44, 0.2);
    }

    .logo-text h1 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        letter-spacing: -0.02em;
        line-height: 1.2;
    }

    .logo-text p {
        margin: 0;
        font-size: 0.8rem;
        color: var(--text-light);
        font-weight: 400;
        letter-spacing: 0.5px;
    }

    .nav ul {
        list-style: none;
        display: flex;
        gap: 1.5rem;
        margin: 0;
        padding: 0;
    }

    .nav a {
        color: var(--text);
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        position: relative;
        font-size: 0.95rem;
    }

    .nav a::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: var(--primary);
        transition: width 0.3s ease;
        border-radius: 2px;
    }

    .nav a:hover {
        color: var(--primary);
    }

    .nav a:hover::before {
        width: 20px;
    }

    .nav a.active {
        color: var(--primary);
        font-weight: 600;
    }

    .nav a.active::before {
        width: 20px;
        background: var(--accent);
    }

    /* Mobile Menu */
    .menu-toggle {
        display: none;
        flex-direction: column;
        gap: 4px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        width: 30px;
        height: 30px;
        align-items: center;
        justify-content: center;
    }

    .menu-toggle span {
        width: 20px;
        height: 2px;
        background: var(--primary);
        transition: all 0.3s ease;
        transform-origin: center;
    }

    .menu-toggle.active span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }

    .menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .menu-toggle.active span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    /* Mobile Styles */
    @media (max-width: 768px) {
        .header .container {
            padding: 0.75rem 1.5rem;
        }

        .menu-toggle {
            display: flex;
        }

        .nav {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--white);
            border-top: 1px solid rgba(42, 75, 44, 0.1);
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px var(--shadow);
        }

        .nav.active {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .nav ul {
            flex-direction: column;
            padding: 1rem 1.5rem;
            gap: 0;
        }

        .nav a {
            display: block;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(42, 75, 44, 0.05);
        }

        .nav a:last-child {
            border-bottom: none;
        }

        .nav a::before {
            display: none;
        }

        .nav a.active {
            background: rgba(42, 75, 44, 0.05);
            border-radius: 6px;
            padding-left: 1rem;
        }

        .logo-text h1 {
            font-size: 1.3rem;
        }

        .logo-text p {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .header .container {
            padding: 0.5rem 1rem;
        }

        .logo-icon {
            width: 35px;
            height: 35px;
            font-size: 1rem;
        }

        .logo-text h1 {
            font-size: 1.2rem;
        }

        .logo {
            gap: 0.5rem;
        }
    }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="<?= SITE_URL ?>/" class="logo">
                <div class="logo-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <div class="logo-text">
                    <h1><?= COMPANY_NAME ?></h1>
                    <p>Premium Woodcraft</p>
                </div>
            </a>
            
            <button class="menu-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <nav class="nav">
                <ul>
                    <li><a href="<?= SITE_URL ?>/" class="<?= $is_home ? 'active' : '' ?>">Home</a></li>
                    <li><a href="<?= SITE_URL ?>/products" class="<?= $is_products ? 'active' : '' ?>">Products</a></li>
                    <li><a href="<?= SITE_URL ?>/services" class="<?= $is_services ? 'active' : '' ?>">Services</a></li>
                    <li><a href="<?= SITE_URL ?>/about" class="<?= $is_about ? 'active' : '' ?>">About</a></li>
                    <li><a href="<?= SITE_URL ?>/contact" class="<?= $is_contact ? 'active' : '' ?>">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <style>
    .main {
        padding-top: 80px;
        min-height: calc(100vh - 80px);
        background: #fefefe;
    }

    @media (max-width: 768px) {
        .main {
            padding-top: 70px;
        }
    }
    </style>

    <main class="main">

<script>
// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav');
    const header = document.querySelector('.header');

    // Toggle mobile menu
    menuToggle.addEventListener('click', function() {
        this.classList.toggle('active');
        nav.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
    });

    // Close menu when clicking on a link
    document.querySelectorAll('.nav a').forEach(link => {
        link.addEventListener('click', () => {
            menuToggle.classList.remove('active');
            nav.classList.remove('active');
            document.body.style.overflow = '';
        });
    });

    // Header scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInsideNav = nav.contains(event.target);
        const isClickOnToggle = menuToggle.contains(event.target);
        
        if (!isClickInsideNav && !isClickOnToggle && nav.classList.contains('active')) {
            menuToggle.classList.remove('active');
            nav.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // Handle escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && nav.classList.contains('active')) {
            menuToggle.classList.remove('active');
            nav.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});
</script>