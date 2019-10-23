<footer>
    <button id="prev" class="arrows" onClick="console.log(window.location.search)">
        <
    </button>
    <button id="next" class="arrows">
        >
    </button>
</footer>

<script>
    let url = window.location.href+"index.php?p="
    let query = window.location.search;
    if (query.length >= 1) {
        query = query.substr(1)
        var parts = query.split('&');
        var parameters = {};
        for (var i = 0; i < parts.length; i++) {
            var keyValue = parts[i].split('=');
            parameters[keyValue[0]] = keyValue[1] || '';
        }
        console.log(parameters.p);
        document.querySelector("#next").addEventListener('click', () => {
            window.location.href = `${url}${(parameters.p * 1) + 1}`;
        });
        document.querySelector("#prev").addEventListener('click', () => {
            window.location.href = `${url}${(parameters.p * 1) - 1}`;
        });

    };
</script>