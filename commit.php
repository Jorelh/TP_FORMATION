  // Slide & Fade the filters
$("#filters-btn").click(function() {
    $("#filters").animate({
        height: "toggle",
        opacity: "toggle"
    }, "slow");
});