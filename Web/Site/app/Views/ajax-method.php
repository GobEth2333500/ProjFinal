<button type="button" id="btn-click">Click Me</button>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(function(){

    $(document).on("click", "#btn-click", function(){
        $.ajax({
            url: "<?= site_url('pages/handle-myajax') ?>",
            type: "POST",
            data: {
                name: "Éthan"
            },
            dataType: "JSON",
            success: function(response){
                console.log(response);
            }   
        });
    });
})
</script>