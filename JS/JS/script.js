
function submitData(){
        $(document).ready(function(){
            var data={
                name : $('#name').val(),
                username : $('#username').val(),
                password : $('#password').val(),
                action : $('#action').val()
            };
            $.ajax({
                url:'function.php',
                type:'post',
                data :data,
                success:function(response){
                    alert(response);
                    if(response=="Login successful"){
                        window.location.href = '../PHP/index.php';
                    }
                }
            });
        });
    }