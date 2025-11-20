// Gallery Product Display Script
document.addEventListener("DOMContentLoaded", function () {
    console.log("Gallery script loaded - starting product fetch...");

    let allProducts = [];
    let currentPage = 1;
    const productsPerPage = 20;

    // Fetch the product data from JSON file in public folder
    fetch("/json/products.json")
        .then((response) => {
            console.log("Fetch response status:", response.status);
            if (!response.ok)
                throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
        })
        .then((products) => {
            allProducts = products;
            console.log("Products loaded:", allProducts.length);
            displayProductsPage();
        })
        .catch((error) => {
            console.error("Error loading product data:", error);
            displayErrorMessage(
                "Failed to load products. Check console for details."
            );
        });

    // Display products for current page
    function displayProductsPage() {
        const projectGrid = document.querySelector(".project-grid");
        if (!projectGrid)
            return console.error("Project grid element not found");

        const startIndex = (currentPage - 1) * productsPerPage;
        const endIndex = startIndex + productsPerPage;
        const currentProducts = allProducts.slice(startIndex, endIndex);

        // Clear only on first page
        if (currentPage === 1) projectGrid.innerHTML = "";

        if (!currentProducts.length) {
            if (currentPage === 1)
                displayErrorMessage("No products found in JSON.");
            return;
        }

        // Create product cards
        currentProducts.forEach((product, index) => {
            const productCard = createProductCard(product);
            projectGrid.appendChild(productCard);
        });

        // Update Show More button
        updateShowMoreButton();
    }

    // Create a single product card
    function createProductCard(product) {
        const colDiv = document.createElement("div");
        colDiv.className = "col-xl-4 col-md-6";

        const projectCard = document.createElement("div");
        projectCard.className = "project-card style4";

        const projectThumb = document.createElement("div");
        projectThumb.className = "project-thumb";

        const img = document.createElement("img");

        // Use second image if available, otherwise fallback to first
        const imagePath = product.images[1]
            ? "/" + product.images[1]
            : "/" + product.images[0];

        img.src = imagePath;
        img.alt = product.name;
        img.loading = "lazy";

        // Error handling for missing images
        img.onerror = function () {
            console.warn(`Image not found: ${imagePath}`);
            this.style.backgroundColor = "#f0f0f0";
            this.style.minHeight = "200px";
            this.style.display = "flex";
            this.style.alignItems = "center";
            this.style.justifyContent = "center";
            this.innerHTML = `<span style="color:#666;font-size:14px;">Image missing: ${product.name}</span>`;
        };

        // Content
        const contentDiv = document.createElement("div");
        contentDiv.className = "content";

        const title = document.createElement("h3");
        title.textContent = product.name;
        contentDiv.appendChild(title);

        projectThumb.appendChild(img);
        projectThumb.appendChild(contentDiv);
        projectCard.appendChild(projectThumb);
        colDiv.appendChild(projectCard);

        // Click to open preview modal
        projectCard.onclick = function () {
            openImagePreview(imagePath, product.name);
        };

        return colDiv;
    }

    // Show More button logic
    function updateShowMoreButton() {
        const projectGrid = document.querySelector(".project-grid");
        const totalPages = Math.ceil(allProducts.length / productsPerPage);

        // Remove old button
        const oldButton = document.getElementById("showMoreButton");
        if (oldButton) oldButton.remove();

        if (currentPage < totalPages) {
            const showMoreCol = document.createElement("div");
            showMoreCol.className = "col-12 text-center";
            showMoreCol.id = "showMoreButton";

            const showMoreBtn = document.createElement("button");
            showMoreBtn.className = "theme-btn";
            showMoreBtn.innerHTML = `
                <span>Show More <i class="fa-solid fa-chevron-down"></i></span>
            `;

            showMoreBtn.onclick = function () {
                currentPage++;
                displayProductsPage();
                setTimeout(() => {
                    showMoreBtn.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                }, 100);
            };

            showMoreCol.appendChild(showMoreBtn);
            projectGrid.appendChild(showMoreCol);
        } else if (allProducts.length > 0) {
            const completionCol = document.createElement("div");
            completionCol.className = "col-12 text-center mt-4";
            completionCol.innerHTML = `<div class="alert alert-info">All ${allProducts.length} products loaded</div>`;
            projectGrid.appendChild(completionCol);
        }
    }

    // Display error messages
    function displayErrorMessage(message) {
        const projectGrid = document.querySelector(".project-grid");
        if (projectGrid) {
            projectGrid.innerHTML = `
                <div class="col-12 text-center">
                    <div class="alert alert-warning">
                        <h4>⚠️ Loading Issue</h4>
                        <p>${message}</p>
                        <small>Check browser console for details.</small>
                    </div>
                </div>
            `;
        }
    }

    // Modal preview
    function openImagePreview(src, caption) {
        const previewImage = document.getElementById("previewImage");
        const previewCaption = document.getElementById("previewCaption");
        const modal = document.getElementById("imagePreviewModal");

        if (previewImage && previewCaption && modal) {
            previewImage.src = src;
            previewCaption.innerText = caption;
            modal.style.display = "block";
        }
    }

    window.closeImagePreview = function () {
        const modal = document.getElementById("imagePreviewModal");
        if (modal) modal.style.display = "none";
    };

    // Close modal on outside click
    const modal = document.getElementById("imagePreviewModal");
    if (modal) {
        modal.addEventListener("click", (event) => {
            if (event.target === modal) closeImagePreview();
        });
    }

    // Close modal with Escape key
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") closeImagePreview();
    });
});