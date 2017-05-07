
$(document).ready(function () {
    var userid = $('.note').attr('id');
    setInterval((function () {
        $.ajax({
            url:"note.php",
            method:"POST",
            data:{action: userid},
            success:function (data) {
                if (data=='' || data==null || !data.trim()){

                }else{
                    UIkit.notification({
                        message: data,
                        status: 'primary',
                        pos: 'bottom-right',
                        timeout: 20000
                    });
            }}
        });
    }),1500);

    $(".huhu").click(function (e) {
            var id=this.id.substring(1);
            var commenttext=$('#c'.concat(id)).val();
            if (commenttext=='' || commenttext==null || !commenttext.trim()){
                e.preventDefault();
                $(this).blur();
                UIkit.modal.dialog("<p class='uk-modal-body'>This comment is empty you can't</p>");
            }else{
                $.ajax({
                    url:"class.php",
                    method:"POST",
                    data:{commenttext: commenttext , id: id},
                    success:function (data) {
                        $('#c'.concat(id)).val("");
                    }
                });
            }
    });

    $(".krkr").click(function (e) {
        var id=this.id.substring(2);
    setInterval(function() {
        $.ajax({
            url:"live.php",
            method:"POST",
            data:{action: 'getcomments', id: id},
            success:function (data) {
                $("#G".concat(id)).html(data);
            }
        });
    },1000);
    });

    $(document).on('click', '.editcomment',function (e) {
        var id=this.id.substring(1);
        var oldpost=$('#h'.concat(id)).html();
        $('#edit').val(oldpost);
        $('#modal-sections').on({
            'hide.uk.modal': function(){
                $('#yesedit').unbind();
            }
        });
        $('#yesedit').click(function (e) {
            $('#yesedit').unbind();
            var newpost=$('#edit').val();
            if (newpost=='' || newpost==null || !newpost.trim()){
                e.preventDefault();
                $(this).blur();
                UIkit.modal.dialog("<p class='uk-modal-body'>This comment is empty you can't</p>");
            }else if(oldpost==newpost){
                      alert("lllll");
            }else{
                $.ajax({
                    url:"class.php",
                    method:"POST",
                    data:{newcomment:newpost, commentid:id},
                    success:function () {
                    }
                });
            }
        });
    });

    $('.removepost').click(function (e) {
        var id=this.id.substring(1);
        $('#remove').on({
            'hide.uk.modal': function(){
                $('#yesdelet').unbind();
            }
        });
          $('#yesdelet').click(function () {
            $.ajax({
                url:"class.php",
                method:"POST",
                data:{removepost:id},
                success:function () {
                }
            });
          });
    });


    $(document).on('click', '.removecomment',function (e) {
        var id=this.id.substring(1);
        $('#remove').on({
            'hide.uk.modal': function(){
                $('#yesdelet').unbind();
            }
        });
        $('#yesdelet').click(function () {
            $.ajax({
                url:"class.php",
                method:"POST",
                data:{removecommentid:id},
                success:function () {
                }
            });
        });
    });
    $(".reportpost").click(function (e) {
        var id=this.id.substring(1);
            $.ajax({
                url:"class.php",
                method:"POST",
                data:{reportpostid:id},
                success:function () {
                }
            });
    });

    $(".editpost").click(function (e) {
        var id=this.id.substring(1);
        var oldpost=$('#b'.concat(id)).html();
        $('#edit').val(oldpost);
        $('#modal-sections').on({
            'hide.uk.modal': function(){
                $('#yesedit').unbind();
            }
        });
        $('#yesedit').click(function (e) {
            var newpost=$('#edit').val();
            if (newpost=='' || newpost==null || !newpost.trim()){
                e.preventDefault();
                $(this).blur();
                UIkit.modal.dialog("<p class='uk-modal-body'>This post is empty you can't</p>");
            }else if(oldpost==newpost){

            }else{
                $.ajax({
                    url:"class.php",
                    method:"POST",
                    data:{newpost:newpost, postid:id},
                    success:function () {
                        location.reload();
                    }
                });
            }
        });

    });


    $("#addnewpost").click(function (e) {
        var posttext=$('#klpa').val();

        if (posttext=='' || posttext==null || !posttext.trim()){
            e.preventDefault();
            $(this).blur();
            UIkit.modal.dialog("<p class='uk-modal-body'>This post is empty you can't</p>");
        }else{
            $.ajax({
                url:"class.php",
                method:"POST",
                data:{posttext:posttext},
                success:function (data) {
                    location.reload();
                    $('#klpa').val("");
                }
            });
        }
    });
});