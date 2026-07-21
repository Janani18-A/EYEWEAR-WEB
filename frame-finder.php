<!-- frame-finder.php – Virtual Try-On (Updated Colors + Responsive) -->
<section id="virtualTryonSection" class="bg-primary py-4 py-md-5 position-relative overflow-hidden">
    <!-- Glowing orbs (Gold) – smaller on mobile -->
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10">
        <div class="position-absolute rounded-circle bg-accent" style="width: clamp(150px, 30vw, 350px); height: clamp(150px, 30vw, 350px); top: -80px; left: -80px; filter: blur(80px);"></div>
        <div class="position-absolute rounded-circle bg-accent" style="width: clamp(150px, 30vw, 350px); height: clamp(150px, 30vw, 350px); bottom: -80px; right: -80px; filter: blur(80px);"></div>
    </div>

    <div class="container py-3 py-md-4 position-relative">
        <!-- Section Header – responsive text -->
        <div class="text-center mb-4 mb-md-5 reveal">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3 mb-md-4 p-3 p-md-4" style="background: rgba(255,255,255,0.05); width: clamp(70px, 10vw, 100px); height: clamp(70px, 10vw, 100px);">
                <i class="bi bi-person-bounding-box text-accent fs-2 fs-md-1"></i>
            </div>
            <h2 class="display-6 display-md-5 fw-bold text-white mb-2" style="font-family: 'Poppins', sans-serif;">Find Your Perfect Frame</h2>
            <p class="lead text-white-50 mx-auto px-2" style="max-width: 600px; font-size: clamp(0.9rem, 2vw, 1.25rem);">
                Upload your photo and try on our collection instantly.
            </p>
        </div>

        <!-- Row: Canvas + Controls – tighter gap on mobile -->
        <div class="row g-3 g-lg-4 align-items-start reveal">
            <!-- LEFT: Canvas -->
            <div class="col-lg-7">
                <div class="tryon-preview-wrapper" id="previewWrapper">
                    <img id="uploadedImage" src="" alt="Your photo" style="display: none;" />
                    <div id="frameOverlay">
                        <svg viewBox="0 0 400 500" id="frameSvg" style="width:100%; height:100%;"></svg>
                    </div>
                    <div class="tryon-placeholder" id="placeholderContent">
                        <i class="bi bi-camera"></i>
                        <h5>Upload your photo<br />to try on frames</h5>
                        <p class="small">We'll overlay frames right on your face</p>
                    </div>
                </div>
                <p class="text-white-50 small mt-2 text-center" style="font-size: clamp(0.6rem, 1.2vw, 0.85rem);">
                    <i class="bi bi-info-circle me-1"></i> Drag the sliders to adjust frame size &amp; position
                </p>
            </div>

            <!-- RIGHT: Controls – tighter padding -->
            <div class="col-lg-5">
                <div class="tryon-control-panel d-flex flex-column gap-2 gap-md-3 p-3 p-md-4">
                    <!-- Buttons row – wrap with tighter gap -->
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-emerald px-3 px-md-4 py-1 py-md-2" id="uploadBtn" style="font-size: clamp(0.7rem, 1.2vw, 0.9rem);">
                            <i class="bi bi-cloud-upload me-1 me-md-2"></i>Upload
                        </button>
                        <input type="file" id="fileInput" accept="image/*" style="display: none;" />
                        <button class="btn btn-outline-emerald py-1 py-md-2 px-2 px-md-3" id="sampleFaceBtn" style="font-size: clamp(0.65rem, 1vw, 0.85rem);">
                            <i class="bi bi-person me-1"></i> Sample
                        </button>
                        <button class="btn btn-outline-light btn-sm py-0 py-md-1 px-2 px-md-3" id="resetBtn" style="font-size: clamp(0.6rem, 0.9vw, 0.8rem);">
                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                        </button>
                    </div>

                    <hr class="border-white border-opacity-10 my-1 my-md-2" />

                    <!-- Frame thumbnails – responsive grid -->
                    <div>
                        <p class="text-white fw-semibold mb-2" style="font-size: clamp(0.8rem, 1.2vw, 1rem);"><i class="bi bi-eyeglasses me-2"></i>Choose a Frame</p>
                        <div class="row g-1 g-sm-2" id="frameThumbnails"></div>
                    </div>

                    <!-- Sliders – tighter spacing -->
                    <div class="mt-1 mt-md-2">
                        <p class="text-white fw-semibold mb-2" style="font-size: clamp(0.8rem, 1.2vw, 1rem);"><i class="bi bi-sliders2 me-2"></i>Adjust Fit</p>
                        <div class="mb-2">
                            <label for="sizeSlider" class="form-label tryon-label-gold small" style="font-size: clamp(0.65rem, 1vw, 0.85rem);">Size</label>
                            <input type="range" class="form-range tryon-range" id="sizeSlider" min="50" max="150" value="100" />
                        </div>
                        <div>
                            <label for="positionSlider" class="form-label tryon-label-gold small" style="font-size: clamp(0.65rem, 1vw, 0.85rem);">Vertical Position</label>
                            <input type="range" class="form-range tryon-range" id="positionSlider" min="-100" max="100" value="50" />
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-2 mt-md-3">
                        <button class="btn btn-emerald w-100 py-2 py-md-3" id="shopCta" disabled style="font-size: clamp(0.75rem, 1.2vw, 1rem);">
                            <i class="bi bi-cart-plus me-2"></i>Add This Style to Cart
                        </button>
                        <p class="text-white-50 small mt-1 text-center" id="frameNameDisplay" style="font-size: clamp(0.6rem, 1vw, 0.85rem);">Select a frame first</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SCOPED STYLES – only affect #virtualTryonSection -->
<style>
    /* ================================================================
       PREVIEW WRAPPER – Responsive aspect ratio
       ================================================================ */
    #virtualTryonSection .tryon-preview-wrapper {
        position: relative;
        width: 100%;
        max-width: 560px;
        margin: 0 auto;
        aspect-ratio: 4 / 5;
        background: rgba(255, 255, 255, 0.04);
        border-radius: 20px;
        overflow: hidden;
        border: 2px solid rgba(255, 255, 255, 0.06);
        box-shadow: inset 0 0 60px rgba(0, 0, 0, 0.5);
        transition: border-color 0.3s ease;
    }
    #virtualTryonSection .tryon-preview-wrapper.has-image {
        border-color: rgba(200, 169, 81, 0.3);
    }
    #virtualTryonSection #uploadedImage {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    #virtualTryonSection #frameOverlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        pointer-events: none;
    }
    #virtualTryonSection #frameOverlay svg {
        width: 100%; height: 100%;
        filter: drop-shadow(0 4px 20px rgba(0,0,0,0.3));
    }
    #virtualTryonSection .tryon-placeholder {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.25);
        pointer-events: none;
        text-align: center;
        padding: 1rem;
    }
    #virtualTryonSection .tryon-placeholder i {
        font-size: clamp(2.5rem, 8vw, 4rem);
        margin-bottom: 0.5rem;
        color: rgba(200, 169, 81, 0.5);
    }
    #virtualTryonSection .tryon-placeholder h5 {
        font-weight: 300;
        color: rgba(255,255,255,0.4);
        font-size: clamp(0.8rem, 2vw, 1.25rem);
    }
    #virtualTryonSection .tryon-placeholder p {
        font-size: clamp(0.6rem, 1.2vw, 0.85rem);
    }

    /* ================================================================
       CONTROL PANEL
       ================================================================ */
    #virtualTryonSection .tryon-control-panel {
        background: rgba(255,255,255,0.02);
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.05);
        /* padding now handled by Bootstrap p-3 p-md-4 on the panel */
    }

    /* ================================================================
       FRAME THUMBNAILS
       ================================================================ */
    #virtualTryonSection .frame-thumb {
        width: 100%;
        aspect-ratio: 1 / 1;
        background: rgba(255,255,255,0.04);
        border: 2px solid rgba(255,255,255,0.08);
        border-radius: 10px;
        padding: 4px;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #virtualTryonSection .frame-thumb:hover {
        border-color: rgba(200, 169, 81, 0.5);
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
    }
    #virtualTryonSection .frame-thumb.active {
        border-color: var(--accent, #C8A951);
        background: rgba(200, 169, 81, 0.1);
        box-shadow: 0 0 20px rgba(200, 169, 81, 0.2);
    }
    #virtualTryonSection .frame-thumb svg {
        width: 100%;
        height: 100%;
    }

    /* ================================================================
       SLIDERS
       ================================================================ */
    #virtualTryonSection .tryon-label-gold {
        color: rgba(200, 169, 81, 0.9);
        font-weight: 500;
    }
    #virtualTryonSection .tryon-range {
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        height: 6px;
    }
    #virtualTryonSection .tryon-range::-webkit-slider-thumb {
        background: var(--accent, #C8A951);
        border: none;
        width: 18px; height: 18px;
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(200, 169, 81, 0.5);
    }
    #virtualTryonSection .tryon-range::-moz-range-thumb {
        background: var(--accent, #C8A951);
        border: none;
    }

    /* ================================================================
       BUTTONS – Responsive sizes already applied inline
       ================================================================ */
    #virtualTryonSection .btn-outline-emerald {
        border: 2px solid var(--primary, #0F3D2E);
        color: var(--white, #FFFFFF);
        background: transparent;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    #virtualTryonSection .btn-outline-emerald:hover {
        background: var(--primary, #0F3D2E);
        color: var(--white, #FFFFFF);
    }

    /* ================================================================
       RESPONSIVE OVERRIDES – smaller screens
       ================================================================ */

    /* Tablet */
    @media (max-width: 991.98px) {
        #virtualTryonSection .tryon-preview-wrapper {
            max-width: 100%;
            aspect-ratio: 4 / 5;
        }
        #virtualTryonSection .tryon-control-panel {
            padding: 1.25rem !important;
        }
        #virtualTryonSection .frame-thumb {
            padding: 3px;
            border-radius: 8px;
        }
    }

    /* Mobile */
    @media (max-width: 575.98px) {
        #virtualTryonSection .tryon-preview-wrapper {
            aspect-ratio: 4 / 5;
            border-radius: 14px;
        }
        #virtualTryonSection .tryon-control-panel {
            padding: 0.8rem !important;
            border-radius: 14px;
        }
        #virtualTryonSection .frame-thumb {
            padding: 2px;
            border-radius: 6px;
            border-width: 1.5px;
        }
        #virtualTryonSection .tryon-range::-webkit-slider-thumb {
            width: 14px;
            height: 14px;
        }
        #virtualTryonSection .tryon-range {
            height: 4px;
        }
        /* Reduce gap between thumbnails */
        #virtualTryonSection .row.g-1 {
            --bs-gutter-y: 0.25rem !important;
            --bs-gutter-x: 0.25rem !important;
        }
        /* Adjust section padding */
        #virtualTryonSection .py-4 {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }
    }

    /* Small Mobile */
    @media (max-width: 380px) {
        #virtualTryonSection .tryon-control-panel {
            padding: 0.6rem !important;
        }
        #virtualTryonSection .frame-thumb {
            padding: 1px;
            border-width: 1px;
        }
        #virtualTryonSection .tryon-placeholder i {
            font-size: 2rem !important;
        }
        #virtualTryonSection .tryon-placeholder h5 {
            font-size: 0.7rem !important;
        }
        #virtualTryonSection .tryon-placeholder p {
            font-size: 0.5rem !important;
        }
        .btn-emerald, .btn-outline-emerald {
            font-size: 0.6rem !important;
            padding: 0.2rem 0.6rem !important;
        }
    }
</style>

<!-- JavaScript (unchanged – only colors updated via CSS) -->
<script>
    (function() {
        const previewWrapper = document.getElementById('previewWrapper');
        const uploadedImage = document.getElementById('uploadedImage');
        const placeholderContent = document.getElementById('placeholderContent');
        const frameSvg = document.getElementById('frameSvg');
        const fileInput = document.getElementById('fileInput');
        const uploadBtn = document.getElementById('uploadBtn');
        const sampleFaceBtn = document.getElementById('sampleFaceBtn');
        const resetBtn = document.getElementById('resetBtn');
        const shopCta = document.getElementById('shopCta');
        const frameNameDisplay = document.getElementById('frameNameDisplay');
        const sizeSlider = document.getElementById('sizeSlider');
        const positionSlider = document.getElementById('positionSlider');
        const thumbContainer = document.getElementById('frameThumbnails');

        const frameTypes = [
            { id: 'rectangle', label: 'Rectangle', path: `<rect x="100" y="130" width="80" height="45" rx="8" stroke="currentColor" stroke-width="6" fill="rgba(255,255,255,0.1)"/><rect x="220" y="130" width="80" height="45" rx="8" stroke="currentColor" stroke-width="6" fill="rgba(255,255,255,0.1)"/><path d="M180 152 L220 152" stroke="currentColor" stroke-width="4"/><path d="M180 170 L220 170" stroke="currentColor" stroke-width="4"/><line x1="140" y1="152" x2="155" y2="152" stroke="currentColor" stroke-width="3"/><line x1="260" y1="152" x2="275" y2="152" stroke="currentColor" stroke-width="3"/>` },
            { id: 'round', label: 'Round', path: `<circle cx="140" cy="160" r="40" stroke="currentColor" stroke-width="6" fill="rgba(255,255,255,0.1)"/><circle cx="260" cy="160" r="40" stroke="currentColor" stroke-width="6" fill="rgba(255,255,255,0.1)"/><path d="M180 160 L220 160" stroke="currentColor" stroke-width="4"/><path d="M180 175 L220 175" stroke="currentColor" stroke-width="4"/><line x1="100" y1="160" x2="115" y2="160" stroke="currentColor" stroke-width="3"/><line x1="285" y1="160" x2="300" y2="160" stroke="currentColor" stroke-width="3"/>` },
            { id: 'aviator', label: 'Aviator', path: `<path d="M110 140 Q140 110 170 140 L180 170 Q140 190 100 170 Z" stroke="currentColor" stroke-width="5" fill="rgba(255,255,255,0.1)"/><path d="M230 140 Q260 110 290 140 L300 170 Q260 190 220 170 Z" stroke="currentColor" stroke-width="5" fill="rgba(255,255,255,0.1)"/><path d="M170 150 L230 150" stroke="currentColor" stroke-width="4"/><path d="M170 165 L230 165" stroke="currentColor" stroke-width="4"/><line x1="130" y1="155" x2="145" y2="155" stroke="currentColor" stroke-width="3"/><line x1="255" y1="155" x2="270" y2="155" stroke="currentColor" stroke-width="3"/>` },
            { id: 'cateye', label: 'Cat Eye', path: `<path d="M90 140 L140 115 L170 140 L175 170 Q140 190 105 170 Z" stroke="currentColor" stroke-width="5" fill="rgba(255,255,255,0.1)"/><path d="M230 140 L260 115 L310 140 L295 170 Q260 190 225 170 Z" stroke="currentColor" stroke-width="5" fill="rgba(255,255,255,0.1)"/><path d="M180 150 L220 150" stroke="currentColor" stroke-width="4"/><path d="M180 165 L220 165" stroke="currentColor" stroke-width="4"/><line x1="140" y1="155" x2="155" y2="155" stroke="currentColor" stroke-width="3"/><line x1="245" y1="155" x2="260" y2="155" stroke="currentColor" stroke-width="3"/>` }
        ];

        let currentFrameId = null, currentScale = 100, currentOffsetY = 50, imageLoaded = false;
        function buildThumbnails() {
            thumbContainer.innerHTML = '';
            frameTypes.forEach((frame, index) => {
                const col = document.createElement('div');
                col.className = 'col-3';
                const div = document.createElement('div');
                div.className = 'frame-thumb' + (index === 0 ? ' active' : '');
                div.dataset.id = frame.id;
                const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svg.setAttribute('viewBox', '0 0 400 500');
                svg.style.width = '100%'; svg.style.height = '100%';
                const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
                g.style.stroke = '#C8A951'; g.style.fill = 'none'; g.style.strokeWidth = '4';
                g.innerHTML = frame.path;
                svg.appendChild(g);
                div.appendChild(svg);
                div.addEventListener('click', () => selectFrame(frame.id));
                col.appendChild(div);
                thumbContainer.appendChild(col);
            });
        }

        function selectFrame(id) {
            currentFrameId = id;
            document.querySelectorAll('#virtualTryonSection .frame-thumb').forEach(el => el.classList.toggle('active', el.dataset.id === id));
            const frame = frameTypes.find(f => f.id === id);
            if (frame) {
                frameNameDisplay.textContent = 'Selected: ' + frame.label;
                shopCta.disabled = false;
            }
            renderFrame();
        }

        function renderFrame() {
            if (!currentFrameId) { frameSvg.innerHTML = ''; return; }
            const frame = frameTypes.find(f => f.id === currentFrameId);
            if (!frame) return;
            const scaleFactor = currentScale / 100;
            const offsetY = currentOffsetY;
            frameSvg.innerHTML = '';
            const g = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            const cx = 200, cy = 200;
            const transform = `translate(${cx}, ${cy}) scale(${scaleFactor}) translate(${-cx}, ${-cy + offsetY})`;
            g.setAttribute('transform', transform);
            const wrapper = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            wrapper.style.stroke = '#C8A951'; wrapper.style.fill = 'rgba(255,255,255,0.05)'; wrapper.style.strokeWidth = '5';
            wrapper.innerHTML = frame.path;
            g.appendChild(wrapper);
            frameSvg.appendChild(g);
        }

        function loadImage(src) {
            uploadedImage.src = src;
            uploadedImage.style.display = 'block';
            placeholderContent.style.display = 'none';
            previewWrapper.classList.add('has-image');
            imageLoaded = true;
            if (!currentFrameId) selectFrame(frameTypes[0].id);
            else renderFrame();
            shopCta.disabled = !currentFrameId;
        }

        function resetAll() {
            uploadedImage.src = ''; uploadedImage.style.display = 'none';
            placeholderContent.style.display = 'flex';
            previewWrapper.classList.remove('has-image');
            imageLoaded = false; currentFrameId = null;
            shopCta.disabled = true; frameNameDisplay.textContent = 'Select a frame first';
            sizeSlider.value = 100;
            positionSlider.value = 50;
            currentScale = 100;
            currentOffsetY = 50;
            frameSvg.innerHTML = '';
            document.querySelectorAll('#virtualTryonSection .frame-thumb').forEach(el => el.classList.remove('active'));
            fileInput.value = '';
        }

        uploadBtn.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', function() {
            if (this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => loadImage(e.target.result);
                reader.readAsDataURL(this.files[0]);
            }
        });
        sampleFaceBtn.addEventListener('click', () => {
            const randomFace = Math.random() > 0.5
                ? 'assets/images/sample-male-image.png'
                : 'assets/images/sample-female-image.png';
            loadImage(randomFace);
        });
        resetBtn.addEventListener('click', resetAll);
        sizeSlider.addEventListener('input', function() { currentScale = parseFloat(this.value); renderFrame(); });
        positionSlider.addEventListener('input', function() { currentOffsetY = parseFloat(this.value); renderFrame(); });
        shopCta.addEventListener('click', () => {
            const frame = frameTypes.find(f => f.id === currentFrameId);
            alert(frame ? `Added ${frame.label} to cart!` : 'Select a frame first');
        });

        buildThumbnails();
    })();
</script>