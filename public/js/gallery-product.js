// Gallery Product Display Script
document.addEventListener('DOMContentLoaded', function() {
    console.log('Gallery script loaded - starting product fetch...');
    
    let allProducts = [];
    let currentPage = 1;
    const productsPerPage = 20;
    
    // Fetch the product data from JSON file
    fetch('assets/json/products.json')
        .then(response => {
            console.log('Fetch response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(products => {
            allProducts = products;
            console.log('Products JSON loaded successfully:', allProducts);
            console.log('Number of products:', allProducts.length);
            
            if (allProducts.length > 0) {
                console.log('First product sample:', allProducts[0]);
                console.log('First product images:', allProducts[0].images);
                console.log('Second image path:', allProducts[0].images[1]);
            }
            
            displayProductsPage();
        })
        .catch(error => {
            console.error('Error loading product data:', error);
            displayErrorMessage('Failed to load products. Please check console for details.');
        });

    function displayProductsPage() {
        const projectGrid = document.querySelector('.project-grid');
        
        if (!projectGrid) {
            console.error('Project grid element not found!');
            return;
        }
        
        console.log(`Displaying page ${currentPage}...`);
        
        // Calculate start and end indices for current page
        const startIndex = (currentPage - 1) * productsPerPage;
        const endIndex = startIndex + productsPerPage;
        const currentProducts = allProducts.slice(startIndex, endIndex);
        
        console.log(`Showing products ${startIndex + 1} to ${Math.min(endIndex, allProducts.length)} of ${allProducts.length}`);
        
        // Clear existing content only on first page
        if (currentPage === 1) {
            projectGrid.innerHTML = '';
        }
        
        if (!currentProducts || currentProducts.length === 0) {
            console.warn('No products to display for this page');
            if (currentPage === 1) {
                displayErrorMessage('No products found in the JSON file.');
            }
            return;
        }
        
        console.log(`Creating ${currentProducts.length} product cards for page ${currentPage}...`);
        
        // Create and append product cards for current page
        currentProducts.forEach((product, index) => {
            console.log(`Creating card ${startIndex + index + 1}:`, product.name);
            const productCard = createProductCard(product);
            projectGrid.appendChild(productCard);
        });
        
        console.log(`Page ${currentPage} product cards created successfully`);
        
        // Add or update Show More button
        updateShowMoreButton();
    }

    function createProductCard(product) {
        // Create column div
        const colDiv = document.createElement('div');
        colDiv.className = 'col-xl-4 col-md-6';
        
        // Create project card div
        const projectCard = document.createElement('div');
        projectCard.className = 'project-card style4';
        
        // Create project thumb div
        const projectThumb = document.createElement('div');
        projectThumb.className = 'project-thumb';
        
        // Create image element
        const img = document.createElement('img');
        
        // Use the SECOND image from the product (index 1)
        const imagePath = 'assets/' + product.images[1];
        console.log(`Setting SECOND image src for ${product.name}:`, imagePath);
        
        img.src = imagePath;
        img.alt = product.name;
        img.loading = 'lazy';
        
        // Add detailed error handling for images
        img.onerror = function() {
            console.error(`❌ FAILED to load SECOND image: ${imagePath}`);
            console.error(`Product: ${product.name}`);
            console.error(`Available images:`, product.images);
            console.error(`Full image path attempted: ${window.location.origin}/${imagePath}`);
            
            // Try to create a colored placeholder instead
            this.style.backgroundColor = '#f0f0f0';
            this.style.minHeight = '200px';
            this.style.display = 'flex';
            this.style.alignItems = 'center';
            this.style.justifyContent = 'center';
            this.innerHTML = `<span style="color: #666; font-size: 14px;">Second image not found: ${product.name}</span>`;
        };
        
        img.onload = function() {
            console.log(`✅ SECOND image loaded successfully: ${imagePath}`);
        };
        
        // Create content div
        const contentDiv = document.createElement('div');
        contentDiv.className = 'content';
        
        // Create title
        const title = document.createElement('h3');
        title.textContent = product.name;
        console.log(`Title set: ${product.name}`);
        
        // Build the structure
        contentDiv.appendChild(title);
        projectThumb.appendChild(img);
        projectThumb.appendChild(contentDiv);
        projectCard.appendChild(projectThumb);
        colDiv.appendChild(projectCard);
        
        // Add click event for image preview - also use second image
        projectCard.onclick = function() {
            console.log(`Opening preview for: ${product.name}`);
            openImagePreview('assets/' + product.images[1], product.name);
        };
        
        return colDiv;
    }

    function updateShowMoreButton() {
        const projectGrid = document.querySelector('.project-grid');
        const totalPages = Math.ceil(allProducts.length / productsPerPage);
        const currentEndIndex = currentPage * productsPerPage;
        const remainingProducts = allProducts.length - currentEndIndex;
        
        console.log(`Current page: ${currentPage}, Total pages: ${totalPages}, Remaining products: ${remainingProducts}`);
        
        // Remove existing Show More button if it exists
        const existingButton = document.getElementById('showMoreButton');
        if (existingButton) {
            existingButton.remove();
        }
        
        // Add Show More button if there are more products to show
        if (currentPage < totalPages) {
            const showMoreCol = document.createElement('div');
            showMoreCol.className = 'col-12 text-center';
            showMoreCol.id = 'showMoreButton';
            
            const showMoreButton = document.createElement('button');
            showMoreButton.className = 'theme-btn';
            showMoreButton.innerHTML = `
                <span>
                    Show More
                    <i class="fa-solid fa-chevron-down"></i>
                </span>
            `;
            
            showMoreButton.onclick = function() {
                currentPage++;
                console.log(`Loading next page: ${currentPage}`);
                displayProductsPage();
                
                // Smooth scroll to show new content
                setTimeout(() => {
                    showMoreButton.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }, 100);
            };
            
            showMoreCol.appendChild(showMoreButton);
            projectGrid.appendChild(showMoreCol);
            
            console.log('Show More button added');
        } else {
            console.log('All products loaded, no Show More button needed');
            
            // Show completion message if all products are loaded
            if (allProducts.length > 0) {
                const completionCol = document.createElement('div');
                completionCol.className = 'col-12 text-center';
                completionCol.innerHTML = `
                    <div class="alert alert-info mt-4">
                        <p class="mb-0">All ${allProducts.length} products loaded</p>
                    </div>
                `;
                projectGrid.appendChild(completionCol);
            }
        }
    }

    function displayErrorMessage(message) {
        const projectGrid = document.querySelector('.project-grid');
        if (projectGrid) {
            projectGrid.innerHTML = `
                <div class="col-12 text-center">
                    <div class="alert alert-warning">
                        <h4>⚠️ Loading Issue</h4>
                        <p>${message}</p>
                        <small>Check browser console (F12) for detailed error information.</small>
                    </div>
                </div>
            `;
        }
    }

    // Image preview functionality
    function openImagePreview(src, caption) {
        console.log(`Opening image preview: ${src}`);
        const previewImage = document.getElementById("previewImage");
        const previewCaption = document.getElementById("previewCaption");
        const modal = document.getElementById("imagePreviewModal");
        
        if (previewImage && previewCaption && modal) {
            previewImage.src = src;
            previewCaption.innerHTML = caption;
            modal.style.display = "block";
            console.log('Preview modal opened');
        } else {
            console.error('Preview modal elements not found');
        }
    }
    
    // Make closeImagePreview globally available
    window.closeImagePreview = function() {
        const modal = document.getElementById("imagePreviewModal");
        if (modal) {
            modal.style.display = "none";
            console.log('Preview modal closed');
        }
    };
    
    // Close modal when clicking outside the image
    const modal = document.getElementById("imagePreviewModal");
    if (modal) {
        modal.addEventListener("click", function(event) {
            if (event.target === this) {
                closeImagePreview();
            }
        });
    }
    
    // Close modal with Escape key
    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            closeImagePreview();
        }
    });
});