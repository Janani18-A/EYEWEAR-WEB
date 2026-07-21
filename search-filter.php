<!-- search-filter.php – Shared Search Bar with Live Filtering -->
<div class="search-filter-section bg-white py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="position-relative">
                    <input type="text" id="liveSearchInput" class="form-control form-control-lg rounded-pill ps-4 pe-5" placeholder="Search by shape, material, or style…" style="border: 2px solid var(--navy);">
                    <button class="btn btn-gold rounded-circle position-absolute top-50 end-0 translate-middle-y me-2" style="width: 44px; height: 44px;">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Live search filtering (shared across pages)
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('liveSearchInput');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                const productCards = document.querySelectorAll('.product-card');
                productCards.forEach(card => {
                    const name = card.querySelector('.product-name')?.textContent.toLowerCase() || '';
                    const material = card.querySelector('.product-material')?.textContent.toLowerCase() || '';
                    const category = card.dataset.category || '';
                    if (name.includes(filter) || material.includes(filter) || category.includes(filter)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }
    });
</script>