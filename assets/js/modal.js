document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".show").forEach(e => {
        e.addEventListener("click", () => {
            let target = e.getAttribute("modal-target");
            document.querySelector(target).classList.add("active");
        })
    })

    // Call the closeModal function on the clicks/keyboard
    document.querySelectorAll(".close").forEach(e=>{
        e.addEventListener("click",()=>{
            let target = e.getAttribute("modal-target");
            document.querySelector(target).classList.remove("active");

            setTimeout(function () {
                document.querySelector(target).querySelector('.modal_body').innerHTML = '';
            }, 1000);
        })
    })
});
