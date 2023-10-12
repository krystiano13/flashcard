const registerForm: HTMLFormElement | null = document.querySelector('#form');

const handleRegister = async (e:SubmitEvent): Promise<void> => {
    e.preventDefault();
    const formData: FormData = new FormData(registerForm as HTMLFormElement);
    await fetch('http://localhost/flashcard/api/handleRegister.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
            if(!data.status) {
                alert("Register error");
            }
            else {
                alert("Register went successfully");
            }
        })
}

form?.addEventListener('submit', (e) => handleRegister(e));
