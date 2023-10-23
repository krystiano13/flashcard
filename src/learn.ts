type cardInfo = {
    id: number,
    one_side: string,
    second_side: string
}

const cards: cardInfo[] = [];
let card_id: number = 0;
let isFlipped: boolean = false;

const leftBtn: HTMLButtonElement | null = document.querySelector('#left');
const rightBtn: HTMLButtonElement | null = document.querySelector('#right');
const cardText: HTMLParagraphElement | null = document.querySelector('#cardText');
const card: HTMLDivElement | null = document.querySelector('#card');

const flip = () => {
    isFlipped = !isFlipped;
    handleChangeId();
    card?.classList.toggle('flipped');

    if(isFlipped) {
        fetch('http://localhost:8080/flashcard/api/handleSwipeCard.php');
    }
}

const handleChangeId = () => {
    if(cardText) {
        isFlipped ? cardText.innerText =
            cards[card_id].second_side : cardText.innerText = cards[card_id].one_side;
    }
}

leftBtn?.addEventListener('click', () => {
    if(card_id > 0) card_id--;
    isFlipped = false;
    handleChangeId();
});

rightBtn?.addEventListener('click', () => {
    if(card_id < cards.length - 1) card_id++;
    isFlipped = false;
    handleChangeId();
});

card?.addEventListener('click', () => flip());

const getData = async () => {
    await fetch('http://localhost:8080/flashcard/api/handleGetCards.php')
        .then(res => res.json())
        .then(data => {
            if(!data.status) {
                window.location.href = '/flashcard/cards/deck.php';
            }

            else {
                const res: cardInfo[] = data.result;
                res.forEach(item => cards.unshift(item));
                handleChangeId();
            }
        })
}

getData();
