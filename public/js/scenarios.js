$(document).ready(function() { 
    $("#years1").change(calc1);
    $("#total1").change(calc1);
    $("#years2").change(calc2);
    $("#monthly2").change(calc2);

    function calc1() {
        var years = $("#years1").val();
        var total = $("#total1").val();
        var monthly = pmt(years, total);
        $("#monthly1").html("$"+monthly);
        var pocket = years * 12 * monthly;
        $("#pocket1").html("$"+pocket.toFixed());

    }

    function calc2() {
        var years = $("#years2").val();
        var monthly = $("#monthly2").val();
        var total = fv(years, monthly);
        $("#total2").html("$"+total);
        var pocket = years * 12 * monthly;
        $("#pocket2").html("$"+pocket.toFixed());
    }  

    function pmt(years, total) {
        var i   = .05/12;
        var n   = years * 12;
        var fv  = total;
        var pmt = ((fv*i) / (1-Math.pow(1+i, n))) * -1;
        return pmt.toFixed(2);
    }

    function fv(years, monthly) {
        var i   = .05/12;
        var n   = years * 12;
        var pmt  = monthly;
        var fv = 1*pmt*((Math.pow(1+i, n)-1)/i)
        return fv.toFixed();
    }

}); 