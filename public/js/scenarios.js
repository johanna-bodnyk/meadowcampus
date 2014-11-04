$(document).ready(function() { 
    $("#years1").change(calc1);
    $("#total1").change(calc1);

    function calc1() {
        var years = $("#years1").val();
        var total = $("#total1").val();
        var amount = pmt(years, total);
        $("#monthly1").html("$"+amount);
    }

    function pmt(years, total) {
        var i   = .05/12;
        var n   = years * 12;
        var fv  = total;
        var pmt = ((fv*i) / (1-Math.pow(1+i, n))) * -1;
        return pmt.toFixed(2);
    }

}); 