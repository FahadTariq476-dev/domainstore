$(document).ready(function(){
    console.log(`working`);
   $(document).on('submit', 'form', function(e){
    e.preventDefault();
    
    let myobj = {};
    const len = $(this).find("input, select, textarea").length;
    $(this).find("input, select, textarea").each(function(i){
        myobj[$(this).prev('label').text()] = $(this).val();

        //end of loop
        if(i+1 == len)
        {
            $.ajax({
                url: "http://localhost:8003/domain/query",
                method: 'POST',
                data: {data: JSON.stringify(myobj), 'domain_id': $("#did").val()},
                success: function(resp){
                    $("form").slideUp();
                    $('<h3>Your Query is Submitted</h3>').insertAfter($('.build'));
                },
                error: function(err){
                    alert('Error!!!');
                }
            });
        }
    });

    
   }); 
});