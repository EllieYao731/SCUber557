const webMessage = [
  {
    "no":1,
    "name": "David",
    "type":"text",
    "message":"Hi",
    "dateTime":"09/23 10:00",
    "me": false
  },
  {
    "no":2,
    "name": "Johnny",
    "type":"text",
    "message":"你好",
    "dateTime":"09/23 10:15",
    "me": true
  },
  {
    "no":3,
    "name": "David",
    "type":"photo",
    "message":"image/photo/54137321.png",
    "dateTime":"09/23 10:19",
    "me": false
  },
  {
    "no":4,
    "name": "Johnny",
    "type":"emoji",
    "message":"image/emoji/like.png",
    "dateTime":"09/23 10:20",
    "me": true
  },
]

const renderChatRoom = () => {
  const chatRoomElement = document.getElementById('chatRoom');
  let message = '';

  webMessage.map(data => {
    if (data.me) {
      if (data.type == 'text') {
        message += `
          <div class="message_row you-message">
            <div class="message-content">
              <div class="message-text">${data.message}</div>
              <div class="message-time">${data.dateTime}</div>
            </div>
          </div>
        `;
      } else {
        message += `
          <div class="message_row you-message">
            <div class="message-content">
              <img class="ejIcon" src="${data.message}" alt="">
              <div class="message-time">${data.dateTime}</div>
            </div>
          </div>
        `;
      }
    } else {
      if (data.type == 'text') {
        message += `
          <div class="message_row other-message">
            <div class="message-content">
              <div class="message-text">${data.message}</div>
              <div class="message-time">${data.dateTime}</div>
            </div>
          </div>
        `;
      } else {
        message += `
          <div class="message_row other-message">
            <div class="message-content">
              <img class="ejIcon" src="${data.message}" alt="">
              <div class="message-time">${data.dateTime}</div>
            </div>
          </div>
        `;
      }
    }
  });

  chatRoomElement.innerHTML = message;
};

const sendMessage = () => {
  const inputElement = document.querySelector('.sendMsg');
  const messageText = inputElement.value.trim(); // 取得輸入的文字並去除前後空白

  var date = new Date();
  var options = { month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', hour12: false };
  var formattedDate = date.toLocaleString('en-US', options);

  if (messageText !== '') {
    const newMessage = {
      no: webMessage.length + 1,
      name: "Your Name",
      type: "text",
      message: messageText,
      dateTime: formattedDate,
      me: true
    };

    webMessage.push(newMessage); // 新增訊息到 webMessage 陣列

    renderChatRoom(); // 重新渲染聊天訊息
    inputElement.value = ''; // 清空輸入框

    // 自動捲動到最下面
    const chatBox = document.querySelector('.chat_message');
    chatBox.scrollTop = chatBox.scrollHeight;
  }
};

// 監聽 "送出" 事件，呼叫 sendMessage 函式
document.querySelector('.send_icon').addEventListener('click', sendMessage);
// 监听输入框的键盘事件
document.querySelector('.sendMsg').addEventListener('keydown', function(event) {
  // 判断按下的键是否是 Enter 键 (keyCode 为 13)
  if (event.keyCode === 13) {
    // 阻止默认的 Enter 键行为（换行），避免多行输入
    event.preventDefault();
    // 调用 sendMessage 函数
    sendMessage();
  }
});

// 在頁面載入時直接初始化顯示聊天訊息
document.addEventListener('DOMContentLoaded', () => {
  renderChatRoom();
});
