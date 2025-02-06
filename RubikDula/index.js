document.getElementById("addPerfumeBtn").addEventListener("click", function () {
  var perfumeDiv = document.getElementById("perfume");
  var currentHeight = perfumeDiv.style.height
    ? parseFloat(perfumeDiv.style.height)
    : 0;

  if (currentHeight < 100) {
    var newHeight = currentHeight + 30;
    newHeight = newHeight > 100 ? 100 : newHeight;
    perfumeDiv.style.height = newHeight + "%";
  }
});
