window.onload = function(){
    const EFFECT = document.querySelector("#js");

    window.addEventListener('scroll',scrollEffect);

    function scrollEffect(){
        if(window.scrollY >= 300){
            EFFECT.style.opacity = '0';
            EFFECT.style.transition = '0.3s ease-in-out';
        }
        else{
            EFFECT.style.opacity = '1';
            EFFECT.style.transition = '1s ease-in-out';
        }
    }
    scrollEffect();

};