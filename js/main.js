function updateCartCounter() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  
  const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
  
  const counterElement = document.getElementById('cart-counter');
  
  if (counterElement) {
    counterElement.textContent = totalItems;
    
    if (totalItems > 0) {
      counterElement.style.display = 'flex';
    } else {
      counterElement.style.display = 'none';
    }
  }
}

document.addEventListener('DOMContentLoaded', () => {
    updateCartCounter();

    const menuToggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    if(menuToggle && mobileNav) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('active');
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const chatBubble = document.getElementById('chatBubble');
    const miniChatWindow = document.getElementById('miniChatWindow');
    const closeChatBtn = document.getElementById('closeChatBtn');
    const miniChatForm = document.getElementById('miniChatForm');
    const miniChatTextarea = document.getElementById('miniChatTextarea');
    const miniChatMessages = document.getElementById('miniChatMessages');

    let lastMessageCount = 0; 
    function addMessageToMiniChat(text, sender, timestamp) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}`;
        const p = document.createElement('p');
        p.textContent = text;
        const timeSpan = document.createElement('span');
        timeSpan.className = 'timestamp';
        
        const date = new Date(timestamp);
        timeSpan.textContent = `${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}`;
        
        messageDiv.appendChild(p);
        messageDiv.appendChild(timeSpan);
        miniChatMessages.appendChild(messageDiv);
        
        miniChatMessages.scrollTop = miniChatMessages.scrollHeight;
    }

    async function saveMessageToServer(messageText) {
        try {
            const formData = new FormData();
            formData.append('message', messageText);
            const response = await fetch('kirim_pesan.php', { 
                method: 'POST',
                body: formData, 
            });
            const result = await response.json(); 
            console.log('Server response after sending:', result);
        } catch (error) {
            console.error('Error sending message:', error);
        }
    }
    
    async function fetchMessages() {
        try {
            const response = await fetch('ambil_pesan.php?t=' + new Date().getTime()); 
            const messages = await response.json();

            if (messages.length !== lastMessageCount) {
                miniChatMessages.innerHTML = ''; 
                messages.forEach(msg => {
                    addMessageToMiniChat(msg.message_text, msg.sender_type, msg.created_at);
                });
                lastMessageCount = messages.length;
            }
        } catch (error) {
            console.error('Error fetching messages:', error);
        }
    }

    chatBubble.addEventListener('click', () => {
        miniChatWindow.classList.add('open');
        fetchMessages(); 
        miniChatTextarea.focus(); 
    });

    closeChatBtn.addEventListener('click', () => {
        miniChatWindow.classList.remove('open');
    });

    setInterval(fetchMessages, 3000); 

});