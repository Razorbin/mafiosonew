var suggestions = [
  {
    name: "Pengeinnkreving",
    description: "Pengeinnkreving er en funksjon",
  },
  {
    name: "Streetrace",
    description: "Streetrace er en funksjon",
  },
  {
    name: "Kriminalitet",
    description: "Kriminalitet er en funksjon",
  },
  {
    name: "Biltyveri",
    description: "Biltyveri er en funksjon",
  },
];

// Function to show suggestions and descriptions
function showSuggestions() {
  var input = document.getElementById("textfield").value.toLowerCase();
  var suggestionContainer = document.getElementById("suggestionContainer");
  var suggestionList = document.getElementById("suggestionList");
  var descriptionSection = document.getElementById("descriptionSection");
  var noResultsMessage = document.getElementById("noResults");
  suggestionList.innerHTML = "";
  descriptionSection.innerHTML = "";

  if (input !== "") {
    var matchingSuggestions = suggestions.filter(function (suggestion) {
      return suggestion.name.toLowerCase().includes(input);
    });

    if (matchingSuggestions.length > 0) {
      matchingSuggestions.forEach(function (suggestion) {
        var suggestionItem = document.createElement("li");
        var suggestionHTML = suggestion.name.replace(
          new RegExp(input, "gi"),
          "<strong>$&</strong>"
        );
        suggestionItem.innerHTML = suggestionHTML;
        suggestionList.appendChild(suggestionItem);

        var descriptionContainer = document.createElement("div");
        var description = document.createElement("p");
        description.style.color = "grey";
        description.style.margin = "5px 0px 5px 0px";

        description.textContent = suggestion.description;
        descriptionContainer.appendChild(description);
        suggestionItem.appendChild(descriptionContainer);
      });

      suggestionContainer.style.display = "block";
      noResultsMessage.style.display = "none";
    } else {
      suggestionContainer.style.display = "block";
      noResultsMessage.style.display = "block";
    }
  } else {
    suggestionContainer.style.display = "none";
    noResultsMessage.style.display = "none";
  }
}
