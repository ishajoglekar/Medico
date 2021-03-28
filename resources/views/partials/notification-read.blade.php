<script>
    $("#header_notification_bar").click(function(){
        route = "{{route('ajax.readNotification')}}";
        $("#unread").html(0);
        $.ajax({
            url: route,
            method: "POST",
            data:{
                _token: "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(success){
                $("#unread").html(0);
            }
        });
    });
</script>
