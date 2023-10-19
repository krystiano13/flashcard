const cardMainElement: HTMLElement | null = document.querySelector('main');

const deleteCard = async (e: MouseEvent): Promise<void> => {
    e.preventDefault();
    if((e.target as HTMLElement)?.tagName !== "BUTTON" &&
        (e.target as HTMLElement)?.innerText !== "Delete")  {
        return;
    }
    const id:string = (e.target as HTMLElement)?.id;

    const data = new FormData();
    data.append('id', id);

    await fetch('http://localhost:8080/flashcard/api/handleDeleteCard.php',
        { method : "POST", body: data }
    )
        .then(res => res.json())
        .then(data => {
            if(data.status) {
                window.location.reload();
            }

            else {
                alert('Error when deleting card');
            }
        })
}

cardMainElement?.addEventListener('click', (e) => deleteCard(e));