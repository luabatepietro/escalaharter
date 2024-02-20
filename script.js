document.addEventListener('DOMContentLoaded', function() {
    var acc = document.getElementsByClassName('accordion');
    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
            this.classList.toggle('active');
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        });
    }
});


let currentPage = 1;
const totalPages = 5; 

function updateProgressBar() {
    const progressBar = document.getElementById("progress-bar");
    progressBar.style.width = `${(currentPage / totalPages) * 100}%`;
}

function nextPage() {
    if (currentPage < totalPages) {
        document.getElementById(`page${currentPage}`).classList.remove("active");
        currentPage++;
        document.getElementById(`page${currentPage}`).classList.add("active");
        
        if (currentPage === totalPages) {
            document.getElementById("submit-button").style.display = "block";
            this.style.display = "none";
        }

        updateProgressBar();
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("page1").classList.add("active");
    updateProgressBar();
});
