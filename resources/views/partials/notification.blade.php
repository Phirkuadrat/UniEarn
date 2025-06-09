<div id="notification-popup"
    class="fixed top-4 right-4 z-[1000] w-full max-w-sm rounded-lg shadow-lg p-4
               transform translate-x-full opacity-0 transition-all duration-300 ease-out"
    style="display: none;">
    <div class="flex items-start">
        <div id="notification-icon" class="flex-shrink-0 mr-3 text-lg">
        </div>
        <div class="flex-grow">
            <strong id="notification-title" class="font-bold block text-lg mb-1"></strong>
            <span id="notification-message" class="text-sm"></span>
            <ul id="notification-list" class="mt-2 text-xs list-disc list-inside hidden">
            </ul>
        </div>
        <button type="button" class="ml-auto text-current opacity-70 hover:opacity-100 focus:outline-none"
            onclick="hideNotificationPopup()">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
    </div>
</div>

<script>
    function showNotificationPopup(type, title, message, errors = []) {
        const popup = document.getElementById('notification-popup');
        const iconContainer = document.getElementById('notification-icon');
        const titleElement = document.getElementById('notification-title');
        const messageElement = document.getElementById('notification-message');
        const listElement = document.getElementById('notification-list');

        popup.className = 'fixed top-4 right-4 z-[1000] w-full max-w-sm rounded-lg shadow-lg p-4 ' +
            'transform translate-x-full opacity-0 transition-all duration-300 ease-out';
        iconContainer.innerHTML = '';
        listElement.innerHTML = '';
        listElement.classList.add('hidden');

        let bgColorClass = '';
        let iconHtml = '';
        let textColorClass = '';

        if (type === 'success') {
            bgColorClass = 'bg-green-500';
            textColorClass = 'text-white';
            iconHtml = '<i class="fas fa-check-circle"></i>';
        } else if (type === 'error') {
            bgColorClass = 'bg-red-600';
            textColorClass = 'text-white';
            iconHtml = '<i class="fas fa-times-circle"></i>';
        } else if (type === 'info') {
            bgColorClass = 'bg-blue-500';
            textColorClass = 'text-white';
            iconHtml = '<i class="fas fa-info-circle"></i>';
        } else if (type === 'warning') {
            bgColorClass = 'bg-yellow-500';
            textColorClass = 'text-white';
            iconHtml = '<i class="fas fa-exclamation-triangle"></i>';
        }

        popup.classList.add(bgColorClass, textColorClass);
        iconContainer.innerHTML = iconHtml;
        titleElement.textContent = title;
        messageElement.textContent = message;

        if (errors.length > 0) {
            errors.forEach(error => {
                const li = document.createElement('li');
                li.textContent = error;
                listElement.appendChild(li);
            });
            listElement.classList.remove('hidden');
        }

        popup.style.display = 'block';
        setTimeout(() => {
            popup.classList.remove('translate-x-full', 'opacity-0');
            popup.classList.add('translate-x-0', 'opacity-100');
        }, 50);

        if (type !== 'error' || errors.length === 0) {
            setTimeout(hideNotificationPopup, 5000);
        }
    }

    function hideNotificationPopup() {
        const popup = document.getElementById('notification-popup');
        if (popup) {
            popup.classList.remove('translate-x-0', 'opacity-100');
            popup.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => {
                popup.style.display = 'none';
                document.getElementById('notification-title').textContent = '';
                document.getElementById('notification-message').textContent = '';
                document.getElementById('notification-icon').innerHTML = '';
                document.getElementById('notification-list').innerHTML = '';
                document.getElementById('notification-list').classList.add('hidden');
            }, 300);
        }
    }
</script>
