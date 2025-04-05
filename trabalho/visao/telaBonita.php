<div id="loading">
    <img src="https://cdljundiai.com.br/wp-content/uploads/2020/06/senac.png" alt="Loading">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    window.onload = function () {
    const loadingImg = document.querySelector("#loading img");
    const loadingDiv = document.querySelector("#loading");
    const content = document.querySelector(".content");

    gsap.to(loadingImg, { opacity: 1, duration: 0.5 });

    setTimeout(() => {
        gsap.to(loadingDiv, {
            opacity: 0,
            duration: 0.5,
            onComplete: () => {
                loadingDiv.style.display = "none"; 
                content.style.opacity = "1"; 
            }
        });
    }, 500);
};

</script>

<style>
   

    #loading {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:rgb(0, 0, 0, 0.2);
        backdrop-filter: blur(1px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        -webkit-backdrop-filter: blur(1px);
    }

    #loading img {
        width: 300px;
        height: auto;
        opacity: 0;
    }

    .content {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}
</style>