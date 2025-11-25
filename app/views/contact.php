<?php 
define('PAGE_TITLE', 'Contact'); 
require_once __DIR__ . '/partials/header.php'; 
?>

<style>
/* Contact Page Styles - Modern Minimalist */
.contact-section {
    padding: 6rem 0;
    background: var(--white);
}

.contact-section h1 {
    font-size: 3rem;
    font-weight: 700;
    color: var(--text);
    text-align: center;
    margin-bottom: 1rem;
}

.section-description {
    font-size: 1.2rem;
    color: var(--text-light);
    text-align: center;
    max-width: 600px;
    margin: 0 auto 4rem;
    line-height: 1.6;
}

.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    max-width: 1000px;
    margin: 0 auto;
}

.contact-info {
    background: var(--white);
    padding: 3rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px var(--shadow);
    border: 1px solid rgba(0, 0, 0, 0.03);
}

.contact-info h2 {
    font-size: 1.8rem;
    color: var(--text);
    margin-bottom: 2rem;
    font-weight: 700;
    position: relative;
}

.contact-info h2::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--accent);
    border-radius: 2px;
}

.contact-method {
    margin-bottom: 2.5rem;
    padding: 1.5rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.contact-method:hover {
    background: var(--neutral);
    border-color: rgba(42, 75, 44, 0.1);
    transform: translateX(5px);
}

.contact-method h3 {
    font-size: 1.1rem;
    color: var(--text);
    margin-bottom: 0.75rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.contact-method h3::before {
    content: '';
    width: 24px;
    height: 24px;
    background: var(--primary);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 0.8rem;
}

.contact-method:nth-child(1) h3::before { content: '📞'; }
.contact-method:nth-child(2) h3::before { content: '💬'; }
.contact-method:nth-child(3) h3::before { content: '✉️'; }
.contact-method:nth-child(4) h3::before { content: '📍'; }

.contact-method p {
    color: var(--text-light);
    margin: 0;
    font-size: 1rem;
}

.contact-method a {
    color: var(--primary);
    text-decoration: none;
    transition: color 0.3s ease;
    font-weight: 500;
}

.contact-method a:hover {
    color: var(--primary-light);
}

.btn-whatsapp {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #25D366;
    color: white !important;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    margin-top: 0.5rem;
}

.btn-whatsapp:hover {
    background: #128C7E;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
}

.contact-hours {
    background: var(--white);
    padding: 3rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px var(--shadow);
    border: 1px solid rgba(0, 0, 0, 0.03);
    height: fit-content;
}

.contact-hours h2 {
    font-size: 1.8rem;
    color: var(--text);
    margin-bottom: 2rem;
    font-weight: 700;
    position: relative;
}

.contact-hours h2::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--accent);
    border-radius: 2px;
}

.hours-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.hour-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.hour-item:last-child {
    border-bottom: none;
}

.hour-item span:first-child {
    color: var(--text);
    font-weight: 500;
}

.hour-item span:last-child {
    color: var(--primary);
    font-weight: 600;
}

/* Contact Form Styles */
.contact-form {
    background: var(--white);
    padding: 3rem;
    border-radius: 16px;
    box-shadow: 0 5px 20px var(--shadow);
    border: 1px solid rgba(0, 0, 0, 0.03);
    margin-top: 3rem;
}

.contact-form h2 {
    font-size: 1.8rem;
    color: var(--text);
    margin-bottom: 2rem;
    font-weight: 700;
    position: relative;
}

.contact-form h2::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--accent);
    border-radius: 2px;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--text);
    font-weight: 500;
}

.form-input,
.form-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: var(--white);
    font-family: inherit;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(42, 75, 44, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.btn-submit {
    background: var(--primary);
    color: var(--white);
    border: none;
    padding: 1rem 2rem;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-submit:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(42, 75, 44, 0.3);
}

/* Map Section */
.map-section {
    margin-top: 4rem;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px var(--shadow);
}

.map-placeholder {
    background: var(--neutral);
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-light);
    font-size: 1.1rem;
}

/* Responsive Design */
@media (max-width: 968px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .contact-info,
    .contact-hours,
    .contact-form {
        padding: 2rem;
    }
}

@media (max-width: 768px) {
    .contact-section {
        padding: 4rem 0;
    }
    
    .contact-section h1 {
        font-size: 2.5rem;
    }
    
    .section-description {
        font-size: 1.1rem;
        margin-bottom: 3rem;
    }
    
    .hour-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }
}

@media (max-width: 480px) {
    .contact-section h1 {
        font-size: 2rem;
    }
    
    .contact-info,
    .contact-hours,
    .contact-form {
        padding: 1.5rem;
    }
    
    .contact-method {
        padding: 1rem;
    }
}
</style>

<section class="contact-section">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="section-description">Get in touch with us for product inquiries, custom orders, or any questions about our woodcraft services.</p>

        <div class="contact-grid">
            <div class="contact-info">
                <h2>Our Contact Details</h2>
                
                <div class="contact-method">
                    <h3>Phone Call</h3>
                    <p><a href="tel:<?= COMPANY_PHONE ?>"><?= COMPANY_PHONE ?></a></p>
                </div>
                
                <div class="contact-method">
                    <h3>WhatsApp</h3>
                    <p>
                        <a href="https://wa.me/<?= COMPANY_WHATSAPP ?>?text=Hello! I'm interested in your wood products." 
                           class="btn-whatsapp" target="_blank">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink: 0;">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893-.001-3.189-1.262-6.209-3.55-8.489"/>
                            </svg>
                            Message us on WhatsApp
                        </a>
                    </p>
                </div>
                
                <div class="contact-method">
                    <h3>Email</h3>
                    <p><a href="mailto:<?= COMPANY_EMAIL ?>"><?= COMPANY_EMAIL ?></a></p>
                </div>
                
                <div class="contact-method">
                    <h3>Location</h3>
                    <p><?= COMPANY_ADDRESS ?></p>
                </div>
            </div>

            <div class="contact-hours">
                <h2>Business Hours</h2>
                <div class="hours-list">
                    <div class="hour-item">
                        <span>Monday - Friday</span>
                        <span>8:00 AM - 6:00 PM</span>
                    </div>
                    <div class="hour-item">
                        <span>Saturday</span>
                        <span>9:00 AM - 4:00 PM</span>
                    </div>
                    <div class="hour-item">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Send us a Message</h2>
            <form id="contactForm">
                <div class="form-group">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" id="name" class="form-input" placeholder="Enter your full name" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" id="email" class="form-input" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="tel" id="phone" class="form-input" placeholder="Enter your phone number">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="message">Message</label>
                    <textarea id="message" class="form-textarea" placeholder="Tell us about your project or inquiry..." required></textarea>
                </div>
                
                <button type="submit" class="btn-submit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                    </svg>
                    Send Message
                </button>
            </form>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <div class="map-placeholder">
                <div style="text-align: center;">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 1rem;">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <p>Map of <?= COMPANY_ADDRESS ?></p>
                    <small style="opacity: 0.7;">(Map integration available)</small>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Form submission handling
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            message: document.getElementById('message').value
        };
        
        // Here you would typically send the data to your server
        console.log('Form submitted:', formData);
        
        // Show success message (in a real implementation, this would be after successful server response)
        alert('Thank you for your message! We will get back to you soon.');
        contactForm.reset();
    });
    
    // Add subtle animations to contact methods
    const contactMethods = document.querySelectorAll('.contact-method');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateX(0)';
            }
        });
    }, { threshold: 0.1 });
    
    contactMethods.forEach((method, index) => {
        method.style.opacity = '0';
        method.style.transform = 'translateX(-20px)';
        method.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(method);
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>