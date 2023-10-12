const registerForm: HTMLFormElement | null = document.querySelector('#form');
const regErrorsDiv: HTMLDivElement | null = document.querySelector('.errors');

const injectRegErrors = (errors: string[]) => {
    (regErrorsDiv as HTMLDivElement).innerHTML = "";

    errors.forEach((item:string) => {
        const paragraph:HTMLParagraphElement = document.createElement('p');
        paragraph.innerText = item;
        paragraph.className = "f-xs font-head color-bg mt-1";
        regErrorsDiv?.appendChild(paragraph);
    });
}

const handleRegister = async (e:SubmitEvent): Promise<void> => {
    e.preventDefault();
    const formData: FormData = new FormData(registerForm as HTMLFormElement);
    await fetch('http://localhost/flashcard/api/handleRegister.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
            if(!data.status) {
                if(data.errors)
                    injectRegErrors(data.errors);
            }
            else {
                alert("Register went successfully");
            }
        })
}

registerForm?.addEventListener('submit', (e:SubmitEvent) => handleRegister(e));
