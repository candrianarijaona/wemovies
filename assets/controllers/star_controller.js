import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["average"]

    connect() {
        const movieAverage = this.averageTarget.value / 2;
        const fullStars = Math.floor(movieAverage);
        const halfStar = movieAverage > fullStars;
        const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);

        let text = '';
        for (let i = 1; i <= fullStars; i++) {
            text += `<div class="fill mr-1" ><i class="fa-solid fa-star"></i></div>`;
        }

        if (halfStar) {
            text += `<div class="fill mr-1" ><i class="fa-solid fa-star-half-stroke"></i></div>`;
        }

        for (let i = 1; i <= emptyStars; i++) {
            text += `<div class="blank mr-1" ><i class="fa-solid fa-star"></i></div>`;
        }

        this.element.innerHTML = text;
    }
}
