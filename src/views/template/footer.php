<footer>

    © 2016 <i>Amine BEN TURKIA</i>

</footer>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {

        console.log("qsdsdsd");

        var chat = {};

        chat.get_messages = function () {
            $.ajax({
                url: '<?php echo URL ?>api/messages',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    $('#messages').prepend(data);
                }
            });
        }

        chat.get_users = function () {
            $.ajax({
                url: '<?php echo URL ?>api/users',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    $('#users').prepend(data);
                }
            });
        }

        $('#msg').keypress(function (event) {
            //check if user have press enter without shift
            if (event.keyCode == 13 && event.shiftKey == false) {
                chat.msg_contents = $('#msg').val(); //get the value of the textarea
                $.ajax({ //push the message using ajax to the server
                    url: '<?php echo URL ?>api/send',
                    type: 'post',
                    dataType: 'json',
                    success: function (data) {
                        chat.get_messages();
                    }
                });

                $('#msg').val(''); //clear the form
                return false; //and don't allow the new line to be printed
            }
        });

        chat.interval = setInterval(chat.get_messages, 5000); //the chat will be updated every 5 seconds
        chat.interval = setInterval(chat.get_users, 5000); //the chat will be updated every 5 seconds
        chat.get_messages(); //when page is loaded get the messages immediately
        chat.get_users(); //when page is loaded get the users immediately
    });
</script>