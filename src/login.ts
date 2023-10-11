const form:HTMLFormElement | null = document.querySelector('form');
const usernameInput: HTMLInputElement | null = document.querySelector('#usernameInput');
const passwordInput: HTMLInputElement | null = document.querySelector('#passwordInput');

const handleSubmit = async (e:SubmitEvent): Promise<void> => {
    e.preventDefault();
    const formData: FormData = new FormData();

    formData.append('username',usernameInput?.value as string);
    formData.append('password', passwordInput?.value as string);


    await fetch('http://localhost/flashcard/api/handleLogin.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
           if(!data.status) {
               alert('login Error');
           }

           else {
               alert('Login went successfully');
           }
        })
}

form?.addEventListener('submit', (e) => handleSubmit(e))