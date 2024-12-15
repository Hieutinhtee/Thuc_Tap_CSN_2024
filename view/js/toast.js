
document.addEventListener('DOMContentLoaded', function() {
  const toast1 = document.querySelector(".toast1"),
  closeIcon = document.querySelector(".close"),
  progress = document.querySelector(".progress");

let timer1, timer2;


toast1.classList.add("active");
progress.classList.add("active");

timer1 = setTimeout(() => {
  toast1.classList.remove("active");
}, 5000); //1s = 1000 milliseconds

timer2 = setTimeout(() => {
  progress.classList.remove("active");
}, 5300);


closeIcon.addEventListener("click", () => {
  toast1.classList.remove("active");

  setTimeout(() => {
    progress.classList.remove("active");
  }, 300);

  clearTimeout(timer1);
  clearTimeout(timer2);
});
});