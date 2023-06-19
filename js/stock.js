var stockTicker = document.getElementById("stockTicker");
var toggleButtonStockTicker = document.getElementById("toggleStockTicker");

toggleButtonStockTicker.addEventListener("click", function () {
  stockTicker.classList.toggle("hiddenStockTicker");
  toggleButtonStockTicker.classList.toggle(
    "defaultBlue",
    !stockTicker.classList.contains("hiddenStockTicker")
  );
});
