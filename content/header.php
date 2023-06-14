<div class="header">
    <div class="innerHeader">
        <div class="leftHeader">
            <img src="media/logo.png" />
            <iconify-icon class="headerIcon" icon="ph:house"></iconify-icon>
            <iconify-icon class="headerIcon" icon="octicon:graph-24"></iconify-icon>
            <iconify-icon class="headerIcon" icon="ph:shopping-cart-light"></iconify-icon>
            <iconify-icon class="headerIcon" icon="ph:chat-light"></iconify-icon>

            <div class="containerForSuggestions">
                <input class="searchBarHeader textInput" type="text" id="textfield" oninput="showSuggestions()" placeholder="Søk etter funksjon her">
                <div id="suggestionContainer">
                    <ul id="suggestionList"></ul>
                    <div id="descriptionSection"></div>
                    <p id="noResults" style="display: none;">Fant ingenting med søkeordene</p>
                </div>
            </div>
        </div>
        <div class="rightHeader">
            <iconify-icon class="headerIcon" icon="ion:notifications-outline"></iconify-icon>
            <iconify-icon class="headerIcon" icon="ep:message-box"></iconify-icon>
            <iconify-icon class="headerIcon" icon="carbon:user-avatar-filled"></iconify-icon>
        </div>
    </div>
</div>

<script>
    var suggestions = [{
            name: "Pengeinnkreving",
            description: "Pengeinnkreving er en funksjon"
        },
        {
            name: "Streetrace",
            description: "Streetrace er en funksjon"
        },
        {
            name: "Kriminalitet",
            description: "Kriminalitet er en funksjon"
        },
        {
            name: "Biltyveri",
            description: "Biltyveri er en funksjon"
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
            var matchingSuggestions = suggestions.filter(function(suggestion) {
                return suggestion.name.toLowerCase().includes(input);
            });

            if (matchingSuggestions.length > 0) {
                matchingSuggestions.forEach(function(suggestion) {
                    var suggestionItem = document.createElement("li");
                    var suggestionHTML = suggestion.name.replace(new RegExp(input, 'gi'), '<strong>$&</strong>');
                    suggestionItem.innerHTML = suggestionHTML;
                    suggestionList.appendChild(suggestionItem);

                    var descriptionContainer = document.createElement("div");
                    var description = document.createElement("p");
                    description.style.color = "grey";
                    description.style.margin = '5px 0px 5px 0px';

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
</script>

<style>
    .containerForSuggestions {
        position: relative;
    }

    #suggestionContainer {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1;
        background-color: #131313;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        padding: 5px;
        display: none;
        border-radius: 5px;
        width: 450px;
        margin-top: 10px;
    }

    #suggestionContainer ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        color: white;
        font-size: 12px;
    }

    #suggestionContainer li {
        padding: 5px;
        margin: 0;
    }

    #noResults {
        font-size: 12px;
        margin-top: 10px;
        color: grey;
    }
</style>