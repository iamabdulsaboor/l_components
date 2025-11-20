<x-header />
    <style>
      /* Custom styles for the image preview modal */
      .image-preview-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        overflow: auto;
      }
      
      .image-preview-content {
        margin: auto;
        display: block;
        max-width: 90%;
        max-height: 90%;
        margin-top: 5vh;
      }
      
      .image-preview-close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
      }
      
      .image-preview-caption {
        text-align: center;
        color: #fff;
        padding: 10px 0;
        font-size: 18px;
      }
      
      .project-card {
        cursor: pointer;
      }
    </style>

    
    <x-navbar />

    <!-- Breadcumb Section  S T A R T -->
    <div class="breadcumb-section">
      <div class="breadcumb-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="breadcumb-content">
                <h1 class="breadcumb-title">Gallery</h1>
                <ul class="breadcumb-menu">
                  <li><a href="index.html">Home</a></li>
                  <li class="text-white">
                    <i class="fa-solid fa-chevrons-right"></i>
                  </li>
                  <li class="active">Gallery</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Gallery Section S T A R T -->
<div class="project-section section-padding fix">
    <div class="container">
        <div class="row gy-30 gx-30 project-grid">
            <!-- Products will be dynamically loaded here by JavaScript -->
        </div>
    </div>
</div>

<!-- Image Preview Modal -->
<div id="imagePreviewModal" class="image-preview-modal">
    <span class="image-preview-close" onclick="closeImagePreview()">&times;</span>
    <img class="image-preview-content" id="previewImage">
    <div id="previewCaption" class="image-preview-caption"></div>
</div>

   <x-footer />
    
    <script>
      // Image preview functionality
      function openImagePreview(src, caption) {
        document.getElementById("previewImage").src = src;
        document.getElementById("previewCaption").innerHTML = caption;
        document.getElementById("imagePreviewModal").style.display = "block";
      }
      
      function closeImagePreview() {
        document.getElementById("imagePreviewModal").style.display = "none";
      }
      
      // Close modal when clicking outside the image
      document.getElementById("imagePreviewModal").addEventListener("click", function(event) {
        if (event.target === this) {
          closeImagePreview();
        }
      });
      
      // Close modal with Escape key
      document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
          closeImagePreview();
        }
      });
    </script>
  </body>
</html>