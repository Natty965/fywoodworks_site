<?php 
define('PAGE_TITLE', 'Services'); 
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
/* Modern Minimalist Services Page */
.services-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 8rem 0 6rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.services-hero::before {
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

.services-hero .container {
    position: relative;
    z-index: 2;
}

.services-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 1.2rem;
    opacity: 0.9;
    font-weight: 400;
    max-width: 600px;
    margin: 0 auto;
}

.services-content {
    padding: 6rem 0;
    background: var(--white);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 6rem;
}

.service-card {
    background: var(--white);
    padding: 3rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 5px 20px var(--shadow);
    border: 1px solid rgba(0, 0, 0, 0.03);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary);
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px var(--shadow-hover);
}

.service-icon {
    width: 80px;
    height: 80px;
    background: var(--neutral);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    color: var(--primary);
    transition: all 0.3s ease;
}

.service-card:hover .service-icon {
    background: var(--primary);
    color: var(--white);
    transform: scale(1.05);
}

.service-card h3 {
    color: var(--text);
    margin-bottom: 1rem;
    font-weight: 600;
    font-size: 1.5rem;
}

.service-card p {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
    font-size: 1rem;
}

.service-features {
    list-style: none;
    text-align: left;
    margin-bottom: 2.5rem;
}

.service-features li {
    padding: 0.75rem 0;
    color: var(--text-light);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.95rem;
}

.service-features li:last-child {
    border-bottom: none;
}

.service-features li::before {
    content: '';
    width: 20px;
    height: 20px;
    background: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.7rem;
    flex-shrink: 0;
}

.service-features li:nth-child(1)::before { content: '✓'; }
.service-features li:nth-child(2)::before { content: '✓'; }
.service-features li:nth-child(3)::before { content: '✓'; }
.service-features li:nth-child(4)::before { content: '✓'; }

.btn-primary {
    background: var(--primary);
    color: white;
    padding: 1rem 2rem;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
}

.btn-primary:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(42, 75, 44, 0.3);
}

/* Process Section */
.process-section {
    padding: 6rem 0;
    background: var(--neutral);
    text-align: center;
}

.process-section h2 {
    font-size: 2.5rem;
    color: var(--text);
    margin-bottom: 3rem;
    font-weight: 700;
    position: relative;
    display: inline-block;
}

.process-section h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: var(--accent);
    border-radius: 2px;
}

.process-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.process-step {
    text-align: center;
    background: var(--white);
    padding: 3rem 2rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px var(--shadow);
    border: 1px solid rgba(0, 0, 0, 0.03);
    transition: all 0.3s ease;
    position: relative;
}

.process-step:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px var(--shadow-hover);
}

.step-number {
    width: 60px;
    height: 60px;
    background: var(--primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 1.5rem;
    font-weight: 700;
    transition: all 0.3s ease;
}

.process-step:hover .step-number {
    background: var(--accent);
    transform: scale(1.1);
}

.step-title {
    font-size: 1.3rem;
    color: var(--text);
    margin-bottom: 1rem;
    font-weight: 600;
}

.step-description {
    color: var(--text-light);
    line-height: 1.6;
    font-size: 0.95rem;
}

/* CTA Section */
.cta-section {
    padding: 6rem 0;
    background: var(--white);
    text-align: center;
}

.cta-content {
    max-width: 600px;
    margin: 0 auto;
}

.cta-content h2 {
    font-size: 2.5rem;
    color: var(--text);
    margin-bottom: 1.5rem;
    font-weight: 700;
}

.cta-content p {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 3rem;
    line-height: 1.6;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-secondary {
    background: transparent;
    border: 2px solid var(--primary);
    color: var(--primary);
    padding: 1rem 2rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-secondary:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(42, 75, 44, 0.3);
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

.service-card,
.process-step {
    animation: fadeInUp 0.8s ease-out;
    animation-fill-mode: both;
}

.service-card:nth-child(1) { animation-delay: 0.1s; }
.service-card:nth-child(2) { animation-delay: 0.2s; }
.service-card:nth-child(3) { animation-delay: 0.3s; }

.process-step:nth-child(1) { animation-delay: 0.1s; }
.process-step:nth-child(2) { animation-delay: 0.2s; }
.process-step:nth-child(3) { animation-delay: 0.3s; }
.process-step:nth-child(4) { animation-delay: 0.4s; }

/* Responsive Design */
@media (max-width: 1024px) {
    .services-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .process-steps {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .services-hero {
        padding: 6rem 0 4rem;
    }
    
    .services-hero h1 {
        font-size: 2.5rem;
    }
    
    .services-content,
    .process-section,
    .cta-section {
        padding: 4rem 0;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .process-steps {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-primary,
    .btn-secondary {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
    
    .service-card,
    .process-step {
        padding: 2.5rem 1.5rem;
    }
}

@media (max-width: 480px) {
    .services-hero h1 {
        font-size: 2rem;
    }
    
    .process-section h2,
    .cta-content h2 {
        font-size: 2rem;
    }
    
    .service-icon {
        width: 70px;
        height: 70px;
    }
    
    .step-number {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
    }
}
</style>

<!-- Hero Section -->
<section class="services-hero">
    <div class="container">
        <h1>Our Services</h1>
        <p class="hero-subtitle">Comprehensive woodworking solutions tailored to your vision and needs</p>
    </div>
</section>

<!-- Services Content -->
<section class="services-content">
    <div class="container">
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9M9 22V12h6v10M2 10h20M10 6h4M6 6h8v4H6z"/>
                    </svg>
                </div>
                <h3>Custom Furniture</h3>
                <p>Bespoke furniture pieces tailored to your space, style, and functional requirements.</p>
                <ul class="service-features">
                    <li>Custom designs & measurements</li>
                    <li>Premium wood selection</li>
                    <li>Handcrafted construction</li>
                    <li>Professional finishing</li>
                </ul>
                <a href="<?= SITE_URL ?>/contact" class="btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                    Get Quote
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <h3>Interior Woodwork</h3>
                <p>Transform your living spaces with custom cabinetry, shelving, and architectural elements.</p>
                <ul class="service-features">
                    <li>Built-in cabinetry</li>
                    <li>Custom shelving units</li>
                    <li>Wall paneling</li>
                    <li>Staircases & railings</li>
                </ul>
                <a href="<?= SITE_URL ?>/contact" class="btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                    </svg>
                    Discuss Project
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                    </svg>
                </div>
                <h3>Wood Restoration</h3>
                <p>Breath new life into your cherished wood pieces with our expert restoration services.</p>
                <ul class="service-features">
                    <li>Antique restoration</li>
                    <li>Structural repairs</li>
                    <li>Refinishing & polishing</li>
                    <li>Preservation treatments</li>
                </ul>
                <a href="<?= SITE_URL ?>/contact" class="btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/>
                    </svg>
                    Restore Piece
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <h2>Our Process</h2>
        <div class="process-steps">
            <div class="process-step">
                <div class="step-number">1</div>
                <h3 class="step-title">Consultation</h3>
                <p class="step-description">We discuss your vision, requirements, and budget to understand your needs and provide expert guidance.</p>
            </div>
            
            <div class="process-step">
                <div class="step-number">2</div>
                <h3 class="step-title">Design</h3>
                <p class="step-description">Our designers create detailed plans and 3D renderings to visualize your project before construction begins.</p>
            </div>
            
            <div class="process-step">
                <div class="step-number">3</div>
                <h3 class="step-title">Craftsmanship</h3>
                <p class="step-description">Skilled craftsmen bring your vision to life with precision, using traditional techniques and modern tools.</p>
            </div>
            
            <div class="process-step">
                <div class="step-number">4</div>
                <h3 class="step-title">Delivery</h3>
                <p class="step-description">We ensure safe delivery and professional installation, followed by quality assurance and aftercare support.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Start Your Project?</h2>
            <p>Let's discuss your vision and create something beautiful together. Our team is ready to bring your woodworking ideas to life with precision and care.</p>
            <div class="cta-buttons">
                <a href="<?= SITE_URL ?>/contact" class="btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                    Start Your Project
                </a>
                <a href="<?= SITE_URL ?>/products" class="btn-secondary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    View Our Work
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Smooth animations for service cards and process steps
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card');
    const processSteps = document.querySelectorAll('.process-step');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    // Observe service cards
    serviceCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Observe process steps
    processSteps.forEach((step, index) => {
        step.style.opacity = '0';
        step.style.transform = 'translateY(30px)';
        step.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(step);
    });
    
    // Add hover effects to buttons
    const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>