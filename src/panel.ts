const logoutButton: HTMLButtonElement | null = document.querySelector('#logoutBtn');
const decksDiv: HTMLDivElement | null = document.querySelector('#decks');

const createDeckView = () => {
    window.location.href = '/flashcard/createDeck.php';
}

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
    console.log(el);
    if (el?.tagName === "P") {
        const data: FormData = new FormData();
        data.append('deck_id', el.id);
        data.append('deckName', el.innerText);
        await fetch('http://localhost/flashcard/api/handleChooseDeck.php',
            {method: 'POST', body: data}
        )
            .then(res => res.json())
            .then(data => {
                if (data.status) window.location.href = '/flashcard/deck.php';
            })
    }
    else if(el.id === "create") {
        createDeckView();
    }
}

decksDiv?.addEventListener('click', (e) => pickDeck(e));
logoutButton?.addEventListener('click', () => logout());