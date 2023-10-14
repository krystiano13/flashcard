const logoutButton: HTMLButtonElement | null = document.querySelector('#logoutBtn');
const decksDiv: HTMLDivElement | null = document.querySelector('#decks');

const logout = async (): Promise<void> => {
    await fetch('http://localhost/flashcard/api/handleLogout.php', {method: "POST"})
        .then(res => res.json())
        .then(data => {
            if (data) {
                window.location.href = '/flashcard/';
            }
        })
}

const pickDeck = async (e: MouseEvent) => {
    const el: HTMLElement = e.target as HTMLElement;
    if (el?.tagName === "P") {
        const data: FormData = new FormData();
        data.append('deck_id', el.id);
        await fetch('http://localhost/flashcard/api/handleChooseDeck.php',
            {method: 'POST', body: data}
        )
            .then(res => res.json())
            .then(data => {
                if (data.status) window.location.href = '/flashcard/deck.php';
            })
    }
}

decksDiv?.addEventListener('click', (e) => pickDeck(e));

logoutButton?.addEventListener('click', () => logout());