<?php 
define('PAGE_TITLE', 'Home'); 
require_once __DIR__ . '/partials/header.php'; 
?>

<style>
/* Modern Minimalist Color Palette */
:root {
    --primary: #2a4b2c;
    --primary-light: #3a6b3c;
    --primary-dark: #1a3b1c;
    --accent: #d4af37;
    --accent-dark: #b8941f;
    --neutral: #f5f1e8;
    --neutral-dark: #e8e2d4;
    --text: #2c2c2c;
    --text-light: #5a5a5a;
    --white: #ffffff;
    --shadow: rgba(0, 0, 0, 0.08);
    --shadow-hover: rgba(0, 0, 0, 0.12);
}

/* Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    color: var(--text);
    background-color: var(--white);
    line-height: 1.6;
    overflow-x: hidden;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Modern Minimalist Hero Section */
.minimal-hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(135deg, var(--neutral) 0%, var(--white) 100%);
    overflow: hidden;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(42, 75, 44, 0.03) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.03) 0%, transparent 20%);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 600px;
    padding: 40px 0;
}

.hero-badge {
    margin-bottom: 1.5rem;
    animation: fadeIn 0.8s ease-out;
}

.hero-badge span {
    background: var(--primary);
    color: var(--white);
    padding: 0.5rem 1.25rem;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.hero-title {
    font-size: 3.2rem;
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    animation: slideUp 0.8s ease-out 0.2s both;
}

.title-line {
    display: block;
}

.title-line.accent {
    color: var(--primary);
    position: relative;
    display: inline-block;
}

.title-line.accent::after {
    content: '';
    position: absolute;
    bottom: 5px;
    left: 0;
    width: 100%;
    height: 8px;
    background-color: rgba(212, 175, 55, 0.3);
    z-index: -1;
}

.hero-description {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 2.5rem;
    color: var(--text-light);
    max-width: 500px;
    animation: slideUp 0.8s ease-out 0.4s both;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 4rem;
    flex-wrap: wrap;
    animation: slideUp 0.8s ease-out 0.6s both;
}

.btn {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    font-family: inherit;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.btn:hover::before {
    left: 100%;
}

.btn-primary {
    background: var(--primary);
    color: var(--white);
    box-shadow: 0 4px 12px rgba(42, 75, 44, 0.2);
}

.btn-primary:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(42, 75, 44, 0.3);
}

.btn-secondary {
    background: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-secondary:hover {
    background: rgba(42, 75, 44, 0.05);
    transform: translateY(-2px);
}

.btn-large {
    padding: 1rem 2rem;
    font-size: 1rem;
}

.hero-stats {
    display: flex;
    gap: 3rem;
    animation: slideUp 0.8s ease-out 0.8s both;
}

.stat {
    text-align: left;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
    color: var(--primary);
}

.stat-label {
    font-size: 0.85rem;
    color: var(--text-light);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.hero-visual {
    position: absolute;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
    width: 450px;
    height: 500px;
}

.wood-sample {
    position: absolute;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 30px var(--shadow);
    transition: all 0.4s ease;
    background: var(--white);
}

.wood-sample:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 40px var(--shadow-hover);
}

.wood-sample-1 {
    top: 10%;
    right: 0;
    width: 280px;
    height: 180px;
    animation: float 8s ease-in-out infinite;
}

.wood-sample-2 {
    top: 40%;
    right: 20%;
    width: 240px;
    height: 160px;
    animation: float 8s ease-in-out 2s infinite;
}

.wood-sample-3 {
    top: 70%;
    right: 10%;
    width: 260px;
    height: 170px;
    animation: float 8s ease-in-out 4s infinite;
}

.wood-texture {
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #8B4513 0%, #A0522D 50%, #CD853F 100%);
    position: relative;
    overflow: hidden;
}

.wood-texture::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent 30%, rgba(0,0,0,0.1) 50%, transparent 70%);
    opacity: 0.6;
}

.wood-sample-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1rem;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    color: var(--white);
}

.wood-sample-content h4 {
    font-size: 1.1rem;
    margin-bottom: 0.25rem;
}

.wood-sample-content p {
    font-size: 0.85rem;
    opacity: 0.9;
}

/* Features Section */
.minimal-features {
    padding: 6rem 0;
    background: var(--white);
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 1rem;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: var(--accent);
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--text-light);
    max-width: 600px;
    margin: 0 auto;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.feature-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 20px var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.03);
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px var(--shadow-hover);
}

.feature-icon {
    margin-bottom: 1.5rem;
}

.icon-wrapper {
    width: 70px;
    height: 70px;
    background: var(--neutral);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: var(--primary);
    transition: all 0.3s ease;
}

.feature-card:hover .icon-wrapper {
    background: var(--primary);
    color: var(--white);
    transform: scale(1.05);
}

.feature-card h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 1rem;
}

.feature-card p {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.feature-highlight {
    display: inline-block;
    background: var(--accent);
    color: var(--text);
    padding: 0.5rem 1.25rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

/* CTA Section */
.minimal-cta {
    padding: 5rem 0;
    background: var(--primary);
    color: var(--white);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 30%, rgba(255,255,255,0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(255,255,255,0.05) 0%, transparent 50%);
}

.cta-content {
    position: relative;
    z-index: 2;
}

.cta-content h2 {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-content p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2.5rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-light {
    background: var(--white);
    color: var(--primary);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.btn-light:hover {
    background: var(--neutral);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}

.btn-outline-light {
    background: transparent;
    color: var(--white);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
}

/* Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .hero-visual {
        width: 400px;
    }
    
    .wood-sample-1 {
        width: 240px;
        height: 150px;
    }
    
    .wood-sample-2 {
        width: 200px;
        height: 130px;
    }
    
    .wood-sample-3 {
        width: 220px;
        height: 140px;
    }
}

@media (max-width: 768px) {
    .minimal-hero {
        min-height: auto;
        padding: 5rem 0;
        text-align: center;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-visual {
        display: none;
    }
    
    .hero-stats {
        justify-content: center;
        gap: 2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-large {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}
</style>

<!-- Modern Minimalist Hero Section -->
<section class="minimal-hero">
    <div class="hero-pattern"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <span>Premium Woodcraft Since 2025</span>
            </div>
            <h1 class="hero-title">
                <span class="title-line">Crafting Excellence</span>
                <span class="title-line accent">In Every Wood Piece</span>
            </h1>
            <p class="hero-description">
                Transform your spaces with our meticulously crafted wood products. 
                From elegant furniture to bespoke carpentry solutions, we bring 
                nature's beauty into your everyday life.
            </p>
            <div class="hero-buttons">
                <a href="<?= SITE_URL ?>/products" class="btn btn-primary btn-large">
                    <span>Explore Collection</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <a href="<?= SITE_URL ?>/contact" class="btn btn-secondary btn-large">
                    <span>Book Consultation</span>
                </a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-number" data-count="500">0</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
                <div class="stat">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label">Wood Types</div>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="wood-sample wood-sample-1">
                <div class="wood-texture"></div>
                <div class="wood-sample-content">
                    <h4>Modern Furniture</h4>
                    <p>Elegant designs</p>
                </div>
            </div>
            <div class="wood-sample wood-sample-2">
                <div class="wood-texture"></div>
                <div class="wood-sample-content">
                    <h4>Custom Pieces</h4>
                    <p>Tailored to you</p>
                </div>
            </div>
            <div class="wood-sample wood-sample-3">
                <div class="wood-texture"></div>
                <div class="wood-sample-content">
                    <h4>Premium Quality</h4>
                    <p>Lasting beauty</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="minimal-features">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why Choose FY Woodworks?</h2>
            <p class="section-subtitle">Experience the difference that quality craftsmanship makes</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <div class="icon-wrapper">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                </div>
                <h3>Precision Craftsmanship</h3>
                <p>Every piece undergoes meticulous attention to detail, ensuring flawless finishes and perfect joints that stand the test of time.</p>
                <div class="feature-highlight">
                    <span>Hand-finished perfection</span>
                </div>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <div class="icon-wrapper">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                </div>
                <h3>Sustainable Materials</h3>
                <p>We source only the finest, ethically harvested wood, combining beauty with environmental responsibility in every creation.</p>
                <div class="feature-highlight">
                    <span>Eco-friendly practices</span>
                </div>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <div class="icon-wrapper">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>
                <h3>Custom Design Solutions</h3>
                <p>Your vision, our expertise. We collaborate closely to create bespoke pieces that perfectly match your style and space requirements.</p>
                <div class="feature-highlight">
                    <span>Personalized approach</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="minimal-cta">
    <div class="cta-pattern"></div>
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Transform Your Space?</h2>
            <p>Let's discuss your project and bring your vision to life with quality woodcraft that lasts generations.</p>
            <div class="cta-buttons">
                <a href="<?= SITE_URL ?>/contact" class="btn btn-light btn-large">
                    <span>Start Your Project</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                    </svg>
                </a>
                <a href="<?= SITE_URL ?>/products" class="btn btn-outline-light btn-large">
                    <span>Browse Gallery</span>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Animated Counter
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const suffix = counter.textContent.includes('%') ? '%' : '+';
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.textContent = Math.floor(current) + suffix;
        }, 16);
    });
}

// Intersection Observer for animations
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
                
                // Animate counters when stats section is visible
                if (entry.target.classList.contains('hero-stats')) {
                    animateCounters();
                }
            }
        });
    }, { threshold: 0.3 });
    
    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.hero-stats, .feature-card, .section-header');
    animatedElements.forEach(el => observer.observe(el));
}

// Wood sample interactions
function initWoodSampleInteractions() {
    const woodSamples = document.querySelectorAll('.wood-sample');
    
    woodSamples.forEach(sample => {
        sample.addEventListener('mouseenter', () => {
            sample.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        sample.addEventListener('mouseleave', () => {
            // Reset to the floating animation state
            sample.style.transform = '';
        });
    });
}

// Smooth scrolling for anchor links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Initialize all animations when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initWoodSampleInteractions();
    initSmoothScroll();
});

// Add parallax effect on scroll
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector('.hero-pattern');
    if (parallax) {
        parallax.style.transform = `translateY(${scrolled * 0.4}px)`;
    }
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>