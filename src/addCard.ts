const cardForm: HTMLFormElement | null = document.querySelector("#cardForm");
const cardMain: HTMLElement | null = document.querySelector('main');
const cardErrorsDiv: HTMLDivElement | null = document.querySelector('.errors');

const cardErrors: string[] = [];

const create = async (e: SubmitEvent): Promise<void> => {
    e.preventDefault();
    const formData: FormData = new FormData(e.target as HTMLFormElement);
    formData.append('id',cardMain?.id as string);

    await fetch('http://localhost/flashcard/api/handleCreateCard.php',
        { method : "POST", body: formData }
    )
        .then(res => res.json())
        .then(data => {
            if(data.status) {
                window.location.href = "/flashcard/deck.php";
            }

            else {
                alert('Error');
            }
        })
}

cardForm?.addEventListener('submit', e => create(e));