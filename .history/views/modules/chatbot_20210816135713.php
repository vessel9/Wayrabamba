<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/chat.css">
    <link rel="stylesheet" href="./views/css/chatbot.css">
    <link rel="stylesheet" href="./views/css/typing.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
            <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="./views/images/ico.jpg" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Wayrabot</h4>
                        <p class="chatbox__description--header">Resuelve tus dudas</p>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div class="wrapper">
                        <div class="form">
                        
                            <div class="bot-inbox inbox">
                                <div class="icon">
                                </div>
                                <div class="messages__item messages__item--visitor">
                                <div class="msg-header">
                                    <p>Hola, bienvenido ¿En que puedo ayudarte?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     </div>
                    <div class="chatbox__footer">
                    <div class="typing-field">
                            <div class="input-data">
                                <input id="data" type="text" placeholder="Has tus preguntas aquí.." required>
                                <button id="send-btn">Enviar</button>
                            </div>
                        </div>
                </div>
               
            </div>
            <div class="chatbox__button">
                <button>button</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="messages__item messages__item--operator"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: './views/modules/message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="messages__item messages__item--visitor"><div class="icon"><i class=""></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    <script src="./views/js/Chat.js"></script>
    <script src="./views/js/app.js"></script>
</body>
</html>