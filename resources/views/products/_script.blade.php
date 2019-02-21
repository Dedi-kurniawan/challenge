@push('scripts')
<script>
  $('#image,#validation-kosong, #validation-min, #validation-max').hide();
  $(document).ready(function() {
    $("form").submit(function(){
        var $image = $(".image-create").val();
        console.log($image);
        if($image == ""){
        $("#validation-kosong").show();
        return false;
        }else{
        $("#validation-kosong").hide();
        return true;
        }
    });

    $('#img').on('click', function(e) {
      $('#image').click();
    });
    $('#image').on('change', function(e) {
      var file = this;
      var minwidth = 300;
      var minheight = 250;
      var maxwidth = 800;
      var maxheight = 850;
      if (file.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var image = new Image();
          image.src = e.target.result;
          image.onload = function() {
            var height = this.height;
            var width = this.width;
            if (width < minwidth && height < minheight) {
              console.log('witdh', width);
              $("#validation-min").show();
              return false;
            } else if (width > maxwidth && height > maxheight) {
              console.log('height', height);
              $("#validation-max").show();
              return false;
            } else {
              $('#img').attr('src', e.target.result);
              $('#validation-min, #validation-max, #validation-kosong').hide();
            }
          }
        }
        reader.readAsDataURL(file.files[0]);
      }
    });


  });

  $('.select2').select2({
    placeholder: "Pilih Supplier",
  });

  (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation'); // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            },
            false);
        });
      },
      false);
  })();

</script>
@endpush
