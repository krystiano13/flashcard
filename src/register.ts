const registerForm: HTMLFormElement | null = document.querySelector('#form');

const handleRegister = async (e:SubmitEvent): Promise<void> => {
    const formData = new FormData(registerForm as HTMLFormElement);
    await fetch('http://localhost/flashcard/api/register');
}
