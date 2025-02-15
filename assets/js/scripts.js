document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuIcons = mobileMenuButton.querySelectorAll('svg');
    
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('show');
        menuIcons.forEach(icon => icon.classList.toggle('hidden'));
        
        const isExpanded = mobileMenu.classList.contains('show') ? 'true' : 'false';
        mobileMenuButton.setAttribute('aria-expanded', isExpanded);
    });

    document.addEventListener('click', function(event) {
        if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.remove('show');
            mobileMenu.classList.add('hidden');
            menuIcons[0].classList.remove('hidden');
            menuIcons[1].classList.add('hidden');
            mobileMenuButton.setAttribute('aria-expanded', 'false');
        }
    });

    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link, .mobile-nav-link');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath.split('/').pop()) {
            link.classList.add('active');
        }
    });
});

function copyIP(text) {
    const input = document.createElement('input');
    input.style.position = 'absolute';
    input.style.left = '-9999px';
    document.body.appendChild(input);
    
    input.value = text;
    input.select();
    document.execCommand('copy');
    document.body.removeChild(input);

    const button = event.currentTarget;
    const icon = button.querySelector('i');
    
    icon.classList.remove('fa-copy');
    icon.classList.add('fa-check');
    button.classList.add('copy-success');
    
    setTimeout(() => {
        icon.classList.remove('fa-check');
        icon.classList.add('fa-copy');
        button.classList.remove('copy-success');
    }, 2000);
}

document.addEventListener('DOMContentLoaded', function() {
    const ipText = 'paragonsmp.corujao.com:3039';
    const ipButtons = document.querySelectorAll('#ip-copy, #ip-copy-mobile');
    
    ipButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            copyIP(ipText);
        });
    });
});

function updateServerStatus() {
    const serverAddress = 'paragonsmp.corujao.com';
    const serverPort = '3039';
    
    fetch(`https://api.minetools.eu/ping/${serverAddress}/${serverPort}`)
        .then(response => response.json())
        .then(data => {
            const statusElement = document.getElementById('status');
            const motdElement = document.getElementById('motd');
            const onlineElement = document.getElementById('online');
            
            if (data.error) {
                statusElement.innerHTML = '<i class="fas fa-times text-red-500"></i> Servidor offline';
                motdElement.innerHTML = '-';
                onlineElement.innerHTML = '-';
            } else {
                statusElement.innerHTML = '<i class="fas fa-check text-green-500"></i> Servidor online';
                motdElement.innerHTML = data.description.replace(/§(.+?)/gi, '');
                onlineElement.innerHTML = data.players.online;
            }
        })
        .catch(() => {
            document.getElementById('status').innerHTML = '<i class="fas fa-times text-red-500"></i> Erro ao verificar status';
        });
}

document.addEventListener('DOMContentLoaded', function() {
    updateServerStatus();
    setInterval(updateServerStatus, 30000);
});