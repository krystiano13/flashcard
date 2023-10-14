const logoutButton: HTMLButtonElement | null = document.querySelector('#logoutBtn');
const decksDiv: HTMLDivElement | null = document.querySelector('#decks');

const logout = async (): Promise<void> => {
    await fetch('http://localhost/flashcard/api/handleLogout.php', { method: "POST" })
        .then(res => res.json())
        .then(data => {
            if(data) {
                window.location.href = '/flashcard/';
            }
        })
}

const pickDeck = (e:MouseEvent) => {
    if((e.target as HTMLElement)?.tagName === "P") {
        console.log(e.target);
    }
}

decksDiv?.addEventListener('click', (e) => pickDeck(e));

logoutButton?.addEventListener('click', () => logout());