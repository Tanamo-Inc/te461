<div class="chat-panel panel panel-default">
    <div class="panel-heading" style="background-color: #3a3a3a; color: #fff;">
            <i class="fa fa-comments fa-fw"></i>
                            Chat Forum
                <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                        </button>
                </div>
     </div>
    <!-- /.panel-heading -->
    <div class="panel-body" id="chatList">
                            
    </div>
    <!-- /.panel-body -->
    <div class="panel-footer">
        <div class="input-group">
                <input id="adminname" type="hidden" value="<?php echo $_SESSION['cengadmin']; ?>"/>
                <input id="messagen" type="text" class="form-control input-sm" placeholder="Type your message here..." value=" "/>
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-sm" id="sendMsg">
                       Send
                    </button>
                </span>
        </div>
    </div>
    <!-- /.panel-footer -->
</div>
<!-- /.panel .chat-panel -->
<script type="text/javascript">
    $(function(){
    //implementing sendmessage in chat
    $('#sendMsg').click(function(){
        var x=$('#messagen').val();
        var user=$('#adminname').val();
        $.post('../includes/ajax.php',{'user':user,'msg':x},function(data){
            if(data==1){
                //document.getElementById('messagen').setAttribute('value',' ');
                //console.log(data);
                $('#messagen').val(" ");
            }
        });
    });

    //retrieving data from chat
    setInterval(function(){
        $.post('../includes/ajax.php',{'getchats':'y'},function(data){
            if(data){
                $('#chatList').html(data);
                //document.getElementById('chatList').innerHTML=data;
                //console.log(data);
            }else{

            }
        });

    },1000);

    });
</script>