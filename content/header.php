<div class="header">
    <div class="innerHeader">
        <div class="leftHeader">
            <img src="media/logo.png" />
            <iconify-icon class="headerIcon" icon="ph:house"></iconify-icon>
            <iconify-icon id="toggleStockTicker" class="headerIcon" icon="octicon:graph-24"></iconify-icon>
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
            <iconify-icon id="toggleLivechat" class="headerIcon" icon="solar:chat-dots-linear"></iconify-icon>
            <iconify-icon class="headerIcon" icon="ion:notifications-outline"></iconify-icon>
            <iconify-icon class="headerIcon" icon="ep:message-box"></iconify-icon>
            <iconify-icon class="headerIcon" icon="carbon:user-avatar-filled"></iconify-icon>
        </div>
    </div>
</div>

<script>

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