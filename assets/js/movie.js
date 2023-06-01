document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.play-btn').forEach(e => {
        e.addEventListener("click", () => {
            const modal =  document.querySelector(e.getAttribute("data-target"));

            var iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube.com/embed/'+ e.getAttribute("data-video") +'?autoplay=1';
            iframe.width="854";
            iframe.height="480";
            iframe.frameborder="0";
            iframe.allow="autoplay; encrypted-media";
            iframe.allowfullscreen=true;

            modal.querySelector('.modal_body').appendChild(iframe);
            modal.classList.add("active");
        })
    })

    document.querySelectorAll('.readMore').forEach(e => {
        e.addEventListener("click", () => {
            const modal =  document.querySelector(e.getAttribute("data-target"));


            fetch('/movie/detail/' + e.getAttribute('data-movie-id'))
                .then(response => response.json())
                .then(json => {
                    modal.querySelector('.modal_body').innerHTML = json.content;
                    modal.classList.add("active");
                })



        })
    })
});
