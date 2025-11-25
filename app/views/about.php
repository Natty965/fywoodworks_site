<?php 
define('PAGE_TITLE', 'About Us'); 
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
/* About Page Styles - Modern Minimalist */
.about-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 8rem 0 6rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.about-hero::before {
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

.about-hero .container {
    position: relative;
    z-index: 2;
}

.about-hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.1;
}

.hero-subtitle {
    font-size: 1.3rem;
    opacity: 0.9;
    font-weight: 400;
    max-width: 600px;
    margin: 0 auto;
}

.about-content {
    padding: 6rem 0;
    background: var(--white);
}

.story-section {
    max-width: 900px;
    margin: 0 auto 6rem;
    text-align: center;
}

.story-section h2 {
    font-size: 2.5rem;
    color: var(--text);
    margin-bottom: 2rem;
    font-weight: 700;
    position: relative;
    display: inline-block;
}

.story-section h2::after {
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

.story-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-light);
    margin-bottom: 3rem;
    text-align: left;
}

.story-text p {
    margin-bottom: 1.5rem;
}

.story-text p:last-child {
    margin-bottom: 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 4rem;
}

.value-card {
    background: var(--white);
    padding: 3rem 2rem;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 5px 20px var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.03);
    position: relative;
    overflow: hidden;
}

.value-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary);
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px var(--shadow-hover);
}

.value-icon {
    width: 70px;
    height: 70px;
    background: var(--neutral);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary);
    transition: all 0.3s ease;
}

.value-card:hover .value-icon {
    background: var(--primary);
    color: var(--white);
    transform: scale(1.05);
}

.value-card h3 {
    color: var(--text);
    margin-bottom: 1rem;
    font-weight: 600;
    font-size: 1.3rem;
}

.value-card p {
    color: var(--text-light);
    line-height: 1.6;
    font-size: 0.95rem;
}

.team-section {
    padding: 6rem 0;
    background: var(--neutral);
    text-align: center;
}

.team-section h2 {
    font-size: 2.5rem;
    color: var(--text);
    margin-bottom: 3rem;
    font-weight: 700;
    position: relative;
    display: inline-block;
}

.team-section h2::after {
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

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 3rem;
    max-width: 1000px;
    margin: 0 auto;
}

.team-member {
    text-align: center;
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 12px;
    box-shadow: 0 5px 20px var(--shadow);
    transition: all 0.3s ease;
}

.team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px var(--shadow-hover);
}

.member-image {
    width: 120px;
    height: 120px;
    background: var(--neutral);
    border-radius: 50%;
    margin: 0 auto 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 2.5rem;
    transition: all 0.3s ease;
    border: 3px solid var(--white);
    box-shadow: 0 5px 15px var(--shadow);
}

.team-member:hover .member-image {
    transform: scale(1.05);
    border-color: var(--primary);
}

.member-name {
    font-size: 1.3rem;
    color: var(--text);
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.member-role {
    color: var(--primary);
    font-size: 0.95rem;
    font-weight: 500;
}

/* Stats Section */
.stats-section {
    padding: 4rem 0;
    background: var(--white);
    text-align: center;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 3rem;
    max-width: 800px;
    margin: 0 auto;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
    line-height: 1;
}

.stat-label {
    color: var(--text-light);
    font-size: 1rem;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .about-hero {
        padding: 6rem 0 4rem;
    }
    
    .about-hero h1 {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .about-content {
        padding: 4rem 0;
    }
    
    .story-section {
        margin-bottom: 4rem;
    }
    
    .story-section h2,
    .team-section h2 {
        font-size: 2rem;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .team-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
}

@media (max-width: 480px) {
    .about-hero h1 {
        font-size: 2rem;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .value-card,
    .team-member {
        padding: 2rem 1.5rem;
    }
}
</style>

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <h1>Our Story</h1>
        <p class="hero-subtitle">Crafting excellence in wood since 2015</p>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="container">
        <div class="story-section">
            <h2>Passion for Woodcraft</h2>
            <div class="story-text">
                <p>Founded in 2015, FY Woodworks began as a small workshop with a big vision: to create exceptional wood products that blend traditional craftsmanship with contemporary design. What started as a passion project has grown into a respected woodworking studio known for quality, durability, and beauty.</p>
                
                <p>Every piece we create tells a story - from the careful selection of sustainable wood to the final hand-applied finish. We believe that great woodworking isn't just about building furniture; it's about creating heirlooms that will be cherished for generations.</p>
            </div>
        </div>

        <!-- Our Values -->
        <div class="story-section">
            <h2>Our Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3>Sustainable Materials</h3>
                    <p>We source our wood from responsibly managed forests and use eco-friendly finishes to minimize our environmental impact.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3>Traditional Craftsmanship</h3>
                    <p>We honor traditional woodworking techniques while incorporating modern innovations for superior quality and durability.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                        </svg>
                    </div>
                    <h3>Attention to Detail</h3>
                    <p>Every joint, curve, and finish receives meticulous attention to ensure perfection in every piece we create.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number" data-count="500">0</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="8">0</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="15">0</div>
                <div class="stat-label">Wood Types</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="98">0</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <h2>Meet Our Craftsmen</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="member-image">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <h3 class="member-name">Frank Yeboah</h3>
                <p class="member-role">Founder & Master Craftsman</p>
            </div>
            
            <div class="team-member">
                <div class="member-image">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <h3 class="member-name">Akosua Mensah</h3>
                <p class="member-role">Design Specialist</p>
            </div>
            
            <div class="team-member">
                <div class="member-image">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <h3 class="member-name">Kofi Asante</h3>
                <p class="member-role">Wood Finishing Expert</p>
            </div>
        </div>
    </div>
</section>

<script>
// Animated counters for stats
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const suffix = counter.textContent.includes('%') ? '%' : '+';
        const duration = 2000;
        const step = target / (duration / 16);
        
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
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                
                // Animate counters when stats section is visible
                if (entry.target.classList.contains('stats-grid')) {
                    animateCounters();
                }
            }
        });
    }, { threshold: 0.3 });
    
    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.value-card, .team-member, .stats-grid');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
}

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>