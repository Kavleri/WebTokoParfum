document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('active');
        });
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const chatForm = document.getElementById('chat-form');
    const chatMessages = document.getElementById('chat-messages');
    if (!chatForm || !chatMessages) return;

    chatForm.addEventListener('submit', e => {
        e.preventDefault();
        const textarea = document.getElementById('chat-message');
        const msg = textarea.value.trim();
        if (msg.length === 0) return;

        const userMsgDiv = document.createElement('div');
        userMsgDiv.className = 'message user';
        userMsgDiv.setAttribute('tabindex', '0');
        userMsgDiv.textContent = msg;
        chatMessages.appendChild(userMsgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        textarea.value = '';

        setTimeout(() => {
            const reply = document.createElement('div');
            reply.className = 'message other';
            reply.setAttribute('tabindex', '0');
            reply.textContent = 'Terima kasih atas pertanyaan Anda, kami akan segera menghubungi Anda.';
            chatMessages.appendChild(reply);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }, 2000);
    });
});

 document.addEventListener('contextmenu', event => event.preventDefault());
  document.onkeydown = function(e) {
    if(e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
      return false;
    }
  }