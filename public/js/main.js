/**
 * Created by Marko on 1/25/2017.
 */

$("#search").keyup(function() {
    var value = this.value;

    $("table").find("tr").each(function(index) {
        if (!index) return;
        var id = $(this).find("td").text();
        $(this).toggle(id.indexOf(value) !== -1);
    });
});