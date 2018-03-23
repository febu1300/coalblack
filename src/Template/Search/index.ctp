<form enctype='application/json' method="post" action="Search/index">
    <input type='text' name='bottle-on-wall' value='1'>
    <input type="submit">
</form>
<div id="div1"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("input").keyup(function () {
         
 $.ajax({url: "/Search.index", success: function(result){
            $("#div1").html(result);
        }});
        });
    });
</script>