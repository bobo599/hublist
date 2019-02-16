<script type="text/javascript">
$(document).ready(function(){
    $("#btn").click(function() {
        var val = "Hi";
        $.ajax ({
            url: "detail.php",
            data: { val : val },
            success: function( result ) {
                alert("Hi, testing");
                alert( result );
            }
        });
    });
});
</script>