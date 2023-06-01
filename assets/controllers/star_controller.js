import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["average"]

    connect() {
        const starCount = Math.round(parseInt(this.averageTarget.value) / 2);
        let text = '';
        for (let i = 1; i <= 5; i++) {
            text += `<div class="${i <= starCount ? 'fill' : 'blank'} mr-1" ><i class="fa-solid fa-star"></i></div>`;
        }

        this.element.innerHTML = text;
    }
}
