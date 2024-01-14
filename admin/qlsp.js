function showTab(tabId, element) {
    var targetTab = "#" + tabId;
    $('.tab-content .tab-pane').hide();
    $(targetTab).show();
    $('.management-item div').removeClass('active');
    $(element).addClass('active');
    history.pushState(null, null, `#${tabId}`);
}

$(document).ready(function () {
    var hash = window.location.hash;
    if (hash) {
        var tabId = hash.substring(1);
        showTab(tabId);
    }
});
$(document).ready(function () {
    $('#searchIcon').click(function () {
        $('#searchInput').toggle();
        $('#searchInput').focus(); 
    });
});

