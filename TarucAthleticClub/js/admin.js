window.onload = function () {

    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function () {
        sidebar.classList.toggle("active");
    };

    document.querySelector('.pop').addEventListener('click',
            function () {
                document.querySelector('.box').style.display = 'flex';
            });


    document.querySelector('.close').addEventListener('click',
            function () {
                document.querySelector('.box').style.display = 'none';
            });
};