const cardForm: HTMLFormElement | null = document.querySelector("#cardForm");

const create = async (e: SubmitEvent): Promise<void> => {
    e.preventDefault();
    const formData = new FormData(cardForm as HTMLFormElement);
}