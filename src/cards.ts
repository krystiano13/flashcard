const cardMainElement: HTMLElement | null = document.querySelector('main');

const deleteCard = async (e: MouseEvent): Promise<void> => {
    e.preventDefault();
    if ((e.target as HTMLElement)?.tagName === "BUTTON" &&
        (e.target as HTMLElement)?.innerText === "Delete") {
        const id: string = (e.target as HTMLElement)?.id;

        const data = new FormData();
        data.append('id', id);

        await fetch('http://localhost:8080/flashcard/api/handleDeleteCard.php',
            {method: "POST", body: data}
        )
            .then(res => res.json())
            .then(data => {
                if (data.status) {
                    window.location.reload();
                } else {
                    alert('Error when deleting card');
                }
            })
    }

}
const editCard = async (e: MouseEvent): Promise<void> => {
    if ((e.target as HTMLElement)?.tagName === "BUTTON" &&
        (e.target as HTMLElement)?.innerText === "Edit") {
        const data = new FormData();
        data.append("card_id", (e.target as HTMLElement)?.id);
        await fetch('http://localhost:8080/flashcard/api/selectCard.php',
            {method: "POST", body: data})
            .then(res => res.json())
            .then(data => {
                if(data.status) window.location.href = "/flashcard/editCard.php";
                else alert('Error');
            })
    }


}

cardMainElement?.addEventListener('click', (e) => deleteCard(e));
cardMainElement?.addEventListener('click', (e) => editCard(e));