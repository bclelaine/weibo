@extends('layouts.default')
@section('title', '帮助')

@section('content')
<div class="chat-container">
  <div class="messages" id="messages"></div>
  <div class="input-container">
    <input type="text" id="userInput" placeholder="输入消息...">
    <button onclick="sendMessage()">发送</button>
  </div>
</div>

<script>
  function sendMessage() {
    const userInput = document.getElementById('userInput').value;
    if (userInput.trim() === '') return;

    const messagesContainer = document.getElementById('messages');
    const userMessage = document.createElement('div');
    userMessage.className = 'message user';
    userMessage.textContent = userInput;
    messagesContainer.appendChild(userMessage);

    fetch("/chat", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({message: userInput})
    }).then(response => response.json())
      .then(data => {
        console.log('Success:', data)
        const botMessage = document.createElement('div');
        botMessage.className = 'message bot';
        botMessage.textContent = data.content || '无法获取回复';
        messagesContainer.appendChild(botMessage);
      })
      .catch(error => {
        console.error('Error:', error);
        const botMessage = document.createElement('div');
        botMessage.className = 'message bot';
        botMessage.textContent = '发生错误，请重试';
        messagesContainer.appendChild(botMessage);
      });

    document.getElementById('userInput').value = '';
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
  }
</script>
@stop
