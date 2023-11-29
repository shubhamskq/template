<style>

// for temporary lawyer language
var popup = document.querySelector('.popup');
var close = document.querySelector('.close');

window.onload = function() {
    setTimeout(function() {
        popup.style.display = "block"
    }, 2000)
}

close.addEventListener('click', () => {
      popup.style.display = "none"
})

</style>

