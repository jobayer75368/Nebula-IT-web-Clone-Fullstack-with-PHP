<script src="/backend/assets/vendor/jquery/jquery.min.js"></script>
<script src="/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/backend/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/backend/assets/js/ruang-admin.min.js"></script>
<!-- <script src="/backend/assets/vendor/chart.js/Chart.min.js"></script> -->
<!-- <script src="/backend/assets/js/demo/chart-area-demo.js"></script> -->
<!-- <script src="/backend/assets/js/demo/chart-pie-demo.js"></script> -->
<!-- <script src="/backend/assets/js/demo/chart-bar-demo.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
  // Summernote 
  $(document).ready(function() {
    $('.summernote').summernote({
      height: 300
    });
  });

  // Image Preview 
  function previewImage(inputId, previewId, wrapperID = null) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const wrapper = wrapperID ? document.getElementById(wrapperID) : null;

    if (!input || !preview) return;

    input.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          if (wrapper) wrapper.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = '#';
        if (wrapper) wrapper.style.display = 'none';
      }
    });
  }
</script>
<script>

</script>