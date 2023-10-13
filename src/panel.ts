const logoutButton: HTMLButtonElement | null = document.querySelector('#logoutBtn');

const logout = async (): Promise<void> => {
    await fetch('http://localhost/flashcard/api/handleLogout.php', { method: "POST" })
        .then(res => res.json())
        .then(data => {
            if(data) {
                window.location.href = '/flashcard/';
            }
        })
}

logoutButton?.addEventListener('click', () => logout());