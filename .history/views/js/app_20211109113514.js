const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const icons = {
    isClicked: '<img src="./views/images/chaticon.png" />',
    isNotClicked: '<img src="./views/images/chatbot2.gif" />'
}
const chatbox = new InteractiveChatbox(chatButton, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);