window.onload = function () {

    document.querySelector('.pop').addEventListener('click',
            function () {
                document.querySelector('.box').style.display = 'flex';
            });


    document.querySelector('.close').addEventListener('click',
            function () {
                document.querySelector('.box').style.display = 'none';
            });
};