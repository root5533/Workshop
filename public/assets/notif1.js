function myfunction() {
    document.getElementById('title').innerHTML = Date();
}

function load_unseen_notification(view='')
{
    $.ajax({
        url:"localhost:8888/wshop/public/notificationCon/openJob",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
            $('.dropdown-menu').html(data.notification);
            if(data.unseen_notification > 0)
            {
                $('.count').html(data.unseen_notification);
            }
        }
    });
}


