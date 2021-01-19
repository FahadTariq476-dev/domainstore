
<script>
@foreach(App\EmailTemplate::all() as $email_template)	
        $(document).ready(function(){
            $("#temp{{$email_template->id}}").click(function() {
              var temp = $("#temp{{$email_template->id").val();
              alert(temp);
            });
        });
 @endforeach      
</script>