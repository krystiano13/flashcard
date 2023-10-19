const editMain = document.querySelector('main');
const editForm: HTMLFormElement | null = document.querySelector('#cardForm');

const edit = async (e: SubmitEvent) => {
    e.preventDefault();
    const data = new FormData(editForm as HTMLFormElement);
    data.append('id', editMain?.id as string);
    await fetch('http://localhost:8080/flashcard/api/handleUpdateCard.php',
        {method: "POST", body: data}
    )
        .then(res => res.json())
        .then(data => {
            if (!data.status) alert('error');
            window.location.href = '/flashcard/cards.php';
        })
}

editForm?.addEventListener('submit', (e: SubmitEvent) => edit(e));