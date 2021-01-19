<script src="{{asset('js/domainQuery.js')}}"></script>
@if(isset($form))
  <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
</body>

<script>
  $(document).ready(function(){
    var formRenderOptions = {
      formData: '{!! $form !!}'
    };
    var formRenderInstance = $('.build').formRender(formRenderOptions);
  });
  </script>
@endif