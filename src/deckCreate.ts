type form = HTMLFormElement | null;
type input = HTMLInputElement | null;

const deckForm:form = document.querySelector('#form');
const deckNameInput:input = document.querySelector('#deckInput');

deckForm?.addEventListener('submit', async (e:SubmitEvent) => {
    e.preventDefault();

    const data:FormData = new FormData();
    data.append('deckName',deckNameInput?.value as string);

    await fetch('http://localhost:8080/flashcard/api/handleCreateDeck.php',
        {
            method : "POST",
            body: data
        }
    )
        .then(res => res.json())
        .then(data => {
            if(data.status) {
                window.location.href = '/flashcard/panel.php';
            }

            else {
                alert('Error while creating a deck');
            }
        })
})