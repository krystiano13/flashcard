type cardInfo = {
    id: number,
    one_side: string,
    second_side: string
}

const cards: cardInfo[] = [];

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
            }
        })
}

getData();
console.log(cards);