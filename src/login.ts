const form:HTMLFormElement | null = document.querySelector('form');
const usernameInput: HTMLInputElement | null = document.querySelector('#usernameInput');
const passwordInput: HTMLInputElement | null = document.querySelector('#passwordInput');
const errorsDiv: HTMLDivElement | null = document.querySelector('.errors');

const injectErrors = (errors: string[]) => {
    (errorsDiv as HTMLDivElement).innerHTML = "";

    errors.forEach((item:string) => {
        const paragraph:HTMLParagraphElement = document.createElement('p');
        paragraph.innerText = item;
        paragraph.className = "f-xs font-head color-bg mt-1";
        errorsDiv?.appendChild(paragraph);
    });
}

const handleSubmit = async (e:SubmitEvent): Promise<void> => {
    e.preventDefault();
    const formData: FormData = new FormData();

    formData.append('username',usernameInput?.value as string);
    formData.append('password', passwordInput?.value as string);


    await fetch('http://localhost/flashcard/api/handleLogin.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
           if(!data.status) {
               if(data.errors) injectErrors(data.errors);
           }

           else {
               alert('Login went successfully');
           }
        })
}

form?.addEventListener('submit', (e) => handleSubmit(e))