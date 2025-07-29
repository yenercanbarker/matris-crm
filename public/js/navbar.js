document.addEventListener('DOMContentLoaded', function() {
    function checkAuthStatus() {
        const token = localStorage.getItem('token');
        const authMenu = document.getElementById('auth-menu');
        const guestMenu = document.getElementById('guest-menu');
        const mobileAuthMenu = document.getElementById('mobile-auth-menu');
        const mobileGuestMenu = document.getElementById('mobile-guest-menu');
        let isLoginConfirmed = localStorage.getItem('isLoginConfirmed');

        if (token === undefined || token === null) {
            isLoginConfirmed = undefined;
            localStorage.removeItem('isLoginConfirmed');
        }

        if (isLoginConfirmed !== undefined && !isLoginConfirmed) {
            fetch('/api/dashboard/account', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json',
                },
            })
                .then(res => {
                    if (res.ok) {
                        return res.json();
                    } else {
                        throw new Error('error');
                    }
                })
                .then(data => {
                    if (authMenu) authMenu.style.display = 'flex';
                    if (guestMenu) guestMenu.style.display = 'none';
                    if (mobileAuthMenu) mobileAuthMenu.style.display = 'flex';
                    if (mobileGuestMenu) mobileGuestMenu.style.display = 'none';
                    localStorage.setItem('isLoginConfirmed', true);
                })
                .catch(err => {
                    if (authMenu) authMenu.style.display = 'none';
                    if (guestMenu) guestMenu.style.display = 'flex';
                    if (mobileAuthMenu) mobileAuthMenu.style.display = 'none';
                    if (mobileGuestMenu) mobileGuestMenu.style.display = 'flex';
                });
        } else {
            if (authMenu) authMenu.style.display = 'flex';
            if (guestMenu) guestMenu.style.display = 'none';
            if (mobileAuthMenu) mobileAuthMenu.style.display = 'flex';
            if (mobileGuestMenu) mobileGuestMenu.style.display = 'none';
        }
    }

    checkAuthStatus();

    window.addEventListener('storage', function(e) {
        if (e.key === 'token') {
            checkAuthStatus();
        }
    });

    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('show');

            if (isOpen) {
                mobileMenu.classList.remove('show');
            } else {
                mobileMenu.classList.add('show');
            }

            if (menuIcon && closeIcon) {
                if (isOpen) {
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    menuIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            }
        });
    }

    const mobileMenuLinks = mobileMenu ? mobileMenu.querySelectorAll('a') : [];
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu.classList.remove('show');
            if (menuIcon && closeIcon) {
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    });

    const logoutBtn = document.getElementById('logout-btn');
    const logoutText = document.getElementById('logout-text');
    const mobileLogoutBtn = document.getElementById('mobile-logout-btn');
    const mobileLogoutText = document.getElementById('mobile-logout-text');

    function handleLogout(btn, textElement) {
        if (btn && textElement) {
            btn.addEventListener('click', function(e) {
                localStorage.removeItem('token');

                btn.disabled = true;
                btn.style.opacity = '0.6';

                const spinner = document.createElement('svg');
                spinner.className = 'w-4 h-4 mr-2 animate-spin';
                spinner.innerHTML = '<path d="M12 4.354a7.646 7.646 0 100 15.292V12a4.354 4.354 0 110-7.646V4.354z" fill="currentColor"/>';

                const existingIcon = btn.querySelector('svg');
                if (existingIcon) {
                    existingIcon.replaceWith(spinner);
                }

                checkAuthStatus();
            });
        }
    }

    handleLogout(logoutBtn, logoutText);
    handleLogout(mobileLogoutBtn, mobileLogoutText);
});
