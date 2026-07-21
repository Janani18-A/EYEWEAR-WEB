<!-- quick-actions.php -->
<section class="bg-primary py-5">
    <div class="container py-4">
        <div class="text-center mb-5 reveal">
            <h2 class="display-5 display-md-4 fw-bold text-white mb-3" style="font-family: 'Poppins', sans-serif;">Find Your Perfect Shape</h2>
            <p class="text-white-50 fs-5 fs-md-4">Discover frames that flatter your face shape.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $shapes = [
                ['Round', 'bi-circle', 'round-shape.png'],
                ['Square', 'bi-square', 'square-shape.png'],
                ['Aviator', 'bi-sunglasses', 'aviator-shape.png'],
                ['Cat-Eye', 'bi-eye', 'cateye-shape.png'],
                ['Rectangle', 'bi-border-width', 'rectangle-shape.png'],
                ['Oval', 'bi-circle-half', 'oval-shape.png'],
                ['Wayfarer', 'bi-shield', 'wayfarer-shape.png'],
                ['Geometric', 'bi-hexagon', 'geometric-shape.png']
            ];

            foreach ($shapes as $shape):
            ?>
                <div class="col-6 col-md-3 col-lg-2 reveal">
                    <a href="#" class="text-decoration-none">
                        <div class="shape-circle mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center bg-white bg-opacity-10 border border-2 border-white border-opacity-25"
                            style="transition: all 0.4s ease; cursor: pointer; overflow: hidden;">

                            <?php if (file_exists('assets/images/' . $shape[2])): ?>
                                <img src="assets/images/<?php echo $shape[2]; ?>"
                                    alt="<?php echo $shape[0]; ?>"
                                    class="shape-img w-100 h-100"
                                    style="object-fit: contain; transition: all 0.4s ease;">
                            <?php else: ?>
                                <i class="bi <?php echo $shape[1]; ?> text-white" style="font-size: 2rem;"></i>
                            <?php endif; ?>

                        </div>
                        <p class="text-center text-white fw-semibold small"><?php echo $shape[0]; ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- ===== RESPONSIVE STYLES FOR THIS SECTION ===== -->
<!-- ============================================================ -->
<style>
    /* ----- Default circle size (desktop) ----- */
    .shape-circle {
        width: 120px;
        height: 120px;
    }

    /* ----- Tablet (≤991px) ----- */
    @media (max-width: 991.98px) {
        .shape-circle {
            width: 100px;
            height: 100px;
        }
        /* Reduce heading sizes on tablet */
        .display-5 {
            font-size: 2.5rem !important;
        }
        .fs-5 {
            font-size: 1.1rem !important;
        }
    }

    /* ----- Mobile (≤767px) ----- */
    @media (max-width: 767.98px) {
        .shape-circle {
            width: 80px;
            height: 80px;
        }
        .display-5 {
            font-size: 2rem !important;
        }
        .fs-5 {
            font-size: 0.95rem !important;
        }
    }

    /* ----- Small Mobile (≤575px) ----- */
    @media (max-width: 575.98px) {
        .shape-circle {
            width: 70px;
            height: 70px;
        }
        .display-5 {
            font-size: 1.6rem !important;
        }
        .fs-5 {
            font-size: 0.85rem !important;
        }
        /* Reduce gap on small screens */
        .row.g-4 {
            --bs-gutter-y: 1.5rem !important;
            --bs-gutter-x: 1.5rem !important;
        }
    }
</style>