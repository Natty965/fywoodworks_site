<?php 
define('PAGE_TITLE', 'Products'); 
require_once __DIR__ . '/partials/header.php'; 

// Get search and filter parameters
$search_query = $_GET['search'] ?? '';
$category_filter = $_GET['category'] ?? 'all';
$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// Filter products based on search and category
$filtered_products = array_filter($products, function($product) use ($search_query, $category_filter) {
    $matches_search = empty($search_query) || 
                     stripos($product['name'], $search_query) !== false || 
                     stripos($product['description'], $search_query) !== false;
    
    $matches_category = $category_filter === 'all' || $product['category'] === $category_filter;
    
    return $matches_search && $matches_category;
});

// Get unique categories
$categories = array_unique(array_column($products, 'category'));

// Pagination setup
$products_per_page = 9;
$total_products = count($filtered_products);
$total_pages = ceil($total_products / $products_per_page);
$current_page = max(1, min($total_pages, $current_page));
$start_index = ($current_page - 1) * $products_per_page;
$paginated_products = array_slice($filtered_products, $start_index, $products_per_page);
?>

<style>
/* Modern Minimalist Products Page */
.products-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 6rem 0 4rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.products-hero::before {
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

.products-hero .container {
    position: relative;
    z-index: 2;
}

.products-hero h1 {
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

/* Search and Filters Section */
.filters-section {
    background: var(--white);
    padding: 2rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.filters-container {
    display: flex;
    gap: 1.5rem;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.search-box {
    flex: 1;
    min-width: 300px;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    font-size: 1rem;
    background: var(--white);
    transition: all 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(42, 75, 44, 0.1);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
}

.category-filters {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.category-filter {
    background: var(--white);
    border: 1px solid rgba(0, 0, 0, 0.1);
    color: var(--text-light);
    padding: 0.75rem 1.5rem;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
    font-size: 0.9rem;
    text-decoration: none;
}

.category-filter.active,
.category-filter:hover {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
    transform: translateY(-1px);
}

.results-info {
    color: var(--text-light);
    font-size: 0.9rem;
    text-align: center;
    margin-top: 1rem;
}

/* Products Grid */
.products-section {
    padding: 3rem 0;
    background: var(--white);
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.product-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.03);
    position: relative;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px var(--shadow-hover);
}

.product-image {
    background: var(--neutral);
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.product-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 40%, rgba(42, 75, 44, 0.03) 100%);
}

.wood-icon {
    font-size: 3.5rem;
    color: var(--primary);
    opacity: 0.8;
}

.availability-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.product-info {
    padding: 2rem;
}

.product-name {
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.product-price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
}

.product-category {
    display: inline-block;
    background: rgba(42, 75, 44, 0.1);
    color: var(--primary);
    padding: 0.4rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.product-description {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-actions {
    display: flex;
    gap: 0.75rem;
}

.btn-primary, .btn-secondary {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    flex: 1;
    text-align: center;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(42, 75, 44, 0.3);
}

.btn-secondary {
    background: transparent;
    border: 1px solid var(--primary);
    color: var(--primary);
}

.btn-secondary:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin-top: 3rem;
}

.pagination a, .pagination span {
    padding: 0.75rem 1rem;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-decoration: none;
    color: var(--text);
    font-weight: 500;
    transition: all 0.3s ease;
    min-width: 44px;
    text-align: center;
}

.pagination a:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
    transform: translateY(-1px);
}

.pagination .current {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.pagination .disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: var(--neutral);
}

.pagination .disabled:hover {
    background: var(--neutral);
    color: var(--text);
    border-color: rgba(0, 0, 0, 0.1);
    transform: none;
}

/* No Products */
.no-products {
    text-align: center;
    padding: 4rem 2rem;
    grid-column: 1 / -1;
}

.no-products p {
    font-size: 1.2rem;
    color: var(--text-light);
    margin-bottom: 2rem;
}

.no-products .btn-primary {
    display: inline-flex;
    width: auto;
    padding: 1rem 2rem;
}

/* Loading Animation */
.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid var(--neutral);
    border-top: 3px solid var(--primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 2rem auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 1024px) {
    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .products-hero {
        padding: 4rem 0 3rem;
    }
    
    .products-hero h1 {
        font-size: 2.2rem;
    }
    
    .filters-container {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .search-box {
        min-width: auto;
    }
    
    .category-filters {
        justify-content: center;
    }
    
    .products-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .pagination {
        flex-wrap: wrap;
    }
}

@media (max-width: 480px) {
    .products-hero h1 {
        font-size: 1.8rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .product-info {
        padding: 1.5rem;
    }
    
    .category-filter {
        padding: 0.6rem 1rem;
        font-size: 0.8rem;
    }
}
</style>

<!-- Hero Section -->
<section class="products-hero">
    <div class="container">
        <h1>Our Woodcraft Collection</h1>
        <p class="hero-subtitle">Handcrafted excellence in every piece. Discover our range of bespoke wood products made with passion and precision.</p>
    </div>
</section>

<!-- Search and Filters Section -->
<section class="filters-section">
    <div class="container">
        <form method="GET" action="" class="filters-container" id="filtersForm">
            <div class="search-box">
                <div class="search-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    class="search-input" 
                    placeholder="Search products..." 
                    value="<?= htmlspecialchars($search_query) ?>"
                >
            </div>
            
            <div class="category-filters">
                <a href="?search=<?= urlencode($search_query) ?>&category=all&page=1" 
                   class="category-filter <?= $category_filter === 'all' ? 'active' : '' ?>">
                    All Products
                </a>
                <?php foreach ($categories as $category): ?>
                    <a href="?search=<?= urlencode($search_query) ?>&category=<?= urlencode($category) ?>&page=1" 
                       class="category-filter <?= $category_filter === $category ? 'active' : '' ?>">
                        <?= htmlspecialchars($category) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </form>
        
        <div class="results-info">
            Showing <?= count($paginated_products) ?> of <?= $total_products ?> products
            <?php if (!empty($search_query)): ?>
                for "<?= htmlspecialchars($search_query) ?>"
            <?php endif; ?>
            <?php if ($category_filter !== 'all'): ?>
                in <?= htmlspecialchars($category_filter) ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products-section">
    <div class="container">
        <div class="products-grid">
            <?php if (count($paginated_products) > 0): ?>
                <?php foreach ($paginated_products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <div class="wood-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                                </svg>
                            </div>
                            <div class="availability-badge">
                                <?= $product['is_active'] ? 'In Stock' : 'Out of Stock' ?>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                            <div class="product-price">GH₵ <?= number_format($product['unit_price'], 2) ?></div>
                            <div class="product-category"><?= htmlspecialchars($product['category']) ?></div>
                            <p class="product-description">
                                <?= htmlspecialchars($product['description'] ?? 'Beautifully crafted wood product with exceptional attention to detail.') ?>
                            </p>
                            <div class="product-actions">
                                <a href="<?= SITE_URL ?>/product/<?= $product['id'] ?>" class="btn-primary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    View Details
                                </a>
                                <a href="<?= SITE_URL ?>/product/<?= $product['id'] ?>#contact" class="btn-secondary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                                    </svg>
                                    Inquire
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-products">
                    <p>No products found matching your criteria.</p>
                    <?php if (!empty($search_query) || $category_filter !== 'all'): ?>
                        <a href="?" class="btn-primary">View All Products</a>
                    <?php else: ?>
                        <a href="<?= SITE_URL ?>/contact" class="btn-primary">Contact Us</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <div class="pagination">
            <?php if ($current_page > 1): ?>
                <a href="?search=<?= urlencode($search_query) ?>&category=<?= urlencode($category_filter) ?>&page=<?= $current_page - 1 ?>">
                    Previous
                </a>
            <?php else: ?>
                <span class="disabled">Previous</span>
            <?php endif; ?>

            <?php 
            // Show page numbers with ellipsis for many pages
            $start_page = max(1, $current_page - 2);
            $end_page = min($total_pages, $current_page + 2);
            
            if ($start_page > 1): ?>
                <a href="?search=<?= urlencode($search_query) ?>&category=<?= urlencode($category_filter) ?>&page=1">1</a>
                <?php if ($start_page > 2): ?>
                    <span>...</span>
                <?php endif; ?>
            <?php endif; ?>

            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                <?php if ($i == $current_page): ?>
                    <span class="current"><?= $i ?></span>
                <?php else: ?>
                    <a href="?search=<?= urlencode($search_query) ?>&category=<?= urlencode($category_filter) ?>&page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($end_page < $total_pages): ?>
                <?php if ($end_page < $total_pages - 1): ?>
                    <span>...</span>
                <?php endif; ?>
                <a href="?search=<?= urlencode($search_query) ?>&category=<?= urlencode($category_filter) ?>&page=<?= $total_pages ?>">
                    <?= $total_pages ?>
                </a>
            <?php endif; ?>

            <?php if ($current_page < $total_pages): ?>
                <a href="?search=<?= urlencode($search_query) ?>&category=<?= urlencode($category_filter) ?>&page=<?= $current_page + 1 ?>">
                    Next
                </a>
            <?php else: ?>
                <span class="disabled">Next</span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Real-time search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    let searchTimeout;
    
    // Real-time search with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            document.getElementById('filtersForm').submit();
        }, 500);
    });
    
    // Add loading state during search
    searchInput.addEventListener('input', function() {
        const productsGrid = document.querySelector('.products-grid');
        if (this.value.length > 2) {
            productsGrid.innerHTML = '<div class="loading-spinner"></div>';
        }
    });
    
    // Smooth animations for product cards
    const productCards = document.querySelectorAll('.product-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    productCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>