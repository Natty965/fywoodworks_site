<?php 
define('PAGE_TITLE', $product['name']); 
$whatsapp_message = urlencode("Hello! I'm interested in the \"" . $product['name'] . "\" product. Please provide more information.");
$email_subject = urlencode("Product Inquiry: " . $product['name']);
$sms_message = urlencode("I'm interested in " . $product['name']);
require_once __DIR__ . '/partials/header.php'; 
?>

<style>
        :root {
    --primary: #2a4b2c;       /* Dark green */
    --primary-light: #3a6b3c; /* Medium green */
    --primary-dark: #1a3b1c;  /* Darker green */
    --accent: #d4af37;        /* Gold accent */
    --accent-dark: #b8941f;   /* Darker gold */
    --neutral: #f5f1e8;       /* Light beige/cream */
    --neutral-dark: #e8e2d4;  /* Darker beige */
    --text: #2c2c2c;          /* Dark gray for text */
    --text-light: #5a5a5a;    /* Light gray for secondary text */
    --white: #ffffff;         /* Pure white */
    --shadow: rgba(0, 0, 0, 0.08);     /* Subtle shadow */
    --shadow-hover: rgba(0, 0, 0, 0.12); /* Hover shadow */
}
/* Modern Minimalist Product Detail */
.product-detail {
    padding: 0;
    background: var(--white);
    min-height: 100vh;
}

.product-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 8rem 0 4rem;
    position: relative;
    overflow: hidden;
}

.product-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.03) 0%, transparent 50%);
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.product-breadcrumb {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 2rem;
    font-size: 0.9rem;
    opacity: 0.9;
}

.product-breadcrumb a {
    color: white;
    text-decoration: none;
    transition: opacity 0.3s ease;
}

.product-breadcrumb a:hover {
    opacity: 0.8;
}

.product-breadcrumb span {
    opacity: 0.7;
}

.hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    font-weight: 400;
    margin-bottom: 2rem;
}

/* Product Content */
.product-content {
    padding: 4rem 0;
}

.product-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* Product Gallery */
.product-gallery {
    position: sticky;
    top: 120px;
}

.gallery-main {
    background: var(--neutral);
    border-radius: 16px;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.gallery-image {
    font-size: 4rem;
    color: var(--primary);
    opacity: 0.7;
}

.availability-badge {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    background: <?= $product['is_active'] ? 'var(--primary)' : '#ef4444' ?>;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Product Info */
.product-info {
    padding: 1rem 0;
}

.product-price {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 2rem;
}

.price-amount {
    color: var(--primary);
    font-weight: 800;
}

.product-description {
    font-size: 1.1rem;
    line-height: 1.7;
    color: var(--text-light);
    margin-bottom: 3rem;
    font-weight: 400;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 3rem;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem;
    background: var(--white);
    border-radius: 12px;
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px var(--shadow);
}

.feature-icon {
    width: 48px;
    height: 48px;
    background: var(--neutral);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.feature-item:hover .feature-icon {
    background: var(--primary);
    color: var(--white);
}

.feature-text {
    font-size: 0.9rem;
    color: var(--text-light);
}

.feature-text strong {
    display: block;
    color: var(--text);
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

/* Materials Section */
.materials-section {
    margin-bottom: 3rem;
}

.section-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 1rem;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 30px;
    height: 2px;
    background: var(--accent);
    border-radius: 2px;
}

.materials-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.material-tag {
    background: var(--white);
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    color: var(--text-light);
    transition: all 0.3s ease;
    font-weight: 500;
}

.material-tag:hover {
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px var(--shadow);
}

/* Contact Section */
.contact-section {
    background: var(--neutral);
    padding: 2.5rem;
    border-radius: 16px;
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.contact-title {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 0.75rem;
}

.contact-subtitle {
    color: var(--text-light);
    margin-bottom: 2rem;
    font-weight: 400;
}

.contact-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.contact-btn {
    padding: 1rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    min-width: 140px;
    justify-content: center;
    font-size: 0.9rem;
}

.contact-btn.whatsapp {
    background: #25D366;
    color: white;
}

.contact-btn.email {
    background: var(--primary);
    color: white;
}

.contact-btn.sms {
    background: #34b7f1;
    color: white;
}

.contact-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.contact-btn.whatsapp:hover {
    background: #128C7E;
}

.contact-btn.email:hover {
    background: var(--primary-light);
}

.contact-btn.sms:hover {
    background: #1a93c9;
}

/* Specifications */
.specs-section {
    margin-top: 4rem;
    padding-top: 3rem;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.specs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
}

.spec-item {
    text-align: center;
    padding: 2rem 1.5rem;
    background: var(--white);
    border-radius: 12px;
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.spec-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px var(--shadow);
}

.spec-value {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.spec-label {
    font-size: 0.9rem;
    color: var(--text-light);
    font-weight: 500;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.product-gallery {
    animation: fadeInUp 0.8s ease-out;
}

.product-info > * {
    animation: fadeInUp 0.8s ease-out;
    animation-fill-mode: both;
}

.product-info > *:nth-child(1) { animation-delay: 0.1s; }
.product-info > *:nth-child(2) { animation-delay: 0.2s; }
.product-info > *:nth-child(3) { animation-delay: 0.3s; }
.product-info > *:nth-child(4) { animation-delay: 0.4s; }
.product-info > *:nth-child(5) { animation-delay: 0.5s; }

/* Responsive Design */
@media (max-width: 968px) {
    .product-layout {
        grid-template-columns: 1fr;
        gap: 3rem;
    }
    
    .product-gallery {
        position: static;
    }
    
    .gallery-main {
        height: 400px;
    }
}

@media (max-width: 768px) {
    .product-hero {
        padding: 6rem 0 3rem;
    }
    
    .hero-title {
        font-size: 2.2rem;
    }
    
    .product-layout {
        padding: 0 1rem;
        gap: 2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .contact-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .contact-btn {
        width: 100%;
        max-width: 280px;
    }
    
    .specs-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .contact-section {
        padding: 2rem;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .product-price {
        font-size: 2rem;
    }
    
    .specs-grid {
        grid-template-columns: 1fr;
    }
    
    .feature-item {
        padding: 1rem;
    }
    
    .feature-icon {
        width: 40px;
        height: 40px;
    }
}

/* Loading Animation */
.loading-spinner {
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<!-- Hero Section -->
<section class="product-hero">
    <div class="container">
        <div class="hero-content">
            <div class="product-breadcrumb">
                <a href="<?= SITE_URL ?>/">Home</a>
                <span>/</span>
                <a href="<?= SITE_URL ?>/products">Products</a>
                <span>/</span>
                <span><?= htmlspecialchars($product['name']) ?></span>
            </div>
            <h1 class="hero-title"><?= htmlspecialchars($product['name']) ?></h1>
            <p class="hero-subtitle"><?= htmlspecialchars($product['category']) ?></p>
        </div>
    </div>
</section>

<!-- Product Content -->
<section class="product-content">
    <div class="product-layout">
        <!-- Product Gallery -->
        <div class="product-gallery">
            <div class="gallery-main">
                <div class="gallery-image">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                    </svg>
                </div>
                <div class="availability-badge">
                    <?= $product['is_active'] ? 'In Stock' : 'Out of Stock' ?>
                </div>
            </div>
        </div>

        <!-- Product Information -->
        <div class="product-info">
            <div class="product-price">
                GH₵ <span class="price-amount"><?= number_format($product['unit_price'], 2) ?></span>
            </div>

            <div class="product-description">
                <?= htmlspecialchars($product['description'] ?? 'Expertly crafted with attention to detail, this piece combines traditional woodworking techniques with contemporary design. Each element is carefully considered to ensure both beauty and functionality.') ?>
            </div>

            <!-- Key Features -->
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Premium Quality</strong>
                        <span>Exceptional craftsmanship</span>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Customizable</strong>
                        <span>Tailored to your needs</span>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Durable</strong>
                        <span>Built to last generations</span>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v8M8 12h8"/>
                        </svg>
                    </div>
                    <div class="feature-text">
                        <strong>Fast Delivery</strong>
                        <span>Quick turnaround time</span>
                    </div>
                </div>
            </div>

            <!-- Materials Used -->
            <?php if ($product['wood_required']): ?>
            <div class="materials-section">
                <h3 class="section-title">Materials Used</h3>
                <div class="materials-tags">
                    <?php 
                    $wood_types = json_decode($product['wood_required'], true);
                    foreach ($wood_types as $wood_type): ?>
                        <span class="material-tag"><?= htmlspecialchars($wood_type) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Section -->
            <div class="contact-section">
                <h3 class="contact-title">Ready to Order?</h3>
                <p class="contact-subtitle">Contact us directly for pricing, customization, or any questions</p>
                
                <div class="contact-buttons">
                    <a href="https://wa.me/<?= COMPANY_WHATSAPP ?>?text=<?= $whatsapp_message ?>" 
                       class="contact-btn whatsapp" target="_blank">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893-.001-3.189-1.262-6.209-3.55-8.489"/>
                        </svg>
                        WhatsApp
                    </a>
                    
                    <a href="mailto:<?= COMPANY_EMAIL ?>?subject=<?= $email_subject ?>" 
                       class="contact-btn email">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        Email
                    </a>
                    
                    <a href="sms:<?= COMPANY_PHONE ?>?body=<?= $sms_message ?>" 
                       class="contact-btn sms">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/>
                        </svg>
                        Message
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Specifications -->
    <div class="container">
        <div class="specs-section">
            <div class="specs-grid">
                <div class="spec-item">
                    <div class="spec-value"><?= $product['is_active'] ? '✓' : '✗' ?></div>
                    <div class="spec-label">Availability</div>
                </div>
                <div class="spec-item">
                    <div class="spec-value">A</div>
                    <div class="spec-label">Quality Grade</div>
                </div>
                <div class="spec-item">
                    <div class="spec-value"><?= htmlspecialchars($product['category']) ?></div>
                    <div class="spec-label">Category</div>
                </div>
                <div class="spec-item">
                    <div class="spec-value">#<?= $product['id'] ?></div>
                    <div class="spec-label">Product ID</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Smooth animations and interactions
document.addEventListener('DOMContentLoaded', function() {
    // Add loading state to buttons
    const contactButtons = document.querySelectorAll('.contact-btn');
    
    contactButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.getAttribute('href').includes('http')) {
                e.preventDefault();
                
                // Show loading state
                const originalText = this.innerHTML;
                this.innerHTML = '<div class="loading-spinner"></div>';
                this.style.opacity = '0.7';
                
                setTimeout(() => {
                    window.location.href = this.getAttribute('href');
                }, 1000);
            }
        });
    });
    
    // Add subtle hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.feature-item, .material-tag, .spec-item');
    
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Price counter animation
    const priceElement = document.querySelector('.price-amount');
    
    // Simple pulse animation every 10 seconds
    setInterval(() => {
        priceElement.style.transform = 'scale(1.05)';
        setTimeout(() => {
            priceElement.style.transform = 'scale(1)';
        }, 300);
    }, 10000);
});

// Scroll animations
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    const animatedElements = document.querySelectorAll('.feature-item, .material-tag, .spec-item');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
}

// Initialize animations
initScrollAnimations();
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>